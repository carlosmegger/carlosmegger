<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ambientec</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="all" />
<script src="<? bloginfo('stylesheet_directory')?>/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
  <div id="lo"></div>
	<div id="conteudo"><!--conteudo-->
		<div class="topo"><!--topo1-->
		  <a href="http://blog.ambientec.com/"><img src="<? bloginfo('stylesheet_directory');?>/imgs/topo_01.gif" border="0" /></a><img src="<? bloginfo('stylesheet_directory');?>/imgs/topo_02.gif" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="30,22,101,43" href="http://www.twitter.com.br/ambienteconline" />
</map>
		  <hr class="clearhidden"/>
		</div><!--topo1-->
	<div class="topo"><!--topo2-->
  		<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','996','height','124','src','<? bloginfo('stylesheet_directory');?>/imgs/banner_home','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','<? bloginfo('stylesheet_directory');?>/imgs/banner_home' ); //end AC code
		</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="996" height="124">
  	  <param name="movie" value="<? bloginfo('stylesheet_directory');?>/imgs/banner_home.swf" />
  	  <param name="quality" value="high" />
  	  <embed src="<? bloginfo('stylesheet_directory');?>/imgs/banner_home.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="996" height="124"></embed>
  			</object>
            </noscript>
            <hr class="clearhidden" />
	</div><!--topo2-->
    <div><!--conteudo da postagem-->
	<div class="width2 first column"><!--width2-->
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>"> 
                 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                 
				<h2 class="storytitle"><!--storytitle-->
            	 <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
             	</h2><!--storytitle-->
                
					<div class="style3"><?php the_date(); ?></div>
                
		<div class="storycontent"><!--storycontent-->
		<?php the_content(__('(more...)')); ?>
	</div><!--storycontent-->

	<div class="feedback"><!--feedback-->
		Publicado por: <span class="style1"><?php the_author() ?></span>
		<?php wp_link_pages(); ?>
		<?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?>
	</div><!--feedback-->
    
    <?php comments_template(); // Get wp-comments.php template ?>
<?php endwhile; else: ?>
<hr class="clearhidden" />
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</div><!--primeira abaixo da width2-->
    </div><!--width2 final-->
    
	<div class="width1 column"><!--width1-->
			<ul id="menubv">
				<li><h4><?php _e('Arquivos', 'kubrick'); ?></h4>
				<?php wp_get_archives('type=monthly'); ?>
				</li>
			</ul>
                        <p align="right"><a href="http://www.twitter.com/ambienteconline">
                          <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','213','height','80','src','<? bloginfo('stylesheet_directory');?>/imgs/banner_webauditor_home','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','<? bloginfo('stylesheet_directory');?>/imgs/banner_webauditor_home' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="213" height="80">
                            <param name="movie" value="<? bloginfo('stylesheet_directory');?>/imgs/banner_webauditor_home.swf" />
                            <param name="quality" value="high" />
                            <embed src="<? bloginfo('stylesheet_directory');?>/imgs/banner_webauditor_home.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="213" height="80"></embed>
                          </object></noscript>
      </a></p>
      <p align="right"><a href="http://www.ambientec.com"><img src="<? bloginfo('stylesheet_directory');?>/imgs/banner_site.jpg" border="0" /></a></p>
            
    </div><!--width1 final-->
    <hr class="clearhidden" />
    
    </div><!--conteudo da postagem-->
    <div id="rodape"><!--rodape--> 
    2010 Copyright Ambientec - Todos os direitos reservados
    </div><!--fim do rodape-->
</div><!-- fim do conteudo-->
</body>
</html>
