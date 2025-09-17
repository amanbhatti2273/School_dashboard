<?php
$pageTitle = 'Timetable';
$activePage = 'timetable';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Timetable</h4>
            <div class="d-flex align-items-center gap-2">
              <select id="classSelect" class="form-select form-select-sm" style="min-width: 160px;">
                <option value="6-A">6-A</option>
                <option value="7-B">7-B</option>
                <option value="8-B" selected>8-B</option>
                <option value="9-A">9-A</option>
                <option value="10-C">10-C</option>
              </select>
              <button class="btn btn-primary" type="button" onclick="TimeTableUI.print()"><i class="bi bi-printer me-1"></i>Print</button>
            </div>
          </div>
          <div class="card shadow-sm">
            <div class="table-responsive">
              <table class="table table-bordered align-middle mb-0" id="timetableTable">
                <thead class="table-light">
                  <tr>
                    <th>Time</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
<script>
const TimeTableUI = (function(){
  const timeSlots = ['08:00','09:00','10:00','11:00','12:00'];
  const timetableData = {
    '6-A': [
      ['Math','English','Science','Urdu','Islamiyat'],
      ['English','Science','Urdu','Math','Computer'],
      ['Science','Math','Computer','English','Art'],
      ['Urdu','Islamiyat','Math','Science','English'],
      ['Computer','Art','English','Islamiyat','Math']
    ],
    '7-B': [
      ['Eng','Math','Sci','Urdu','Geo'],
      ['Sci','Urdu','Eng','Math','History'],
      ['Urdu','Eng','Math','Sci','ICT'],
      ['Math','Sci','ICT','Eng','Urdu'],
      ['ICT','History','Geo','Eng','Math']
    ],
    '8-B': [
      ['Math','Eng','Sci','Urdu','PE'],
      ['Eng','Sci','Urdu','Math','Comp'],
      ['Sci','Math','Comp','Eng','Art'],
      ['Urdu','PE','Math','Sci','Eng'],
      ['Comp','Art','Eng','PE','Math']
    ],
    '9-A': [
      ['Physics','Chemistry','Math','Urdu','English'],
      ['Chemistry','Math','Urdu','English','Biology'],
      ['Math','Urdu','English','Biology','Computer'],
      ['Urdu','English','Biology','Computer','Physics'],
      ['English','Biology','Computer','Physics','Chemistry']
    ],
    '10-C': [
      ['Math','English','Physics','Chemistry','Urdu'],
      ['English','Physics','Chemistry','Urdu','Pak Studies'],
      ['Physics','Chemistry','Urdu','Pak Studies','Computer'],
      ['Chemistry','Urdu','Pak Studies','Computer','Math'],
      ['Urdu','Pak Studies','Computer','Math','English']
    ]
  };
  function getRowsForClass(klass){
    const grid = timetableData[klass] || timetableData['8-B'];
    // grid is 5 rows (for 5 time slots), each has 5 days
    return grid.map((daySubjects, i)=>({ time: timeSlots[i] || '', days: daySubjects }));
  }
  function render(){
    const klass = document.getElementById('classSelect').value;
    const tbody = document.querySelector('#timetableTable tbody');
    tbody.innerHTML = '';
    const rows = getRowsForClass(klass);
    rows.forEach(r => {
      const tr = document.createElement('tr');
      const tds = ['<td><strong>'+r.time+'</strong></td>'].concat(r.days.map(s=>`<td>${s}</td>`)).join('');
      tr.innerHTML = tds;
      tbody.appendChild(tr);
    });
  }
  function generatePrintHtml(klass){
    const rows = getRowsForClass(klass);
    const rowsHtml = rows.map(r=>`<tr><td><strong>${r.time}</strong></td>${r.days.map(s=>`<td>${s}</td>`).join('')}</tr>`).join('');
    return `<!doctype html><html><head><meta charset=\"utf-8\"><title>Timetable - ${klass}</title>
      <style>
        body{font-family:Arial,Helvetica,sans-serif;padding:24px;color:#111}
        h2{margin:0 0 12px}
        table{width:100%;border-collapse:collapse}
        th,td{border:1px solid #ccc;padding:8px;text-align:center}
        th{background:#f5f5f5}
        @media print{ button{ display:none } }
      </style></head><body>
      <h2>Class Timetable - ${klass}</h2>
      <table>
        <thead><tr><th>Time</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th></tr></thead>
        <tbody>${rowsHtml}</tbody>
      </table>
      <button onclick=\"window.print()\">Print</button>
    </body></html>`;
  }
  function print(){
    const klass = document.getElementById('classSelect').value;
    const w = window.open('', '_blank');
    w.document.write(generatePrintHtml(klass));
    w.document.close();
    w.focus();
  }
  document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('classSelect').addEventListener('change', render);
    render();
  });
  return { print };
})();
</script>
<?php include __DIR__ . '/includes/footer.php'; ?>

