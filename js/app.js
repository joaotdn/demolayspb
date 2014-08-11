// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

/*
  Configuração geral para chamadas AJAX
 */
$.ajaxSetup({
    url : getData.ajaxDir,
    type : 'GET',
    dataType : 'html',
    error: function(e) {
      alert('Error: ' + e.statusText);
    }
});

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
	if($(this).hasClass('icon-list-grey')) {
		$(this).removeClass('icon-list-grey')
		.addClass('icon-list-red');
	}

	if(listPost.hasClass('large-block-grid-2 medium-block-grid-2')) {
		listPost.removeClass('large-block-grid-2 medium-block-grid-2')
		.addClass('large-block-grid-1 medium-block-grid-1');
	}
});

$('a.grid-cat').on('click', function(e) {
	$('a.list-cat').removeClass('icon-list-red').addClass('icon-list-grey');

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

//clonar menu principal em menu mobile
$( ".main-menu li" ).clone().appendTo( "#menu-mobile" );

//Requisitar vídeo
$('a[data-reveal-id="video-modal"]').on('click touchstart',function() {
	var postid = $(this).data('postid');

	$.ajax({
    	data: {
      		action: 'DM_request_videos_home',
      		postid: postid
    	},
    	beforeSend: function() {
      		$('.ajax-loader').show();
      		$('.flex-video').hide();
      		console.log(postid);
    	},
    	complete: function() {
      		$('.ajax-loader').hide(100,function() {
        		$('.flex-video').fadeIn('fast');
      		});
    	},
    	success: function(data) {
      		$('.flex-video').html(data);
    	}
  	});
});

//Apaga o video ao fechar modal
$(document).on('closed.fndtn.reveal', '[data-reveal]', function () {
  $('iframe, object','.flex-video').remove();
});

