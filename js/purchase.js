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
    // // po entry table
    // let count = 0;
    // $("#addRow").click(function (e) {
    //     e.preventDefault();
    //     // count = count + 1;
    //     let html_code = "<tr class='items'>";
    //             html_code += "<td class='po__remove'><button class='remove' id='poRemoveItem'><i class='fas fa-trash'></i></button></td>";
    //             html_code += "<td class='po__items'><input type='text' name='itemName' id='itemName' class="itemName" placeholder='Item'></td>";
    //             html_code += "<td class='po__description'><input type='text' name='itemDescription[]' id='itemDescription' class="itemDescription" placeholder='Description'></td>";
    //             html_code += "<td class='po__unit'> <select name='poUnit' id='poUnit' class='itemUnit'> <option value=''>Select Unit</option> <option value='1'>Pcs</option> <option value='2'>Box</option> <option value='3'>Meter</option> </select> </td>";
    //             html_code += "<td class='po__qty'><input type='text' name='itemQty' id='itemQty' class='itemQty' placeholder='Quantity'></td>";
    //             html_code += "<td class='po__price'><input type='text' name='itemPrice' id='itemPrice'class='itemPrice' placeholder='Price'></td>";
    //             html_code += "<td class='po__total'><input type='text' name='itemTotal' id='itemTotal' class='itemTotal' jAutoCalc='{itemQty} * {itemPrice}' value='' readonly disabled></td>";
    //         html_code += "</tr>";
    //     $(".po__tbody").append(html_code);
    // });
    // po rows remove
    // $(document).on("click", ".remove", function () {
    //     let deleteRow = $(this).data("row");
    //     $("#" + deleteRow).remove();
    var count = 1;
    $("#poSave").on("click", function (e) {
        console.log($(".itemTotal").val());
        e.preventDefault();
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
            data: {item_name:item_name, item_description:item_description, item_unit:item_unit, item_qty:item_qty, item_price:item_price, item_total_price:item_total_price},
            success: function (data) {
                $("input[type='text']").val('');
                alert(data);
            }
        })
    })

});