<?php
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
    } else {
        echo $output = "Client Data can't be send to the database.";
    }
?>