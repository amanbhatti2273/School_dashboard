<?php
$pageTitle = 'Teachers';
$activePage = 'teachers';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Teachers</h4>
            <button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Add Teacher</button>
          </div>
          <div class="card shadow-sm">
            <div class="table-responsive">
              <table class="table align-middle mb-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Contact</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i=1; $i<=6; $i++): ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <img class="avatar-sm" src="https://i.pravatar.cc/64?img=<?php echo $i+20; ?>" alt="">
                        <span>Teacher <?php echo $i; ?></span>
                      </div>
                    </td>
                    <td><?php echo ['Math','English','Science','Urdu','Islamiat','Physics'][$i-1]; ?></td>
                    <td>0301-111111<?php echo $i; ?></td>
                    <td>
                      <div class="btn-group">
                        <a href="teacher_view.php?id=<?php echo $i; ?>" class="btn btn-sm btn-outline-primary">View</a>
                        <a href="teacher_edit.php?id=<?php echo $i; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                      </div>
                    </td>
                  </tr>
                  <?php endfor; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
<?php include __DIR__ . '/includes/footer.php'; ?>

