<?php
/*
Template Name: clientes
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? bloginfo('nome');?></title>
<link href="style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="all" />
<link href="menurodape.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/menurodape.css" rel="stylesheet" type="text/css" media="all" />
<link rel="SHORTCUT ICON" href="<? bloginfo('stylesheet_directory')?>/favicon.ico" />
<script src="<? bloginfo('stylesheet_directory')?>/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>


<body>
	<div  class="sombra">
	<div class="geral"><!--começo da pagina-->
	<?php get_header();?><!--topo-->
    	<div class="width4">
    		<div class="width2 first column"><!--width2 first column-->
				<h2><?php the_title(); ?></h2>
				  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','424','height','377','src','<? bloginfo('stylesheet_directory')?>/imgs/clientes','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','<? bloginfo('stylesheet_directory')?>/imgs/clientes' ); //end AC code
  </script>
				  <noscript>
			      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="424" height="377">
                      <param name="movie" value="<? bloginfo('stylesheet_directory')?>/imgs/clientes.swf" />
                      <param name="quality" value="high" />
                      <embed src="<? bloginfo('stylesheet_directory')?>/imgs/clientes.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="424" height="377"></embed>
				      </object>
			      </noscript>
			  </h2>
   		  </div><!--width2 first column-->
    		<div class="width2">
            <img src="<? bloginfo('stylesheet_directory')?>/imgs/Baseline_05.gif" />
            </div>
   		  <hr class="clear" />
   	 </div>
     <?php get_footer();?>
    </div><!--fechamento do começo da pagina-->
    </div>
 
 
 
 
        
</body>
</html>
