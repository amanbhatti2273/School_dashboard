<?php
$pageTitle = 'Fee Details';
$activePage = 'fees';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$student = 'Student ' . ($id ?: '');
$class = rand(5,10) . '-' . chr(rand(65,67));
$amount = rand(1500, 4000);
$status = ($id % 2) ? 'Paid' : 'Pending';
$date = date('Y-m-d');
$father = 'Mr. ' . ['Ahmed','Khan','Hussain','Raza','Malik','Iqbal'][$id % 6];
?>
      <main class="col py-3">
        <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Fee Details</h4>
            <a href="fees.php" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Back to Fees</a>
          </div>
          <div class="card shadow-sm">
            <div class="card-body" id="printArea">
              <div class="row g-3">
                <div class="col-12">
                  <div class="text-muted">Student</div>
                  <div class="fw-semibold"><?php echo htmlspecialchars($student); ?> (S/O <?php echo htmlspecialchars($father); ?>)</div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="text-muted">Class</div>
                  <div class="fw-semibold"><?php echo htmlspecialchars($class); ?></div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="text-muted">Status</div>
                  <span class="badge bg-<?php echo $status==='Paid'?'success':'warning'; ?>"><?php echo $status; ?></span>
                </div>
                <div class="col-12 col-md-3">
                  <div class="text-muted">Amount</div>
                  <div class="fw-semibold">PKR <?php echo number_format($amount); ?></div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="text-muted">Date</div>
                  <div class="fw-semibold"><?php echo $date; ?></div>
                </div>
              </div>
              <hr>
              <div class="d-flex gap-2 no-print">
                <button class="btn btn-success"><i class="bi bi-receipt me-1"></i>Mark as Paid</button>
                <button class="btn btn-outline-secondary" onclick="printReceipt()"><i class="bi bi-printer me-1"></i>Print Receipt</button>
              </div>
            </div>
          </div>
        </div>
      </main>
<style>
  @media print {
    /* Hide everything */
    body * { visibility: hidden !important; }
    /* Show only print area */
    #printArea, #printArea * { visibility: visible !important; }
    #printArea { position: absolute; left: 0; top: 0; width: 100%; }
    /* Hide action buttons area explicitly */
    .no-print, .no-print * { display: none !important; }
  }
</style>
<script>
(function(){
  function generateReceiptHtml(data){
    const title = `Fee Receipt - ${data.student}`;
    const styles = `body{font-family:Arial,Helvetica,sans-serif;color:#111;padding:24px}h2{margin:0 0 8px} .meta{color:#666;font-size:12px;margin-bottom:16px} .card{border:1px solid #e5e7eb;border-radius:8px;padding:16px} .row{display:flex;justify-content:space-between;margin:6px 0} .label{color:#666} .value{font-weight:600} @media print{ button{display:none} }`;
    return `<!doctype html><html><head><meta charset=\"utf-8\"><title>${title}</title><style>${styles}</style></head><body>
      <h2>${title}</h2>
      <div class=\"meta\">Printed: ${new Date().toLocaleString()}</div>
      <div class=\"card\">
        <div class=\"row\"><div class=\"label\">Student</div><div class=\"value\">${data.student} (S/O ${data.father})</div></div>
        <div class=\"row\"><div class=\"label\">Class</div><div class=\"value\">${data.klass}</div></div>
        <div class=\"row\"><div class=\"label\">Amount</div><div class=\"value\">PKR ${data.amount}</div></div>
        <div class=\"row\"><div class=\"label\">Status</div><div class=\"value\">${data.status}</div></div>
        <div class=\"row\"><div class=\"label\">Date</div><div class=\"value\">${data.date}</div></div>
        <div class=\"row\"><div class=\"label\">Receipt #</div><div class=\"value\">R-${String(data.id).padStart(4,'0')}</div></div>
      </div>
      <button onclick=\"window.print()\">Print</button>
    </body></html>`;
  }
  window.printReceipt = function(){
    const data = {
      id: <?php echo json_encode($id); ?>,
      student: <?php echo json_encode($student); ?>,
      father: <?php echo json_encode($father); ?>,
      klass: <?php echo json_encode($class); ?>,
      amount: <?php echo json_encode(number_format($amount)); ?>,
      status: <?php echo json_encode($status); ?>,
      date: <?php echo json_encode($date); ?>
    };
    const w = window.open('', '_blank');
    w.document.write(generateReceiptHtml(data));
    w.document.close();
    w.focus();
  }
})();
</script>
<?php include __DIR__ . '/includes/footer.php'; ?>
