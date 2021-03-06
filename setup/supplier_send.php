<?php
    if(isset($_POST['supplierName'])){
        include '../includes/config.php';
        $supName = $_POST['supplierName'];
        $supPerson = $_POST['contactPerson'];
        $supNumber = $_POST['contactNumber'];
        $supEmail = $_POST['email'];
        $supWhatsapp = $_POST['whatsapp'];
        $supAddress = $_POST['address'];
        $supStatus = $_POST['supplierStatus'];

        $output = "";
        // supplier name duplicate check using supplier name
        $supNameCheckSql = "SELECT * FROM `ipos_supplier` WHERE `supplier_name` = '{$supName}'";
        $supNameQuery = mysqli_query($conn, $supNameCheckSql) or die("supplier Name insert query problems.");
        // supplier number duplicate check using supplier number
        $supNumberCheckSql = "SELECT * FROM `ipos_supplier` WHERE `supplier_cont_number` = '{$supNumber}'";
        $supNumberQuery = mysqli_query($conn, $supNumberCheckSql) or die("supplier number insert query problems.");
        // supplier email duplicate check using supplier email
        $supEmailCheckSql = "SELECT * FROM `ipos_supplier` WHERE `supplier_email_address` = '{$supEmail}'";
        $supEmailQuery = mysqli_query($conn, $supEmailCheckSql) or die("supplier email insert query problems.");
        if (mysqli_num_rows($supNameQuery) > 0) {
            // supplier name existing error message.
            $output .= "supNameError";
        } elseif (mysqli_num_rows($supNumberQuery) > 0) {
            // supplier number existing error message.
            $output .= "supNumberError";
        } elseif (mysqli_num_rows($supEmailQuery) > 0) {
            // supplier email existing error message.
            $output .= "supEmailError";
        } elseif ($supAddress =="") {
            // supplier address empty error message.
            $output .= "supAddressError";
        } elseif ($supName !== "") {
            $supInsertSql = "INSERT INTO `ipos_supplier` (`supplier_id`, `supplier_name`, `supplier_cont_person`, `supplier_cont_number`, `supplier_email_address`, `supplier_whatsapp`, `supplier_address`, `supplier_status`, `supplier_balance`) VALUES (NULL, '{$supName}', '{$supPerson}', '{$supNumber}', '{$supEmail}', '{$supWhatsapp}', '{$supAddress}', '{$supStatus}', NULL);";
            if (mysqli_query($conn, $supInsertSql) or die("supplier insert query problems.". mysqli_error($conn))) {
                $output .= "Suppplier Send Successfully.";
            } else {
                $output .= "Supplier Can't Send.";
            }
        }
        echo $output;
    } else {
        echo "Data can't be send to the database.";
    };
?>