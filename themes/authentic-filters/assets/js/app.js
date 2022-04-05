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
        let s = $(this).val().trim();
        $('#answer li:not(:contains(' + s + '))').hide();
        $('#answer li:contains(' + s + ')').show();
        let faqSearchResults = document.getElementsByClassName('faq-heading');
        let faqHeaders = document.getElementsByClassName('faq-headers');
        const searchText = document.getElementById('search').value.replace(/\s\s+/g, ' ').trim().replace(" ", '|');
        if (searchText.length !== 0) {
            const regex = new RegExp(searchText, 'gim');
            Array.from(faqSearchResults).forEach((element) => {
                let text = element.innerText;
                let newText = text.replace(regex, '<mark class="highlight">$&</mark>');
                element.innerHTML = newText;

            })

        } else {
            const noRecords = document.querySelector('faq-headers');
            const regex = new RegExp('<mark class="highlight">|</mark>', 'gim');
            Array.from(faqSearchResults).forEach((element) => {
                let text = element.innerText;
                let newText = text.replace(regex, '');
                element.innerHTML = newText;
            })
        }
        if ($('.faq-list-item:visible').size() === 0) {
            $('.faq-headers').text('No Results Found')
            // if ($('#load-btn')){
                $('.load').css("display", 'none');
            console.log($('.load'));
            // }
        } else if ($('#search').val().length === 0) {
            $('.faq-headers').text('Most Frequently Asked Questions')
            $('.load').css("display", 'none');
            // $('#load-btn').show()
        } else {
            $('.faq-headers').text('Most Frequently Asked Questions')
            $('.load').css("display", 'none');

            // $('#load-btn').show()
        }
        return true;
    });
});

