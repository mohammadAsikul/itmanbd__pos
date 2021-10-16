<?php
    include '../includes/config.php';
    $output = "";
    $purSql = "SELECT * FROM `ipos_purchase` ORDER BY id DESC";
    $purQuery = mysqli_query($conn, $purSql) or die("Purchase show query problems." . mysqli_error($conn));
    if (mysqli_num_rows($purQuery) > 0) {
        while ($row = mysqli_fetch_assoc($purQuery)) {
            $output .= "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['purchase_id']}</td>
                <td>{$row['purchase_order_id']}</td>
                <td>{$row['purchase_date']}</td>
                <td>{$row['supplier_id']}</td>
                <td>{$row['user_id']}</td>
                <td>{$row['purchase_subTotal']}</td>
                <td>{$row['purchase_discount']}</td>
                <td>{$row['purchase_total']}</td>
                <td>{$row['purchase_payAmount']}</td>
                <td>{$row['purchase_dueAmount']}</td>
                <td>{$row['purchase_status']}</td>
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