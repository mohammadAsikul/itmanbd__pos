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
        var item_name = [];
        var item_description = [];
        var item_unit = [];
        var item_qty = [];
        var item_price = [];
        var item_total_price = [];
        let po_id = $("#poId").val();
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
            url: "test.php",
            type: "POST",
            data: {po_id:po_id, item_name:item_name, item_description:item_description, item_unit:item_unit, item_qty:item_qty, item_price:item_price, item_total_price:item_total_price},
            success: function (data) {
                // $("input[type='text']").val('');
                console.log(data);
            }
        })
    })

});