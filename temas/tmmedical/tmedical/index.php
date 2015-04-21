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
  		</div><!--width4-->
       <hr class="clearhidden"/>  
</div><!--geral-->
<?php get_footer(); ?>
