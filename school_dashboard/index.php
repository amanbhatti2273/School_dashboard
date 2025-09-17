<?php
$pageTitle = 'Dashboard';
$activePage = 'dashboard';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="row g-3 mb-3">
            <div class="col-12 col-md-6 col-xl-3">
              <div class="card card-stat shadow-sm">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="text-muted">Total Students</div>
                      <div class="fs-4 fw-semibold">1,245</div>
                    </div>
                    <i class="bi bi-people fs-1 text-primary"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <div class="card card-stat shadow-sm">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="text-muted">Total Teachers</div>
                      <div class="fs-4 fw-semibold">78</div>
                    </div>
                    <i class="bi bi-person-badge fs-1 text-success"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <div class="card card-stat shadow-sm">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="text-muted">Fees Collected</div>
                      <div class="fs-4 fw-semibold">PKR 2.3M</div>
                    </div>
                    <i class="bi bi-cash-coin fs-1 text-warning"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <div class="card card-stat shadow-sm">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="text-muted">Attendance Today</div>
                      <div class="fs-4 fw-semibold">94%</div>
                    </div>
                    <i class="bi bi-clipboard-check fs-1 text-danger"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row g-3">
            <div class="col-12 col-xl-8">
              <div class="card shadow-sm">
                <div class="card-header bg-white">
                  <strong>Recent Admissions</strong>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table align-middle">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Class</th>
                          <th>Date</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>
                            <div class="d-flex align-items-center gap-2">
                              <img class="avatar-sm" src="https://i.pravatar.cc/64?img=1" alt="">
                              <span>Ali Raza</span>
                            </div>
                          </td>
                          <td>8-B</td>
                          <td>2025-09-01</td>
                          <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>
                            <div class="d-flex align-items-center gap-2">
                              <img class="avatar-sm" src="https://i.pravatar.cc/64?img=2" alt="">
                              <span>Sana Khan</span>
                            </div>
                          </td>
                          <td>6-A</td>
                          <td>2025-08-29</td>
                          <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>
                            <div class="d-flex align-items-center gap-2">
                              <img class="avatar-sm" src="https://i.pravatar.cc/64?img=3" alt="">
                              <span>Usman Sheikh</span>
                            </div>
                          </td>
                          <td>10-C</td>
                          <td>2025-08-28</td>
                          <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card shadow-sm mb-3">
                <div class="card-header bg-white"><strong>Upcoming Exams</strong></div>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Math - Grade 8 <span class="badge bg-primary rounded-pill">Mon</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      English - Grade 10 <span class="badge bg-primary rounded-pill">Tue</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Physics - Grade 9 <span class="badge bg-primary rounded-pill">Wed</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card shadow-sm">
                <div class="card-header bg-white"><strong>Notices</strong></div>
                <div class="card-body">
                  <div class="alert alert-info" role="alert">
                    New academic session starts from 10th September.
                  </div>
                  <div class="alert alert-warning" role="alert">
                    Fee submission deadline is 15th September.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
<?php include __DIR__ . '/includes/footer.php'; ?>

