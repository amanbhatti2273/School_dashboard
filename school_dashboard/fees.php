<?php
$pageTitle = 'Fees';
$activePage = 'fees';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Fees</h4>
            <button class="btn btn-success"><i class="bi bi-receipt me-1"></i>Collect Fee</button>
          </div>
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="row g-2 mb-3">
                <div class="col-12 col-md-3">
                  <select class="form-select">
                    <option selected>Class</option>
                    <option>7-A</option>
                    <option>8-B</option>
                  </select>
                </div>
                <div class="col-12 col-md-3">
                  <select class="form-select">
                    <option selected>Status</option>
                    <option>Paid</option>
                    <option>Pending</option>
                  </select>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table align-middle">
                  <thead>
                    <tr>
                      <th>#</th><th>Name</th><th>Class</th><th>Due</th><th>Status</th><th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i=1; $i<=10; $i++): $paid = (bool)($i % 2); ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td>Student <?php echo $i; ?></td>
                      <td><?php echo rand(5,10) . '-' . chr(rand(65,67)); ?></td>
                      <td>PKR <?php echo number_format(rand(1000,4000)); ?></td>
                      <td>
                        <span class="badge bg-<?php echo $paid?'success':'warning'; ?>"><?php echo $paid?'Paid':'Pending'; ?></span>
                      </td>
                      <td><a href="fee_detail.php?id=<?php echo $i; ?>" class="btn btn-sm btn-outline-primary">Details</a></td>
                    </tr>
                    <?php endfor; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
<?php include __DIR__ . '/includes/footer.php'; ?>

