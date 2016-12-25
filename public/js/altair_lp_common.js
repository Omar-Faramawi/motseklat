
// variables
var $body = $('body'),
    $html = $('html'),
    $window = $(window),
    $document = $(document),
    $header_main = $('#header_main'),
    header_main_height = $header_main.height(),
    easing_swiftOut = [ 0.35,0,0.25,1 ];
    bez_easing_swiftOut = $.bez(easing_swiftOut);

/* Detect hi-res devices */
function isHighDensity() {
    return ((window.matchMedia && (window.matchMedia('only screen and (min-resolution: 124dpi), only screen and (min-resolution: 1.3dppx), only screen and (min-resolution: 48.8dpcm)').matches || window.matchMedia('only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (min-device-pixel-ratio: 1.3)').matches)) || (window.devicePixelRatio && window.devicePixelRatio > 1.3));
}

/*
 *  Dynamically loading an external JavaScript or CSS file
 *  http://www.javascriptkit.com/javatutors/loadjavascriptcss.shtml
 */
function loadjscssfile(b,c){if("js"==c){var a=document.createElement("script");a.setAttribute("type","text/javascript");a.setAttribute("src",b)}else"css"==c&&(a=document.createElement("link"),a.setAttribute("rel","stylesheet"),a.setAttribute("type","text/css"),a.setAttribute("href",b));"undefined"!=typeof a&&document.getElementsByTagName("head")[0].appendChild(a)};

$(function() {
    // header main
    altair_header_main.init();
    // inputs
    altair_md.init();
});

$window.on('load',function () {
    if(isHighDensity()) {
        loadjscssfile("bower_components/dense/src/dense.js", "js");
        // enable hires images
        $('img').dense({
            glue: "@"
        });
    }
    // fastClick (touch devices)
    FastClick.attach(document.body);
});

altair_header_main = {
    init: function () {
        // sticky header
        altair_header_main.sticky_header();
        // main navigation
        altair_header_main.main_navigation();
    },
    sticky_header: function () {
        $body.addClass('header_sticky');
        $(window).on("scroll touchmove", function () {
            $body.toggleClass('header_shadow', $(document).scrollTop() > 0);
        });
    },
    main_navigation: function() {
        $('#main_navigation').onePageNav({
            currentClass: 'current_active',
            changeHash: false,
            scrollSpeed: 840,
            scrollThreshold: 0.4,
            filter: '',
            scrollOffset: -header_main_height,
            easing: bez_easing_swiftOut,
            begin: function() {
                //Hack so you can click other menu items after the initial click (IOS)
                $('body').append('<div id="device-dummy" style="height: 1px;"></div>');
            },
            end: function() {
                $('#device-dummy').remove();
            },
            scrollChange: function($currentListItem) {
                //I get fired when you enter a section and I pass the list item of the section
            }
        });

    }
};

