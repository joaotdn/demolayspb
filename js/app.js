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

//Clonar blocos em outros blocos
function cloneContent(from,inner) {
    $( from ).clone().appendTo( inner );
};

cloneContent('.vote-section','.hide-sidebar');
