<?php
    if (isset($_POST['item_name'])) {
        include '../includes/config.php';
        // $po_id = $_POST['po_order_id']; $po_id_clean = mysqli_real_escape_string($conn, $po_id);
        $po_id = $_POST['po_id'];
        $item_name = $_POST['item_name'];
        $item_description = $_POST['item_description'];
        $item_unit = $_POST['item_unit'];
        $item_qty = $_POST['item_qty'];
        $item_price = $_POST['item_price'];
        $item_total_price = $_POST['item_total_price'];
        $query = "";

        for($count = 0; $count < count($item_name); $count++) {
            $item_name_clean = mysqli_real_escape_string($conn, $item_name[$count]);
           $item_description_clean = mysqli_real_escape_string($conn, $item_description[$count]);
           $item_unit_clean = mysqli_real_escape_string($conn, $item_unit[$count]);
           $item_qty_clean = mysqli_real_escape_string($conn, $item_qty[$count]);
           $item_price_clean = mysqli_real_escape_string($conn, $item_price[$count]);
           $item_total_price_clean = mysqli_real_escape_string($conn, $item_total_price[$count]);

           if ($item_name_clean != '' && $item_description_clean != '' && $item_unit_clean != '' && $item_qty_clean != '' && $item_price_clean !='' && $item_total_price_clean != '') {
            $query .= "INSERT INTO `ipos_purchase_order_item` (`id`, `purchase_order_id`, `item_id`, `purchase_order_item_description`, `purchase_order_item_unit`, `purchase_order_item_qty`, `purchase_order_item_price`, `purchase_order_item_total`) VALUES (NULL, '{$po_id}', '$item_name_clean', '{$item_description_clean}', '{$item_unit_clean}', '{$item_qty_clean}', '{$item_price_clean}', '{$item_total_price_clean}');";
            }
        }
    }
    if ($query != "") {
        if (mysqli_multi_query($conn, $query)) {
            echo 'Item Data Inserted';
        } else {
            echo "Error " . mysqli_error($conn);
        }
    } else {
        echo "All Fields are Required";
    }
?>