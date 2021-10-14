<?php require_once '../includes/header.php' ?>
    <!-- main section start -->
    <main id="main" class="main brands__main">
        <div class="container brands--container">
            <!-- insert -->
            <div class="insert--container">
                <form id="userSubmitForm" class="brands--form">
                    <div class="supplier__dialog" id="supplierDialog">
                        <div class="supplier__dialog--heading">
                            <h3>User Add</h3>
                        </div>
                        <div class="form__group">
                            <label for="idName">User Name *</label>
                            <span id="errorUserName" class="error--msg"></span>
                            <input type="text" name="userName" id="userName">
                        </div>
                        <div class="form__group">
                            <label for="userPassword">User Password</label>
                            <span id="errorUserPassword" class="error--msg"></span>
                            <input type="text" name="userPassword" id="userPassword">
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
                            <button type="button" name="userSave" id="userSave" class="save--btn">Save</button>
                            <!-- <input type="submit" id="supplierSave" class="save--btn" disabled value="Send"> -->
                        </div>
                    </div>
                </form>
            </div>
            <!-- messege -->
            <div class="response" id="response"></div>
            <!-- show -->
            <div class="show--container">
                <!-- category show section -->
                <div class="show__table--container">
                    <div class="heading--container">
                        <h3>Users List</h3>
                    </div>
                    <table id="brands" class="display item__show--table brands--table" style="width:100%">
                        <thead>
                            <tr class="table__heading">
                                <th class="table__heading--items sl">SL</th>
                                <th class="table__heading--items item2">User Name</th>
                                <th class="table__heading--items item3">Password</th>
                                <th class="table__heading--items item4">Designation</th>
                                <th class="table__heading--items item5">User Role</th>
                                <th class="table__heading--items status">Status</th>
                                <th class="table__heading--items action">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userFatchTable">
                            <!-- fatch supplier data using ajax -->
                        </tbody>
                        <tfoot></tfoot>
                </table>
                </div>
            </div>
        </div>
    </main>
<?php require_once '../includes/footer.php' ?>
