<div class="title">Conecte-se ao LAB </div>
             <div class="floatleft"><a href="http://twitter.com/LAB01Records"><img src="<?php bloginfo('stylesheet_directory') ?>/imgs/twitter.png" border="0" /></a></div> 
             <div class="floatleft"><a href="http://www.youtube.com/LAB01Records"><img src="<?php bloginfo('stylesheet_directory') ?>/imgs/youtube.png" border="0" /></a></div>
             <div class="floatleft"><a href="http://www.vimeo.com/user1674803"><img src="<?php bloginfo('stylesheet_directory') ?>/imgs/vimeo.png" border="0" /></a></div>
             <div class="floatleft"><a href=""><img src="<?php bloginfo('stylesheet_directory') ?>/imgs/rss.png" border="0" /></a></div>
            <hr class="clear" />
<div class="title">Eventos </div>          
               <div> <!--inicio codigo-->
                    <?php # 1 - Loop de Destaque ---- ?>
                        <?php $my_query = new WP_Query('category_name=eventos&showposts=1');
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