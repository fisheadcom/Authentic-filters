$(document).ready(function () {


    const navSlide = () => {
        const burger = document.querySelector(".burger");
        const nav = document.querySelector(".nav-links");
        const navLinks = document.querySelectorAll(".nav-links li");

        burger.addEventListener("click", () => {
            nav.classList.toggle("nav-active");

            navLinks.forEach((link, index) => {
                if (link.style.animation) {
                    link.style.animation = "";
                } else {
                    link.style.animation = `navLinkFade 0.5s ease forwards ${
                        index / 7 + 0.3
                    }s`;
                }
            });

            burger.classList.toggle("toggle");
        });
    };

    navSlide();


    $(".faq-heading").click(function () {
        $(this)
            .parent("li")
            .toggleClass("the-active")
            .find(".faq-text")
            .slideToggle();
        $(this).toggleClass("heading-color");
    });

    $("#load-btn").on("click",function (){
        $(".load-more").css("display","unset");
        $("#load-btn").css("display","none")
    });

    var frmBtn = document.getElementById("af_contact_button");
    var frm = document.getElementById("af_contact_form");
    console.log(frm)
    frmBtn.addEventListener('click', function () {
        setTimeout(function(){
          frm.reset();
        },1000)
    });
    var footerFrmBtn = document.getElementById("footer_btn");
    var footerFrm = document.getElementById("footer_form");
    console.log(frm)
    footerFrmBtn.addEventListener('click', function () {
        setTimeout(function(){
            footerFrm.reset();
        },1000)
    });
});

