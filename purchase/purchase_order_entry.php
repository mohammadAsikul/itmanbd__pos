<?php require_once '../includes/header.php';
date_default_timezone_set("Asia/Dhaka");
 $currentDate = date("d-M-Y");
 $currentTime = date("H:i:s");
 ?>
<!-- main section start -->
        <main id="main" class="main">
            <div class="container">
                <!-- po entry container -->
                <div class="po__entry--container">
                    <div class="po__heading">
                        <a class="po__list" href="">Purchase Order List</a>
                        <span class="arrow"><i class="fas fa-chevron-right"></i></span>
                        <p>Purchase Order Entry</p>
                    </div>
                    <form id="cart" class="po__form">
                        <fieldset>
                            <legend>Purchase Order Entry:</legend>
                            <!-- datetime -->
                            <div class="po__date__time">
                                <label for="po__date">PO Date</label>
                                <?php
                                  echo "<input type='text' name='poDate[]' id='poDate' class='poDate' value='{$currentDate}'>";
                                  echo "<input type='hidden' name='poTime[]' id='poTime' class='poTime' value='{$currentTime}'>";
                                ?>
                            </div>
                            <!-- po id -->
                            <div class="po__id__btn">
                                <label for="po__id">PO Id</label>
                                <?php
                                    include '../includes/config.php';
                                    $po_sql = "SELECT count(id) FROM `ipos_purchase_order`";
                                    $po_id_count = mysqli_query($conn, $po_sql) or die("purchase order id query problems.") . mysqli_error($conn);
                                    if (mysqli_num_rows($po_id_count) > 0) {
                                        while ($count_row = mysqli_fetch_assoc($po_id_count)) {
                                            $_SESSION['count_id'] = $count_row['count(id)'];
                                        }
                                    }
                                    $po_user_id = "PO-". "0" .$_SESSION['user_id']. "-" . ($_SESSION['count_id'] + 1);
                                    echo "<input type='text' name='poId[]' id='poId' class='poId' value='{$po_user_id}'>";
                                ?>
                                <button id="poSearch" class="btn po__search"><i class='bx bx-search-alt'></i></button>
                            </div>
                            <!-- Client -->
                            <div class="po__client">
                                <label for="po__client">Client Name</label>
                                <?php
                                  include '../includes/config.php';
                                  $selected = "selected";
                                  $disabled = "disabled";
                                  $clientListSql = "SELECT * FROM ipos_client ORDER BY client_name DESC";
                                  $clientListQuery = mysqli_query($conn, $clientListSql) or die("client list sql query problems." . mysqli_error($conn));
                                  if (mysqli_num_rows($clientListQuery) > 0) {
                                    echo "<select name='poClient[]' id='poClient'>";
                                    echo "<option value='' '{$selected}' '{$disable}'>Select Client</option>";
                                    while ($row = mysqli_fetch_assoc($clientListQuery)) {
                                      echo "<option value='{$row["client_id"]}'>{$row['client_name']}</option>";
                                    }
                                    echo "</select>";
                                  }
                                ?>
                                <span class="add_client" id="addClient">
                                    <button id="poClient" class="add__client--po">+</button>
                                </span>
                            </div>
                            <!-- po item add list -->
                            <div class="po__item--table">
                                <table name="cart" class="po__items">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Items</th>
                                            <th>Description</th>
                                            <th>Unit</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="po__tbody">
                                        <!-- <tr class="tr" id="tableRow"> -->
                                        <tr class="line_items">
                                            <td class="po__remove">
                                                <button class="row-remove" id="poRemoveItem"><i class="fas fa-trash"></i></button>
                                            </td>
                                            <td class="po__items">
                                                <input type="text" name="itemName[]" id="itemName" class="itemName" placeholder="Item">
                                            </td>
                                            <td class="po__description">
                                                <input type="text" name="itemDescription[]" id="itemDescription" class="itemDescription" placeholder="Description">
                                            </td>
                                            <td class="po__unit">
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
                                            <td class="po__qty">
                                                <input type="text" name="qty" id="itemQty" class="itemQty" placeholder="Quantity">
                                            </td>
                                            <td class="po__price">
                                                <input type="text" name="price" id="itemPrice" class="itemPrice" placeholder="Price">
                                            </td>
                                            <td class="po__total">
                                                <input type="text" name="item_total" id="itemTotal" class="itemTotal" value="" jAutoCalc="{qty} * {price}"  readonly disabled>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <!-- subtotal -->
                                        <tr class="add__subtotal">
                                            <td colspan="6">
                                                <div class="po__subtotal--content">
                                                    <button class="row-add" id="addRow">Add Row</button>
                                                    <p>Sub Total</p>
                                                </div>
                                            </td>
                                            <td><input type="text" name="sub_total" id="subTotal" value="" jAutoCalc="SUM({item_total})" readonly disabled></td>
                                        </tr>
                                        <!-- discount -->
                                        <tr class="add__discount">
                                            <td colspan="6">
                                                <div class="po__discount--content">
                                                    <p>Discount</p>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" name="poDiscount" id="poDiscount" value="0">
                                            </td>
                                            <!-- <td><input type="text" name="grand_total" id="grandTotal" value="" jAutoCalc="{sub_total} - {discount}"></td> -->
                                        </tr>
                                        <!-- total -->
                                        <tr class="show__total">
                                            <td colspan="6">
                                                <div class="po__total--content">
                                                    <p>Total</p>
                                                </div>
                                            </td>
                                            <td><input type="text" name="total" id="total" value="" jAutoCalc="{sub_total} - {poDiscount}" readonly="readonly" disabled _jautocalc="_jautocalc"></td>
                                            <!-- <td><input type="text" name="grand_total" id="grandTotal" value="" jAutoCalc="{sub_total} - {discount}" readonly="readonly" disabled _jautocalc="_jautocalc"></td> -->
                                        </tr>
                                        <!-- pay amount -->
                                        <tr class="pay__amount">
                                            <td colspan="6">
                                                <div class="pay__amount--content">
                                                    <p>Pay Amount</p>
                                                </div>
                                            </td>
                                            <td><input type="text" name="payAmount" id="payAmount" value="0"></td>
                                        </tr>
                                        <!-- grand total -->
                                        <tr class="due__balance">
                                            <td colspan="6">
                                                <div class="grand__total--content">
                                                    <p>Due Balance</p>
                                                </div>
                                            </td>
                                            <td><input type="text" name="dueBalance" id="dueBalance" value="" jAutoCalc="{total} - {payAmount}" readonly="readonly" disabled _jautocalc="_jautocalc"></td>
                                        </tr>
                                        <tr class="add__comment__status--content">
                                            <td colspan="7">
                                                <div class="po__comment__status--container">
                                                    <div class="po__comment">
                                                        <p>Comment</p>
                                                        <textarea name="poComment" id="poComment"></textarea>
                                                    </div>
                                                    <div class="po__status">
                                                        <p>Status</p>
                                                        <select name="poStatus" id="poStatus">
                                                            <option value="Pending" selected>Pending</option>
                                                            <option value="Approved">Approved</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="submit--content">
                                            <td colspan="7">
                                                <div class="po__submit__cancel--container">
                                                    <button id="poSave" class="btn save__btn">Save</button>
                                                    <button id="poCancel" class="btn cancel__btn">Cancel</button>
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
