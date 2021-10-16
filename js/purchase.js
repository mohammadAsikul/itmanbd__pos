$(document).ready(function () {
    function autoCalcSetup() {
        $('form#cart').jAutoCalc('destroy');
        $('form#cart tr.line_items').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
        $('form#cart').jAutoCalc({decimalPlaces: 2});
    }
    autoCalcSetup();
    $('button.row-remove').on("click", function(e) {
        e.preventDefault();

        var form = $(this).parents('form')
        $(this).parents('tr').remove();
        autoCalcSetup();

    });
    $('button.row-add').on("click", function(e) {
        e.preventDefault();

        var $table = $(this).parents('table');
        var $top = $table.find('tr.line_items').first();
        var $new = $top.clone(true);

        $new.jAutoCalc('destroy');
        $new.insertBefore($top);
        $new.find('input[type=text]').val('');
        autoCalcSetup();

    });
    var count = 1;
    $("#poSave").on("click", function (e) {
        e.preventDefault();
        let po_order_date = $("#poDate").val();
        let po_order_time = $("#poTime").val();
        let po_id = $("#poId").val();
        let po_order_client = $("#poClient").val();
        let po_sub_total = $("#subTotal").val();
        let po_discount = $("#poDiscount").val();
        let po_total = $("#total").val();
        let po_comment = $("#poComment").val();
        let po_status = $("#poStatus").val();

        var item_name = [];
        var item_description = [];
        var item_unit = [];
        var item_qty = [];
        var item_price = [];
        var item_total_price = [];
        $(".itemName").each(function () {
            item_name.push($(this).val());
        });
        $(".itemDescription").each(function () {
            item_description.push($(this).val());
        });
        $(".itemUnit").each(function () {
            item_unit.push($(this).val());
        });
        $(".itemQty").each(function () {
            item_qty.push($(this).val());
        });
        $(".itemPrice").each(function () {
            item_price.push($(this).val());
        });
        $(".itemTotal").each(function () { 
            item_total_price.push($(this).val());
        });
        $.ajax({
            url: "pOrderEntry.php",
            type: "POST",
            data: {po_order_date:po_order_date, po_order_time:po_order_time, po_id:po_id, po_order_client:po_order_client, po_sub_total:po_sub_total, po_discount:po_discount, po_total:po_total, po_comment:po_comment, po_status:po_status, item_name:item_name, item_description:item_description, item_unit:item_unit, item_qty:item_qty, item_price:item_price, item_total_price:item_total_price},
            success: function (data) {
                // $("input[type='text']").val('');
                console.log(data);
                
            }
        })
    });
    // function for fetch purchase order
    function fetchPurchaseOrder() {
        $.ajax({
            url: "fetchPurchaseOrder.php",
            type: "POST",
            success: function (fetchPurchaseData) {
                $("#fetchPurchaseOrder").html(fetchPurchaseData);
            }
        });
    }
    fetchPurchaseOrder();
    // purchase entry
    $("#purSave").on("click", function (e) {
        e.preventDefault();
        let pur_date = $("#purchaseDate").val();
        let pur_time = $("#purchaseTime").val();
        let pur_id = $("#purId").val();
        let po_id = $("#poId").val();
        let pur_supplier = $("#supplier").val();
        let pur_sub_total = $("#subTotal").val();
        let pur_discount = $("#discount").val();
        let pur_total = $("#total").val();
        let pur_pay_amount = $("#payAmount").val();
        let pur_due_balance = $("#dueBalance").val();
        let pur_comment = $("#purComment").val();
        let pur_status = $("#purStatus").val();

        var pur_item_name = [];
        var pur_item_unit = [];
        var pur_item_qty = [];
        var pur_item_price = [];
        var pur_item_total_price = [];
        $(".itemName").each(function () {
            pur_item_name.push($(this).val());
        });
        $(".itemUnit").each(function () {
            pur_item_unit.push($(this).val());
        });
        $(".itemQty").each(function () {
            pur_item_qty.push($(this).val());
        });
        $(".itemPrice").each(function () {
            pur_item_price.push($(this).val());
        });
        $(".itemTotal").each(function () { 
            pur_item_total_price.push($(this).val());
        });
        if (pur_sub_total > "0.00") {
            $.ajax({
                url: "sendPurchase.php",
                type: "POST",
                data: {pur_date:pur_date, pur_time:pur_time, pur_id:pur_id, po_id:po_id, pur_supplier:pur_supplier, pur_sub_total:pur_sub_total, pur_discount:pur_discount, pur_total:pur_total, pur_pay_amount:pur_pay_amount, pur_due_balance:pur_due_balance, pur_comment:pur_comment, pur_status:pur_status, pur_item_name:pur_item_name, pur_item_unit:pur_item_unit, pur_item_qty:pur_item_qty, pur_item_price:pur_item_price, pur_item_total_price:pur_item_total_price},
                success: function (purData) {
                    // $("input[type='text']").val('');
                    console.log(purData);
                    $(".purchase__form").trigger('reset');
                }
            });   
        }
    });
    // function for fetch purchase order
    function fetchPurchase() {
        $.ajax({
            url: "fetchPurchase.php",
            type: "POST",
            success: function (fetchPurchaseData) {
                $("#fetchPurchase").html(fetchPurchaseData);
            }
        });
    }
    fetchPurchase();

});