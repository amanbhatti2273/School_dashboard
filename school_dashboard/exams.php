<?php
$pageTitle = 'Exams';
$activePage = 'exams';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Exams</h4>
            <button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Schedule Exam</button>
          </div>
          <div class="row g-3">
            <div class="col-12 col-xl-6">
              <div class="card shadow-sm">
                <div class="card-header bg-white"><strong>Exam List</strong></div>
                <div class="table-responsive">
                  <table class="table align-middle mb-0">
                    <thead>
                      <tr><th>#</th><th>Title</th><th>Class</th><th>Date</th><th>Action</th></tr>
                    </thead>
                    <tbody>
                      <?php for($i=1;$i<=6;$i++): ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>Mid Term <?php echo $i; ?></td>
                        <td><?php echo rand(5,10) . '-' . chr(rand(65,67)); ?></td>
                        <td>2025-09-<?php echo str_pad((string)rand(10,28),2,'0',STR_PAD_LEFT); ?></td>
                        <td><a class="btn btn-sm btn-outline-primary" href="exam_detail.php?id=<?php echo $i; ?>">Details</a></td>
                      </tr>
                      <?php endfor; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="card shadow-sm">
                <div class="card-header bg-white"><strong>Results Snapshot</strong></div>
                <div class="card-body">
                  <div class="row text-center">
                    <div class="col">
                      <div class="display-6">78%</div>
                      <div class="text-muted">Average</div>
                    </div>
                    <div class="col">
                      <div class="display-6">12%</div>
                      <div class="text-muted">Below 50%</div>
                    </div>
                    <div class="col">
                      <div class="display-6">6%</div>
                      <div class="text-muted">Top 10%</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
<?php include __DIR__ . '/includes/footer.php'; ?>

