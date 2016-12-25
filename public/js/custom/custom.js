$(function () {
    var base_path = 'http://www.motseklat.com/';
    var _GET_CITIES_PATH = base_path + 'home/get_cities_by_country/';
    var _DO_PURCHASE_ORDER_PATH = base_path + 'home/do_purchase_order/';
    var _GET_MODEL_PATH = base_path + 'home/get_models_by_manufacturer/';
    var _SET_BIKE_INTERESTED_PATH = base_path + 'home/set_bike_interested/';
    var _SET_PRODUCT_INTERESTED_PATH = base_path + 'home/set_product_interested/';


    var manufacturer_id = null;// for purchasing order

    $('#register_form').submit(function (e) {
        $('#register_form .loader').show();
        $('#register_form #do_register').hide();
        e.preventDefault();
        var action = $(this).attr('action');
        $.post(action, $('#register_form').serialize(), function (data) {
            if (data.status === true) {
                $("#register_form #alert_message").show().removeClass('error-box').addClass('success-box').find('p').html(data.msg);
            } else {
                $("#register_form #alert_message").show().removeClass('success-box').addClass('error-box').find('p').html(data.msg);
            }
            $('#register_form #do_register').show();
            $('#register_form .loader').hide();
            jQuery('html,body').animate({
                scrollTop: 0
            }, 'slow');
        }, "json");
    });
    $('#do_login, #do_forgot').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var action = $(this).attr('action');
        $.post(action, form.serialize(), function (data) {
            if (data.status === true) {
                form.find("div#login_message").removeClass('uk-alert-danger').addClass('uk-alert-success').html(data.msg).show();
                if(form.attr('id') != "do_forgot")
                    window.location.href = data.redirect;
            } else {
                form.find("div#login_message").removeClass('uk-alert-success').addClass('uk-alert-danger').html(data.msg).show();
            }
        }, "json");
    });

    $('#register_form #country_id').change(function () {
        $('#register_form #city_id').empty();
        $.post(_GET_CITIES_PATH, {"country_id": $('#register_form #country_id').val()}, function (data) {
            $.each(data.cities, function (index, element) {
                $('#register_form #city_id').append('<option value="' + element.id + '">' + element.name + '</option>');
            });
        }, "json");
    });

//    $('#article_comment_form').submit(function (e) {
//        $('.loader').show();
//        e.preventDefault();
//        var action = $(this).attr('action');
//        $.post(action, $('#article_comment_form').serialize(), function (data) {
//            $('.loader').hide();
//            if (data.status === true) {
//                $("#alert_message").show().removeClass('error-box').addClass('success-box').find('p').html(data.msg);
//            } else {
//                $("#alert_message").show().removeClass('success-box').addClass('error-box').find('p').html(data.msg);
//            }
//        }, "json");
//    });

    $('#add_feedback').submit(function (e) {
        $('.loader').show();
        e.preventDefault();
        var action = $(this).attr('action');
        $.post(action, $('#add_feedback').serialize(), function (data) {
            $('.loader').hide();
            if (data.status === true) {
                $("#alert_message").show().removeClass('error-box').addClass('success-box').find('p').html(data.msg);
            } else {
                $("#alert_message").show().removeClass('success-box').addClass('error-box').find('p').html(data.msg);
            }
        }, "json");
    });

    $('#show_advertiser_mobile').click(function () {
        $('#advertiser_mobile').fadeIn(1500).show();
        $.post(_SET_BIKE_INTERESTED_PATH, {"bike_id": $('#bike_id').val()}, function () {
        }, "json");
    });

    $('#show_product_advertiser_mobile').click(function () {
        $('#advertiser_mobile').fadeIn(1500).show();
        $.post(_SET_PRODUCT_INTERESTED_PATH, {"product_id": $('#product_id').val()}, function () {
        }, "json");
    });

    /* this function for supplies and offers*/
    $('#search_supplies #manufacturer_id').change(function () {
        $('#search_supplies #model_id').empty();
        $.post(_GET_MODEL_PATH, {"manufacturer_id": $('#search_supplies #manufacturer_id').val()}, function (data) {
            $.each(data.models, function (index, element) {
                $('#search_supplies #model_id').append('<option value="' + element.id + '">' + element.name + '</option>');
            });
        }, "json");
    });

    /* start purchase order */
//    $('.order_dialog').click(function () {
//        manufacturer_id = $(this).attr('data-id');
//    });
//
//    $('#do_purchase_order').submit(function (e) {
//        $('#purchase_order .loader').show();
//        e.preventDefault();
//        var action = $(this).attr('action');
//        $.post(action, $('#do_purchase_order').serialize() + '&manufacturer_id=' + manufacturer_id, function (data) {
//            $('#purchase_order .loader').hide();
//            if (data.status === true) {
//                $("#purchase_order #alert_message").show().removeClass('error-box').addClass('success-box').find('p').html(data.msg);
//                $('#purchase_order #send_order').hide();
//                setTimeout(function () {
//                    $('#purchase_order').modal('toggle');
//                    $('#send_order').show();
//                }, 1000);
//            } else {
//                $("#purchase_order #purchase_order #alert_message").show().removeClass('success-box').addClass('error-box').find('p').html(data.msg);
//            }
//        }, "json");
//    });
    /* end purchase order */

    $('#subscribe_form').submit(function (e) {
        e.preventDefault();
        var action = $(this).attr('action');
        $.post(action, $('#subscribe_form').serialize(), function (data) {
            if (data['status'] == true) {
                $('.Notfication').show(200);
                $('.Notfication').removeClass('error-box');
                $('.Notfication').addClass('success-box').find('span').html(data['msg']);
            } else if (data['status'] == false) {
                $('.Notfication').show(200);
                $('.Notfication').removeClass('success-box');
                $('.Notfication').addClass('error-box').find('span').html(data['msg']);
            }
        }, "json").complete(function () {
            setTimeout("$('.Notfication').fadeOut(500);", 5000);
            $('#email').val('');
        }).error(function () {
            $('.Notfication').show(200);
            $('.Notfication').removeClass('success-box');
            $('.Notfication').addClass('error-box').find('span').html("هناك خطأ في تخزين البيانات");
        });
    });

});
        