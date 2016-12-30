$(function() {
    var base_path = 'http://localhost/motseklat_new/';
    var _GET_CITIES_PATH = base_path + 'home/get_cities_by_country/';
    var _DO_PURCHASE_ORDER_PATH = base_path + 'home/do_purchase_order/';
    var _GET_MODEL_PATH = base_path + 'home/get_models_by_manufacturer/';
    var _SET_BIKE_INTERESTED_PATH = base_path + 'home/set_bike_interested/';
    var _SET_PRODUCT_INTERESTED_PATH = base_path + 'home/set_product_interested/';


    var manufacturer_id = null; // for purchasing order


    $('#do_login, #do_forgot').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var action = $(this).attr('action');
        $.post(action, form.serialize(), function(data) {
            if (data.status === true) {
                form.find("div#login_message").removeClass('uk-alert-danger').addClass('uk-alert-success').html(data.msg).show();
                if (form.attr('id') != "do_forgot")
                    window.location.href = data.redirect;
            } else {
                form.find("div#login_message").removeClass('uk-alert-success').addClass('uk-alert-danger').html(data.msg).show();
            }
        }, "json");
    });

    $('form[name="register_form"] #select-state').on('change',function () {
        $('form[name="register_form"] #select-city').empty();
        $.get(base_path+'cities/'+ $('#select-state').val(), function (data) {
            console.log(data);
            var options = [];
            for(var item = 0; item < data.length; item++){
                var option = {value: data[item].id, text: data[item].name};
                options.push(option);
            }
            var selectize = $("#select-city")[0].selectize;
            selectize.clear();
            selectize.clearOptions();
            selectize.load(function(callback) {
                callback(options);
            });
        }, "json");
    });

    $('#add_feedback').submit(function(e) {
        $('.loader').show();
        e.preventDefault();
        var action = $(this).attr('action');
        $.post(action, $('#add_feedback').serialize(), function(data) {
            $('.loader').hide();
            if (data.status === true) {
                $("#alert_message").show().removeClass('error-box').addClass('success-box').find('p').html(data.msg);
            } else {
                $("#alert_message").show().removeClass('success-box').addClass('error-box').find('p').html(data.msg);
            }
        }, "json");
    });

    $('#show_advertiser_mobile').click(function() {
        $('#advertiser_mobile').fadeIn(1500).show();
        $.post(_SET_BIKE_INTERESTED_PATH, {
            "bike_id": $('#bike_id').val()
        }, function() {}, "json");
    });

    $('#show_product_advertiser_mobile').click(function() {
        $('#advertiser_mobile').fadeIn(1500).show();
        $.post(_SET_PRODUCT_INTERESTED_PATH, {
            "product_id": $('#product_id').val()
        }, function() {}, "json");
    });

    /* this function for supplies and offers*/
    $('#search_supplies #manufacturer_id').change(function() {
        $('#search_supplies #model_id').empty();
        $.post(_GET_MODEL_PATH, {
            "manufacturer_id": $('#search_supplies #manufacturer_id').val()
        }, function(data) {
            $.each(data.models, function(index, element) {
                $('#search_supplies #model_id').append('<option value="' + element.id + '">' + element.name + '</option>');
            });
        }, "json");
    });

    $('#subscribe_form').submit(function(e) {
        e.preventDefault();
        var action = $(this).attr('action');
        $.post(action, $('#subscribe_form').serialize(), function(data) {
            if (data['status'] == true) {
                $('.Notfication').show(200);
                $('.Notfication').removeClass('error-box');
                $('.Notfication').addClass('success-box').find('span').html(data['msg']);
            } else if (data['status'] == false) {
                $('.Notfication').show(200);
                $('.Notfication').removeClass('success-box');
                $('.Notfication').addClass('error-box').find('span').html(data['msg']);
            }
        }, "json").complete(function() {
            setTimeout("$('.Notfication').fadeOut(500);", 5000);
            $('#email').val('');
        }).error(function() {
            $('.Notfication').show(200);
            $('.Notfication').removeClass('success-box');
            $('.Notfication').addClass('error-box').find('span').html("هناك خطأ في تخزين البيانات");
        });
    });

});