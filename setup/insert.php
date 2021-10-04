<?php
  $supplierName = mysqli_real_escape_string($conn, $_POST['supplierName']);
  $supplierContactPerson = mysqli_real_escape_string($conn, $_POST['supplierContactPerson']);
  $supplierContactNumber = mysqli_real_escape_string($conn, $_POST['supplierContactNumber']);
  $supplierEmail = mysqli_real_escape_string($conn, $_POST['supplierEmail']);
  $supplierWhatsapp = mysqli_real_escape_string($conn, $_POST['supplierWhatsapp']);
  $supplierAddress = mysqli_real_escape_string($conn, $_POST['supplierAddress']);
  $supplierStatus = mysqli_real_escape_string($conn, $_POST['supplierStatus']);

  if (isset()) {
    // include '../includes/config.php';
    $supplierInsertSql = "INSERT INTO `ipos_supplier` (`supplier_id`, `supplier_name`, `supplier_cont_person`, `supplier_cont_number`, `supplier_email_address`, `supplier_whatsapp`, `supplier_address`, `supplier_status`, `supplier_balance`) VALUES (NULL, '{$supplierName}', '{$supplierContactPerson}', {$supplierContactNumber}, '{$supplierEmail}', {$supplierWhatsapp}, '{$supplierEmail}', '{$supplierStatus}', NULL);";
    if (mysqli_query($conn, $supplierInsertSql)) {
      
    }
  }
 ?>
