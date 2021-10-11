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
});