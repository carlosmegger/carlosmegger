<?php get_header() ?>
        <div id="pag_conteudo">
        	
			<?php locate_template( array( 'sidebar.php' ), true ) ?>
        	
        	<hr class="clear">
        	<ul id="lista_conteudo_blog">
        	
        	<?php if ( have_posts() ) : ?>
        	
        		<?php while (have_posts()) : the_post(); ?>
        		
        			<?php do_action( 'bp_before_blog_post' ) ?>
        	
            	<li>
            		<?php 
            			$nicename = get_the_author_meta('user_nicename',$post->post_author);
            			$display_name = get_the_author_meta('display_name',$post->post_author);
            		?>	
            		<a href="http://comunidade.ctea.med.br/members/<? echo $nicename; ?>/" title="<? echo $display_name; ?>">
            		<?php 
            			/*$link_members = bp_core_get_userlink( $post->post_author );
            			$link_members = substr($link_members, 0, strpos($link_members, '>')) ;
            			//echo $link_members.' class="avatar">';
						echo $link_members.'>';*/	
            			$avatar = get_avatar( $post->post_author, '50', "", $display_name);
            			if(stripos($avatar, 'class="photo"')){
            				$errado = array('width="57"', 'height="80"', 'class="photo"');
							$certo = array('width="50"', 'height="50"', 'class="avatar user-'.$post->post_author.'-avatar"');
            				$avatar = str_replace($errado, $certo, $avatar);
            			}
            			echo $avatar;
            		?>
					</a>
                 	 <div class="membro_blog"><!--membro-->
                    	 <h3 class="titulo_list_post_blog"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'buddypress' ) ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                     	<hr class="clear2">
                 		<span class="data"><?php the_time() ?> <em><?php _e( 'in', 'buddypress' ) ?> <?php the_category(', ') ?> <?php printf( __( 'by %s', 'buddypress' ), bp_core_get_userlink( $post->post_author ) ) ?></em></span>
                     	<hr class="clear2">
                     	<br/><br/>
						<div><span class="texto"><?php the_content( __( 'Read the rest of this entry &rarr;', 'buddypress' ) ); ?></span></div>
						<br/>
                    <hr class="clear2">
                    <div>
                    	<span class="data"><?php the_tags( __( 'Tags: ', 'buddypress' ), ', ', ''); ?></span> <span class="data" style="float: right;"><?php comments_popup_link( __( 'No Comments &#187;', 'buddypress' ), __( '1 Comment &#187;', 'buddypress' ), __( '% Comments &#187;', 'buddypress' ) ); ?></span>
                    </div>
                    <hr class="clear2">
                 </div><!--membro-->
                </li>
                
                <?php do_action( 'bp_after_blog_post' ) ?>

				<?php endwhile; ?>
				
				<div class="navigation">

					<div class="alignleft"><?php next_posts_link( __( '&larr; Previous Entries', 'buddypress' ) ) ?></div>
					<div class="alignright"><?php previous_posts_link( __( 'Next Entries &rarr;', 'buddypress' ) ) ?></div>

				</div>
				
				<?php else : ?>

				<h2 class="center"><?php _e( 'Not Found', 'buddypress' ) ?></h2>
				<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'buddypress' ) ?></p>

				<?php locate_template( array( 'searchform.php' ), true ) ?>

			<?php endif; ?>
               
            </ul><!-- lista_conteudo -->
            
            <?php do_action( 'bp_after_blog_home' ) ?>
            
        </div><!-- pag_conteudo -->
            <hr class="clear">
    </div><!-- conteudo -->
	<div id="conteudo_rodape"></div>
</div><!-- expansivo -->

<?php get_footer() ?>