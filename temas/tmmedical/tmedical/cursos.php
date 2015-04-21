<?php
/*
Template Name: Cursos
*/
?>
<?php get_header(); ?>
        <div id="width4"><!--width4-->
                <h2><?php the_title(); ?></h2>	
				<? get_sidebar(); ?><!--submenu-->
                 <div id="content"><!--content-->
                      <?php while (have_posts()) : the_post(); ?>
                       <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">		
                          <?php the_content(); ?>
                        </div>
                      <?php endwhile; ?>      
                </div><!--content-->   	
			       <hr class="clearhidden"/>
                <div id="content"><!--content-->
					<?php # 1 - Loop de cursos ------?>
                    <?php if (have_posts()) : ?>
						<?php 
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$temp = $wp_query;
							$wp_query= null;
							$wp_query = new WP_Query();
							$wp_query->query('showposts=15'.'&paged='.$paged.'&category_name=eventos'); 
							while ($wp_query->have_posts()) : $wp_query->the_post(); 
						?> <!-- IMPORTANTE -->
                            <div class="posthome" id="post-<?php the_ID(); ?>">
                            	<span class="style2"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                            </div>
                        <?php endwhile; ?>   
                        	<div class="navigation" align="left"><!--navigation--> 
                        <?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; ?>
                        	</div><!--navigation--> 
                    <?php endif; ?>
				</div><!--content-->   	
			       <hr class="clearhidden"/>            
  		</div><!--width4-->
       <hr class="clearhidden"/>  
</div><!--geral-->
<?php get_footer(); ?>
