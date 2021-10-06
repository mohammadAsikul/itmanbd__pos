<?php require_once '../includes/header.php' ?>
<!-- main section start -->
<!-- category insert -->
<form id="subCategorySubmitForm" class="supplier__submit--form close">
    <span class="supplier__submit__form--close">
            <i class="fas fa-window-close"></i>
    </span>
    <div class="supplier__dialog" id="supplierDialog">
        <div class="supplier__dialog--heading">
            <h3>Sub Category Add</h3>
        </div>
        <div class="form__group">
            <label for="idName">Category Name *</label>
            <span id="errorCategoryName" class="error--msg"></span>
            <input type="hidden" name="id" id="id">
            <select name="sCategoryName" id="sCategoryName">
                <option value="" selected disabled>Select Category</option>
                <?php
                    include '../includes/config.php';
                    $getCategoryListSql = "SELECT * FROM ipos_category";
                    $getCategoryListQuery = mysqli_query($conn, $getCategoryListSql) or die("select section category sql problems.");
                    if (mysqli_num_rows($getCategoryListQuery) > 0) {
                        while ($row = mysqli_fetch_assoc($getCategoryListQuery)) {
                            echo "<option value={$row['category_id']}>{$row['category_name']}</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form__group">
            <label for="idName">Sub Category Name *</label>
            <span id="errorSubCategoryName" class="error--msg"></span>
            <input type="text" name="subCategoryName" id="subCategoryName" autofocus>
        </div>
        <div class="form__group">
            <label for="subCategoryStock">Sub Category Stock</label>
            <span id="subCategoryStock" class="error--msg"></span>
            <input type="text" name="subCategoryStock" id="subCategoryStock">
        </div>
        <div class="form__group">
            <label for="subSategoryStatus">Category Status</label>
            <select name="subSategoryStatus" id="subSategoryStatus">
                <!-- <option value="" disabled selected>Supplier Status</option> -->
                <option value="Active" selected>Active</option>
                <option value="Deactive">Deactive</option>
            </select>
        </div>
        <div class="form__group">
            <button type="button" name="subCategorySave" id="subCategorySave" class="save--btn">Save</button>
            <!-- <input type="submit" id="supplierSave" class="save--btn" disabled value="Send"> -->
        </div>
    </div>
</form>
<!-- responce after submit a form -->
<div class="response" id="response">

</div>
<main id="main" class="main">
    <div class="container">
        <div class="show--container">
            <!-- category show section -->
            <div class="show__table--container">
                <div class="heading__btn--container">
                    <h3>Sub Category List</h3>
                    <div class="btn__container">
                        <button id="addSubCategory" class="btn add--supplier">Add Sub Category</button>
                    </div>
                </div>
                <table id="example" class="display item__show--table table" style="width:100%">
                    <thead>
                        <tr class="table__heading">
                            <th class="table__heading--items sl">SL</th>
                            <th class="table__heading--items supplier--name">Category Name</th>
                            <th class="table__heading--items supplier--name">Sub Category Name</th>
                            <th class="table__heading--items contact--person">Sub Category Stock</th>
                            <th class="table__heading--items status">Status</th>
                            <th class="table__heading--items action">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="subCategoryFatchTable">
                        <!-- fatch supplier data using ajax -->
                    </tbody>
                    <tfoot>
                        <tr class="table__heading">
                            <th class="table__heading--items sl">SL</th>
                            <th class="table__heading--items supplier--name">Category Name</th>
                            <th class="table__heading--items contact--person">Category Stock</th>
                            <th class="table__heading--items status">Status</th>
                            <th class="table__heading--items action">Actions</th>
                        </tr>
                    </tfoot>
              </table>
            </div>
        </div>
    </div>
</main>
<?php require_once '../includes/footer.php' ?>
