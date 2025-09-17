<?php
$pageTitle = 'Attendance';
$activePage = 'attendance';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Attendance</h4>
            <button class="btn btn-primary"><i class="bi bi-save me-1"></i>Save</button>
          </div>
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="row g-2 mb-3">
                <div class="col-12 col-md-3">
                  <select class="form-select">
                    <option selected>Class</option>
                    <option>5-A</option>
                    <option>6-B</option>
                  </select>
                </div>
                <div class="col-12 col-md-3">
                  <input type="date" class="form-control">
                </div>
              </div>
              <div class="table-responsive">
                <table class="table align-middle">
                  <thead>
                    <tr>
                      <th>#</th><th>Name</th><th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i=1; $i<=15; $i++): ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td>Student <?php echo $i; ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          <input type="radio" class="btn-check" name="s<?php echo $i; ?>" id="s<?php echo $i; ?>p" checked>
                          <label class="btn btn-outline-success btn-sm" for="s<?php echo $i; ?>p">Present</label>
                          <input type="radio" class="btn-check" name="s<?php echo $i; ?>" id="s<?php echo $i; ?>a">
                          <label class="btn btn-outline-danger btn-sm" for="s<?php echo $i; ?>a">Absent</label>
                        </div>
                      </td>
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

