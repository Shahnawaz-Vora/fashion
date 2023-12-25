//best_selling
function hover_heart(element) {
    element.setAttribute('src', 'img/heart-hover.png');
}

function unhover_heart(element) {
    element.setAttribute('src', 'img/heart.png');
}

function clk_heart(element){
    element.setAttribute('src','img/heart-click.png');
}

//scroll
$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('#back-to-top').fadeIn();
    } else {
        $('#back-to-top').fadeOut();
    }
});
// scroll body to 0px on click
$('#back-to-top').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 400);
    return false;
});
