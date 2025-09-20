<?php
// Include config file
require_once "config.php";

$message = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = 'Please fill all the fields.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must have at least 6 characters.';
    } else {
        // Prepare a select statement to check if email exists
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_email);
            $param_email = $email;
            
            if($stmt->execute()){
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $error = "This email is already taken.";
                } else{
                    // Prepare an insert statement
                    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
             
                    if($stmt_insert = $mysqli->prepare($sql)){
                        $stmt_insert->bind_param("sss", $param_name, $param_email, $param_password);
                        
                        $param_name = $name;
                        $param_email = $email;
                        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                        
                        if($stmt_insert->execute()){
                            $message = 'Signup successful! You can now <a href="login.php">login</a>.';
                        } else{
                            $error = "Oops! Something went wrong. Please try again later.";
                        }
                        $stmt_insert->close();
                    }
                }
            } else{
                $error = "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up - School Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background-color: #eef2f5;
    }
    .auth-card { max-width: 420px; width: 100%; border: none; border-radius: 0.75rem; }
  </style>
</head>
<body>
  <div class="auth-card">
    <div class="card shadow-lg">
      <div class="card-body p-4 p-md-5">
        <div class="text-center mb-4">
          <i class="bi bi-mortarboard-fill text-primary" style="font-size: 3rem;"></i>
          <h3 class="mt-2">School Dashboard</h3>
          <p class="text-muted">Create a new account</p>
        </div>

        <?php if(!empty($error)): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
        <?php if(!empty($message)): ?><div class="alert alert-success"><?php echo $message; ?></div><?php endif; ?>
        
        <?php if(empty($message)): ?>
        <form action="signup.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="name" class="form-control" placeholder="Full Name" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Email address" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          </div>
          <div id="password-strength-meter" class="form-text mb-2 mt-0"></div>

          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
          </div>
          <div id="confirm-password-message" class="form-text mb-4 mt-1"></div>

          <button type="submit" class="btn btn-primary w-100 py-2">Sign Up</button>
        </form>
        <?php endif; ?>

        <div class="text-center mt-3">
          <a href="login.php" class="text-decoration-none">Already have an account? Login</a>
        </div>
      </div>
    </div>
  </div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm_password');
    const strengthMeter = document.getElementById('password-strength-meter');
    const confirmMessage = document.getElementById('confirm-password-message');

    if (passwordInput && confirmPasswordInput) {
        passwordInput.addEventListener('keyup', function () {
            checkPasswordStrength(passwordInput.value);
            validateConfirmPassword();
        });

        confirmPasswordInput.addEventListener('keyup', validateConfirmPassword);
    }

    function checkPasswordStrength(password) {
        let strength = 0;
        let text = 'Weak';
        let className = 'text-danger';
        let icon = '<i class="bi bi-exclamation-circle-fill me-1"></i>';

        if (password.length >= 8) strength += 1;
        if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 1;
        if (password.match(/[0-9]/)) strength += 1;
        if (password.match(/[^a-zA-Z0-9]/)) strength += 1;

        if (strength >= 4) {
            text = 'Strong';
            className = 'text-success';
            icon = '<i class="bi bi-check-circle-fill me-1"></i>';
        } else if (strength >= 2) {
            text = 'Medium';
            className = 'text-warning';
            icon = '<i class="bi bi-exclamation-triangle-fill me-1"></i>';
        }

        if (password.length > 0) {
            strengthMeter.innerHTML = icon + 'Strength: ' + text;
            strengthMeter.className = 'form-text mb-2 mt-0 ' + className;
        } else {
            strengthMeter.innerHTML = '';
        }
    }

    function validateConfirmPassword() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (confirmPassword.length > 0) {
            if (password === confirmPassword) {
                confirmMessage.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i>Passwords match.';
                confirmMessage.className = 'form-text mb-4 mt-1 text-success';
            } else {
                confirmMessage.innerHTML = '<i class="bi bi-x-circle-fill me-1"></i>Passwords do not match.';
                confirmMessage.className = 'form-text mb-4 mt-1 text-danger';
            }
        } else {
            confirmMessage.innerHTML = '';
        }
    }
});
</script>
</body>
</html>