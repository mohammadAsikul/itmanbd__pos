<?php
  require '../includes/config.php';
  $currentTime = date("H:i:s");
  $increesPoId = 000; // it will count the purchase order id and then increase the amount
  $poSupplier = mysqli_real_escape_string($conn, $_POST['poSupplier']);
  if (isset($_POST['poSave'])) {
    $poId = $_POST['poId'] . ($increesPoId ++);
    $poItem = $_POST['poItem'];
    $poDesc = $_POST['poDesc'];
    $poUnit = $_POST['poUnit'];
    $poQty = $_POST['poQty'];
    $poPrice = $_POST['poPrice'];
    $query = '';

    for($count = 0; $count < count($poItem); $count++){
        $poId_clean = mysqli_real_escape_string($conn, $poId[$count]);
        $poItem_clean = mysqli_real_escape_string($conn, $poItem[$count]);
        $poDesc_clean = mysqli_real_escape_string($conn, $poDesc[$count]);
        $poUnit_clean = mysqli_real_escape_string($conn, $poUnit[$count]);
        $poQty_clean = mysqli_real_escape_string($conn, $poQty[$count]);
        $$poPrice_clean = mysqli_real_escape_string($conn, $poPrice[$count]);

        
    }
  }
?>
