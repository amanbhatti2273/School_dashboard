<?php
$pageTitle = 'Edit Student';
$activePage = 'students';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$name = 'Student ' . ($id ?: '');
$first = explode(' ', $name)[0] ?? '';
$last = explode(' ', $name)[1] ?? ($id ?: '');
$class = rand(5,10) . '-' . chr(rand(65,67));
$fatherName = 'Mr. '.['Ahmed','Khan','Hussain','Raza','Malik','Iqbal','Shah','Farooq'][($id-1)%8];
$contact = '0300-000000' . $id;
$fatherContact = '0301-111111' . $id;
$email = 'student'.$id.'@example.com';
$address = 'House #'.rand(1,100).', Street '.rand(1,20).', Sector I-8, Islamabad';
$status = ['Active', 'Alumni'][($id-1)%2];
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Edit Student</h4>
            <a href="students.php" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Back to Students</a>
          </div>
          <div class="card shadow-sm">
            <div class="card-body">
              <form onsubmit="event.preventDefault(); alert('Saved (demo)'); window.location.href='student_view.php?id=<?php echo $id; ?>';">
                <div class="row g-3">
                  <div class="col-12 col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($first); ?>" required>
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($last); ?>" required>
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label">Father's Name</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($fatherName); ?>">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label">Class</label>
                    <select class="form-select" required>
                      <?php for($g=5;$g<=10;$g++): ?>
                        <?php foreach(['A','B','C'] as $sec): $v=$g.'-'.$sec; ?>
                          <option <?php echo $v===$class?'selected':''; ?>><?php echo $v; ?></option>
                        <?php endforeach; ?>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label">Contact Number</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($contact); ?>">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label">Father's Contact</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($fatherContact); ?>">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label">Status</label>
                    <select class="form-select">
                      <option <?php if($status === 'Active') echo 'selected'; ?>>Active</option>
                      <option <?php if($status === 'Alumni') echo 'selected'; ?>>Alumni</option>
                      <option>Inactive</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label">Home Address</label>
                    <textarea class="form-control" rows="2"><?php echo htmlspecialchars($address); ?></textarea>
                  </div>
                  <div class="col-12">
                    <label class="form-label">Profile Image</label>
                    <input type="file" class="form-control">
                    <div class="form-text">Leave blank to keep current image.</div>
                  </div>
                </div>
                <div class="mt-3 d-flex gap-2">
                  <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i>Save</button>
                  <a href="student_view.php?id=<?php echo $id; ?>" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
<?php include __DIR__ . '/includes/footer.php'; ?>
