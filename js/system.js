$(document).ready(function () {
    $("#userSave").on("click", function (event) {
        event.preventDefault();
        let userName = $("#userName").val();
        let password = $("#userPassword").val();
        let userDesignation = $("#userDesignation").val();
        let itemUnit = $("#itemUnit").val();
        let userStatus = $("#userStatus").val();

        // console.log(userName);
        // console.log(password);
        // console.log(userDesignation);
        // console.log(itemUnit);
        // console.log(userStatus);
        $.ajax({
            url: "upload.php",
            type: "POST",
            data: $("#userSubmitForm").serialize(),
            success: function (response) {
                alert(response);
            }
        });
    });
});