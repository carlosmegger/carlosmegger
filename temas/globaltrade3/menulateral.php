<?php
/*
Template Name: menulateral
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
<link href="<?php bloginfo('stylesheet_directory'); ?>/menu.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/menurodape.css" rel="stylesheet" type="text/css" media="all" />
<link rel="SHORTCUT ICON" href="<? bloginfo('stylesheet_directory')?>/favicon.ico" />
</head>


<body>
	<div class="sombra">
	<div class="geral"> <!--inicio geral-->
	<?php get_header();?><!--topo-->
    	<div class="width4">
            		<div class="width1 first column">
                 		 <ul id="menubv">
								<?php
                                if(is_page(array(7,150,141,144,177,139,147))){
                                    wp_list_pages("title_li=&child_of=7&depth=1");
                                }
                                else if(is_page(array(8,157,159,161,163,165,168,407,414))){
                                    wp_list_pages("title_li=&child_of=8&depth=1");
                                }
                                ?>
                          </ul>
            		</div><!--final da div width1-->
    		<div class="width3 column"><!--width3 first column-->
							  <?php if (have_posts()) : ?>
              				 		 <?php while (have_posts()) : the_post(); ?>
                					 <h2><?php the_title(); ?></h2>
                        			<?php the_content(); ?>
                					<?php endwhile; ?>
									<?php else : ?>
                			<h3 class="center"><?php _e('Not Found', 'kubrick'); ?></h3>
               				 <p class="center"><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'kubrick'); ?></p>
               					 <?php get_search_form(); ?>
            				<?php endif; ?>
            </div><!--final da div width3 first column-->
       		 <hr class="clear" />
   	 </div><!--final da div width4-->
		<?php get_footer();?>
    </div><!--geral-->
    </div><!--sombra-->
 
 
 
 
        
</body>
</html>
