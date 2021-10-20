<?php
    include '../includes/config.php';
    $fetchClientData = "";
    $clientFetchSql = "SELECT * FROM ipos_client ORDER BY client_id";
    $clientFetchQuery = mysqli_query($conn, $clientFetchSql) or die("client_action.php page query problems." . mysqli_error($conn));
    if (mysqli_num_rows($clientFetchQuery) > 0) {
        while ($row = mysqli_fetch_assoc($clientFetchQuery)) {
            $fetchClientData .= "
                <tr class='table--data'>
                    <td class='table--data--items'>$row[client_id]</td>
                    <td class='table--data--items'>$row[client_name]</td>
                    <td class='table--data--items'>$row[client_cont_person]</td>
                    <td class='table--data--items'>$row[client_cont_number]</td>
                    <td class='table--data--items'>$row[client_email]</td>
                    <td class='table--data--items supplier__address'>$row[client_address]</td>
                    <td class='table--data--items'><span class='status'>$row[client_status]</span></td>
                    <td class='table--data--items'>$row[client_balance]</td>
                    <td class='table--data--items table--data--action' data-id=''>
                        <button class='print' id='print' data-id='$row[client_id]'><i class='fas fa-print'></i></button>
                        <button class='clientUpdate update' id='clientUpdate' data-updateId='$row[client_id]'><i class='fas fa-edit'></i></button>
                        <button class='clientDelete delete' id='clientDelete' data-deleteId='$row[client_id]'><i class='fas fa-trash'></i></button>
                    </td>
                </tr>
            ";
        }
        echo $fetchClientData;
    } else {
        echo "Client Data Can't show at this moment. check client_action.php file";
    }
?>