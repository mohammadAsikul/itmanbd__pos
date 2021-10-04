$(document).ready(function () {
    // webpage basic functionalitys

    // toggle functionlity
    $("#toggle_btn").click(function (e) {
        e.preventDefault();
        $("#menu").toggleClass("toggled");
        // menu content display none
        $(".menu__contents").toggleClass("toggled__content");
        // remove the dropdown menu
        $(".drop__menu").removeClass("drop__menu--toggle");
        // increase the main section width
        $(".main").toggleClass("toggled__margin--left");
    });
    // sub menu toggle functionality
    let links = document.querySelectorAll(".links");
    let dropMenu = document.querySelectorAll(".drop__menu");

    links.forEach(function(list) {
        list.addEventListener("click", function(e) {
            if(e.currentTarget.nextElementSibling.classList.contains("drop__menu--toggle")) {
                e.currentTarget.nextElementSibling.classList.remove("drop__menu--toggle");
            }else{
                removeDropMenuToggle();
                e.currentTarget.nextElementSibling.classList.add("drop__menu--toggle");
            }
            // menu items click will be the menu width full
            $("#menu").removeClass("toggled");
            $(".menu__contents").removeClass("toggled__content");
            $(".main").removeClass("toggled__margin--left");
        })
    });
    // function for remove drop__menu--toggle from drop__menu
    function removeDropMenuToggle() {
        dropMenu.forEach(function (dropdown) {
            dropdown.classList.remove("drop__menu--toggle");
        })
    };
    // click dashboard remove all sub menu
    $(".link1").click(function (e) {
        $(".drop__menu").each(function (links) {
            $(this).removeClass("drop__menu--toggle");
         })
    });
    // setup directory
        // hide all error msg span element
        $(".error--msg").each(function () {
            $(this).hide();
        })
        // supplier send data to the database
        $("#supplierSave").on('click', function (e) {
            console.log(window.location.pathname);
            // window.location.href = "../purchase/purchase_order_entry.php";
            let supName = $("#supplierName").val();
            let supPerson = $("#contactPerson").val();
            let supNumber = $("#contactNumber").val();
            let supEmail = $("#email").val();
            let supWhatsapp = $("#whatsapp").val();
            let supAddress = $("#address").val();
            let supStatus = $("#supplierStatus").val();
            
            // start ajax for upload data
            $.ajax({
                url: "action.php",
                type: "POST",
                data: {supSet: 1, supName:supName, supPerson:supPerson, supNumber:supNumber, supEmail:supEmail, supWhatsapp:supWhatsapp, supAddress:supAddress, supStatus:supStatus},
                success: function (data) {
                    // console.log(data);
                    if (data == "supNameError") {
                        $("#errorSupplierName").removeAttr('style');
                        setTimeout(function () {
                            $("#errorSupplierName").attr('style', 'display: none;');
                        },3000);
                    } else if (data == "supNumberError") {
                        $("#errorContactNumber").removeAttr('style');
                        setTimeout(function () {
                            $("#errorContactNumber").attr('style', 'display: none;');
                        },3000);
                    } else if (data == "supEmailError") {
                        $("#errorEmail").removeAttr('style');
                        setTimeout(function () {
                            $("#errorEmail").attr('style', 'display: none;');
                        },3000);
                    } else if (data == "supWhatsappError") {
                        $("#errorWhatsapp").removeAttr('style');
                        setTimeout(function () {
                            $("#errorWhatsapp").attr('style', 'display: none;');
                        },3000);
                    } else if (data == "supAddressError") {
                        $("#errorAddress").removeAttr('style');
                        setTimeout(function () {
                            $("#errorAddress").attr('style', 'display: none;');
                        },3000);
                    } else if (data == "supInserted") {
                        setTimeout(function () {
                            $("#supplierSave").attr('disabled');
                        }, 3000)
                        supInputBoxEmpty();
                    }
                }
            })
        })
    // datatables for the purchase order table
    $('#example').DataTable();
    // action dropdown section purchase order
    let actionDropdown = document.querySelectorAll("#actionDropdown");
    let dropDown = document.querySelectorAll(".dropdown");
    actionDropdown.forEach(function(item) {
        item.addEventListener("click", function (e) {
            e.preventDefault();
            if(e.currentTarget.nextElementSibling.classList.contains("active")) {
                e.currentTarget.nextElementSibling.classList.remove("active");
            }else{
                removeDropdownAction();
                e.currentTarget.nextElementSibling.classList.add("active");
            }
        })
    })
    // function for remove all active class from dropdown menu
    function removeDropdownAction() {
        dropDown.forEach(function (item) {
            console.log(item.classList.remove("active"));
        })
    };
    // supplier data insert
    let supp_count = 0;
    $("#supplierDialog").dialog({
        autoOpen: false,
        width: 400,
     });
     $(".ui-dialog-titlebar-close").text("X");
     $(".ui-dialog-titlebar-close").css("width", "30px");
     $(".ui-dialog-titlebar-close").css("height", "30px");
    $("#addSupplier").click(function() {
        $("#supplierDialog").dialog('option', 'title', 'Add Supplier');
        $("#supplierName").val('');
        $("#contactPerson").val('');
        $("#contactNumber").val('');
        $("#email").val('');
        $("#whatsapp").val('');
        $("#address").val('');
        // $("#errorSupplierName").text('');
        // $("#errorContactPerson").text('');
        // $("#errorContactNumber").text('');
        // $("#errorEmail").text('');
        // $("#errorWhatsapp").text('');
        // $("#errorAddress").text('');
        $("#supplierSave").text('Save');
        $("#supplierDialog").dialog('open');
    });
    function supInputBoxEmpty () {
        $("#errorSupplierName").text('');
        $("#errorContactPerson").text('');
        $("#errorContactNumber").text('');
        $("#errorEmail").text('');
        $("#errorWhatsapp").text('');
        $("#errorAddress").text('');
    }
    // po entry using table data
    let count = 1;
    $("#addRow").click(function (e) {
        e.preventDefault();
        count = count + 1;
        let html_code = "<tr id='row"+count+"'>";

            html_code += "<td class='po__remove'> <button class='remove' id='poRemoveItem' data-row='row"+count+"'><i class='fas fa-trash'></i></button></td>";
            html_code += "<td class='po__items' contenteditable='true'></td>";
            html_code += "<td class='po__description' contenteditable='true'></td>";
            html_code += "<td class='po__unit'> <select name='poUnit[]' id='poUnit'> <option value=''>Select Unit</option> <option value='1'>Pcs</option> <option value='2'>Box</option> <option value='3'>Meter</option> </select> </td>";
            html_code += "<td class='po__qty' contenteditable='true'></td>";
            html_code += "<td class='po__price' contenteditable='true'></td>";
            html_code += "<td class='po__total'><span id='poTotal' class='poTotal' data-total='total"+count+"'>0</span></td>";
        html_code += "</tr>";
        $(".po__tbody").append(html_code);
    });
    // remove po rows
    $(document).on("click", ".remove", function () {
        let deleteRow = $(this).data("row");
        $("#" + deleteRow).remove();
    });
    // multiplecation
    // $(".po__price").keyup(function () {
    //   let qty = $(".po__qty").text();
    //   let price = $(".po__price").text();
    //   $(".poTotal").text((qty * price));
    // })
    $(".po__price").on('keyup', function () { 
        $(".po__qty").each(function () {
            let qty = $(this).text();
            let price = $(".po__price").each(function () {
                $(this).text();
            });
            $(".poTotal").text((qty * price));
        });
    })
    // before insert data to database
    $("#poSave").click(function () {
        let poDate = $("#poDate").val();
        let poTime = $("#poTime").val();
        let poSave = 1;
        let poId = $("#poId").val();
        let poSupplier = $("#poSupplier").val();
        let poItem = [];
        let poDesc = [];
        let poUnit = [];
        let poQty = [];
        let poPrice = [];
        // let poTotal = [];
        $(".po__items").each(function() {
            poItem.push($(this).text());
        });
        $(".po__description").each(function () {
            poDesc.push($(this).text());
        });
        $(".po__unit").each(function () {
            poUnit.push($(this).val());
        });
        $(".po__qty").each(function () {
            poQty.push($(this).text());
        });
        $(".po__price").each(function () {
            poPrice.push($(this).text());
        });
        // ajax to insert data to the mysqli throw php
        $.$.ajax({
            url: "../purchase/insert.php",
            type: "POST",
            data: {poDate:poDate, poTime:poTime, poSave:poSave, poId:poId, poSupplier:poSupplier, poItem:poItem, poDesc:poDesc, poUnit:poUnit, poQty:poQty, poPrice:poPrice},
            success: function (data) {
                if(data == 1) {
                    console.log("data inserted successfully.");
                }else{
                    console.log("Data Insert Problems.");
                }
            }
        });
    })
});
