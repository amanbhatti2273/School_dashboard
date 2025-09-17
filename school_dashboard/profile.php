<?php
$pageTitle = 'Profile';
$activePage = 'profile';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <h4 class="mb-3">Profile</h4>
          <div class="row g-3">
            <div class="col-12 col-xl-4">
              <div class="card shadow-sm">
                <div class="card-body text-center">
                  <img class="avatar-sm mb-2" style="width:96px;height:96px;" src="https://i.pravatar.cc/128?img=11" alt="">
                  <h6 class="mb-0">Admin</h6>
                  <div class="text-muted small">admin@school.local</div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-8">
              <div class="card shadow-sm">
                <div class="card-header bg-white"><strong>Account</strong></div>
                <div class="card-body">
                  <div class="row g-3">
                    <div class="col-12 col-md-6">
                      <label class="form-label">Full Name</label>
                      <input class="form-control" value="Admin">
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label">Email</label>
                      <input class="form-control" value="admin@school.local">
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" value="password">
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
<?php include __DIR__ . '/includes/footer.php'; ?>

