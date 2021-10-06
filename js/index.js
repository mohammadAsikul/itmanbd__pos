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
    // click dashboard remove all sub menu
    $(".link1").click(function (e) {
        $(".drop__menu").each(function (links) {
            $(this).removeClass("drop__menu--toggle");
        })
    });
    // setup directory
        // supplier add window show and close functions
        $("#addSupplier").on('click', function (e) {
            e.preventDefault();
            $(".supplier__submit--form").removeClass('close');
        });
        // close
        $(".supplier__submit__form--close").on('click', function (e) {
            e.preventDefault();
            $(".supplier__submit--form").addClass('close');
            // to remove all responce msg class
            $("#response").fadeOut();
            $("#response").removeClass('success--msg').removeClass('errors--msg').removeClass('process--msg').html("");
        });
        // send data to database using ajax
        $("#supplierSave").on('click', function (e) {
            e.preventDefault();
            $(this).attr("disabled", true);
            $(this).css('background-color', '#6C757D');
            $(this).css('cursor', 'not-allowed');
            setTimeout(() => {
                $(this).attr("disabled", false);
                $(this).css('background-color', '#007BFF');
                $(this).css('cursor', 'pointer');
            }, 3000);
            let supplierName = $("#supplierName").val();
            let contactPerson = $("#contactPerson").val();
            let contactNumber = $("#contactNumber").val();
            let email = $("#email").val();
            let whatsapp = $("#whatsapp").val();
            let address = $("#address").val();
            let supplierStatus = $("#supplierStatus").val();
            if (supplierName == "" && contactPerson == "" && contactNumber == "" && address == "") {
                $("#response").fadeIn();
                $("#response").removeClass('success--msg').addClass('errors--msg').html('All fields are required.');
                setTimeout(() => {
                    $("#response").fadeOut();
                    $("#response").html('');
                }, 4000);
            }else{
                $.ajax({
                    url: "supplier_send.php",
                    type: "POST",
                    data: $("#supplierSubmitForm").serialize(),
                    success: function (sendData) {
                        $("#response").fadeIn();
                        $("#response").html(sendData).removeClass('errors--msg').addClass('success--msg');
                        setTimeout(() => {
                            $("#response").fadeOut();
                        }, 4000);
                        $("#supplierSubmitForm").trigger("reset");
                        fetchSupplierData();
                    }
                });
            }
        });
        // fetch supplier data using ajax
        function fetchSupplierData() {
            $.ajax({
                url: "supplier_fetch.php",
                type: "POST",
                success: function (fetchData) {
                    $("#supplierFatchTable").html(fetchData);
                }
            })
        };
        fetchSupplierData();
        // client add window show and close functions
        $("#addClient").on('click', function (e) {
            e.preventDefault();
            $(".supplier__submit--form").removeClass('close');
        });
        // close
        $(".supplier__submit__form--close").on('click', function (e) {
            e.preventDefault();
            $(".supplier__submit--form").addClass('close');
            // to remove all responce msg class
            $("#response").fadeOut();
            $("#response").removeClass('success--msg').removeClass('errors--msg').removeClass('process--msg').html("");
        });
        // send client data to database using ajax
        $("#clientSave").on('click', function (e) {
            e.preventDefault();
            $(this).attr("disabled", true);
            $(this).css('background-color', '#6C757D');
            $(this).css('cursor', 'not-allowed');
            setTimeout(() => {
                $(this).attr("disabled", false);
                $(this).css('background-color', '#007BFF');
                $(this).css('cursor', 'pointer');
            }, 3000);
            let clientName = $("#clientName").val();
            let contactNumber = $("#contactNumber").val();
            let clientEmail = $("#clientEmail").val();
            let clientAddress = $("#clientAddress").val();
            let clientStatus = $("#clientStatus").val();
            if (clientName == "" && contactNumber == "" && clientAddress == "") {
                $("#response").fadeIn();
                $("#response").removeClass('success--msg').addClass('errors--msg').html('All fields are required.');
                setTimeout(() => {
                    $("#response").fadeOut();
                }, 4000);
            }else{
                $("#response").fadeIn();
                $.ajax({
                    url: "client_send.php",
                    type: "POST",
                    data: $("#clientSubmitForm").serialize(),
                    success: function (data) {
                        $("#response").fadeIn();
                        $("#response").html("Client Data Send to the database.").removeClass('errors--msg').addClass('success--msg');
                        setTimeout(() => {
                            $("#response").fadeOut();
                        }, 4000);
                        $("#clientSubmitForm").trigger("reset");
                        fetchClientData();
                    }
                });
            }
        });
        // fetch client data using ajax
        function fetchClientData() {
            $.ajax({
                url: "client_fetch.php",
                type: "POST",
                success: function (data) {
                    $("#clientFatchTable").html(data);
                }
            })
        };
        fetchClientData();
        // show category to insert data to database using ajax
        $("#addCategory").on('click', function (e) {
            e.preventDefault();
            $(".supplier__submit--form").removeClass('close');
        });
        // close
        $(".supplier__submit__form--close").on('click', function (e) {
            e.preventDefault();
            $(".supplier__submit--form").addClass('close');
            // to remove all responce msg class
            $("#response").fadeOut();
            $("#response").removeClass('success--msg').removeClass('errors--msg').removeClass('process--msg').html("");
        });
        // send category data to database
        $("#categorySave").on('click', function (e) {
            e.preventDefault();
            $(this).attr("disabled", true);
            $(this).css('background-color', '#6C757D');
            $(this).css('cursor', 'not-allowed');
            setTimeout(() => {
                $(this).attr("disabled", false);
                $(this).css('background-color', '#007BFF');
                $(this).css('cursor', 'pointer');
            }, 3000);
            let categoryName = $("#categoryName").val();
            let categoryStock = $("#categoryStock").val();
            let categoryStatus =$("#categoryStatus").val();
            if (categoryName == "") {
                $("#response").fadeIn();
                $("#response").removeClass('success--msg').addClass('errors--msg').html('All fields are required.');
            } else {
                $("#response").fadeIn();
                $.ajax({
                    url: "category_action.php",
                    type: "POST",
                    data: $("#categorySubmitForm").serialize(),
                    success: function (setCatData) {
                        $("#response").fadeIn();
                        $("#response").html("Data Send Successfully.").removeClass('errors--msg').addClass('success--msg');
                        setTimeout(() => {
                            $("#response").fadeOut();
                        }, 4000);
                        $("#categorySubmitForm").trigger("reset");
                        fetchCategoryData();
                    }
                });
            }
        })
        // get category data from the database
        function fetchCategoryData () {
            $.ajax({
                url: 'category_action.php',
                type: 'POST',
                success: function (fetchCategoryData) {
                    $("#categoryFatchTable").html(fetchCategoryData);
                }
            })
        }
        // run the function
        fetchCategoryData();
        // sub category send to database
        $("#addSubCategory").on('click', function (e) {
            e.preventDefault();
            $(".supplier__submit--form").removeClass('close');
        });
        // close
        $(".supplier__submit__form--close").on('click', function (e) {
            e.preventDefault();
            $(".supplier__submit--form").addClass('close');
            // to remove all responce msg class
            $("#response").fadeOut();
            $("#response").removeClass('success--msg').removeClass('errors--msg').removeClass('process--msg').html("");
        });
        $("#subCategorySave").on('click', function (e) {
            e.preventDefault;
            $(this).attr("disabled", true);
            $(this).css('background-color', '#6C757D');
            $(this).css('cursor', 'not-allowed');
            setTimeout(() => {
                $(this).attr("disabled", false);
                $(this).css('background-color', '#007BFF');
                $(this).css('cursor', 'pointer');
            }, 2000);
            let sCategoryName = $("#sCategoryName").val();
            let subCategoryName = $("#subCategoryName").val();
            let subCategoryStock = $("#subCategoryStock").val();
            let subSategoryStatus = $("#subSategoryStatus").val();
            if (sCategoryName == "" || subCategoryName == "") {
                $("#response").fadeIn();
                $("#response").removeClass('success--msg').addClass('errors--msg').html('All * fields are required.');
                setTimeout(() => {
                    $("#response").fadeOut();
                }, 2000);
            } else {
                $("#response").fadeIn();
                $.ajax({
                    url: "sub_category_send.php",
                    type: "POST",
                    data: $("#subCategorySubmitForm").serialize(),
                    success: function (getSubData) {
                        $("#response").fadeIn();
                        $("#response").addClass('success--msg').removeClass('errors--msg').html('Data Send Successfully.');
                        setTimeout(() => {
                            $("#response").fadeOut();
                        }, 2000);
                        fetchSubCategoryData();
                        $("#subCategorySubmitForm").trigger("reset");
                    }
                })
            }
        })
        // fetch sub category using ajax
        function fetchSubCategoryData() {
            $.ajax({
                url: "sub_category_fetch.php",
                type: "POST",
                success: function (subCatData) {
                    $("#subCategoryFatchTable").html(subCatData);
                }
            })
        }
        fetchSubCategoryData();
        
    // datatables for the purchase order table
    $('#example').DataTable();
    // $("#brands")
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
    });
    // function for remove all active class from dropdown menu
    function removeDropdownAction() {
        dropDown.forEach(function (item) {
            console.log(item.classList.remove("active"));
        })
    };
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
    // po rows remove
    $(document).on("click", ".remove", function () {
        let deleteRow = $(this).data("row");
        $("#" + deleteRow).remove();
    });
});
