<?php require_once '../includes/header.php' ?>
<span class="supplier__submit__form--close">
    <i class="fas fa-window-close"></i>
</span>
<form id="userUpdateForm" class="update__form close">
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
            <input type='text' name='userName' id='userName' value='{$updateUserRow["username"]}'>
        </div>
        <div class='form__group'>
            <label for='userPassword'>User Password</label>
            <span id='errorUserPassword' class='error--msg'></span>
            <input type='password' name='userPassword' id='userPassword' value=''>
        </div>
        <div class='form__group'>
            <label for='userDesignation'>User Designation</label>
            <span id='errorUserDesignation' class='error--msg'></span>
            <input type='text' name='userDesignation' id='userDesignation' value='{$updateUserRow["designation"]}'>
        </div>
        <div class='form__group'>
            <label for='userRole'>User Role</label>
            <span id='errorUserRole' class='error--msg'></span>
            <select name='userRole' id='userRole' class='userRole'>
                <option value='{$updateUserRow["user_role"]}' selected disabled>Select the User Role</option>
                <option value='1'>Super Admin</option>
                <option value='2'>Admin</option>
                <option value='3'>Management</option>
                <option value='4'>User</option>
            </select>
        </div>
        <div class='form__group'>
            <label for='userStatus'>User Status</label>
            <select name='userStatus' id='userStatus'>
                <option value='Active' selected>Active</option>
                <option value='Deactive'>Deactive</option>
            </select>
        </div>
        <div class='form__group'>
            <button type='button' name='userUpdate' id='userUpdate' class='save--btn user__save--btn'>Update</button>
        </div>
    </div>              
</form>
<!-- main section start -->
    <main id="main" class="main user__main">
        <div class="container user__main--container">
            <!-- insert -->
            <div class="insert--container">
                <form id="userSubmitForm" class="user--form">
                    <div class="user__dialog" id="userDialog">
                        <div class="supplier__dialog--heading">
                            <h3>User Add</h3>
                        </div>
                        <div class="form__group">
                            <label for="idName">User Name</label>
                            <span id="errorUserName" class="error--msg"></span>
                            <input type="text" name="userName" id="userName">
                        </div>
                        <div class="form__group">
                            <label for="userPassword">User Password</label>
                            <span id="errorUserPassword" class="error--msg"></span>
                            <input type="password" name="userPassword" id="userPassword">
                        </div>
                        <div class="form__group">
                            <label for="userDesignation">User Designation</label>
                            <span id="errorUserDesignation" class="error--msg"></span>
                            <input type="text" name="userDesignation" id="userDesignation">
                        </div>
                        <div class="form__group">
                            <label for="userRole">User Role</label>
                            <span id="errorUserRole" class="error--msg"></span>
                            <select name="userRole" id="userRole" class="userRole">
                                <option value="" selected disabled>Select User Role</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                                <option value="3">Management</option>
                                <option value="4">User</option>
                            </select>
                        </div>
                        <div class="form__group">
                            <label for="userStatus">User Status</label>
                            <select name="userStatus" id="userStatus">
                                <!-- <option value="" disabled selected>Supplier Status</option> -->
                                <option value="Active" selected>Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>
                        </div>
                        <div class="form__group">
                            <button type="button" name="userSave" id="userSave" class="save--btn user__save--btn">Save</button>
                            <!-- <input type="submit" id="supplierSave" class="save--btn" disabled value="Send"> -->
                        </div>
                    </div>
                </form>
            </div>
            <!-- show -->
            <div class="show--container">
                <!-- category show section -->
                <div class="show__table--container">
                    <div class="heading--container">
                        <h3>Users List</h3>
                    </div>
                    <table id="userTable" class="user__table table" style="width:100%">
                        <thead id="userTableHeader">
                            <tr class="table__heading--user" style="text-align: center">
                                <th class="table__heading--items--user">SL</th>
                                <th class="table__heading--items--user">User Name</th>
                                <th class="table__heading--items--user">Designation</th>
                                <th class="table__heading--items--user">User Role</th>
                                <th class="table__heading--items--user">Status</th>
                                <th class="table__heading--items--user">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userFatchTable" style="text-align: center">
                            <!-- fatch supplier data using ajax -->
                        </tbody>
                        <tfoot></tfoot>
                </table>
                </div>
            </div>
        </div>
    </main>
<?php require_once '../includes/footer.php' ?>
