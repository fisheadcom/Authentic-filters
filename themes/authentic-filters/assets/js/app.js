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

    $("#load-btn").on("click", function () {
        $(".faq-list-item").addClass('faq-items-display');
        $("#load-btn").css("display", "none")
    });

    let frmBtn = document.getElementById("af_contact_button");
    let frm = document.getElementById("af_contact_form");

    // console.log(frm)
    if (frmBtn) {
        frmBtn.addEventListener('click', function () {
            if (($("#firstname_id").val() !== '') && ($("#reasons_id").val() !== '') && ($("#email_id").val() !== '')) {
                console.log("hi")
                setTimeout(function () {
                    frm.reset();
                    console.log("clicked")

                }, 1000)
            }
        });
    }
    let footerFrmBtn = document.getElementById("footer_btn");
    let footerFrm = document.getElementById("footer_form");
    if (footerFrmBtn) {
        footerFrmBtn.addEventListener('click', function () {
            setTimeout(function () {
                footerFrm.reset();
            }, 1000)
        });
    }

    $(document).click(function (e) {
        e.stopPropagation();
        if ($('.nav-links').hasClass('nav-active') === true) {


            if ($(e.target).hasClass('nav-active') === false && $(e.target).hasClass('burger') === false) {
                $('ul').removeClass('nav-active')
                $('.burger').removeClass('toggle')
                $('.nav-links li').removeAttr('style')

            }
        }

    });


    jQuery.expr[':'].Contains = function (a, i, m) {
        return jQuery(a).text().toUpperCase()
            .indexOf(m[3].toUpperCase()) >= 0;
    };


    jQuery.expr[':'].contains = function (a, i, m) {
        return jQuery(a).text().toUpperCase()
            .indexOf(m[3].toUpperCase()) >= 0;
    };

    $('#search').keyup(function (e) {
        var s = $(this).val().trim();

        if (s === '') {
            $('#answer li').show();
            return true;
        }
        $('#answer li:not(:contains(' + s + '))').hide();

        $('#answer li:contains(' + s + ')').show();
        return true;
    });
    //
    // $(document).ready(function () {
    //     $('.faq-lists').click(function () {
    //         $('.faq-list').toggle("slide");
    //     });
    // });

    let faqSearchResults = document.querySelector('#faq-search-result');
    faqSearchResults = [];
    console.log(faqSearchResults);
});

