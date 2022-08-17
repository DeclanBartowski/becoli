BX.addCustomEvent(
    'modal_success',
    function () {

        $('.form-control').focus(function () {
            $(this).closest('.form-group').addClass('focus');
            $(this).closest('.form-group').find('.input_delete-text').addClass('is-visible');
        });
        $('.form-control').blur(function () {
            if ($(this).val().length == 0) {
                $(this).closest('.form-group').removeClass('focus');
                $(this).closest('.form-group').find('.input_delete-text').removeClass('is-visible');
            }
        });
        $('form').find('.form-control').each(function () {
            if ($(this).val().length > 1) {
                $(this).closest('.form-group').addClass('focus');
            }
        })
        $('.input_delete-text').on("click", function () {
            $(this).closest('.form-group').find('.form-control').val(' ');
            $(this).closest('.form-group').removeClass('focus');
            $(this).removeClass('is-visible');
        });
        $('.js_form-submit').on("click", function () {
            var jhis = $(this).closest('form');
            $(jhis).find('.requiredField').removeClass('input-error');
            $(jhis).find('.error').remove();
            $(jhis).find('.form-group').removeClass('is-error');
            var error = 0;
            $(jhis).find('.requiredField').each(function () {
                if ($(this).hasClass('callback-phone')) {
                    if ($(this).val().length < 10) {
                        $(this).closest('.form-group').addClass('is-error');
                        $(this).after('<span class="error">Enter the correct number</span>');
                        $(this).addClass('input-error');
                        error = 1;
                    }
                } else if ($(this).hasClass('callback-email')) {
                    var emailReg = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
                    if (emailReg.test($(this).val()) == false) {
                        $(this).closest('.form-group').addClass('is-error');
                        $(this).after('<span class="error">Enter correct E-mail</span>');
                        $(this).addClass('input-error');
                        error = 2;
                    }
                } else if ($(this).hasClass('callback-name')) {
                    if ($(this).val().length < 3) {
                        $(this).closest('.form-group').addClass('is-error');
                        $(this).addClass('input-error');
                        $(this).after('<span class="error">Incorrect data</span>');
                        error = 3;
                    }
                } else if ($(this).hasClass('callback-text')) {
                    if ($(this).val().length < 2) {
                        $(this).closest('.form-group').addClass('is-error');
                        $(this).addClass('input-error');
                        $(this).after('<span class="error">Fill in the field</span>');
                        error = 4;
                    }
                }
            });
            if (error == 0) {
                /*отправка формы**/
            } else {
                return false;
            }
        });
        $('input[type="tel"]').inputmask("+49 (9999) 99 99 99", {
            "clearIncomplete": true,
            showMaskOnHover: false,
        });
        $('#application-accepted').modal('show');
    }
);

$(document).on('click', '[data-privacy]', function () {
    BX.ajax.runAction('tq:tools.privacy.getRules').then(function (response) {
        $('#privacy-policy .content-insert').html(response.data);
        $('#privacy-policy').modal('show');
    }, function (response) {
        console.log(response);
    });

})

$(document).on('click', '[data-about]', function () {
    let id = $(this).data('about');
    BX.ajax.runAction('tq:tools.about.getModal', {data: {id: id}}).then(function (response) {
        $('#about-popup .content-insert').html(response.data);

        lazyLoad($('#about-popup'));

        var youtube = document.querySelectorAll(".youtube");
        for (var i = 0; i < youtube.length; i++) {
            var source = "https://img.youtube.com/vi/" + youtube[i].dataset.embed + "/sddefault.jpg";
            var image = new Image();
            image.src = source;
            image.addEventListener("load", function () {
                youtube[i].appendChild(image);
            }(i));
            youtube[i].addEventListener("click", function () {
                var iframe = document.createElement("iframe");
                iframe.setAttribute("frameborder", "0");
                iframe.setAttribute("allowfullscreen", "");
                iframe.setAttribute("src", "https://www.youtube.com/embed/" + this.dataset.embed + "?rel=0&showinfo=0&autoplay=1");
                this.innerHTML = "";
                this.appendChild(iframe);
            });
        }
        ;


        $('#about-popup').modal('show');
    }, function (response) {
        console.log(response);
    });
});

$(document).on('click', '[data-service]', function () {
    let id = $(this).data('service');
    BX.ajax.runAction('tq:tools.service.getModal', {data: {id: id}}).then(function (response) {
        $('#services-popup .content-insert').html(response.data);
        $('#services-popup').modal('show');
    }, function (response) {
        console.log(response);
    });
})

$(document).on('click', '[data-project]', function () {
    let id = $(this).data('project');
    BX.ajax.runAction('tq:tools.project.getModal', {data: {id: id}}).then(function (response) {
        $('#project-popup .content-insert').html(response.data);
        lazyLoad($('#project-popup'));
        $(".fancybox").fancybox({
            afterLoad: function (instance, current) {
                if (!is_mobile()) {
                    $('.fixed-menu').addClass('is-overflow');
                    $('.scroll-to-top').addClass('is-hidden');
                }
            },
            afterClose: function (instance, current) {
                if (!is_mobile()) {
                    $('.fixed-menu').removeClass('is-overflow');
                    $('.scroll-to-top').removeClass('is-hidden');
                }
            }
        });
        $('#project-popup').modal('show');
    }, function (response) {
        console.log(response);
    });
})

$(document).on('click', '[data-callback-btn]', function () {
    $('.js-modal').modal('hide');
    $('#callback').modal('show');
})