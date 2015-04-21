<?php
/*
Template Name: home
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="all" />
<link href="menu.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/menu.css" rel="stylesheet" type="text/css" media="all" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="<? bloginfo('stylesheet_directory')?>/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link rel="SHORTCUT ICON" href="<? bloginfo('stylesheet_directory')?>/favicon.ico" />
<script type="text/javascript"> <!--funcao para fechar a janela pop up!-->
function remove_pop(obj){
        objP = obj.parentNode;
        objP.parentNode.removeChild(objP);
}
<!--funcao para fechar a janela pop up!-->

function horizontal(){ // Função para organizar o menu
   var navItems = document.getElementById('nav').getElementsByTagName('li');
   for (var i=0; i< navItems.length; i++) {
	 if(navItems[i].getElementsByTagName('ul')[0] != null)
	 {
		navItems[i].onmouseover=function() {this.getElementsByTagName('ul')[0].style.display="block"; }
		navItems[i].onmouseout=function() {this.getElementsByTagName('ul')[0].style.display="none"; }
	 }
   }
}
window.onload=horizontal;
// Função para organizar o menu
</script>
<script type="text/javascript"><!--GOOGLE ANALYTICS-->

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3721520-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script><!--GOOGLE ANALYTICS-->
</head>

<body>
<div id="geral">
    <?php get_header();?><!--topo-->
    <div id="corpo"><!--inicio div corpo-->
	 			 <div class="width1"><!-- inicio div width1-->
                 <?php get_sidebar();?>
	  </div><!-- final div width1-->
                 <div class="width3"><!-- inicio div width3-->
               	   <div class="width2"><!--width2-->
                   	   <div class="stylehome">Noticias</div>
                        <div> <!--inicio codigo-->
                         <?php # 1 - Loop de noticias  ------------------------------------------------------------- ?>
                   		 <?php $my_query = new WP_Query('category_name=noticias&showposts=4');
                            while ($my_query->have_posts()) : $my_query->the_post();
                            $do_not_duplicate2 = $post->ID; ?> <!-- IMPORTANTE -->
 							
                            <div class="noticia" id="post-<?php the_ID(); ?>">
                            <div class="thumb"><?php the_post_thumbnail(); ?></div>
                              <div class="texto"><!-- titulo, data e texto-->
                             	 <span class="style2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span><br />
                                <span class="style3"><em><?php the_date('',''); ?></em></span>
							<?php the_excerpt(); ?>
                            <div>
                              <div class="style3" align="right"><em><a href="<?php the_permalink(); ?>" rel="bookmark" title="leia mais">Leia mais...</a></em></div>
                            </div>
                   			  </div><!-- texto-->
                                
                                
                              <div class="dataside"  id="post_data-<?php the_ID(); ?>">                              </div>
          </div> <!-- contentbox -->
                <?php endwhile; ?>
                     </div><!--fim codigo-->
                        <hr class="clearhidden" />
                            
          <div align="left"><span class="style2"><a href="http://www.colegiomodelopr.com.br/categoria/noticias/"> >>Clique aqui para ler as noticias anteriores</a></span></div>
                   </div>
   	            <!--width2-->
                 	<div class="width1direita"><!--inicio direita-->
                    	<?php get_sidebar('2');?>
                 	</div><!--fim direita-->
      </div><!--fim width3-->   
	  </div><!--final da div corpo-->
  <hr class="clearhidden" />
		<?php get_footer();?><!--rodape-->
        </div><!--geral-->
 <?php  //if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('pop') ) : ?>
<?php  //endif; ?>
</body>
</html>