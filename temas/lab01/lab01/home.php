<?php
/*
Template Name:home
*/
?>
<?php get_header();?><!--topo-->
	<div class="width4"><!--width4-conteudo-->
		<div align="center"><img src="<?php bloginfo('stylesheet_directory')?>/imgs/fundocomecobanner.png" width="831" height="12" /></div>
		 <div class="banner"><!--banner-->
             <?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery.php'); ?>
		 </div><!--banner-->
			<div align="center"><img src="<?php bloginfo('stylesheet_directory') ?>/imgs/fundofinalbanner.png" width="831" height="12" /></div>
		<hr class="clear" />
			<div class="conteudo"><!--width4-conteudo-2-->
					<div class="width1"><!--width1-->
						<div class="title">Noticias</div>
							<div> <!--inicio codigo-->
                                <?php # 1 - Loop de noticias  ------ ?>
                   		 		<?php $my_query = new WP_Query('category_name=noticias&showposts=3');
                            		while ($my_query->have_posts()) : $my_query->the_post();
                            		$do_not_duplicate2 = $post->ID; ?> <!-- IMPORTANTE -->
                           			 <div class="noticia" id="post-<?php the_ID(); ?>">
                              		<div class="texto"><!-- titulo, texto-->
                             		 <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php
                                                $titulo = get_the_title();
                                                    if (strlen($titulo)>38){
                                                $titulo = substr($titulo, 0, 35);
                                                $titulo = $titulo."...";
                                                 }
                                                echo $titulo;
                                              ?>  
                                     		</a>
                                      </h1>
									<span class="style1"><?php the_excerpt(); ?></span>
                          		   <div class="style2" align="left"><em><a href="<?php the_permalink(); ?>" rel="bookmark" title="leia mais">Leia mais...</a></em></div>
                   			 		 </div><!-- texto-->
         							 </div> <!-- contentbox -->
               					 <?php endwhile; ?>
                   			 </div><!--fim codigo-->
					</div><!--width1-->
						<div class="width1"><!--width1 destaque-->
						<div class="title">Destaque</div>
						<div> <!--inicio codigo-->
                                <?php # 1 - Loop de Destaque ---- ?>
                   				 <?php $my_query = new WP_Query('category_name=destaque&showposts=1');
                            		while ($my_query->have_posts()) : $my_query->the_post();
                          			  $do_not_duplicate2 = $post->ID; ?> <!-- IMPORTANTE -->
                           			 <div class="destaque" id="post-<?php the_ID(); ?>">
                           				 <div class="thumb"><?php the_post_thumbnail(); ?></div>
                             				 <div class="texto"><!-- titulo, texto-->
                             					 <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                 	<?php
														$titulo = get_the_title();
															if (strlen($titulo)>38){
														$titulo = substr($titulo, 0, 35);
														$titulo = $titulo."...";
														 }
														echo $titulo;
                                            	    ?> 
                                                 </a></h1>
												<span class="style1"><?php the_excerpt(); ?></span>
                           						 <div class="style2" align="left"><em><a href="<?php the_permalink(); ?>" rel="bookmark" title="leia mais">Leia mais...</a></em></div>
											  </div><!-- texto-->
         							 </div> <!-- contentbox -->
                				<?php endwhile; ?>
                     </div><!--fim codigo-->
                     <hr class="clear" />
                     <div class="title">Parceiros</div>
                     	 <div class="floatleft"><!--floatleft-->
                   		   <img src="<?php bloginfo('stylesheet_directory') ?>/imgs/910.jpg" border="0" /></a>
                         </div> <!--floatleft-->
                          <div class="floatleft"><!--floatleft-->
                    		  <img src="<?php bloginfo('stylesheet_directory') ?>/imgs/ous.jpg" border="0" /></a>
                         </div> 
                          <!--floatleft-->
			  </div><!--width1 destaque-->
					<div class="width1"><!--width1-->
						<?php get_sidebar();?>
				    </div><!--width1-->
					<div class="width1_rodape"><img src="<?php bloginfo('stylesheet_directory') ?>/imgs/width1_rodape.png" width="271" height="8" /></div>
					<div class="width1_rodape"><img src="<?php bloginfo('stylesheet_directory') ?>/imgs/width1_rodape.png" width="271" height="8" /></div>
					<div class="width1_rodape"><img src="<?php bloginfo('stylesheet_directory') ?>/imgs/width1_rodape.png" width="271" height="8" /></div>
			        <hr class="clear" />
			</div><!--width4-conteudo-->
		</div><!--width4-conteudo-->
		<hr class="clear" />
</div><!--geral-->
<?php get_footer();?>