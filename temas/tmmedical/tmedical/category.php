<?php get_header(); ?>
        <div id="width4"><!--width4-->
                <h2><?php printf( __('%s'), '' . single_cat_title( '', false ) . '' ); ?></h2>	
					<!--submenu--><? get_sidebar(); ?><!--submenu-->
                <div id="content"><!--content-->
                            <div class="storycontent"> <!--inicio codigo-->
                            <?php if (have_posts()) : ?>
                               <?php while (have_posts()) : the_post(); ?>							
                                <div class="posthome" id="post-<?php the_ID(); ?>"><!--post -->
                                <span class="style2"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></span>
                                        </div> <!--post -->
                                        <?php endwhile; ?>
                                        <div class="navigation">
                                            <div align="left"><!--left -->
                                            <?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; ?>
                                            </div><!--left -->
                                        </div><!--navigation-->                         
                                    <?php endif; ?>
                        	</div><!--fim codigo-->         
     
                </div><!--content-->   	
			       <hr class="clearhidden"/>            
  		</div><!--width4-->
       <hr class="clearhidden"/>  
</div><!--geral-->
<?php get_footer(); ?>
