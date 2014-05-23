// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();


//Carrossel ultimas noticias
$(".last-news").jCarouselLite({
    btnNext: ".next-news",
    btnPrev: ".prev-news",
    vertical: true,
    visible: 2,
    auto: 8000
});