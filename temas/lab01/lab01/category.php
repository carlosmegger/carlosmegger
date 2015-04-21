<?php get_header();?><!--topo-->
			<hr class="clear" />
			<div class="conteudo"><!--width4-conteudo-2-->
                <div class="div_cont_width3">
					<div class="width3">
                    	<div class="title"><!--titulo da pagina-->
						<?php printf( __('%s'), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
  						</div><!--titulo da pagina-->
                        <div class="storycontent"> <!--inicio codigo-->
						<?php if (have_posts()) : ?>
	                       <?php while (have_posts()) : the_post(); ?>							
                            <div id="post-<?php the_ID(); ?>"><!--post -->
                            <span class="style3"><em><?php the_date('',''); ?></em></span>&nbsp;
                            <span class="style4"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></span>
                                    </div> <!--post -->
									<?php endwhile; ?>
                                    <div class="navigation">
                                     	<div align="left"><!--left -->
										<?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; ?>
                                     	</div><!--left -->
                                    </div><!--navigation-->
                                <?php else : ?>
                                    <h2 class="center"><?php _e('Not Found', 'kubrick'); ?></h2>
                                    <p class="center"><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'kubrick'); ?></p>
                                    <?php get_search_form(); ?>                          
                                <?php endif; ?>
                        	</div><!--fim codigo-->         
					</div><!--width3-->
                    <div class="width3_rodape"><!--div_cont_width3-->
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/imgs/width3_rodape.png" width="543" height="8" /></div>
                    </div><!--div_cont_width3-->
               <div class="div_cont_width1"><!--div_cont_width1-->
			  <div class="width1"><!--width1-->
              	<?php get_sidebar();?>
              </div><!--width1-->
			  <div class="width1_rodape"><img src="<?php bloginfo('stylesheet_directory'); ?>/imgs/width1_rodape.png" width="271" height="8" /></div>
              </div><!--div_cont_width1-->
			        <hr class="clear" />
			</div><!--width4-conteudo-->
		</div><!--width4-conteudo-->
		<hr class="clear" />
</div><!--geral--> 
<?php get_footer();?> 
</body>
</html>
