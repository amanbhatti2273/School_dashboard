<?php
$pageTitle = 'Students';
$activePage = 'students';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Students</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal"><i class="bi bi-plus-lg me-1"></i>Add Student</button>
          </div>
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="row g-2 mb-3">
                <div class="col-12 col-md-4">
                  <input type="text" class="form-control" placeholder="Search by name...">
                </div>
                <div class="col-12 col-md-3">
                  <select class="form-select">
                    <option selected>All Classes</option>
                    <option>5-A</option>
                    <option>6-B</option>
                    <option>7-C</option>
                  </select>
                </div>
                <div class="col-12 col-md-3">
                  <select class="form-select">
                    <option selected>Status</option>
                    <option>Active</option>
                    <option>Alumni</option>
                  </select>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table align-middle">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Father</th>
                      <th>Class</th>
                      <th>Contact</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i=1; $i<=8; $i++): $father = 'Mr. '.['Ahmed','Khan','Hussain','Raza','Malik','Iqbal','Shah','Farooq'][($i-1)%8]; ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                          <img class="avatar-sm" src="https://i.pravatar.cc/64?img=<?php echo $i+3; ?>" alt="">
                          <span>Student <?php echo $i; ?></span>
                        </div>
                      </td>
                      <td><?php echo htmlspecialchars($father); ?></td>
                      <td><?php echo rand(5,10) . '-' . chr(rand(65,67)); ?></td>
                      <td>0300-000000<?php echo $i; ?></td>
                      <td>
                        <div class="btn-group">
                          <a href="student_view.php?id=<?php echo $i; ?>" class="btn btn-sm btn-outline-primary">View</a>
                          <a href="student_edit.php?id=<?php echo $i; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                          <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </div>
                      </td>
                    </tr>
                    <?php endfor; ?>
                  </tbody>
                </table>
              </div>
              <nav>
                <ul class="pagination pagination-sm mb-0">
                  <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <!-- Add Student Modal -->
          <div class="modal fade" id="addStudentModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add Student</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row g-3">
                    <div class="col-12 col-md-6">
                      <label class="form-label">First Name</label>
                      <input type="text" class="form-control" placeholder="e.g. Ali">
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label">Last Name</label>
                      <input type="text" class="form-control" placeholder="e.g. Raza">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Class</label>
                      <select class="form-select">
                        <option>5-A</option>
                        <option>6-B</option>
                        <option>7-C</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
<?php include __DIR__ . '/includes/footer.php'; ?>

