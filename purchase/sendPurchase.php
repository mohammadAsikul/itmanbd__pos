<?php
    session_start();
    if (isset($_POST['pur_item_name'])) {
        include '../includes/config.php';
        $purQuery = "";
        $pur_date = $_POST['pur_date'];
        $pur_time = $_POST['pur_time'];
        $pur_id = $_POST['pur_id'];
        $po_id = $_POST['po_id'];
        $pur_supplier = $_POST['pur_supplier'];
        $pur_user_id = $_SESSION['user_id'];
        $pur_sub_total = $_POST['pur_sub_total'];
        $pur_discount = $_POST['pur_discount'];
        $pur_total = $_POST['pur_total'];
        $pur_pay_amount = $_POST['pur_pay_amount'];
        $pur_due_balance = $_POST['pur_due_balance'];
        $pur_comment = $_POST['pur_comment'];
        $pur_status = $_POST['pur_status'];
        // item
        $pur_item_name = $_POST['pur_item_name'];
        $pur_item_unit = $_POST['pur_item_unit'];
        $pur_item_qty = $_POST['pur_item_qty'];
        $pur_item_price = $_POST['pur_item_price'];
        $pur_item_total_price = $_POST['pur_item_total_price'];
        // loop for multiple items
        for ($count=0; $count < count($pur_item_name) ; $count++) { 
            $pur_item_name_clean = mysqli_real_escape_string($conn, $pur_item_name[$count]);
            $pur_item_unit_clean = mysqli_real_escape_string($conn, $pur_item_unit[$count]);
            $pur_item_qty_clean = mysqli_real_escape_string($conn, $pur_item_qty[$count]);
            $pur_item_price_clean = mysqli_real_escape_string($conn, $pur_item_price[$count]);
            $pur_item_total_price_clean = mysqli_real_escape_string($conn, $pur_item_total_price[$count]);
            // empty condition
            if ($pur_item_name_clean != "" && $pur_item_unit_clean != "" && $pur_item_qty_clean != "" && $pur_item_price_clean != "" && $pur_item_total_price_clean != "") {
                $purQuery .= "INSERT INTO `ipos_purchase_item` (`id`, `purchase_id`, `purchase_order_id`, `item_id`, `purchase_unit`, `purchase_qty`, `purchase_price`, `purchase_total`, `barcode_id`) VALUES (NULL, '{$pur_id}', '{$po_id}', '{$pur_item_name_clean}', '{$pur_item_unit_clean}', '{$pur_item_qty_clean}', '{$pur_item_price_clean}', '{$pur_item_total_price_clean}', NULL);";
            }
        }
        $purQuery .= "INSERT INTO `ipos_purchase` (`id`, `purchase_id`, `purchase_order_id`, `purchase_date`, `purchase_time`, `supplier_id`, `user_id`, `purchase_subTotal`, `purchase_discount`, `purchase_total`, `purchase_payAmount`, `purchase_dueAmount`, `purchase_comment`, `purchase_status`) VALUES (NULL, '{$pur_id}', '{$po_id}', '{$pur_date}', '{$pur_time}', '{$pur_supplier}', '{$pur_user_id}', '{$pur_sub_total}', '{$pur_discount}', '{$pur_total}', '{$pur_pay_amount}', '{$pur_due_balance}', '{$pur_comment}', '{$pur_status}'); ";
    }
    if ($purQuery) {
        if (mysqli_multi_query($conn, $purQuery)) {
            echo "Purchase Item Inserted Successfully.";
        } else {
          echo "Error on purchase" . mysqli_error($conn);  
        }
    } else {
        echo "All fields are required";
    }
?>