<?php require_once '../includes/header.php'; ?>
<!-- main section start -->
<main id="main" class="main">
            <div class="container">
                <!-- insert show container purchase order -->
                <div class="show--container purchase__order__insert__show--container">
                    <div class="insert__show--container--heading purchase__order--heading">
                        <h3>Purchase List</h3>
                    </div>
                    <div class="table--container purchase__order--table">
                        <table id="purTable" class="display item__show--table table" style="width:100%">
                            <thead>
                                <tr class="table__heading">
                                    <th class="table__heading--items">SL</th>
                                    <th class="table__heading--items">Purchase Id</th>
                                    <th class="table__heading--items">PO Id</th>
                                    <th class="table__heading--items">Purchase Date</th>
                                    <th class="table__heading--items">Supplier</th>
                                    <th class="table__heading--items">User</th>
                                    <th class="table__heading--items">Sub Total</th>
                                    <th class="table__heading--items">Discount</th>
                                    <th class="table__heading--items">Total Amount</th>
                                    <th class="table__heading--items">Pay Amount</th>
                                    <th class="table__heading--items">Due Amount</th>
                                    <th class="table__heading--items">Status</th>
                                    <th class="table__heading--items">Action</th>
                                </tr>
                            </thead>
                            <tbody id="fetchPurchase">
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Purchase Id</th>
                                    <th>PO Id</th>
                                    <th>Purchase Date</th>
                                    <th>Supplier</th>
                                    <th>User</th>
                                    <th>Sub Total</th>
                                    <th>Discount</th>
                                    <th>Total Amount</th>
                                    <th>Pay Amount</th>
                                    <th>Due Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
<?php require_once '../includes/footer.php'; ?>
