<?php get_header(); ?>
    
	<div id="content-wrapper" class="contemfloat">
        
		<h1 class="master"><span class="sup">Blog da REDIRECT </span> <span class="inf">Full Interactive Ideas</span></h1>
    	
		<div id="content">
            
			<div id="posts">
                
				<?php while (have_posts()) : the_post(); ?>
					
					<div class="post">
						
						<div class="double-border">
							
							<div class="double-border-sub">
								
								<h2 class="post-title"><?php the_title(); ?></h2>
								
								<p class="data">
									<span class="dia"><?php echo the_time('d'); ?></span> 
									<span class="mes"><?php echo the_time('M'); ?></span> 
									<span class="ano"><?php echo the_time('Y'); ?></span>
								</p>
									 
								  <div class="post-text"<?php post_class(); ?> id="post-<?php the_ID(); ?>">	
										
										<?php the_content(); ?>

										<?php comments_template(); ?>
										
										<div class="clear"></div>
								  
								  </div><!--post-text-->
								
								<p class="comentarios">
									<?php comments_popup_link(__('<span class="quantidade">0</span> <span>Comente</span>'), __('<span class="quantidade">1</span> <span>Comente</span>'), __('<span class="quantidade">%</span> <span>Comente</span>')); ?>
								</p>
							
							</div><!--double-border-sub-->
						
						</div><!--double-border-->
						
						<div class="tags">
							
							<h3>TAGS:</h3>
							
							<p><?php the_tags("", ", "); ?></p>
						
						</div><!--tags-->
						
					</div><!--post-->
					
				<?php endwhile; ?>
				
				<?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; ?>
            
			</div><!--id-post-->
        
		</div><!--content-->
		
		<?php get_sidebar(); ?>

    </div><!--content-wrapper-->
	
	<?php get_footer(); ?>