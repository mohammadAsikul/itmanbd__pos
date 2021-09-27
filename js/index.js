$(document).ready(function () {
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
    // click dashboar remove all sub menu
    $(".link1").click(function (e) {
        $(".drop__menu").each(function (links) {
            $(this).removeClass("drop__menu--toggle");
         })
    });
    // datatables for the purchase order table
    $('#poTable').DataTable();
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
    }
    // purchase order dynamic item create
    $("#addRow").click(function (e) {
        e.preventDefault();
        $("#tableRow").after('<tr class="tr"> <td class="po__remove"> <button id="poRemoveItem"><i class="fas fa-trash"></i></button> </td> <td class="po__items"><input type="text" name="poItem" id="poItem" placeholder="PO Item"></td> <td class="po__description"><input type="text" name="poDescription" id="poDescription" placeholder="PO Description"></td> <td class="po__unit"> <select name="poUnit" id="poUnit"> <option value="">Select Unit</option> <option value="">Pcs</option> <option value="">Box</option> <option value="">Meter</option> </select> </td> <td class="po__qty"><input type="text" name="poQty" id="poQty" placeholder="PO Qty"></td> <td class="po__price"><input type="text" name="poPrice" id="poPrice" placeholder="PO Price"></td> <td class="po__total"><span id="poTotal" class="poTotal">0</span></td> </tr>');
    });
    // purchase dynamic item create
    $("#addRow").click(function (e) {
        e.preventDefault();
        $("#tableRowP").after('<tr class="tr" id="tableRowP"> <td class="purchase__remove rm"> <button id="purchaseRemoveItem"><i class="fas fa-trash"></i></button> </td> <td class="purchase__items items"><input type="text" name="purchaseItem" id="purchaseItem" placeholder=""></td> <td class="purchase__description description"><input type="text" name="purchaseDescription" id="purchaseDescription" placeholder=""></td> <td class="purchase__barcode barcode"><input type="text" name="purchaseBarcode" id="purchaseBarcode" placeholder=""></td> <td class="purchase__warranty warranty"><input type="text" name="purchaseWarranty" id="purchaseWarranty" placeholder=""></td> <td class="purchase__unit unit"> <select name="purchaseUnit" id="purchaseUnit"> <option value="">Select Unit</option> <option value="">Pcs</option> <option value="">Box</option> <option value="">Meter</option> </select> </td> <td class="purchase__qty qty"><input type="text" name="purchaseQty" id="purchaseQty" placeholder=""></td> <td class="purchase__p--price purchase__price"><input type="text" name="purchaseP" id="purchaseP" placeholder=""> </td> <td class="purchase__s--price selling__price"> <input type="text" name="sellingP" id="sellingP" placeholder=""></td> <td class="purchase__total total"><span id="poTotal" class="poTotal">0</span></td> </tr>')
    })
});
