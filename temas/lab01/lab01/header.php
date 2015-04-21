<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/menu.css" rel="stylesheet" type="text/css" media="all" />
<?php wp_head(); ?> <!--este codigo é o que chama o light box e jquery nas imagens-->
<title><?php bloginfo('name'); ?> <?php wp_title('--'); ?></title>
<link rel="SHORTCUT ICON" href="<? bloginfo('stylesheet_directory')?>/favicon.ico" />
</head>
<body>
	<div id="geral"><!--geral-->
 	 	<div class="topo"><!--topo-->
			<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="lab01" /></div><!--topo-->
		<!--menu-->
			<?php wp_page_menu(); ?> 
		<!--menu-->