<?php require_once '../includes/header.php' ?>
    <!-- main section start -->
    <main id="main" class="main brands__main">
        <div class="container brands--container">
            <!-- insert -->
            <div class="insert--container">
                <form id="brandsSubmitForm" class="brands--form">
                    <div class="supplier__dialog" id="supplierDialog">
                        <div class="supplier__dialog--heading">
                            <h3>Brands Add</h3>
                        </div>
                        <div class="form__group">
                            <label for="idName">Brands Name *</label>
                            <span id="errorBrandsName" class="error--msg"></span>
                            <input type="text" name="brandsName" id="brandsName">
                        </div>
                        <div class="form__group">
                            <label for="brandsStock">Brands Stock</label>
                            <span id="errorBrandsStock" class="error--msg"></span>
                            <input type="text" name="brandsStock" id="brandsStock">
                        </div>
                        <div class="form__group">
                            <label for="brandsStatus">Brands Status</label>
                            <select name="brandsStatus" id="brandsStatus">
                                <!-- <option value="" disabled selected>Supplier Status</option> -->
                                <option value="Active" selected>Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>
                        </div>
                        <div class="form__group">
                            <button type="button" name="brandsSave" id="brandsSave" class="save--btn">Save</button>
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
                        <h3>Brands List</h3>
                    </div>
                    <table id="brands" class="display item__show--table brands--table" style="width:100%">
                        <thead>
                            <tr class="table__heading">
                                <th class="table__heading--items sl">SL</th>
                                <th class="table__heading--items supplier--name">Brands Name</th>
                                <th class="table__heading--items contact--person">Brands Stock</th>
                                <th class="table__heading--items status">Status</th>
                                <th class="table__heading--items action">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="brandsFatchTable">
                            <!-- fatch supplier data using ajax -->
                        </tbody>
                        <tfoot></tfoot>
                </table>
                </div>
            </div>
        </div>
    </main>
<?php require_once '../includes/footer.php' ?>
