$(document).ready(function () {
    // setup directory
        
    // datatables for the purchase order table
    // $('#example').DataTable();
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
    // user login info btn
    $("#user_profile_btn").click(function (e) { 
        e.preventDefault();
        $(".user__login--info").toggleClass("activeClick");
    });
});
