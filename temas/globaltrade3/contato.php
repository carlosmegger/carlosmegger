<?php
/*
Template Name: contato
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
</head>


<body>
<div class="sombra">
	<div class="geral"><!--começo da pagina-->
	<?php get_header();?><!--topo-->
    	<div class="width4">
    		<div class="width4b"><!--width2 first column-->
            		  <?php if (have_posts()) : ?>
		  				<?php while (have_posts()) : the_post(); ?>
		 			 <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<h2><?php the_title(); ?></h2>			
    				  <div class="entry">
					<?php the_content(); ?>
					</div>
		  			</div>

					<?php endwhile; ?>      
				<?php else : ?>

		<h2 class="center"><?php _e('Not Found', 'kubrick'); ?></h2>
		<p class="center"><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'kubrick'); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
            </div><!--width4 first column-->
            <hr class="clear" />
   	 </div>
		<?php get_footer();?>
    	</div><!-- geral-->
    </div><!--sombra-->
 
 
 
 
        
</body>
</html>
