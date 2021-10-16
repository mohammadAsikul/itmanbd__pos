<?php require_once '../includes/header.php';
date_default_timezone_set("Asia/Dhaka");
 $currentDate = date("d-M-Y");
 $currentTime = date("H:i:s");
 ?>
<!-- main section start -->
        <main id="main" class="main">
            <div class="container">
                <!-- po entry container -->
                <div class="purchase__entry--container">
                    <div class="purchase__heading">
                        <!-- <a class="po__list" href="">Purchase Entty</a> -->
                        <!-- <span class="arrow"><i class="fas fa-chevron-right"></i></span> -->
                        <!-- <p>Purchase Entry</p> -->
                    </div>
                    <form id="cart" class="purchase__form">
                        <fieldset>
                            <legend>Purchase Entry:</legend>
                            <!-- datetime -->
                            <div class="purchase__date__time">
                                <label for="po__date">Purchase Date</label>
                                <?php
                                  echo "<input type='text' name='purchaseDate' id='purchaseDate' class='purchaseDate' value='{$currentDate}'>";
                                  echo "<input type='hidden' name='purchaseTime' id='purchaseTime' class='purchaseTime' value='{$currentTime}'>";
                                ?>
                            </div>
                            <!-- purchase id -->
                            <div class="purchase__id__btn">
                                <label for="purchase__order--id">Purchase Id</label>
                                <?php
                                    include '../includes/config.php';
                                    $purIdSql = "SELECT COUNT(id) FROM `ipos_purchase`";
                                    $purIdQuery = mysqli_query($conn, $purIdSql) or die("ipos_purchase query problems.") . mysqli_error($conn);
                                    if (mysqli_num_rows($purIdQuery) > 0) {
                                        while ($countRow = mysqli_fetch_assoc($purIdQuery)) {
                                            $_SESSION['count_pur_id'] = $countRow["COUNT(id)"];
                                        }
                                    }
                                    $pur_user_id = "PUR-". "0" .$_SESSION['user_id']. "-" . ($_SESSION['count_pur_id'] + 1);
                                    echo "<input type='text' name='purId' id='purId' class='purId' value='{$pur_user_id}'>";
                                ?>
                                <button id="purSearch" class="btn pur__search"><i class='bx bx-search-alt'></i></button>
                            </div>
                            <!-- purchase order id -->
                            <div class="purchase__order__id__btn">
                                <label for="purchase__order__order--id">Purchase Order Id</label>
                                <?php
                                    include '../includes/config.php';
                                    $po_user_id = "PO-". "0" .$_SESSION['user_id']. "-";
                                    echo "<input type='text' name='poId' id='poId' class='poId' value='{$po_user_id}'>";
                                ?>
                                <button id="poSearch" class="btn po__search"><i class='bx bx-search-alt'></i></button>
                            </div>
                            <!-- supplier -->
                            <div class="supplier">
                                <label for="supplier__purchase">Supplier Name</label>
                                <?php
                                  include '../includes/config.php';
                                  $selected = "selected";
                                  $disabled = "disabled";
                                  $supplierListSql = "SELECT * FROM ipos_supplier ORDER BY supplier_name DESC";
                                  $supplierListQuery = mysqli_query($conn, $supplierListSql) or die("supplier list sql query problems." . mysqli_error($conn));
                                  if (mysqli_num_rows($supplierListQuery) > 0) {
                                    echo "<select name='supplier' id='supplier'>";
                                    echo "<option value='' selected disabled>Select Supplier</option>";
                                    while ($row = mysqli_fetch_assoc($supplierListQuery)) {
                                      echo "<option value='{$row["supplier_id"]}'>{$row['supplier_name']}</option>";
                                    }
                                    echo "</select>";
                                  }
                                ?>
                                <span class="add__supplier" id="addSupplier">
                                    <button id="addSupplierBtn" class="add__supplier--btn btn">+</button>
                                </span>
                            </div>
                            <!-- purchase item add list -->
                            <div class="purchase__item--table">
                                <table name="cart" class="purchase__items">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Items</th>
                                            <th>Unit</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="purchase__tbody">
                                        <!-- <tr class="tr" id="tableRow"> -->
                                        <tr class="line_items">
                                            <td class="purchase__item--remove">
                                                <button class="row-remove" id="purchaseRemoveItem"><i class="fas fa-trash"></i></button>
                                            </td>
                                            <td class="purchase__items">
                                                <input type="text" name="itemName" id="itemName" class="itemName" placeholder="Item">
                                            </td>
                                            <td class="purchase__unit">
                                                <select name="itemUnit" id="itemUnit" class="itemUnit">
                                                    <?php
                                                        include '../includes/config.php';
                                                        $getUnitSql = "SELECT * FROM ipos_unit";
                                                        $getUnitQuery = mysqli_query($conn, $getUnitSql) or die("Unit page query problems.");
                                                        if (mysqli_num_rows($getUnitQuery) > 0) {
                                                            echo "<option selected disabled>Select Unit</option>";
                                                            while ($unitRow = mysqli_fetch_assoc($getUnitQuery)) {
                                                                echo "<option value='{$unitRow["unit_id"]}'>{$unitRow["unit_name"]}</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="purchase__qty">
                                                <input type="text" name="itemQty" id="itemQty" class="itemQty" placeholder="Quantity">
                                            </td>
                                            <td class="purchase__price">
                                                <input type="text" name="itemPrice" id="itemPrice" class="itemPrice" placeholder="Price">
                                            </td>
                                            <td class="purchase__total">
                                                <input type="text" name="itemTotal" id="itemTotal" class="itemTotal" value="" jAutoCalc="{itemQty} * {itemPrice}"  readonly disabled>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <!-- subtotal -->
                                        <tr class="add__subtotal">
                                            <td colspan="5">
                                                <div class="purchase__subtotal--content">
                                                    <button class="row-add" id="addRow">Add Row</button>
                                                    <p>Sub Total</p>
                                                </div>
                                            </td>
                                            <td><input type="text" name="subTotal" id="subTotal" value="" jAutoCalc="SUM({itemTotal})" readonly disabled></td>
                                        </tr>
                                        <!-- discount -->
                                        <tr class="add__discount">
                                            <td colspan="5">
                                                <div class="purchase__discount--content">
                                                    <p>Discount</p>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" name="discount" id="discount" value="0">
                                            </td>
                                            <!-- <td><input type="text" name="grand_total" id="grandTotal" value="" jAutoCalc="{sub_total} - {discount}"></td> -->
                                        </tr>
                                        <!-- total -->
                                        <tr class="show__total">
                                            <td colspan="5">
                                                <div class="po__total--content">
                                                    <p>Total</p>
                                                </div>
                                            </td>
                                            <td><input type="text" name="total" id="total" value="" jAutoCalc="{subTotal} - {discount}" readonly="readonly" disabled _jautocalc="_jautocalc"></td>
                                            <!-- <td><input type="text" name="grand_total" id="grandTotal" value="" jAutoCalc="{sub_total} - {discount}" readonly="readonly" disabled _jautocalc="_jautocalc"></td> -->
                                        </tr>
                                        <!-- pay amount -->
                                        <tr class="pay__amount">
                                            <td colspan="5">
                                                <div class="pay__amount--content">
                                                    <p>Pay Amount</p>
                                                </div>
                                            </td>
                                            <td><input type="text" name="payAmount" id="payAmount" value="0"></td>
                                        </tr>
                                        <!-- grand total -->
                                        <tr class="due__balance">
                                            <td colspan="5">
                                                <div class="grand__total--content">
                                                    <p>Due Balance</p>
                                                </div>
                                            </td>
                                            <td><input type="text" name="dueBalance" id="dueBalance" value="" jAutoCalc="{total} - {payAmount}" readonly="readonly" disabled _jautocalc="_jautocalc"></td>
                                        </tr>
                                        <tr class="add__comment__status--content">
                                            <td colspan="6">
                                                <div class="po__comment__status--container">
                                                    <div class="po__comment">
                                                        <p>Comment</p>
                                                        <textarea name="purComment" id="purComment"></textarea>
                                                    </div>
                                                    <div class="po__status">
                                                        <p>Status</p>
                                                        <select name="purStatus" id="purStatus">
                                                            <option value="Pending" selected>Pending</option>
                                                            <option value="Approved">Approved</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="submit--content">
                                            <td colspan="6">
                                                <div class="po__submit__cancel--container">
                                                    <button id="purSave" class="btn save__btn">Save</button>
                                                    <button id="purCancel" class="btn cancel__btn">Cancel</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </main>
<?php require_once '../includes/footer.php'; ?>
