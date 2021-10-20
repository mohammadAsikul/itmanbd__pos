<?php
    include '../includes/config.php';
    $fetchSupplierData = "";
    $supplierListSql = "SELECT * FROM ipos_supplier ORDER BY supplier_id DESC";
    $supplierQuery = mysqli_query($conn, $supplierListSql) or die("supplier view page query problems.". mysqli_error($conn));
    if (mysqli_num_rows($supplierQuery) > 0) {
        while ($row = mysqli_fetch_assoc($supplierQuery)) {
            $fetchSupplierData .= "
                <tr class='table--data'>
                    <td class='table--data--items'>$row[supplier_id]</td>
                    <td class='table--data--items'>$row[supplier_name]</td>
                    <td class='table--data--items'>$row[supplier_cont_person]</td>
                    <td class='table--data--items'>$row[supplier_cont_number]</td>
                    <td class='table--data--items'>$row[supplier_email_address]</td>
                    <td class='table--data--items'>$row[supplier_whatsapp]</td>
                    <td class='table--data--items supplier__address'>$row[supplier_address]</td>
                    <td class='table--data--items'><span class='status'>$row[supplier_status]</span></td>
                    <td class='table--data--items'>$row[supplier_balance]</td>
                    <td class='table--data--items table--data--action' data-id=''>
                        <button class='print' id='print' data-id='$row[supplier_id]'><i class='fas fa-print'></i></button>
                        <button class='update' id='update' data-supplierEditId='$row[supplier_id]'><i class='fas fa-edit'></i></button>
                        <button class='delete' id='delete' data-supplierDelete='$row[supplier_id]'><i class='fas fa-trash'></i></button>
                    </td>
                </tr>
                ";
        }
        echo $fetchSupplierData;
    } else {
        echo $fetchSupplierData = "Supplier Data Can't show at this moment. Check your code.";
    };
?>