// $('.scroll-selector ul li').click(function (e) {
//     e.preventDefault();
//     if ($('.scroll-selector ul li a').hasClass('baka')) {
//         $('.scroll-selector ul li a').removeClass('baka');
//     }
//     $('a', this).addClass('baka');
// });

//Определение текущей страницы и добавление класса
$(document).ready(function () {
    var phref = window.location.href;
    $('.filter-selector_row a').each(function () {
        if ($(this).attr('href') == phref) {
            $(this).parent().addClass('kuree');
        }
    });
    $('.nav-item a').each(function () {
        if ($(this).attr('href') == phref) {
            $(this).addClass('kuree');
        }
    });
});

//Дроплаун меню для меню
$('#header a.username').click(function (e) {
    e.preventDefault();
    if (!$('#header .dropdown').hasClass('visible')) {
        $('#header .dropdown').addClass('visible');
    } else {
        $('#header .dropdown').removeClass('visible');
    }
});
//Дроплаун меню для меню на мобилке
$('#mobile_header-menu a.menu').click(function (e) {
    e.preventDefault();
    if (!$(' .dropdown').hasClass('visible')) {
        $(' .dropdown').addClass('visible');
    } else {
        $(' .dropdown').removeClass('visible');
    }
});


//Переключение классов на доставке, оплате
$('.infoblock .block-auto').click(function (e) {
    e.preventDefault();
    let t = $(this), id = t.attr('data-id');
    if (!id) return;
    $('.block-auto, .infoblock-info').removeClass('mitsuketa');
    $('.infoblock-info[data-id=' + id + '], .infoblock .block-auto[data-id=' + id + ']').addClass('mitsuketa');
});
$('.blockOfChoose .block-fixed').click(function (e) {
    e.preventDefault();
    let t = $(this), id = t.attr('data-id');
    if (!id) return;
    $('.block-auto, .infoblock-info').removeClass('mitsuketa');
    $('.block-auto[data-id=baka], .infoblock-info[data-id=baka]').addClass('mitsuketa');
    $('.block-fixed, .infoblock').removeClass('mitsuketa');
    $('.infoblock[data-id=' + id + '], .blockOfChoose .block-fixed[data-id=' + id + ']').addClass('mitsuketa');
});


//Скрытие родительского элемента по клику
$('#modular a:first-child').click(function (e) {
    e.preventDefault();
    $('.cart_item-added').fadeOut('fast', function () {
        $('#modular').remove();
    });
});
//Скрытие родительского элемента через 5 сек
setTimeout(
    function () {
        $('.cart_item-added').fadeOut('fast', function () {
            $('#modular').remove();
        });
    }, 5000);



//Переключение между картинками
$('.scroll-selector li').mouseenter(function (e) {
    e.preventDefault();
    let t = $(this), id = t.attr('data-id');
    if ($('.scroll-selector ul li a').hasClass('baka')) {
        $('.scroll-selector ul li a').removeClass('baka');
    }
    $('a', this).addClass('baka');
    if ($('.showroom .img img').hasClass('visible')) {
        $('.showroom .img img').removeClass('visible');
    }
    $('.showroom .img img[data-id=' + id +']').addClass('visible');
});


