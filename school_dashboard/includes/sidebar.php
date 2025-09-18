<?php
  if (!isset($activePage)) { $activePage = 'dashboard'; }
?>
<aside class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light border-end min-vh-100 sidebar">
  <div class="d-flex flex-column align-items-stretch pt-3 text-dark min-vh-100">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/School_dashboard/school_dashboard/index.php" class="nav-link <?php echo $activePage==='dashboard'?'active':''; ?>">
          <i class="bi bi-speedometer2 me-2"></i> Dashboardss
        </a>
      </li>
      <li>
        <a href="/School_dashboard/school_dashboard/students.php" class="nav-link text-dark <?php echo $activePage==='students'?'active':''; ?>">
          <i class="bi bi-people me-2"></i> Students
        </a>
      </li>
      <li>
        <a href="/School_dashboard/school_dashboard/teachers.php" class="nav-link text-dark <?php echo $activePage==='teachers'?'active':''; ?>">
          <i class="bi bi-person-badge me-2"></i> Teachers
        </a>
      </li>
      <li>
        <a href="/School_dashboard/school_dashboard/classes.php" class="nav-link text-dark <?php echo $activePage==='classes'?'active':''; ?>">
          <i class="bi bi-columns-gap me-2"></i> Classes
        </a>
      </li>
      <li>
        <a href="/School_dashboard/school_dashboard/attendance.php" class="nav-link text-dark <?php echo $activePage==='attendance'?'active':''; ?>">
          <i class="bi bi-check2-square me-2"></i> Attendance
        </a>
      </li>
      <li>
        <a href="/School_dashboard/school_dashboard/fees.php" class="nav-link text-dark <?php echo $activePage==='fees'?'active':''; ?>">
          <i class="bi bi-cash-coin me-2"></i> Fees
        </a>
      </li>
      <li>
        <a href="/School_dashboard/school_dashboard/timetable.php" class="nav-link text-dark <?php echo $activePage==='timetable'?'active':''; ?>">
          <i class="bi bi-calendar-week me-2"></i> Timetable
        </a>
      </li>
      <li>
        <a href="/School_dashboard/school_dashboard/exams.php" class="nav-link text-dark <?php echo $activePage==='exams'?'active':''; ?>">
          <i class="bi bi-journal-check me-2"></i> Exams
        </a>
      </li>
      <li>
        <a href="/School_dashboard/school_dashboard/tests.php" class="nav-link text-dark <?php echo $activePage==='tests'?'active':''; ?>">
          <i class="bi bi-clipboard-data me-2"></i> Tests
        </a>
      </li>
      <li>
        <a href="/School_dashboard/school_dashboard/results.php" class="nav-link text-dark <?php echo $activePage==='results'?'active':''; ?>">
          <i class="bi bi-bar-chart-line me-2"></i> Results
        </a>
      </li>
      <li>
        <a href="/School_dashboard/school_dashboard/tasks.php" class="nav-link text-dark <?php echo $activePage==='tasks'?'active':''; ?>">
          <i class="bi bi-list-check me-2"></i> Student Tasks
        </a>
      </li>
      <li>
        <a href="/School_dashboard/school_dashboard/settings.php" class="nav-link text-dark <?php echo $activePage==='settings'?'active':''; ?>">
          <i class="bi bi-gear me-2"></i> Settings
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown px-3 pb-3">
      <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-person-circle fs-5 me-2"></i>
        <strong>Admin</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-end text-small shadow">
        <li><a class="dropdown-item" href="/School_dashboard/school_dashboard/profile.php">Profile</a></li>
        <li><a class="dropdown-item" href="/School_dashboard/school_dashboard/settings.php">Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#" onclick="return false;">Sign out</a></li>
      </ul>
    </div>
  </div>
</aside>

