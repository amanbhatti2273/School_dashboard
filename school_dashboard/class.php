<?php
$klass = isset($_GET['c']) ? $_GET['c'] : 'Unknown';
$activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'students';
$pageTitle = 'Class ' . htmlspecialchars($klass);
$activePage = 'classes';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Class <?php echo htmlspecialchars($klass); ?></h4>
            <div class="btn-group">
              <a class="btn btn-outline-secondary <?php echo $activeTab==='students'?'active':''; ?>" href="/school_dashboard/class.php?c=<?php echo urlencode($klass); ?>&tab=students">Students</a>
              <a class="btn btn-outline-secondary <?php echo $activeTab==='subjects'?'active':''; ?>" href="/school_dashboard/class.php?c=<?php echo urlencode($klass); ?>&tab=subjects">Subjects</a>
              <a class="btn btn-outline-secondary <?php echo $activeTab==='tasks'?'active':''; ?>" href="/school_dashboard/class.php?c=<?php echo urlencode($klass); ?>&tab=tasks">Class Tasks</a>
            </div>
          </div>

          <div id="tab-students" style="display: <?php echo $activeTab==='students'?'block':'none'; ?>;">
            <div class="d-flex justify-content-end mb-2">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentModal" onclick="StudentsUI.openCreate()"><i class="bi bi-plus-lg me-1"></i>Add Student</button>
            </div>
            <div class="card shadow-sm">
              <div class="table-responsive">
                <table class="table align-middle mb-0" id="studentsTable">
                  <thead>
                    <tr><th>#</th><th>Name</th><th>Roll No</th><th>Contact</th><th>Actions</th></tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>

          <div id="tab-subjects" style="display: <?php echo $activeTab==='subjects'?'block':'none'; ?>;">
            <div class="d-flex justify-content-end mb-2">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#subjectModal" onclick="SubjectsUI.openCreate()"><i class="bi bi-plus-lg me-1"></i>Add Subject</button>
            </div>
            <div class="card shadow-sm">
              <div class="table-responsive">
                <table class="table align-middle mb-0" id="subjectsTable">
                  <thead>
                    <tr><th>#</th><th>Code</th><th>Name</th><th>Teacher</th><th>Actions</th></tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>

          <div id="tab-tasks" style="display: <?php echo $activeTab==='tasks'?'block':'none'; ?>;">
            <div class="d-flex justify-content-end mb-2">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal" onclick="TasksUI.openCreate()"><i class="bi bi-plus-lg me-1"></i>Add Class Task</button>
            </div>
            <div class="card shadow-sm">
              <div class="table-responsive">
                <table class="table align-middle mb-0" id="tasksTable">
                  <thead>
                    <tr><th>#</th><th>Title</th><th>Due</th><th>Status</th><th>Actions</th></tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Student Modal -->
          <div class="modal fade" id="studentModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="studentModalTitle">Add Student</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row g-3">
                    <div class="col-12 col-md-6">
                      <label class="form-label">Name</label>
                      <input id="stName" class="form-control" placeholder="e.g. Ali Raza">
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label">Roll No</label>
                      <input id="stRoll" class="form-control" placeholder="e.g. 23">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Contact</label>
                      <input id="stContact" class="form-control" placeholder="e.g. 0300-1234567">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="StudentsUI.save()">Save</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Subject Modal -->
          <div class="modal fade" id="subjectModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="subjectModalTitle">Add Subject</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row g-3">
                    <div class="col-12 col-md-4">
                      <label class="form-label">Code</label>
                      <input id="subCode" class="form-control" placeholder="e.g. MTH">
                    </div>
                    <div class="col-12 col-md-8">
                      <label class="form-label">Name</label>
                      <input id="subName" class="form-control" placeholder="e.g. Mathematics">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Teacher</label>
                      <input id="subTeacher" class="form-control" placeholder="e.g. Mr. Ahmed">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="SubjectsUI.save()">Save</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Task Modal -->
          <div class="modal fade" id="taskModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="taskModalTitle">Add Class Task</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row g-3">
                    <div class="col-12">
                      <label class="form-label">Title</label>
                      <input id="taskTitle" class="form-control" placeholder="e.g. Homework - Algebra">
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label">Due Date</label>
                      <input id="taskDue" type="date" class="form-control">
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label">Status</label>
                      <select id="taskStatus" class="form-select">
                        <option>Pending</option>
                        <option>In Progress</option>
                        <option>Completed</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="TasksUI.save()">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
<script>
(function(){
  const klass = <?php echo json_encode($klass); ?>;
  function storageKey(section){ return `class:${klass}:${section}`; }
  function load(section, fallback){ try{ return JSON.parse(localStorage.getItem(storageKey(section))||'null')||fallback; }catch(e){ return fallback; } }
  function save(section, value){ localStorage.setItem(storageKey(section), JSON.stringify(value)); }

  // Students Tab
  window.StudentsUI = (function(){
    let items = load('students', [
      {id:1,name:'Ali Raza',roll:'01',contact:'0300-0000001'},
      {id:2,name:'Sana Khan',roll:'02',contact:'0300-0000002'}
    ]);
    let editingId = null;
    function render(){
      const tbody = document.querySelector('#studentsTable tbody'); if(!tbody) return;
      tbody.innerHTML = '';
      items.forEach((s,idx)=>{
        const tr = document.createElement('tr');
        tr.innerHTML = `<td>${idx+1}</td><td>${s.name}</td><td>${s.roll}</td><td>${s.contact}</td>
          <td>
            <div class="btn-group btn-group-sm">
              <button class="btn btn-outline-secondary" onclick="StudentsUI.edit(${s.id})">Edit</button>
              <button class="btn btn-outline-danger" onclick="StudentsUI.remove(${s.id})">Remove</button>
            </div>
          </td>`;
        tbody.appendChild(tr);
      });
    }
    function openCreate(){ editingId=null; stName.value=''; stRoll.value=''; stContact.value=''; document.getElementById('studentModalTitle').textContent='Add Student'; }
    function edit(id){ const s=items.find(x=>x.id===id); if(!s) return; editingId=id; stName.value=s.name; stRoll.value=s.roll; stContact.value=s.contact; document.getElementById('studentModalTitle').textContent='Edit Student'; bootstrap.Modal.getOrCreateInstance(document.getElementById('studentModal')).show(); }
    function saveFn(){ const name=stName.value.trim(), roll=stRoll.value.trim(), contact=stContact.value.trim(); if(!name||!roll||!contact){ alert('Fill all fields'); return; } if(editingId){ const i=items.findIndex(x=>x.id===editingId); items[i]={id:editingId,name,roll,contact}; } else { const id = items.length?Math.max(...items.map(x=>x.id))+1:1; items.push({id,name,roll,contact}); } save('students', items); bootstrap.Modal.getInstance(document.getElementById('studentModal')).hide(); render(); }
    function remove(id){ if(confirm('Remove this student?')){ items = items.filter(x=>x.id!==id); save('students', items); render(); } }
    document.addEventListener('DOMContentLoaded', render);
    return {openCreate,edit:edit,save:saveFn,remove};
  })();

  // Subjects Tab
  window.SubjectsUI = (function(){
    let items = load('subjects', [
      {id:1,code:'MTH',name:'Mathematics',teacher:'Mr. Ahmed'},
      {id:2,code:'ENG',name:'English',teacher:'Ms. Sara'}
    ]);
    let editingId = null;
    function render(){
      const tbody = document.querySelector('#subjectsTable tbody'); if(!tbody) return;
      tbody.innerHTML = '';
      items.forEach((s,idx)=>{
        const tr = document.createElement('tr');
        tr.innerHTML = `<td>${idx+1}</td><td>${s.code}</td><td>${s.name}</td><td>${s.teacher}</td>
          <td>
            <div class=\"btn-group btn-group-sm\">
              <button class=\"btn btn-outline-secondary\" onclick=\"SubjectsUI.edit(${s.id})\">Edit</button>
              <button class=\"btn btn-outline-danger\" onclick=\"SubjectsUI.remove(${s.id})\">Delete</button>
            </div>
          </td>`;
        tbody.appendChild(tr);
      });
    }
    function openCreate(){ editingId=null; subCode.value=''; subName.value=''; subTeacher.value=''; document.getElementById('subjectModalTitle').textContent='Add Subject'; }
    function edit(id){ const s=items.find(x=>x.id===id); if(!s) return; editingId=id; subCode.value=s.code; subName.value=s.name; subTeacher.value=s.teacher; document.getElementById('subjectModalTitle').textContent='Edit Subject'; bootstrap.Modal.getOrCreateInstance(document.getElementById('subjectModal')).show(); }
    function saveFn(){ const code=subCode.value.trim(), name=subName.value.trim(), teacher=subTeacher.value.trim(); if(!code||!name||!teacher){ alert('Fill all fields'); return; } if(editingId){ const i=items.findIndex(x=>x.id===editingId); items[i]={id:editingId,code,name,teacher}; } else { const id = items.length?Math.max(...items.map(x=>x.id))+1:1; items.push({id,code,name,teacher}); } save('subjects', items); bootstrap.Modal.getInstance(document.getElementById('subjectModal')).hide(); render(); }
    function remove(id){ if(confirm('Delete this subject?')){ items = items.filter(x=>x.id!==id); save('subjects', items); render(); } }
    document.addEventListener('DOMContentLoaded', render);
    return {openCreate,edit:edit,save:saveFn,remove};
  })();

  // Tasks Tab (Class Tasks)
  window.TasksUI = (function(){
    let items = load('tasks', [
      {id:1,title:'Homework - Algebra',due:'2025-09-14',status:'Pending'},
      {id:2,title:'Reading - Chapter 2',due:'2025-09-16',status:'In Progress'}
    ]);
    let editingId = null;
    function render(){
      const tbody = document.querySelector('#tasksTable tbody'); if(!tbody) return;
      tbody.innerHTML = '';
      items.forEach((t,idx)=>{
        const tr = document.createElement('tr');
        const badge = t.status==='Completed'?'success':(t.status==='In Progress'?'info':'warning');
        tr.innerHTML = `<td>${idx+1}</td><td>${t.title}</td><td>${t.due}</td>
          <td><span class=\"badge bg-${badge}\">${t.status}</span></td>
          <td>
            <div class=\"btn-group btn-group-sm\">
              <button class=\"btn btn-outline-secondary\" onclick=\"TasksUI.edit(${t.id})\">Edit</button>
              <button class=\"btn btn-outline-danger\" onclick=\"TasksUI.remove(${t.id})\">Delete</button>
            </div>
          </td>`;
        tbody.appendChild(tr);
      });
    }
    function openCreate(){ editingId=null; taskTitle.value=''; taskDue.value=''; taskStatus.value='Pending'; document.getElementById('taskModalTitle').textContent='Add Class Task'; }
    function edit(id){ const t=items.find(x=>x.id===id); if(!t) return; editingId=id; taskTitle.value=t.title; taskDue.value=t.due; taskStatus.value=t.status; document.getElementById('taskModalTitle').textContent='Edit Class Task'; bootstrap.Modal.getOrCreateInstance(document.getElementById('taskModal')).show(); }
    function saveFn(){ const title=taskTitle.value.trim(), due=taskDue.value, status=taskStatus.value; if(!title||!due){ alert('Fill all fields'); return; } if(editingId){ const i=items.findIndex(x=>x.id===editingId); items[i]={id:editingId,title,due,status}; } else { const id = items.length?Math.max(...items.map(x=>x.id))+1:1; items.push({id,title,due,status}); } save('tasks', items); bootstrap.Modal.getInstance(document.getElementById('taskModal')).hide(); render(); }
    function remove(id){ if(confirm('Delete this task?')){ items = items.filter(x=>x.id!==id); save('tasks', items); render(); } }
    document.addEventListener('DOMContentLoaded', render);
    return {openCreate,edit:edit,save:saveFn,remove};
  })();
})();
</script>
<?php include __DIR__ . '/includes/footer.php'; ?>


