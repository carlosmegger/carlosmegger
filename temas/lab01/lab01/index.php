<?php get_header();?><!--topo-->
		<hr class="clear" />
			<div class="conteudo_index"><!--conteudo_index-->
                <div class="div_cont_width3"><!--div_cont_width3-->
					<div class="width3"><!--width3-->
						<div class="title"><?php the_title(); ?></div>
                        <div <?php post_class() ?> id="post-<?php the_ID(); ?>"><!--codigo--> 
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>   
							<div class="storycontent"><!--storycontent-->
							<?php the_content(__('(more...)')); ?>
							</div><!--storycontent-->
							<?php endwhile; else: ?>
				<?php endif; ?>
                        </div><!--fim codigo-->
					</div><!--width3-->
                    <div class="width3_rodape">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/imgs/width3_rodape.png" width="543" height="8" /></div>
                    </div><!--div_cont_width3-->
               <div class="div_cont_width1"><!--div_cont_width1-->
			  <div class="width1"><!--wihth1-->
              	<?php get_sidebar();?>
              </div><!--width1-->
			  <div class="width1_rodape"><img src="<?php bloginfo('stylesheet_directory'); ?>/imgs/width1_rodape.png" width="271" height="8" /></div>
              </div><!--div_cont_width1-->
			        <hr class="clear" />
			</div><!--conteudo_index-->
		<hr class="clear" />
</div><!--geral--> 
<?php get_footer();?> 