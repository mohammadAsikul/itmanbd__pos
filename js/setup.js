$(document).ready(function () {
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
    
});