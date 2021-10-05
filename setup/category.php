<?php require_once '../includes/header.php' ?>
<!-- main section start -->
<!-- category insert -->
<form id="categorySubmitForm" class="supplier__submit--form close">
    <span class="supplier__submit__form--close">
            <i class="fas fa-window-close"></i>
    </span>
    <div class="supplier__dialog" id="supplierDialog">
        <div class="supplier__dialog--heading">
            <h3>Category Add</h3>
        </div>
        <div class="form__group">
            <label for="idName">Category Name *</label>
            <span id="errorCategoryName" class="error--msg"></span>
            <input type="hidden" name="id" id="id">
            <input type="text" name="categoryName" id="categoryName">
        </div>
        <div class="form__group">
            <label for="categoryStock">Category Stock</label>
            <span id="categoryStock" class="error--msg"></span>
            <input type="text" name="categoryStock" id="categoryStock">
        </div>
        <div class="form__group">
            <label for="categoryStatus">Category Status</label>
            <select name="categoryStatus" id="categoryStatus">
                <!-- <option value="" disabled selected>Supplier Status</option> -->
                <option value="Active" selected>Active</option>
                <option value="Deactive">Deactive</option>
            </select>
        </div>
        <div class="form__group">
            <button type="button" name="categorySave" id="categorySave" class="save--btn">Save</button>
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
                    <h3>Category List</h3>
                    <div class="btn__container">
                        <button id="addCategory" class="btn add--supplier">Add Category</button>
                    </div>
                </div>
                <table id="example" class="display item__show--table table" style="width:100%">
                    <thead>
                        <tr class="table__heading">
                            <th class="table__heading--items sl">SL</th>
                            <th class="table__heading--items supplier--name">Category Name</th>
                            <th class="table__heading--items contact--person">Category Stock</th>
                            <th class="table__heading--items status">Status</th>
                            <th class="table__heading--items action">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="categoryFatchTable">
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
