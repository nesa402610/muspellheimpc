$('.scroll-selector ul li').click(function (e) {
    e.preventDefault();
    if ($('.scroll-selector ul li a').hasClass('baka')) {
        $('.scroll-selector ul li a').removeClass('baka');
    }
    $('a', this).addClass('baka');
});

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

$('#header a.username').click(function (e) {
    e.preventDefault();
    if (!$('#header .dropdown').hasClass('visible')) {
        $('#header .dropdown').addClass('visible');
    } else {
        $('#header .dropdown').removeClass('visible');
    }
});

$('#mobile_header-menu a.menu').click(function (e) {
    e.preventDefault();
    if (!$(' .dropdown').hasClass('visible')) {
        $(' .dropdown').addClass('visible');
    } else {
        $(' .dropdown').removeClass('visible');
    }
});



$('.infoblock .block-auto').click(function (e) {
    e.preventDefault();
    let t = $(this), id = t.attr('data-id');
    if (!id) return;
    $('.block-auto, .infoblock-info').removeClass('mitsuketa');
    $('.infoblock-info[data-id=' + id +'], .infoblock .block-auto[data-id=' + id +']').addClass('mitsuketa');
});
$('.blockOfChoose .block-fixed').click(function (e) {
    e.preventDefault();
    let t = $(this), id = t.attr('data-id');
    if (!id) return;
    $('.block-auto, .infoblock-info').removeClass('mitsuketa');
    $('.block-auto[data-id=baka], .infoblock-info[data-id=baka]').addClass('mitsuketa');
    $('.block-fixed, .infoblock').removeClass('mitsuketa');
    $('.infoblock[data-id=' + id +'], .blockOfChoose .block-fixed[data-id=' + id +']').addClass('mitsuketa');
});


