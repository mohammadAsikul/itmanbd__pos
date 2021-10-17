$(document).ready(function () {
    $("#userSave").on("click", function (event) {
        event.preventDefault();
        let userName = $("#userName").val();
        let password = $("#userPassword").val();
        let userDesignation = $("#userDesignation").val();
        let itemUnit = $("#itemUnit").val();
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
    // update user data
    $("tbody").on("click", ".update", function (e) {
        e.preventDefault();
        let conf = confirm("Are you sure?");
        let id = $(this).attr("id");
        let username = $(this).attr("data-username");
        let designation = $(this).attr("data-designation");
        let role = $(this).attr("data-role");
        let status = $(this).attr("data-status");
        if (conf==true) {
            
            $("#userName").val(username);
        }
    });
    // delete user data
    // $("tbody").on("click", ".update", function (e) {
    //     e.preventDefault();
    //     let conf = confirm("Are you sure?");
    //     if (conf==true) {
    //         let updateId = $(this).attr("data-updateId");
    //         $.ajax({
    //             url: "action.php",
    //             type: "POST",
    //             data: {updateId:updateId},
    //             success: function (data) {
    //                 fetchUserData();
    //             }
    //         });
    //     }
    // })
});