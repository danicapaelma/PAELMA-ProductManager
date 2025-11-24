<?php
$page = 'Orders';
$orders = [];
$dbError = null;

include 'functions/connectdb.php';
$mysqli = Connect();

$sql = "SELECT id, customer, `date`, subtotal, tax, total FROM `orders` ORDER BY `date` DESC";
if ($result = $mysqli->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
    $result->free();
} else {
    $dbError = 'DB query error: ' . $mysqli->error;
}
$mysqli->close();
?>
<!doctype html>
<html lang="en">
<?php include 'component/head.php'; ?>
<body>
<?php include 'component/nav.php'; ?>

<div class="container-fluid">
  <div class="row">
    <?php include 'component/sidebar.php'; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Orders</h1>
      </div>

      <?php if ($dbError): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($dbError) ?></div>
      <?php endif; ?>

      <?php include 'component/orders_search.php'; ?>
      <?php include 'component/orders_table.php'; ?>
    </main>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="js/dashboard.js"></script>
</body>
</html>
