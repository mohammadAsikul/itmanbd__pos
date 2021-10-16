<?php
    include '../includes/config.php';
    $output = "";
    $poSql = "SELECT * FROM `ipos_purchase_order` ORDER BY id DESC";
    $poQuery = mysqli_query($conn, $poSql) or die("Purchase order show query problems." . mysqli_error($conn));
    if (mysqli_num_rows($poQuery) > 0) {
        while ($row = mysqli_fetch_assoc($poQuery)) {
            $output .= "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['purchase_order_id']}</td>
                <td>{$row['purchase_order_date']}</td>
                <td>{$row['user_id']}</td>
                <td>{$row['client_id']}</td>
                <td>{$row['purchase_order_subTotal']}</td>
                <td>{$row['purchase_order_discount']}</td>
                <td>{$row['purchase_order_total']}</td>
                <td>{$row['status']}</td>
                <td class='btn--container'>
                    <button class='actionDropdown' id='actionDropdown'>Action</button>
                    <ul class='dropdown' id='dropdown'>
                        <li><button class='btn view' id='view'>View</button></li>
                        <li><button class='btn edit' id='edit'>Edit</button></li>
                        <li><button class='btn delete' id='delete'>Delete</button></li>
                    </ul>
                </td>
            </tr>
            ";   
        }
        echo $output;
    } else {
        echo "fetch purchase order query problems." . mysqli_error($conn);
    }
?>