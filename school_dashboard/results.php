<?php
$pageTitle = 'Results Management';
$activePage = 'results';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Results</h4>
            <div class="d-flex align-items-center gap-2">
              <select id="classFilter" class="form-select form-select-sm" style="min-width: 160px;">
                <option value="">All Classes</option>
              </select>
              <button class="btn btn-outline-secondary btn-sm" type="button" onclick="ResultUI.printClass()"><i class="bi bi-printer me-1"></i>Print Class</button>
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#resultModal" onclick="ResultUI.openCreate()"><i class="bi bi-plus-lg me-1"></i>Add Result</button>
            </div>
          </div>
          <div class="card shadow-sm">
            <div class="table-responsive">
              <table class="table align-middle mb-0" id="resultsTable">
                <thead>
                  <tr><th>#</th><th>Student</th><th>Class</th><th>Subject</th><th>Marks</th><th>Out of</th><th>Actions</th></tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>

          <div class="modal fade" id="resultModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="resultModalTitle">Add Result</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row g-3">
                    <div class="col-12 col-md-4">
                      <label class="form-label">Class</label>
                      <select id="resClass" class="form-select">
                        <option value="">Select class</option>
                      </select>
                    </div>
                    <div class="col-12 col-md-5">
                      <label class="form-label">Student</label>
                      <select id="resStudent" class="form-select" disabled>
                        <option value="">Select student</option>
                      </select>
                    </div>
                    <div class="col-12 col-md-3">
                      <label class="form-label">Subject</label>
                      <input id="resSubject" class="form-control" placeholder="Math">
                    </div>
                    <div class="col-12 col-md-3">
                      <label class="form-label">Marks</label>
                      <input id="resMarks" type="number" class="form-control" min="0" max="100">
                    </div>
                    <div class="col-12 col-md-3">
                      <label class="form-label">Out of</label>
                      <input id="resOutOf" type="number" class="form-control" value="100">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="ResultUI.save()">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
<script>
const ResultUI = (function(){
  // Demo data: classes and students per class
  const classes = ['6-A','8-B','9-A','10-C'];
  const studentsByClass = {
    '6-A': ['Sana Khan','Ayesha Noor','Bilal Ahmed'],
    '8-B': ['Ali Raza','Hassan Ali','Sara Aslam'],
    '9-A': ['Usman Tariq','Fatima Zahra'],
    '10-C': ['Hamza Khan','Zainab Iqbal']
  };
  let items = [
    {id:1,student:'Ali Raza',klass:'8-B',subject:'Math',marks:84,outOf:100},
    {id:2,student:'Sana Khan',klass:'6-A',subject:'English',marks:92,outOf:100}
  ];
  let editingId = null;
  function render(){
    const tbody = document.querySelector('#resultsTable tbody');
    tbody.innerHTML = '';
    const selectedClass = document.getElementById('classFilter')?.value || '';
    const visible = selectedClass ? items.filter(x=>x.klass===selectedClass) : items;
    visible.forEach((r,idx)=>{
      const tr = document.createElement('tr');
      tr.innerHTML = `<td>${idx+1}</td><td>${r.student}</td><td>${r.klass}</td><td>${r.subject}</td>
        <td>${r.marks}</td><td>${r.outOf}</td>
        <td>
          <div class=\"btn-group btn-group-sm\">\n            <button class=\"btn btn-outline-secondary\" onclick=\"ResultUI.edit(${r.id})\">Edit</button>\n            <button class=\"btn btn-outline-danger\" onclick=\"ResultUI.remove(${r.id})\">Delete</button>\n            <button class=\"btn btn-outline-secondary\" title=\"Print\" onclick=\"ResultUI.printStudent(${r.id})\"><i class=\\"bi bi-printer me-1\\"></i>Print</button>\n          </div>\n        </td>`;
      tbody.appendChild(tr);
    });
  }
  function populateClassSelects(){
    const classFilter = document.getElementById('classFilter');
    const resClass = document.getElementById('resClass');
    if(classFilter){
      // keep first option (All Classes)
      classFilter.querySelectorAll('option:not([value=""])').forEach(o=>o.remove());
      classes.forEach(k=>{
        const opt = document.createElement('option'); opt.value = k; opt.textContent = k; classFilter.appendChild(opt);
      });
    }
    if(resClass){
      // keep first option (Select class)
      resClass.querySelectorAll('option:not([value=""])').forEach(o=>o.remove());
      classes.forEach(k=>{
        const opt = document.createElement('option'); opt.value = k; opt.textContent = k; resClass.appendChild(opt);
      });
    }
  }
  function populateStudentsForClass(klass, presetStudent){
    const resStudent = document.getElementById('resStudent');
    resStudent.innerHTML = '';
    if(!klass || !studentsByClass[klass] || studentsByClass[klass].length===0){
      const opt = document.createElement('option'); opt.value=''; opt.textContent='Select student';
      resStudent.appendChild(opt);
      resStudent.disabled = true;
      return;
    }
    resStudent.disabled = false;
    const placeholder = document.createElement('option'); placeholder.value=''; placeholder.textContent='Select student';
    resStudent.appendChild(placeholder);
    studentsByClass[klass].forEach(s=>{
      const opt = document.createElement('option'); opt.value=s; opt.textContent=s; resStudent.appendChild(opt);
    });
    if(presetStudent){ resStudent.value = presetStudent; }
  }
  function openCreate(){
    editingId = null;
    document.getElementById('resultModalTitle').textContent = 'Add Result';
    ['resStudent','resClass','resSubject','resMarks','resOutOf'].forEach(id=>{ const el = document.getElementById(id); if(el) el.value=''; });
    document.getElementById('resOutOf').value='100';
    document.getElementById('resStudent').disabled = true;
  }
  function edit(id){
    const r = items.find(x=>x.id===id); if(!r) return;
    editingId = id;
    document.getElementById('resultModalTitle').textContent = 'Edit Result';
    document.getElementById('resClass').value=r.klass;
    populateStudentsForClass(r.klass, r.student);
    document.getElementById('resSubject').value=r.subject;
    document.getElementById('resMarks').value=r.marks;
    document.getElementById('resOutOf').value=r.outOf;
    bootstrap.Modal.getOrCreateInstance(document.getElementById('resultModal')).show();
  }
  function save(){
    const student = resStudent.value.trim();
    const klass = resClass.value.trim();
    const subject = resSubject.value.trim();
    const marks = Number(resMarks.value);
    const outOf = Number(resOutOf.value);
    if(!student||!klass||!subject||!Number.isFinite(marks)||!Number.isFinite(outOf)) { alert('Fill all fields'); return; }
    if(editingId){
      const idx = items.findIndex(x=>x.id===editingId);
      items[idx] = {id:editingId,student,klass,subject,marks,outOf};
    } else {
      const id = items.length? Math.max(...items.map(x=>x.id))+1 : 1;
      items.push({id: id, student, klass, subject, marks, outOf});
    }
    bootstrap.Modal.getInstance(document.getElementById('resultModal')).hide();
    render();
  }
  function remove(id){ if(confirm('Delete this result?')){ items = items.filter(x=>x.id!==id); render(); } }
  function generatePrintHtml(title, rows){
    const date = new Date().toLocaleString();
    const rowsHtml = rows.map((r, i)=>`<tr><td>${i+1}</td><td>${r.student}</td><td>${r.klass}</td><td>${r.subject}</td><td>${r.marks}/${r.outOf}</td></tr>`).join('');
    return `<!doctype html><html><head><meta charset=\"utf-8\"><title>${title}</title>
      <style>
        body{font-family:Arial,Helvetica,sans-serif;padding:24px;color:#111}
        h2{margin:0 0 8px 0}
        .meta{color:#666;font-size:12px;margin-bottom:16px}
        table{width:100%;border-collapse:collapse}
        th,td{border:1px solid #ccc;padding:8px;text-align:left}
        th{background:#f5f5f5}
        @media print{ button{ display:none } }
      </style></head><body>
      <h2>${title}</h2>
      <div class=\"meta\">Printed: ${date}</div>
      <table><thead><tr><th>#</th><th>Student</th><th>Class</th><th>Subject</th><th>Marks</th></tr></thead>
      <tbody>${rowsHtml || '<tr><td colspan=5>No data</td></tr>'}</tbody></table>
      <button onclick=\"window.print()\">Print</button>
    </body></html>`;
  }
  function printStudent(id){
    const rec = items.find(x=>x.id===id);
    if(!rec){ alert('Not found'); return; }
    const win = window.open('', '_blank');
    win.document.write(generatePrintHtml(`Result - ${rec.student}`, [rec]));
    win.document.close();
    win.focus();
  }
  function printClass(){
    const selectedClass = document.getElementById('classFilter')?.value || '';
    if(!selectedClass){ alert('Please select a class to print.'); return; }
    const rows = items.filter(x=>x.klass===selectedClass);
    const win = window.open('', '_blank');
    win.document.write(generatePrintHtml(`Class Results - ${selectedClass}`, rows));
    win.document.close();
    win.focus();
  }
  document.addEventListener('DOMContentLoaded', () => {
    populateClassSelects();
    // table filter events
    const filter = document.getElementById('classFilter');
    if(filter){ filter.addEventListener('change', render); }
    // modal class change -> populate students
    const classSelect = document.getElementById('resClass');
    if(classSelect){ classSelect.addEventListener('change', (e)=> populateStudentsForClass(e.target.value)); }
    render();
  });
  return {openCreate,edit,save,remove,printStudent,printClass};
})();
</script>
<?php include __DIR__ . '/includes/footer.php'; ?>

