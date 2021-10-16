<?php require_once '../includes/header.php'; ?>
<!-- main section start -->
<main id="main" class="main">
            <div class="container">
                <!-- insert show container purchase order -->
                <div class="insert__show--container purchase__order__insert__show--container">
                    <div class="insert__show--container--heading purchase__order--heading">
                        <h3>Purchase Order List</h3>
                    </div>
                    <div class="table--container purchase__order--table">
                        <table id="poTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>PO Id</th>
                                    <th>Purchase Date</th>
                                    <th>User</th>
                                    <th>Client</th>
                                    <th>Sub Total</th>
                                    <th>Discount</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="fetchPurchaseOrder">
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>PO Id</th>
                                    <th>Supplier</th>
                                    <th>Total Items</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
<?php require_once '../includes/footer.php'; ?>
