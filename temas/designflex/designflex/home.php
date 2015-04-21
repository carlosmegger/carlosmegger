<?php get_header(); ?>
            <div id="destaque"><!--destaque-->
           		 <?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery.php'); ?>
            </div><!--destaque-->
            <hr class="clear" />
            <ul class="submenu submenu-upward"><!--submenu-->
            	<?php wp_list_pages("title_li=&child_of=5"); ?>
            </ul><!--submenu-->
            <hr class="clear" />
            <div id="width4"><!--width4-->
				<?php include (ABSPATH . '/wp-content/plugins/wp-featured-content-slider/content-slider.php'); ?>
                <div id="width1"><!--width1-->
                	<h4>Noticias</h4>
                        <?php # 1 - Loop de noticias  -------------------------------------------------------- ?>
                   		 <?php $my_query = new WP_Query('category_name=noticias&showposts=2');
                            while ($my_query->have_posts()) : $my_query->the_post();
                            	$do_not_duplicate2 = $post->ID; ?> <!-- IMPORTANTE -->
                           		 <div class="noticia" id="post-<?php the_ID(); ?>"><!--noticia-->
                             		 <div class="texto"><!-- texto-->
                             			 <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                         			<?php
														$titulo = get_the_title();
															if (strlen($titulo)>28){
																$titulo = substr($titulo, 0, 25);
																$titulo = $titulo."...";
																}
															echo $titulo;
                                                     ?> 
                                         	 </a>
                                        </h3>                     
										<?php the_excerpt(); ?>
                              <div class="style3" align="left"><a href="<?php the_permalink(); ?>" rel="bookmark" title="leia mais">Leia mais...</a></div>
                   			  </div><!-- texto-->
         			 </div> <!--noticia-->
                <?php endwhile; ?>              
                </div><!--width1-->
                <hr class="clear" />
           </div><!--width4-->
		<?php get_footer(); ?>
