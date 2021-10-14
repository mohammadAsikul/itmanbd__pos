<?php
    if (isset($_POST['userName'])) {
        include '../includes/config.php';
        $output = "";
        $userName = $_POST['userName'];
        $password = $_POST['userPassword'];
        $designation = $_POST['userDesignation'];
        $userRole = $_POST['userRole'];
        $userStatus = $_POST['userStatus'];

        $userName_clear = mysqli_real_escape_string($conn, $userName);
        $password_clear = mysqli_real_escape_string($conn, md5($password));
        $designation_clear = mysqli_real_escape_string($conn, $designation);
        $userRole_clear = mysqli_real_escape_string($conn, $userRole);
        $userStatus_clear = mysqli_real_escape_string($conn, $userStatus);

        $insertUserSql = "INSERT INTO `ipos_user` (`id`, `username`, `password`, `designation`, `user_role`, `status`) VALUES (NULL, '{$userName_clear}', '{$password_clear}', '{$designation_clear}', {$userRole_clear}, '{$userStatus_clear}');";
        if (mysqli_query($conn, $insertUserSql)) {
            $output .= "User Inserted";
        } else {
            $output .= "Query Problems". mysqli_error($conn);
        }
        echo $output;
    }
?>