<?php
$pageTitle = 'Exam Details';
$activePage = 'exams';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$title = 'Mid Term ' . ($id ?: '');
$klass = rand(5,10) . '-' . chr(rand(65,67));
$date = date('Y-m-d', strtotime('+'.rand(1,30).' days'));
$subjects = ['Math','English','Science','Urdu','Islamiyat'];
$room = 'Room ' . rand(1,12);
$invigilator = 'Teacher ' . rand(1,6);
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Exam Details</h4>
            <a href="exams.php" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Back to Exams</a>
          </div>
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="row g-3">
                <div class="col-12">
                  <div class="text-muted">Title</div>
                  <div class="fw-semibold"><?php echo htmlspecialchars($title); ?> (<?php echo htmlspecialchars($klass); ?>)</div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="text-muted">Date</div>
                  <div class="fw-semibold"><?php echo htmlspecialchars($date); ?></div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="text-muted">Room</div>
                  <div class="fw-semibold"><?php echo htmlspecialchars($room); ?></div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="text-muted">Invigilator</div>
                  <div class="fw-semibold"><?php echo htmlspecialchars($invigilator); ?></div>
                </div>
              </div>
              <hr>
              <div class="text-muted mb-2">Subjects</div>
              <div class="table-responsive">
                <table class="table table-sm align-middle mb-0">
                  <thead class="table-light"><tr><th>#</th><th>Subject</th><th>Time</th><th>Marks</th></tr></thead>
                  <tbody>
                    <?php foreach($subjects as $i=>$sub): ?>
                    <tr>
                      <td><?php echo $i+1; ?></td>
                      <td><?php echo htmlspecialchars($sub); ?></td>
                      <td><?php echo str_pad((string)(8+$i),2,'0',STR_PAD_LEFT).':00'; ?></td>
                      <td>100</td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
<?php include __DIR__ . '/includes/footer.php'; ?>
