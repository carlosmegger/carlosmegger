<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? bloginfo('nome');?></title>
<link href="style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="all" />
<link href="menurodape.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/menu.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/menurodape.css" rel="stylesheet" type="text/css" media="all" />
<link rel="SHORTCUT ICON" href="<? bloginfo('stylesheet_directory')?>/favicon.ico" />
</head>


<body><div class="sombra">
	<div class="geral">
    <?php get_header();?><!--topo-->
    	<div class="width4">
    		<div class="width3 first column"><!--width3 first column-->
               		 <div <?php post_class() ?> id="post-<?php the_ID(); ?>"> 
                                 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                 
                                <h2 class="storytitle"><!--storytitle-->
                                 <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                                </h2><!--storytitle-->
                                    <div class="style3"><?php the_date(); ?></div>
                                             
                      		  <div class="storycontent"><!--storycontent-->
                        			<?php the_excerpt(__('(more...)')); ?>
                                    <div align="left">
                                    <em><a href="<?php the_permalink(); ?>" rel="bookmark" title="leia mais">Leia mais...</a></em><br />
                        			<br />
                                    </div>
                   			 </div><!--storycontent-->
                             
                   			 <div class="feedback"><!--feedback-->
                        		<em>Publicado por: </em> <span class="style1"><?php the_author() ?></span>
                       		 <?php wp_link_pages(); ?>
                        	<?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?>
                   			 </div>
                   			 <!--feedback--><br />
                  			  <?php comments_template(); // Get wp-comments.php template ?>
             			   <?php endwhile; else: ?>
              			  <hr class="clearpost" />
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
				</div><!--div codigo post class-->
            </div><!--final da div width3 first column-->
    		<div class="width1">
                   <?php get_sidebar();?>
            </div><!--final da div width1-->
       		 <hr class="clear" />
   	 </div><!--final da div width4-->
		<?php get_footer();?>
    </div><!--fechamento geral-->
    </div><!--fechamento da sombra-->
 
 
 
 
        
</body>
</html>
