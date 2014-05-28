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

//Escolher grade ou lista na pagina de categorias
var listPost = $('ul','.list-posts');

$('a.list-cat').on('click', function(e) {
	$('a.grid-cat').removeClass('icon-grid-red').addClass('icon-grid');

	e.preventDefault();
	if($(this).hasClass('icon-list')) {
		$(this).removeClass('icon-list')
		.addClass('icon-list-red');
	}

	if(listPost.hasClass('large-block-grid-2 medium-block-grid-2')) {
		listPost.removeClass('large-block-grid-2 medium-block-grid-2')
		.addClass('large-block-grid-1 medium-block-grid-1');
	}
});

$('a.grid-cat').on('click', function(e) {
	$('a.list-cat').removeClass('icon-list-red').addClass('icon-list');

	e.preventDefault();
	if($(this).hasClass('icon-grid')) {
		$(this).removeClass('icon-grid')
		.addClass('icon-grid-red');
	}

	if(listPost.hasClass('large-block-grid-1 medium-block-grid-1')) {
		listPost.removeClass('large-block-grid-1 medium-block-grid-1')
		.addClass('large-block-grid-2 medium-block-grid-2');
	}
});
