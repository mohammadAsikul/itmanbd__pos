<?php
    // fetch client data from database using ajax
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
                        <button class='update' id='update' data-id='$row[client_id]'><i class='fas fa-edit'></i></button>
                        <button class='delete' id='delete' data-id='$row[client_id]'><i class='fas fa-trash'></i></button>
                    </td>
                </tr>
            ";
        }
        echo $fetchClientData;
    } else {
        echo "Client Data Can't show at this moment. check client_action.php file";
    }
    // send data to database using ajax
    if (isset($_POST["clientName"])) {
        include '../includes/config.php';
        $clientName = $_POST["clientName"];
        $clientContactPerson = $_POST["contactPerson"];
        $clientContactNumber = $_POST["contactNumber"];
        $clientEmail = $_POST["clientEmail"];
        $clientAddress = $_POST["clientAddress"];
        $clientStatus = $_POST["clientStatus"];
        $output = "";
        // client number duplicate check using client_cont_number
        $clientNumberSql = "SELECT * FROM `ipos_client` WHERE client_cont_number = '{$clientContactNumber}'";
        $clientNumberQuery = mysqli_query($conn, $clientNumberSql) or die('client number duplicate check error.' . mysqli_error($conn));
        if (mysqli_num_rows($clientNumberQuery) > 0) {
            $output .= "Client Contact Number Exist.";
        } elseif ($clientName == "" ||  $clientContactNumber =="") {
            $output .= "Input Field must be filed.";
        } elseif ($clientName !== "" &&  $clientContactNumber !=="") {
            $clientInsertSql = "INSERT INTO `ipos_client` (client_name, client_cont_person, client_cont_number, client_email, client_address, client_status, client_balance)
                                VALUES ('{$clientName}', '{$clientContactPerson}', '{$clientContactNumber}', '{$clientEmail}', '{$clientAddress}', '{$clientStatus}', NULL)";
            if (mysqli_query($conn, $clientInsertSql) or die("client insert sql problems.". mysqli_error($conn))) {
                echo $output .= "Client Inserted.";
            } else {
                echo $output .= "Client Not Inserted";
            }
        }
    }
?>