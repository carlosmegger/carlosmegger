<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
get_header();

$content_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';

?>

<div id="content-container" class="container_24">
    <div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">

	    <?php if (have_posts()) : ?>

		  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php while (have_posts()) : the_post(); ?>
			    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<div class="entry">
                                    <div class="post-top">
                                        <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'udesign' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                        <div class="postmetadata">
                                            <span>
<?php                                           if( $udesign_options['show_postmetadata_author'] == 'yes' ) :
                                                    printf( __('By %1$s on %2$s ', 'udesign'), '</span>'.get_the_author_link().'<span>', get_the_time('F jS, Y') );
                                                else :
                                                    printf( __('On %1$s ', 'udesign'), get_the_time('F jS, Y') );
                                                endif; ?>
                                            </span> &nbsp; / &nbsp; <span><?php the_category(', '); ?></span> &nbsp; / &nbsp; <?php comments_popup_link( __( 'Leave a comment', 'udesign' ), __( '1 Comment', 'udesign' ), __( '% Comments', 'udesign' ) ); ?> <?php edit_post_link(__('Edit', 'udesign'), '<div style="float:right;margin:0 10px;">', '</div>'); ?>  
                                        </div>
                                    </div>
                                    <div class="clear"></div>
<?php				    $post_image_url = get_post_meta($post->ID, 'post_image', true); // Grab the preview image from the custom field 'post_image', if set.
				    if ( $post_image_url ) : ?>
				    <div class="post-image-holder pngfix">
					<div class="post-image">
					    <span class="post-hover-image pngfix"> </span>
					    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img class="hover-opacity" src="<?php echo get_bloginfo("template_directory"); ?>/scripts/timthumb.php?src=<?php echo $post_image_url; ?>&amp;w=590&amp;h=190&amp;zc=1&amp;q=90" alt="<?php the_title_attribute(); ?>" /></a>
					</div>
				    </div>
<?php				    endif; ?>
<?php				    if ( $udesign_options['show_excerpt'] == 'yes' ) {
					the_excerpt(); //display the excerpt
				    } else {
                                        the_content('');  //display the default content, the empty string ('') is to remove the default "more" link
				    }
				    if ( $udesign_options['blog_button_text'] ) : ?>
					<div class="clear"></div>
<?php                                       echo do_shortcode('[read_more text="'.$udesign_options['blog_button_text'].'" title="'.$udesign_options['blog_button_text'].'" url="'.get_permalink().'" align="left"]'); ?>
					<div class="clear"></div>
<?php				    endif; ?>
				</div>
			    </div>
                    <?php echo do_shortcode('[divider_top]'); ?>
			<?php endwhile; ?>

			<div class="clear"></div>

<?php		// Pagination
		if(function_exists('wp_pagenavi')) :
		    wp_pagenavi();
		else : ?>
		    <div class="navigation">
			    <div class="alignleft"><?php previous_posts_link() ?></div>
			    <div class="alignright"><?php next_posts_link() ?></div>
		    </div>
<?php		endif; ?>

	    <?php else :
		if ( is_category() ) { // If this is a category archive
			printf(__("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", 'udesign'), single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			_e("<h2>Sorry, but there aren't any posts with this date.</h2>", 'udesign');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf(__("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", 'udesign'), $userdata->display_name);
		} else {
			_e("<h2 class='center'>No posts found.</h2>", 'udesign');
		}
		get_search_form();
	    endif;
	    //Reset Query
	    wp_reset_query(); ?>
            
            <?php edit_post_link(__('Edit this page', 'udesign'), '<div style="float:right;margin:0 10px;">', '</div>'); ?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->

<?php	if( sidebar_exist('BlogSidebar') ) { get_sidebar('BlogSidebar'); } ?>

</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();



