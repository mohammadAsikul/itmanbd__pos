<?php require_once '../includes/header.php' ?>
<!-- main section start -->
<!-- supplier insert -->
<form id="supplierSubmitForm" class="supplier__submit--form close">
    <span class="supplier__submit__form--close">
            <i class="fas fa-window-close"></i>
    </span>
    <div class="supplier__dialog" id="supplierDialog">
        <div class="supplier__dialog--heading">
            <h3>Supplier Add</h3>
        </div>
        <div class="form__group">
            <label for="idName">Supplier Name *</label>
            <span id="errorSupplierName" class="error--msg"></span>
            <input type="hidden" name="id" id="id">
            <input type="text" name="supplierName" id="supplierName">
        </div>
        <div class="form__group">
            <label for="supplierContactPerson">Contact Person *</label>
            <span id="errorContactPerson" class="error--msg"></span>
            <input type="text" name="contactPerson" id="contactPerson">
        </div>
        <div class="form__group">
            <label for="supplierContactNumber">Contact Number *</label>
            <span id="errorContactNumber" class="error--msg"></span>
            <input type="text" name="contactNumber" id="contactNumber">
        </div>
        <div class="form__group">
            <label for="supplierEmail">Email</label>
            <span id="errorEmail" class="error--msg"></span>
            <input type="text" name="email" id="email">
        </div>
        <div class="form__group">
            <label for="supplierWhatsapp">Whatsapp</label>
            <span id="errorWhatsapp" class="error--msg"></span>
            <input type="text" name="whatsapp" id="whatsapp">
        </div>
        <div class="form__group">
            <label for="supplierAddress">Address *</label>
            <span id="errorAddress" class="error--msg"></span>
            <input type="text" name="address" id="address">
        </div>
        <div class="form__group">
            <label for="supplierStatus">Supplier Status</label>
            <select name="supplierStatus" id="supplierStatus">
                <!-- <option value="" disabled selected>Supplier Status</option> -->
                <option value="Active" selected>Active</option>
                <option value="Deactive">Deactive</option>
            </select>
        </div>
        <div class="form__group">
            <button type="button" name="supplierSave" id="supplierSave" class="save--btn">Save</button>
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
                    <h3>Supplier List</h3>
                    <div class="btn__container">
                        <button id="addSupplier" class="btn add--supplier">Add Supplier</button>
                    </div>
                </div>
                <table id="example" class="display item__show--table table" style="width:100%">
                  <thead>
                      <tr class="table__heading">
                        <th class="table__heading--items sl">SL</th>
                        <th class="table__heading--items supplier--name">Supplier Name</th>
                        <th class="table__heading--items contact--person">Contact Person</th>
                        <th class="table__heading--items contact--number">Contact Number</th>
                        <th class="table__heading--items email">Email</th>
                        <th class="table__heading--items whatsapp--number">Whatsapp</th>
                        <th class="table__heading--items address">Address</th>
                        <th class="table__heading--items status">Status</th>
                        <th class="table__heading--items status">Balance</th>
                        <th class="table__heading--items action">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                          include '../includes/config.php';
                          $supplierListSql = "SELECT * FROM ipos_supplier ORDER BY supplier_id DESC";
                          $supplierQuery = mysqli_query($conn, $supplierListSql) or die("supplier view page query problems.");
                          if (mysqli_num_rows($supplierQuery) > 0) {
                          while ($row = mysqli_fetch_assoc($supplierQuery)) {
                              echo "<tr class='table--data'>";
                              echo "<td class='table--data--items'>$row[supplier_id]</td>";
                              echo "<td class='table--data--items'>$row[supplier_name]</td>";
                              echo "<td class='table--data--items'>$row[supplier_cont_person]</td>";
                              echo "<td class='table--data--items'>$row[supplier_cont_number]</td>";
                              echo "<td class='table--data--items'>$row[supplier_email_address]</td>";
                              echo "<td class='table--data--items'>$row[supplier_whatsapp]</td>";
                              echo "<td class='table--data--items'>$row[supplier_address]</td>";
                              echo "<td class='table--data--items'><span class='status'>$row[supplier_status]</span></td>";
                              echo "<td class='table--data--items'>$row[supplier_balance]</td>";
                              echo "<td class='table--data--items table--data--action' data-id=''>
                                  <button class='print' id='print'><i class='fas fa-print'></i></button>
                                  <button class='update' id='update'><i class='fas fa-edit'></i></button>
                                  <button class='delete' id='delete'><i class='fas fa-trash'></i></button>
                              </td>";
                              echo "</tr>";
                          }
                          }
                      ?>
                  </tbody>
                  <tfoot>
                      <tr class="table__heading">
                          <th class="table__heading--items sl">SL</th>
                          <th class="table__heading--items supplier--name">Supplier Name</th>
                          <th class="table__heading--items contact--person">Contact Person</th>
                          <th class="table__heading--items contact--number">Contact Number</th>
                          <th class="table__heading--items email">Email</th>
                          <th class="table__heading--items whatsapp--number">Whatsapp</th>
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
