// JavaScript Document

jQuery(document).ready(function() {
								
	//HOME [START]
	
	//Banner slider
	jQuery('#banner-slider').carouFredSel({
		infinite: true,
		scroll: 1,
		items: 1,
		pagination: "#banner-slider-control",
		auto: true
	});
	
	jQuery('.banner-slider-mask').css( "opacity" , 0.5  ); 
	
	//No-margin
	jQuery('.posts-destaques-small li:last, .posts-mais-lidos dd li:last, .fotos-thumbs li:last, .posts-relacionados dd li:last, dl.dica-cardapio li:last').addClass("no-margin");
	
	//No-float
	jQuery('.posts-destaques-small li:last, .posts-mais-lidos dd li:last, .fotos-thumbs li:last').addClass("no-margin");
	
	
	//Últimas notícias
	jQuery('#ultimas-noticias').cycle({
		fx: 'scrollHorz',
		prev: '#prev-control',
		next: '#next-control',
		timeout: 4000
	});
	
	//Curiosidades Londres
	jQuery('#curiosidades-londres').cycle({
		fx: 'scrollHorz',
		prev: '#prev-curiosidade',
		next: '#next-curiosidade',
		timeout: 4000
	});
	
	// Fotos e vídeos pela cidade
	jQuery('#fotos-videos-cidade ul.videos-thumbs a, #fotos-videos-cidade ul.fotos-thumbs a').bind('click', function(){
		var $this = jQuery(this);
		
		jQuery.ajax({
			url: 	jQuery('input[name=theme_url]').val() + '/_theme/json.php?action=get-post-midia',
			type: 	'POST',
			data: 	'post='+$this.attr('rel'),
			dataType:'json',
			success:function(data){
				var $container = $this.closest('dd').find('.destaque');
				
				
				$container.find('h5 a').html(data.titulo);
				$container.find('h5 a').attr('href', data.link);
				$container.find('p').html(data.texto);
				
				if(data.tipo == 'video'){
					$container.find('img').hide();
					$container.find('iframe').attr('src', data.midia).show();
				} else {
					$container.find('iframe').hide();
					$container.find('img').attr('src', data.midia).show();
				}
			}
		});
		
		return false;
	});
	
	//HOME [END]
	
	//Clear html form
	jQuery('form#commentform').append('<div class="clear"></div>');	
	
	//FOOTER
	jQuery('#footer li:last').css('margin-right', 0);
	
	//Ajuste Altura
	jQuery('.posts-destaques-small li').adjustHeight();
	jQuery('dl.agenda-cultural, dl.videos-fotos, dl.dica-cardapio, dl.curiosidades-londres').adjustHeight();
	
	
});


// Adiciona aos Favoritos
function addFav(){

	var url      = window.location.href;
	var title    = window.document.title;

    if (window.sidebar) window.sidebar.addPanel(title, url,"");
    else if(window.opera && window.print){
        var mbm = document.createElement('a');
        mbm.setAttribute('rel','sidebar');
        mbm.setAttribute('href',url);
        mbm.setAttribute('title',title);
        mbm.click();
    }
    else if(document.all){window.external.AddFavorite(url, title);}
	else {
    	alert('Pressione CTRL + D para adicionar aos Favoritos');
    }
}

//Ajuste Altura
jQuery.fn.extend({
    adjustHeight: function(){
        var element = jQuery(this);
        var finalHeight = 0;
        jQuery.each(element,function(i,compare){
            if(jQuery(compare).height() > finalHeight){
                finalHeight = jQuery(compare).height();
            }
        });
        jQuery.each(element,function(i,change){
            jQuery(change).height(finalHeight);
        });
    return jQuery(this);
    }
});

function share_popup(url){
	window.open(url, 'popup', 'width=845, height=465');	
}