<?php
$pageTitle = 'Teacher Details';
$activePage = 'teachers';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$name = 'Teacher ' . ($id ?: '');
$subject = ['Math','English','Science','Urdu','Islamiat','Physics'][($id-1)%6] ?? 'Subject';
$contact = '0301-111111' . ($id ?: '0');
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Teacher Profile</h4>
            <a href="teachers.php" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Back to Teachers</a>
          </div>
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="row g-3">
                <div class="col-12 col-md-6">
                  <div class="d-flex align-items-center gap-3">
                    <img class="avatar-lg" src="https://i.pravatar.cc/96?img=<?php echo $id+20; ?>" alt="">
                    <div>
                      <h5 class="mb-1"><?php echo htmlspecialchars($name); ?></h5>
                      <div class="text-muted">ID: <?php echo $id; ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="row g-2">
                    <div class="col-6"><div class="text-muted">Subject</div><div class="fw-semibold"><?php echo htmlspecialchars($subject); ?></div></div>
                    <div class="col-6"><div class="text-muted">Contact</div><div class="fw-semibold"><?php echo htmlspecialchars($contact); ?></div></div>
                  </div>
                </div>
              </div>
              <hr>
              <a class="btn btn-primary" href="teacher_edit.php?id=<?php echo $id; ?>"><i class="bi bi-pencil-square me-1"></i>Edit</a>
            </div>
          </div>
        </div>
      </main>
<?php include __DIR__ . '/includes/footer.php'; ?>
