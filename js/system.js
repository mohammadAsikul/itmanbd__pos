$(document).ready(function () {
    $("#userSave").on("click", function (event) {
        event.preventDefault();
        let userName = $("#userName").val();
        let password = $("#userPassword").val();
        let userDesignation = $("#userDesignation").val();
        let userRole = $("#userRole").val();
        let userStatus = $("#userStatus").val();
        $.ajax({
            url: "upload.php",
            type: "POST",
            data: $("#userSubmitForm").serialize(),
            success: function (response) {
                fetchUserData();
                $("#userSubmitForm").trigger("reset");
            }
        });
    });
    //  fetch user data on table
    function fetchUserData() {
        $.ajax({
            url: "fetchUser.php",
            type: "POST",
            success: function (fetchUserData) {
                $("#userFatchTable").html(fetchUserData);
            }
        })
    }
    fetchUserData();
    // open the model with updateable content
    $(document).on("click", ".update", function (e) {
        e.preventDefault();
        $("#userUpdateForm").removeClass('close');
        // console.log($(".user__update--form").html());
        let id = $(this).attr("data-updateId");
        $.ajax({
            url: "updateUser.php",
            type: "POST",
            data: {userId: id},
            success: function (updateData) {
                // alert(updateData);
                $("#userUpdateForm").html(updateData);
            }
        })
    });
    // close update model
    $(document).on("click", ".update__form--close", function (e) {
        e.preventDefault();
        $("#userUpdateForm").addClass('close');
    })
    $(document).on("click", "#userUpdate", function (e) {
        e.preventDefault();

        let updateUserId = $("#userId").val();
        let userUpdateName = $("#updateUserName").val();
        let userUpdatePassword = $("#updateUserPassword").val();
        let updateUserDesignation = $("#updateUserDesignation").val();
        let updateUserRole = $("#updateUserRole").val();
        let updateUserStatus = $("#updateUserStatus").val();
        $.ajax({
            url: "updateUser.php",
            type: "POST",
            data: { updateUserId: updateUserId, userUpdateName: userUpdateName, userUpdatePassword:userUpdatePassword, updateUserDesignation:updateUserDesignation, updateUserRole:updateUserRole, updateUserStatus:updateUserStatus },
            success: function (updatedData) {
                fetchUserData();
                if (updatedData == "1") {
                    $("#userUpdateForm").addClass('close');
                } else {
                    alert("User Update Problems.");
                }
            }
        });
    })
});