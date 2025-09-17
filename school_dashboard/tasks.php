<?php
$pageTitle = 'Class Tasks';
$activePage = 'tasks';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Class Tasks</h4>
            <div class="d-flex gap-2">
              <select id="classSelect" class="form-select form-select-sm">
                <option>5-A</option><option>6-B</option><option>7-C</option><option>8-A</option><option>9-B</option><option>10-C</option>
              </select>
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal" onclick="TaskUI.openCreate()"><i class="bi bi-plus-lg me-1"></i>Add Task</button>
            </div>
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

          <div class="modal fade" id="taskModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="taskModalTitle">Add Task</h5>
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
                  <button type="button" class="btn btn-primary" onclick="TaskUI.save()">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
<script>
const TaskUI = (function(){
  const select = document.getElementById('classSelect');
  function key(){ return `class:${select.value}:tasks`; }
  function load(){ try{ return JSON.parse(localStorage.getItem(key())||'null')||[]; }catch(e){ return []; } }
  function persist(items){ localStorage.setItem(key(), JSON.stringify(items)); }
  let editingId = null;
  function render(){
    const tbody = document.querySelector('#tasksTable tbody');
    tbody.innerHTML = '';
    const items = load();
    items.forEach((t,idx)=>{
      const tr = document.createElement('tr');
      const badge = t.status==='Completed'?'success':(t.status==='In Progress'?'info':'warning');
      tr.innerHTML = `<td>${idx+1}</td><td>${t.title}</td><td>${t.due}</td>
        <td><span class="badge bg-${badge}">${t.status}</span></td>
        <td>
          <div class="btn-group btn-group-sm">
            <button class="btn btn-outline-secondary" onclick="TaskUI.edit(${t.id})">Edit</button>
            <button class="btn btn-outline-danger" onclick="TaskUI.remove(${t.id})">Delete</button>
          </div>
        </td>`;
      tbody.appendChild(tr);
    });
  }
  function openCreate(){ editingId=null; taskTitle.value=''; taskDue.value=''; taskStatus.value='Pending'; document.getElementById('taskModalTitle').textContent='Add Task'; }
  function edit(id){ const items=load(); const t = items.find(x=>x.id===id); if(!t) return; editingId=id; taskTitle.value=t.title; taskDue.value=t.due; taskStatus.value=t.status; document.getElementById('taskModalTitle').textContent='Edit Task'; bootstrap.Modal.getOrCreateInstance(document.getElementById('taskModal')).show(); }
  function save(){ const title=taskTitle.value.trim(), due=taskDue.value, status=taskStatus.value; if(!title||!due){ alert('Fill all fields'); return; } let items=load(); if(editingId){ const i=items.findIndex(x=>x.id===editingId); items[i]={id:editingId,title,due,status}; } else { const id = items.length?Math.max(...items.map(x=>x.id))+1:1; items.push({id:title? id : 1,title,due,status}); } persist(items); bootstrap.Modal.getInstance(document.getElementById('taskModal')).hide(); render(); }
  function remove(id){ let items=load(); if(confirm('Delete this task?')){ items = items.filter(x=>x.id!==id); persist(items); render(); } }
  select.addEventListener('change', render);
  document.addEventListener('DOMContentLoaded', render);
  return {openCreate,edit,save,remove};
})();
</script>
<?php include __DIR__ . '/includes/footer.php'; ?>

