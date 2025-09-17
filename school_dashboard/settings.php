<?php
$pageTitle = 'Settings';
$activePage = 'settings';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <h4 class="mb-3">Settings</h4>
          <div class="row g-3">
            <div class="col-12 col-xl-6">
              <div class="card shadow-sm">
                <div class="card-header bg-white"><strong>School Info</strong></div>
                <div class="card-body">
                  <div class="mb-3">
                    <label class="form-label">School Name</label>
                    <input type="text" class="form-control" placeholder="Your School">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea class="form-control" rows="3"></textarea>
                  </div>
                  <button class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="card shadow-sm">
                <div class="card-header bg-white"><strong>Preferences</strong></div>
                <div class="card-body">
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="darkMode">
                    <label class="form-check-label" for="darkMode">Enable dark mode</label>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Session Year</label>
                    <select class="form-select">
                      <option>2024-25</option>
                      <option selected>2025-26</option>
                    </select>
                  </div>
                  <button class="btn btn-primary">Update</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
<?php include __DIR__ . '/includes/footer.php'; ?>

