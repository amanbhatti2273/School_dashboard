<?php
$pageTitle = 'Classes';
$activePage = 'classes';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Classes</h4>
            <button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Create Class</button>
          </div>
          <div class="row g-3">
            <?php $grades = ['5-A','6-B','7-C','8-A','9-B','10-C']; foreach ($grades as $g): ?>
            <div class="col-12 col-md-6 col-xl-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fw-semibold">Class <?php echo $g; ?></div>
                      <div class="text-muted small">Students: <?php echo rand(20,40); ?></div>
                    </div>
                    <a class="btn btn-outline-primary btn-sm" href="/School_dashboard/school_dashboard/class.php?c=<?php echo urlencode($g); ?>">Open</a>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </main>
<?php include __DIR__ . '/includes/footer.php'; ?>

