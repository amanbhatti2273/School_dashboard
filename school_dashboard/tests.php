<?php
$pageTitle = 'Tests Management';
$activePage = 'tests';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Tests</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testModal" onclick="TestUI.openCreate()"><i class="bi bi-plus-lg me-1"></i>Add Test</button>
          </div>
          <div class="card shadow-sm">
            <div class="table-responsive">
              <table class="table align-middle mb-0" id="testsTable">
                <thead>
                  <tr><th>#</th><th>Title</th><th>Class</th><th>Subject</th><th>Date</th><th>Actions</th></tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>

          <div class="modal fade" id="testModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="testModalTitle">Add Test</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row g-3">
                    <div class="col-12">
                      <label class="form-label">Title</label>
                      <input id="testTitle" class="form-control" placeholder="e.g. Chapter 1 Quiz">
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label">Class</label>
                      <input id="testClass" class="form-control" placeholder="e.g. 8-B">
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label">Subject</label>
                      <input id="testSubject" class="form-control" placeholder="e.g. Math">
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label">Date</label>
                      <input id="testDate" type="date" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="saveTestBtn" onclick="TestUI.save()">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
<script>
const TestUI = (function(){
  let items = [
    {id:1,title:'Quiz 1',klass:'8-B',subject:'Math',date:'2025-09-12'},
    {id:2,title:'Quiz 2',klass:'6-A',subject:'English',date:'2025-09-15'}
  ];
  let editingId = null;
  function render(){
    const tbody = document.querySelector('#testsTable tbody');
    tbody.innerHTML = '';
    items.forEach((t,idx)=>{
      const tr = document.createElement('tr');
      tr.innerHTML = `<td>${idx+1}</td><td>${t.title}</td><td>${t.klass}</td><td>${t.subject}</td><td>${t.date}</td>
        <td>
          <div class="btn-group btn-group-sm">
            <button class="btn btn-outline-secondary" onclick="TestUI.edit(${t.id})">Edit</button>
            <button class="btn btn-outline-danger" onclick="TestUI.remove(${t.id})">Delete</button>
          </div>
        </td>`;
      tbody.appendChild(tr);
    });
  }
  function openCreate(){
    editingId = null;
    document.getElementById('testModalTitle').textContent = 'Add Test';
    document.getElementById('testTitle').value='';
    document.getElementById('testClass').value='';
    document.getElementById('testSubject').value='';
    document.getElementById('testDate').value='';
  }
  function edit(id){
    const t = items.find(x=>x.id===id); if(!t) return;
    editingId = id;
    document.getElementById('testModalTitle').textContent = 'Edit Test';
    document.getElementById('testTitle').value=t.title;
    document.getElementById('testClass').value=t.klass;
    document.getElementById('testSubject').value=t.subject;
    document.getElementById('testDate').value=t.date;
    const m = bootstrap.Modal.getOrCreateInstance(document.getElementById('testModal'));
    m.show();
  }
  function save(){
    const title = document.getElementById('testTitle').value.trim();
    const klass = document.getElementById('testClass').value.trim();
    const subject = document.getElementById('testSubject').value.trim();
    const date = document.getElementById('testDate').value;
    if(!title||!klass||!subject||!date){ alert('Please fill all fields'); return; }
    if(editingId){
      const idx = items.findIndex(x=>x.id===editingId);
      items[idx] = {id:editingId,title,klass,subject,date};
    } else {
      const id = items.length? Math.max(...items.map(x=>x.id))+1 : 1;
      items.push({id,title,klass,subject,date});
    }
    bootstrap.Modal.getInstance(document.getElementById('testModal')).hide();
    render();
  }
  function remove(id){
    if(!confirm('Delete this test?')) return;
    items = items.filter(x=>x.id!==id);
    render();
  }
  document.addEventListener('DOMContentLoaded', render);
  return {openCreate,edit,save,remove};
})();
</script>
<?php include __DIR__ . '/includes/footer.php'; ?>

