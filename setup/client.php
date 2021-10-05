<?php require_once '../includes/header.php' ?>
<!-- main section start -->
<!-- supplier insert -->
<form id="clientSubmitForm" class="supplier__submit--form close">
    <span class="supplier__submit__form--close">
            <i class="fas fa-window-close"></i>
    </span>
    <div class="supplier__dialog" id="supplierDialog">
        <div class="supplier__dialog--heading">
            <h3>Client Add</h3>
        </div>
        <div class="form__group">
            <label for="idName">Client Name *</label>
            <span id="errorClientName" class="error--msg"></span>
            <input type="hidden" name="id" id="id">
            <input type="text" name="clientName" id="clientName">
        </div>
        <div class="form__group">
            <label for="contactPerson">Contact Person</label>
            <span id="errorContactPerson" class="error--msg"></span>
            <input type="text" name="contactPerson" id="contactPerson">
        </div>
        <div class="form__group">
            <label for="contactNumber">Contact Number *</label>
            <span id="errorContactNumber" class="error--msg"></span>
            <input type="text" name="contactNumber" id="contactNumber">
        </div>
        <div class="form__group">
            <label for="clientEmail">Email</label>
            <span id="errorEmail" class="error--msg"></span>
            <input type="text" name="clientEmail" id="clientEmail">
        </div>
        <div class="form__group">
            <label for="clientAddress">Address *</label>
            <span id="errorClientAddress" class="error--msg"></span>
            <input type="text" name="clientAddress" id="clientAddress">
        </div>
        <div class="form__group">
            <label for="clientStatus">Client Status</label>
            <select name="clientStatus" id="clientStatus">
                <!-- <option value="" disabled selected>Supplier Status</option> -->
                <option value="Active" selected>Active</option>
                <option value="Deactive">Deactive</option>
            </select>
        </div>
        <div class="form__group">
            <button type="button" name="clientSave" id="clientSave" class="save--btn">Save</button>
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
            <!-- supplier show section -->
            <div class="show__table--container">
                <div class="heading__btn--container">
                    <h3>Client List</h3>
                    <div class="btn__container">
                        <button id="addClient" class="btn add--supplier">Add Client</button>
                    </div>
                </div>
                <table id="example" class="display item__show--table table" style="width:100%">
                    <thead>
                        <tr class="table__heading">
                            <th class="table__heading--items sl">SL</th>
                            <th class="table__heading--items supplier--name">Client Name</th>
                            <th class="table__heading--items contact--person">Contact Person</th>
                            <th class="table__heading--items contact--number">Contact Number</th>
                            <th class="table__heading--items email">Email</th>
                            <th class="table__heading--items address">Address</th>
                            <th class="table__heading--items status">Status</th>
                            <th class="table__heading--items status">Balance</th>
                            <th class="table__heading--items action">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="clientFatchTable">
                        <!-- fatch supplier data using ajax -->
                    </tbody>
                    <tfoot>
                        <tr class="table__heading">
                        <th class="table__heading--items sl">SL</th>
                            <th class="table__heading--items supplier--name">Client Name</th>
                            <th class="table__heading--items contact--person">Contact Person</th>
                            <th class="table__heading--items contact--number">Contact Number</th>
                            <th class="table__heading--items email">Email</th>
                            <th class="table__heading--items address">Address</th>
                            <th class="table__heading--items status">Status</th>
                            <th class="table__heading--items status">Balance</th>
                            <th class="table__heading--items action">Actions</th>
                        </tr>
                    </tfoot>
              </table>
            </div>
        </div>
    </div>
</main>
<?php require_once '../includes/footer.php' ?>
