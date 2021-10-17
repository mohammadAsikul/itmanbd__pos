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
                <table id="stockTable" class="display item__show--table table" style="width:100%">
                    <thead>
                        <tr class="table__heading">
                            <th class="table__heading--items">ID</th>
                            <th class="table__heading--items">Item Id</th>
                            <th class="table__heading--items">Item Qty</th>
                            <th class="table__heading--items">Item Price</th>
                            <th class="table__heading--items">Item Total</th>
                            <th class="table__heading--items">Status</th>
                            <th class="table__heading--items">Action</th>
                        </tr>
                    </thead>
                    <tbody id="fetchStock">

                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="table__heading--items">ID</th>
                            <th class="table__heading--items">Item Id</th>
                            <th class="table__heading--items">Item Qty</th>
                            <th class="table__heading--items">Item Price</th>
                            <th class="table__heading--items">Item Total</th>
                            <th class="table__heading--items">Status</th>
                            <th class="table__heading--items">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>
<?php require_once '../includes/footer.php'; ?>

