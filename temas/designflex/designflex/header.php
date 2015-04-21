<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php bloginfo('name'); ?> <?php wp_title('--'); ?></title>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/menu.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/submenu.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="SHORTCUT ICON" href="<? bloginfo('stylesheet_directory')?>/favicon.png" />
<?php wp_head (); ?>
</head>
<body>
<div id="geral"><!-- geral-->
	<div id="conteudo"><!--conteudo-->
       	 <div id="header">
           	 <div id="logo"><a href="http://www.designflex.com.br"><img src="<? bloginfo('stylesheet_directory')?>/imgs/logo.png" border="0" /></a></div>
             <div id="redessociais"> <a href="http://www.facebook.com"><img src="<? bloginfo('stylesheet_directory')?>/imgs/facebook.png" width="24" height="24" border="0" /></a>&nbsp;
             <a href="http://www.orkut.com"><img src="<? bloginfo('stylesheet_directory')?>/imgs/orkut.png" width="24" height="24" border="0" /></a>&nbsp;
             <a href="http://www.twitter.com"><img src="<? bloginfo('stylesheet_directory')?>/imgs/twitter.png" width="24" height="24" border="0" /></a>
             </div>
     	 </div><!--header-->
		 <hr class="clear" />
        <!--menu-->
   		 <div id="menuinc"><img src="<? bloginfo('stylesheet_directory')?>/imgs/menu_inc.png" width="8" height="36" /></div>
         <ul class="dropdown">
            <?php wp_list_pages('sort_column=menu_order&title_li=&depth=3 &exclude=' ); ?>
         </ul><div id="floatleft"><img src="<? bloginfo('stylesheet_directory')?>/imgs/menu_end.png" /></div>          
       <!--menu-->