/*
 *	Main JQuery Functions
 *  ---------------------------------------------------------------------------
 *  @package    :   Pixel Art Theme Framework
 *	@author     :   Umair Chaudary
 *	@version    :   1.0
 *	@link       :   http://www.pixelartinc.com
 *	@copyright  :   Copyright (c) 2012, http://www.pixelartinc.com
 *	--------------------------------------------------------------------------- */

window.onload = function () {

    "use strict";

    var wall = new Masonry(document.getElementById('masonry'), {
        columnWidth: 240
    });
    addTitle();
    addLink();
};


jQuery(document).ready(function($){

    

    "use strict";

    $ = jQuery;

    $('.tagcloud a').wrap('<span class="label" />').prepend('<i class="icon-tag icon-white opacity"></i>');

    $('ul.sub-menu').parent('li').children('span').before('<b class="caret"></b>');

    $(function () {

        $('.header-search input[type=text]').click(function () {
            $(".header-search").addClass("big");
            return false;
        });
        $('.header-search input[type=text]').blur(function () {
            $(".header-search").removeClass("big");
            return false;
        });

        $(function () {
            $('.slides').slidesjs({
                width: 1170,
                play: {
                    active: true,
                    auto: true,
                    interval: 6000,
                    swap: true
                }
            });
        });

        $('#masonry div, .thumbnails li').mouseover(function () {
            $(this).siblings().css({
                opacity: 0.35
            });
        }).mouseout(function () {
                $(this).siblings().css({
                    opacity: 1
                });
            });

    });

    $('.fancybox').fancybox();

    $('.tooltip-hover').tooltip('hide');

    $('.popover-hover').popover('hide');

    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() !== 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
        $('#toTop').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 1000);
        });
    });

    var navId = $('.navbar').attr('id');
    if( navId === 'nav-follow' )
    {
        $(function () {
            var stickyHeaderTop = $('#nav-follow').offset().top;
            $(window).scroll(function () {
                if ($(window).scrollTop() > stickyHeaderTop) {
                    $('#nav-follow').addClass('nav-follow-fixed');
                } else {
                    $('#nav-follow').removeClass('nav-follow-fixed');
                }
            });
        });
    }

    $('#filter button').click(function () {
        $(this).css('outline', 'none');
        $('#filter .current').removeClass('current');
        $(this).parent().addClass('current');
        var filterVal = $(this).text().toLowerCase().replace(' ', '-');
        if (filterVal === 'all') {
            $('#portfolio li.hidden').fadeIn('slow').removeClass('hidden');
        } else {
            $('#portfolio li').each(function () {
                if (!$(this).hasClass(filterVal)) {
                    $(this).fadeOut('normal').addClass('hidden');
                } else {
                    $(this).fadeIn('slow').removeClass('hidden');
                }
            });
        }
        return false;
    });

    var map;
    var lat = $('#map-canvas').data('lat');
    var lng = $('#map-canvas').data('lng');
    function initialize() {
        var mapOptions = {
            zoom: 15,
            center: new google.maps.LatLng(lat, lng),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
    }
    google.maps.event.addDomListener(window, 'load', initialize);


});


    function addTitle () {
        $('#menu-menu a').each(function (i, el) {
            var val = $(this).attr('title');

            if (val !== undefined) {
                console.log('a');

                $(this).removeAttr('title')
                       .siblings('span').text(val)
                       .css('width','100%')
            }
        });
    }

    function addLink () {
        $('a.btn-primary, .btn').each(function (i, el) {
            var val = $(this).text();

            if (val == 'Profile') {
                 $(this).text('Профиль');
            }
            else if (val == "View"){
                 $(this).text('Просмотреть');
            }
        });
    }


