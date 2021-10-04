<?php
    if(isset($_POST['supSet'])){
        include '../includes/config.php';
        // $supName = mysqli_real_escape_string($conn, $_POST['supName']);
        // $supPerson = mysqli_real_escape_string($conn, $_POST['supPerson']);
        // $supNumber = mysqli_real_escape_string($conn, $_POST['supNumber']);
        // $supEmail = mysqli_real_escape_string($conn, $_POST['supEmail']);
        // $supWhatsapp = mysqli_real_escape_string($conn, $_POST['supWhatsapp']);
        // $supAddress = mysqli_real_escape_string($conn, $_POST['supAddress']);
        // $supStatus = mysqli_real_escape_string($conn, $_POST['supStatus']);
        $supName = $_POST['supName'];
        $supPerson = $_POST['supPerson'];
        $supNumber = $_POST['supNumber'];
        $supEmail = $_POST['supEmail'];
        $supWhatsapp = $_POST['supWhatsapp'];
        $supAddress = $_POST['supAddress');
        $supStatus = $_POST['supStatus'];

        $output = "";
        // echo $supName;
        // supplier name duplicate check using supplier name
        $supNameCheckSql = "SELECT * FROM `ipos_supplier` WHERE `supplier_name` = '{$supName}'";
        $supNameQuery = mysqli_query($conn, $supNameCheckSql) or die("supplier Name insert query problems.");
        // supplier number duplicate check using supplier number
        $supNumberCheckSql = "SELECT * FROM `ipos_supplier` WHERE `supplier_cont_number` = '{$supNumber}'";
        $supNumberQuery = mysqli_query($conn, $supNumberCheckSql) or die("supplier number insert query problems.");
        // supplier email duplicate check using supplier email
        $supEmailCheckSql = "SELECT * FROM `ipos_supplier` WHERE `supplier_email_address` = '{$supEmail}'";
        $supEmailQuery = mysqli_query($conn, $supEmailCheckSql) or die("supplier email insert query problems.");
        // supplier whatsapp duplicate check using supplier whatsapp
        $supWhatsappCheckSql = "SELECT * FROM `ipos_supplier` WHERE `supplier_whatsapp` = '{$supWhatsapp}'";
        $supWhatsappQuery = mysqli_query($conn, $supWhatsappCheckSql) or die("supplier whatsapp insert query problems.");
        if (mysqli_num_rows($supNameQuery) > 0) {
            // supplier name existing error message.
            $output .= "supNameError";
        } elseif (mysqli_num_rows($supNumberQuery) > 0) {
            // supplier number existing error message.
            $output .= "supNumberError";
        } elseif (mysqli_num_rows($supEmailQuery) > 0) {
            // supplier email existing error message.
            $output .= "supEmailError";
        } elseif (mysqli_num_rows($supWhatsappQuery) > 0) {
            // supplier whatsapp existing error message.
            $output .= "supWhatsappError";
        } elseif ($supAddress =="") {
            // supplier address empty error message.
            $output .= "supAddressError";
        } else if ($supName !== "") {
            $supInsertSql = "INSERT INTO `ipos_supplier` (`supplier_id`, `supplier_name`, `supplier_cont_person`, `supplier_cont_number`, `supplier_email_address`, `supplier_whatsapp`, `supplier_address`, `supplier_status`, `supplier_balance`) VALUES (NULL, '{$supName}', '{$supPerson}', '{$supNumber}', '{$supEmail}', '{$supWhatsapp}', '{$supAddress}', '{$supStatus}' NULL)";
            if (mysqli_query($conn, $supInsertSql) or die("supplier insert query problems.")) {
                $output .= "supInserted";
            } else {
                $output .= "supNotInserted";
            }
        }
        mysqli_close($conn);
    }
?>