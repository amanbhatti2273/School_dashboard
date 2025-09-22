<?php
$pageTitle = 'Create Class';
$activePage = 'classes';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';

// Dummy data for teachers dropdown
$teachers = [];
for ($i=1; $i<=6; $i++) {
    $teachers[] = 'Teacher ' . $i;
}
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Create New Class</h4>
            <a href="classes.php" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Back to Classes</a>
          </div>
          <div class="card shadow-sm">
            <div class="card-body">
              <form onsubmit="event.preventDefault(); alert('Class Created (demo)'); window.location.href='classes.php';">
                <div class="row g-3">
                  <div class="col-12 col-md-6">
                    <label for="className" class="form-label">Class Name</label>
                    <input type="text" class="form-control" id="className" placeholder="e.g. 8-A" required>
                    <div class="form-text">Enter grade and section.</div>
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="classTeacher" class="form-label">Class Teacher (Tutor)</label>
                    <select id="classTeacher" class="form-select" required>
                      <option value="" selected disabled>Select a teacher...</option>
                      <?php foreach($teachers as $teacher): ?>
                        <option value="<?php echo htmlspecialchars($teacher); ?>"><?php echo htmlspecialchars($teacher); ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="academicSession" class="form-label">Academic Session</label>
                    <input type="text" class="form-control" id="academicSession" value="2025-2026" placeholder="e.g. 2025-2026" required>
                  </div>
                  <div class="col-12 col-md-6">
                    <label for="roomNumber" class="form-label">Default Room Number</label>
                    <input type="text" class="form-control" id="roomNumber" placeholder="e.g. Room 101">
                  </div>
                </div>
                <div class="mt-3 d-flex gap-2">
                  <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i>Create Class</button>
                  <a href="classes.php" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
<?php include __DIR__ . '/includes/footer.php'; ?>