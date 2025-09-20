<?php
session_start();

// Include config file
require_once "config.php";

// If user is already logged in, redirect to dashboard
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

$error = '';

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        // Prepare a select statement
        $sql = "SELECT id, name, email, password FROM users WHERE email = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            $param_email = $email;

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $name, $email_db, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $name;

                            // Redirect user to dashboard page
                            header("location: index.php");
                        } else {
                            $error = 'Invalid email or password.';
                        }
                    }
                } else {
                    $error = 'Invalid email or password.';
                }
            } else {
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
  <title>Login - School Dashboard</title>
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
          <p class="text-muted">Login to your account</p>
        </div>

        <?php if(!empty($error)): ?>
          <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="login.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email address" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="rememberMe"><label class="form-check-label" for="rememberMe" required >Remember me</label></div>
            <a href="#" class="text-decoration-none small">Forgot password?</a>
          </div>
          <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
        </form>
        <div class="text-center mt-3">
          <a href="signup.php" class="text-decoration-none">Don't have an account? Sign Up</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>