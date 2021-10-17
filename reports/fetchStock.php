<?php
    include '../includes/config.php';
    $fetchStockOutput = "";
    $fetchStock = "SELECT * FROM `ipos_stock`";
    $fetchQuery = mysqli_query($conn, $fetchStock) or die("stock page query problems." . mysqli_error($conn));
    if (mysqli_num_rows($fetchQuery) > 0) {
        while ($fetchStockRow = mysqli_fetch_assoc($fetchQuery)) {
            $fetchStockOutput .= "
                <tr class='table--data' style='text-align: center'>
                    <td class='table--data--items'>{$fetchStockRow['id']}</td>
                    <td class='table--data--items'>{$fetchStockRow['item_id']}</td>
                    <td class='table--data--items'>{$fetchStockRow['item_qty']}</td>
                    <td class='table--data--items'>{$fetchStockRow['item_price']}</td>
                    <td class='table--data--items'>{$fetchStockRow['item_total']}</td>
                    <td class='table--data--items'><span class='status'>{$fetchStockRow['status']}</span></td>
                    <td class='table--data--items table--data--action' data-id=''>
                        <button class='print' id='print' data-id='$fetchStockRow[id]'><i class='fas fa-print'></i></button>
                        <button class='update' id='update' data-id='$fetchStockRow[id]'><i class='fas fa-edit'></i></button>
                        <button class='delete' id='delete' data-id='$fetchStockRow[id]'><i class='fas fa-trash'></i></button>
                    </td>
                </tr>
            ";
        }
    }
    echo $fetchStockOutput;
//    echo "connection established.";
?>