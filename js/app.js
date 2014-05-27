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
if($('.sidebar-news').length) {
	cloneContent('.sidebar-news','.hide-sidebar');
}
cloneContent('.list-services','.hide-sidebar');
cloneContent('.vote-section','.hide-sidebar');
