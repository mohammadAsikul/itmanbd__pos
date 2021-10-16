<?php
    session_start();
    if (isset($_POST['item_name'])) {
        include '../includes/config.php';
        $po_order_date = $_POST['po_order_date'];
        $po_order_time = $_POST['po_order_time'];
        $po_id = $_POST['po_id'];
        $po_user = $_SESSION['user_id'];
        $po_order_client = $_POST['po_order_client'];
        $po_sub_total = $_POST['po_sub_total'];
        $po_discount = $_POST['po_discount'];
        $po_total = $_POST['po_total'];
        $po_comment = $_POST['po_comment'];
        $po_status = $_POST['po_status'];

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
        $query .= "INSERT INTO `ipos_purchase_order` (`id`, `purchase_order_id`, `purchase_order_date`, `purchase_order_time`, `user_id`, `client_id`, `purchase_order_subTotal`, `purchase_order_discount`, `purchase_order_total`, `comment`, `status`) VALUES (NULL, '{$po_id}', '{$po_order_date}', '{$po_order_time}', {$po_user}, {$po_order_client}, '{$po_sub_total}', '{$po_discount}', '{$po_total}', '{$po_comment}', '{$po_status}');";

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
<?php
    
?>