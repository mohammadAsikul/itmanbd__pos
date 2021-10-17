<?php
    include '../includes/config.php';
    $output = "";
    $purSql = "SELECT * FROM `ipos_purchase` ORDER BY id DESC";
    $purQuery = mysqli_query($conn, $purSql) or die("Purchase show query problems." . mysqli_error($conn));
    if (mysqli_num_rows($purQuery) > 0) {
        while ($row = mysqli_fetch_assoc($purQuery)) {
            $output .= "
            <tr class='table--data'>
                <td class='table--data--items'>{$row['id']}</td>
                <td class='table--data--items'>{$row['purchase_id']}</td>
                <td class='table--data--items'>{$row['purchase_order_id']}</td>
                <td class='table--data--items'>{$row['purchase_date']}</td>
                <td class='table--data--items'>{$row['supplier_id']}</td>
                <td class='table--data--items'>{$row['user_id']}</td>
                <td class='table--data--items'>{$row['purchase_subTotal']}</td>
                <td class='table--data--items'>{$row['purchase_discount']}</td>
                <td class='table--data--items'>{$row['purchase_total']}</td>
                <td class='table--data--items'>{$row['purchase_payAmount']}</td>
                <td class='table--data--items'>{$row['purchase_dueAmount']}</td>
                <td class='table--data--items'><span class='status'>{$row['purchase_status']}</span></td>
                <td class='table--data--items table--data--action' data-id=''>
                    <button class='print' id='print' data-id='$row[id]'><i class='fas fa-print'></i></button>
                    <button class='update' id='update' data-id='$row[id]'><i class='fas fa-edit'></i></button>
                    <button class='delete' id='delete' data-id='$row[id]'><i class='fas fa-trash'></i></button>
                </td>
            </tr>
            ";   
        }
        echo $output;
    } else {
        echo "fetch purchase order query problems." . mysqli_error($conn);
    }
?>