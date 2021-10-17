<?php
    if (isset($_POST['updateId'])) {
        include '../includes/config.php';
        $updateId = $_POST['updateId'];
        $updateUserSql = "UPDATE `ipos_user` SET  WHERE id = {$updateId}";
        $updateUserQuery = mysqli_query($conn, $updateUserSql) or die("user update page query problems." . mysqli_error($conn));
    }
    if (isset()) {
        include '../includes/config.php';
        $updateId = $_POST['updateId'];
        $updateUserSql = "DELETE FROM `ipos_user` WHERE id = {$updateId}";
        $updateUserQuery = mysqli_query($conn, $updateUserSql) or die("user update page query problems." . mysqli_error($conn));
    }
?>