<?php get_header(); ?>
            <div id="destaque"><!--destaque-->
                       <h1><?php the_title(); ?></h1>	
                        <?php while (have_posts()) : the_post(); ?>
                           	  <div class="post"<?php post_class(); ?> id="post-<?php the_ID(); ?>"><!--conteudo-->	
                                	<?php the_content(); ?>
                              </div><!--conteudo-->
                        <?php endwhile; ?>  
           </div><!--destaque-->
            <hr class="clear" />
            <ul class="submenu submenu-upward"><!--submenu-->
            	<?php wp_list_pages("title_li=&child_of=5"); ?>
            </ul><!--submenu-->
            <hr class="clear" />
            <?php get_footer(); ?>
