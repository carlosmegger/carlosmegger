<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">

		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

		<title><?php bp_site_name() ?> - <?=get_bloginfo('name'); ?></title>

		<?php do_action( 'bp_head' ) ?>

		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

		<?php if ( function_exists( 'bp_sitewide_activity_feed_link' ) ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php _e('Site Wide Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_sitewide_activity_feed_link() ?>" />
		<?php endif; ?>

		<?php if ( function_exists( 'bp_member_activity_feed_link' ) && bp_is_member() ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_displayed_user_fullname() ?> | <?php _e( 'Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_member_activity_feed_link() ?>" />
		<?php endif; ?>

		<?php if ( function_exists( 'bp_group_activity_feed_link' ) && bp_is_group() ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_current_group_name() ?> | <?php _e( 'Group Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_group_activity_feed_link() ?>" />
		<?php endif; ?>

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts RSS Feed', 'buddypress' ) ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts Atom Feed', 'buddypress' ) ?>" href="<?php bloginfo('atom_url'); ?>" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_head(); ?>
	</head>

	<body>
		
		<?php do_action( 'bp_before_header' ) ?>

		<div id="header">

			<?php do_action( 'bp_header' ) ?>

		</div><!-- #header -->
        
        <?php do_action( 'bp_before_header' ) ?>
		
		<div id="topo">
			<div id="conteudo_topo" class="menu_topo">
		        <ul id="menu_topo" class="menu_topo">
                    <li><a href="http://www.portalctea.com.br/" target="_blank" title="Portal Ctea">portal</a></li>
                    <li><a href="http://comunidade.ctea.med.br/" title="Comunidade Ctea">comunidade</a></li>
                    <li><a href="http://www.ctea.med.br/agenda" target="_blank"r title="Agenda Ctea">agenda</a></li>
                    <li><a href="#" title="Em breve!">prontu&aacute;rio</a></li>
                </ul><!-- menu_topo -->
		        <?php if ( bp_search_form_enabled() ) : ?>
                <form method="post" action="<?php echo bp_search_form_action() ?>" id="search-form" name="search-form" class="menu_topo">
                    <label for="procurar">procurar</label>
                    <input type="text" class="input" value="" id="search-terms" name="search-terms"/>
                    <?php echo bp_search_form_type_select() ?>
                    
                    <input type="submit" value="<?php _e( 'Search', 'buddypress' ) ?>" name="search-submit" id="search-submit" style="cursor:pointer;"/>
                    <?php wp_nonce_field( 'bp_search_form' ) ?>
                </form>
                <?php endif; ?>
		        <?php do_action( 'bp_search_login_bar' ) ?>
                
                <a href="<?= $bp->root_domain;?>/wp-login.php?redirect_to=<?= urlencode( $bp->root_domain );?>" class="menu_topo" title="Fa&ccedil;a seu login" id="login" name="login"><?= __( 'Log In', 'buddypress' );?></a>
		    </div><!-- conteudo_topo -->
		</div><!-- topo -->
		
		<div id="expansivo">
        <div id="conteudo">
            <div id="logo"><a href="<?php echo site_url() ?>" title="<?php _e( 'Home', 'buddypress' ) ?>"></a></div><!-- logo -->
            <ul id="redes">
                <li><a href="http://www.twitter.com/cteamed" target="_blank" title="twitter"><img src="<? bloginfo('stylesheet_directory')?>/_inc/imgs/icone_twitter.jpg" alt="twitter" width="20" height="19"/></a></li>
                <li><a href="http://www.orkut.com.br/Main#Community?cmm=93523667" target="_blank" title="orkut"><img src="<? bloginfo('stylesheet_directory')?>/_inc/imgs/icone_orkut.jpg" alt="orkut" width="21" height="19"/></a></li>
                <li><a href="http://www.ctea.med.br/youtube/" title="youtube"><img src="<? bloginfo('stylesheet_directory')?>/_inc/imgs/icone_youtube.jpg" alt="youtube" width="21" height="19"/></a></li>
                <li><a href="http://www.facebook.com/pages/Centro-De-Traumatologia-Esportiva-e-Artroscopia/135081636802" target="_blank" title="facebook"><img src="<? bloginfo('stylesheet_directory')?>/_inc/imgs/icone_facebook.jpg" alt="facebook" width="21" height="19"/></a></li>
                <li style="margin:0;"><a href="<?php echo site_url(); ?>/feed" title="title="RSS Feed"><img src="<? bloginfo('stylesheet_directory')?>/_inc/imgs/icone_rss.jpg" alt="RSS" width="21" height="19"/></a></li>
            </ul><!--redes-->
            			<!-- 
            			
            				Cuidado: os endereços deste menu estão estáticos.
            				 
            				http://www.inbewebhost.com.br/ctea/
            				http://darth/ctea/projetos/comunidade2
            				
            			-->
                      <ul id="menu" class="menu">
               			 <li>
               				 <span class="menu"><a href="http://comunidade.ctea.med.br/" title="Início">Início</a></span>
                         </li>
                		<li>
							<span class="menu" ><a href="http://comunidade.ctea.med.br/activity/" title="Atividade">Atividade</a></span>
						</li>
						<li>
							<span class="menu" ><a href="http://comunidade.ctea.med.br/members/" title="Membros">Membros</a></span>
						</li>
						<li>
							<span class="menu" ><a href="http://comunidade.ctea.med.br/groups/" title="Grupos">Grupos</a></span>
						</li>
						<li>
                        	<span class="menu"><a href="http://comunidade.ctea.med.br/blogs/" title="Blogs">Blogs</a></span>
						</li>
						<li style="margin-left:0;">
                        	<span class="menu"><a href="http://www.portalctea.com.br" title="Portal Ctea">Portal</a></span>
                       </li>
            </ul><!--redes-->
		<?php do_action( 'bp_after_header' ) ?>
		<?php do_action( 'bp_before_container' ) ?>
		
		<?php do_action( 'bp_before_blog_home' ) ?>
		<div id="kbca_topo"></div>
        <div id="kbca_blog"><!-- kbca_blog -->
            
            <?php 
            	// Verifique se este é um post ou página, se ele tem uma miniatura, e se é um grande
            	if ( is_singular() && has_post_thumbnail( $post->ID ) && 
            	( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail') ) && 
            	$image[1] >= HEADER_IMAGE_WIDTH ) : 
            		// Temos uma imagem de cabeçalho novo! 
            		echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' ); 
            	else : ?>
            		<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
            <?php endif; ?>
            
                   <div id="titleblog"><!-- titleblog-->
                   		<h1 class="titulo_pagina"><?=get_bloginfo('name'); ?></h1>
                   </div><!-- titleblog-->
        </div><!-- kbca_blog -->
        <div id="kbca_rodape"></div><!-- kbca_rodape -->
        
        <ul id="sub_menu">
           
        	<li<?php if ( bp_is_front_page() ) : ?> class="li_select"<?php endif; ?>>
        		<?php if ( bp_is_front_page() ) : ?>
            		<img src="<? bloginfo('stylesheet_directory')?>/_inc/imgs/back_submenu_item_esq.png" width="7" height="24" style="float:left;"/>
            	<?php endif; ?>
                <span><a href="<?php echo site_url() ?>" title="Todos os posts">Todos os posts</a></span>
             	<?php if ( bp_is_front_page() ) : ?>
             		<img style="float:right;" src="<? bloginfo('stylesheet_directory')?>/_inc/imgs/back_submenu_item_dir.png" width="7" height="24"/>
             	<?php endif; ?>	
            </li>
            
            <?php 
            
            	wp_list_pages( 'title_li=' . bp_dtheme_page_on_front() );
            	//$paginas = wp_list_pages( 'title_li=&echo=0' . bp_dtheme_page_on_front() );
            	
            	//echo $paginas;
            	/*  &link_before=<span>&link_after=</span>
            	 *  <li class="page_item page-item-22 current_page_item"><a href="http://comunidade.ctea.med.br/redacaoctea/cultura/" title="Cultura">Cultura</a></li>
<li class="page_item page-item-2"><a href="http://comunidade.ctea.med.br/redacaoctea/sobre/" title="Sobre">Sobre</a></li>
<li><span><a href="http://comunidade.ctea.med.br/redacaoctea/cultura/" title="Cultura">Cultura</a></span></li>
            	 * 
            	 * */
            	
            	/*$paginas_ini = strpos($paginas, '<a');
			 	$page = substr($paginas, $paginas_ini);
			 	$paginas_fim = strpos($page, '</li>');
			 	$page = substr($page, 0, $paginas_fim);
			 	
			 	if (is_page("sobre")){
			 		$menu = '<li class="li_select"><img src="'.get_bloginfo('stylesheet_directory').'/_inc/imgs/back_submenu_item_esq.png" width="11" height="28" style="float:left;"/>
			 		<span>'.$page.'</span><img style="float:right;" src="'.get_bloginfo('stylesheet_directory').'/_inc/imgs/back_submenu_item_dir.png" width="11" height="28"/></li>
			 		';
			 	}else{
			 		$menu = '<li><span>'.$page.'</span></li>';
			 	}
			 	echo $menu;*/
            	
            ?>

			<?php do_action( 'bp_nav_items' ); ?>
            
            <!-- <li class="li_select">
            	<img src="<? //bloginfo('stylesheet_directory')?>/_inc/imgs/back_submenu_item_esq.png" width="7" height="24" style="float:left;"/>
                <span>Sobre</span>
             <img style="float:right;" src="<? //bloginfo('stylesheet_directory')?>/_inc/imgs/back_submenu_item_dir.png" width="7" height="24"/>
            </li> -->
            
        </ul><!-- sub_menu -->