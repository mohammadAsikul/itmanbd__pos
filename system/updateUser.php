<?php
    if (isset($_POST['userId'])) {
        include '../includes/config.php';
        $userId = $_POST['userId'];
        $updateUserOutput = "";
        $updateUserSql = "SELECT * FROM `ipos_user` WHERE id = {$userId}";
        $updateUserQuery = mysqli_query($conn, $updateUserSql) or die("fetch user page query problems." . mysqli_error($conn));
        if (mysqli_num_rows($updateUserQuery) > 0) {
            while ($updateUserRow = mysqli_fetch_assoc($updateUserQuery)) {
                $updateUserOutput .= "
                <span class='update__form--close'>
                <i class='fas fa-window-close'></i>
            </span>
            <div class='dialog' id='userDialog'>
                <div class='dialog--heading'>
                    <h3>Update User</h3>
                </div>
                <div class='form__group'>
                    <label for='idName'>User Name</label>
                    <span id='errorUserName' class='error--msg'></span>
                    <input type='hidden' name='userId' id='userId' value='{$updateUserRow["id"]}'>                            
                    <input type='text' name='updateUserName' id='updateUserName' value='{$updateUserRow["username"]}'>
                </div>
                <div class='form__group'>
                    <label for='userPassword'>User Password</label>
                    <span id='errorUserPassword' class='error--msg'></span>
                    <input type='password' name='updateUserPassword' id='updateUserPassword' value=''>
                </div>
                <div class='form__group'>
                    <label for='userDesignation'>User Designation</label>
                    <span id='errorUserDesignation' class='error--msg'></span>
                    <input type='text' name='updateUserDesignation' id='updateUserDesignation' value='{$updateUserRow["designation"]}'>
                </div>
                <div class='form__group'>
                    <label for='userRole'>User Role</label>
                    <span id='errorUserRole' class='error--msg'></span>
                    <select name='updateUserRole' id='updateUserRole' class='userRole'>
                        <option value='{$updateUserRow["user_role"]}' selected disabled>Select the User Role</option>
                        <option value='1'>Super Admin</option>
                        <option value='2'>Admin</option>
                        <option value='3'>Management</option>
                        <option value='4'>User</option>
                    </select>
                </div>
                <div class='form__group'>
                    <label for='userStatus'>User Status</label>
                    <select name='updateUserStatus' id='updateUserStatus'>
                        <option value='Active' selected>Active</option>
                        <option value='Deactive'>Deactive</option>
                    </select>
                </div>
                <div class='form__group'>
                    <button type='button' name='userUpdate' id='userUpdate' class='save--btn user__save--btn'>Update</button>
                </div>
            </div>
            ";
            }
            echo $updateUserOutput;
        }
    }
    // update user
    if (isset($_POST['updateUserId'])) {
        include '../includes/config.php';
        $printUpdateResult = "";
        $updateUserId = $_POST['updateUserId'];
        $updateUserName = $_POST['userUpdateName'];
        $updateUserPassword = $_POST['userUpdatePassword'];
        $updateUserDesignation = $_POST['updateUserDesignation'];
        $updateUserRole = $_POST['updateUserRole'];
        $updateUserStatus = $_POST['updateUserStatus'];
        $updateUserPasswordEncrypted = md5($updateUserPassword);
        $updateUserSql = "UPDATE `ipos_user` SET `username`='{$updateUserName}',`password`='{$updateUserPasswordEncrypted}',`designation`='{$updateUserDesignation}',`user_role`={$updateUserRole}, `status` = '{$updateUserStatus}' WHERE `id` =  {$updateUserId};";
        if (mysqli_query($conn, $updateUserSql) or die("User Update Page query problems." . mysqli_error($conn))) {
            $printUpdateResult = 1;
        }
    }
?>