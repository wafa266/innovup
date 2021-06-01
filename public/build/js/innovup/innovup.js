
$('.dropdown-toggle.user-dd-toggle').click(function(){
    var elem = '.dropdown-menu.user-dd';
    if($(elem).hasClass('show')) {
        $('.dropdown-menu.user-dd').removeClass('show');
    } else {
        $('.dropdown-menu.user-dd').addClass('show');
    }
});

$('.dropdown-toggle.notification-dd-toggle').click(function(){
    if($('.dropdown-menu.notification-dd').hasClass('show')) {
        $('.dropdown-menu.notification-dd').removeClass('show');
    } else {
        $('.dropdown-menu.notification-dd').addClass('show');
    }
});

$('.collapsed').click(function(){
    if($('.in').hasClass('show')) {
        $('.in').removeClass('show');
    } else {
        $('.in').addClass('show');
    }
});

$('#Product_BeneficeMargin').focusout(function(){
    $('#Product_priceExcludingTax').val('');
    var marge = parseFloat($('#Product_BeneficeMargin').val());
    var prix =  parseFloat($('#Product_price').val());
    var value = (marge * prix) + prix ;
    $('#Product_priceExcludingTax').val(value);
});
$('#Product_tva').change(function(){
    $('#Product_priceTtc').val('');
    var tva = parseFloat($('#Product_tva').val());
    var priceExcludingTax = parseFloat($('#Product_priceExcludingTax').val());
    var priceTtc = (tva * priceExcludingTax) + priceExcludingTax;
    $('#Product_priceTtc').val(priceTtc);
});
jQuery(document).ready( function($) {
    jQuery.ajax({
        method: "GET",
        url: "/monthCustomerOrders"
    })
        .done(function( response ) {
            var data = {
                labels: ['Janv', 'Fév', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Spet', 'Oct', 'Nov', 'Déc'],
                series: [
                    [5, 4, 3, 7, 5, 10, 20, 30]
                ]
            };
            var options = {
                seriesBarDistance: 10
            };
            var responsiveOptions = [
                [
                    'screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function (value) {
                            return value[0];
                        }
                    }
                }
                ]
            ];
            new Chartist.Bar('.ct-chart', data, options);
        })


    })

jQuery(window).on( 'load', function(){

    var swiper = new Swiper('.swiper-scroller', {
        slidesPerView: 'auto',
        spaceBetween: 50,
        freeMode: true,
        grabCursor: true,
        navigation: {
            nextEl: '.slider-arrow-right-1',
            prevEl: '.slider-arrow-left-1',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        mousewheel: true,
        breakpoints: {
            768: {
                spaceBetween: 20,
            },
            576: {
                spaceBetween: 15,
            }
        }
    });
});

jQuery(document).ready( function($){
    function modeSwitcher( elementCheck, elementParent ) {
        if( elementCheck.filter(':checked').length > 0 ) {
            elementParent.addClass('dark');
            alert('je suis là');
            $('.mode-switcher').toggleClass('pts-switch-active');
        } else {
            elementParent.removeClass('dark');
            $('.mode-switcher').toggleClass('pts-switch-active', false);
        }
    }

    $('.pts-switcher').each( function(){
        var element = $(this),
            elementCheck = element.find(':checkbox'),
            elementParent = $('body');

        modeSwitcher( elementCheck, elementParent );

        elementCheck.on( 'change', function(){
            modeSwitcher( elementCheck, elementParent );
        });
    });
});

