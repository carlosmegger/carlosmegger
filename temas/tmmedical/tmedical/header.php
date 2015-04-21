<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php bloginfo('name'); ?> <?php wp_title('--'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/menu_style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="SHORTCUT ICON" href="<? bloginfo('stylesheet_directory')?>/favicon.png" />
<script src="<? bloginfo('stylesheet_directory')?>/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<?php wp_head(); ?>
<!--Início Código do Google Analytics-->
<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	var pageTracker = _gat._getTracker("UA-3865516-1");
	pageTracker._initData();
	pageTracker._trackPageview();
</script>
<!--Final Código do Google Analytics-->
</head>
<body>
<div id="geral"><!--geral-->
  		<div id="topo"><!--topo--><img src="<? bloginfo('stylesheet_directory')?>/images/topo.jpg" /></div><!--topo-->
        			<ul id='menu'><!--menu-->
                  		<?php 
							$class_home = ' class="button"'; 
							if(is_home()){
							$class_home = ' class="current"';
							}
						?>
                        <li class="button"><a href="<?php bloginfo('home');?>" title="home"<?=$class_home;?>>Home</a></li>
                        <li class="button"><a href='http://www.tmmedical.com.br/agendamento/novo'>Agendamento</a></li>
                        <li class="button"><a href='http://www.tmmedical.com.br/empresa/'>Institucional</a></li>
                        <li class="button"><a href='http://www.tmmedical.com.br/produtos/'>Produtos</a></li>
                        <li class="button"><a href='http://www.tmmedical.com.br/educacao-continuada/eventos/'>Educação Continuada</a></li>
                        <?php wp_list_pages('sort_column=menu_order&title_li=&depth=1&exclude=7,55,32,34,296' ); ?>
					</ul><!--menu-->
                    <div id="newsletter"><a href="http://www.tmmedical.com.br/newsletter/"><img src="<? bloginfo('stylesheet_directory')?>/images/emailmkt.png" border="0" /></a></div>