<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */

global $udesign_options;

// construct an array of portfolio categories
$portfolio_categories_array = explode( ',', $udesign_options['portfolio_categories'] );

if ( $portfolio_categories_array != "" && post_is_in_category_or_descendants( $portfolio_categories_array ) ) :
    // Test if this Post is assigned to the Portfolio category or any descendant and switch the single's template accordingly
    include 'single-Portfolio.php';
else : // Continue with normal Loop (Blog category)

    get_header();

    $content_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
?>
    <div id="content-container" class="container_24">
	<div id="main-content" class="<?php echo $content_position; ?>">
	    <div class="main-content-padding">
<?php		if (have_posts()) :
		    while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			    <div class="entry">
                                <div class="post-top">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                                <div class="clear"></div>
<?php				the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign'));
				wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                                <?php echo do_shortcode('[divider]'); ?>
                                <div class="postmetadata">
                                    <span>
<?php                                   if( $udesign_options['show_postmetadata_author'] == 'yes' ) :
                                            printf( __('By %1$s on %2$s ', 'udesign'), '</span>'.get_the_author_link().'<span>', get_the_time('F jS, Y') );
                                        else :
                                            printf( __('On %1$s ', 'udesign'), get_the_time('F jS, Y') );
                                        endif; ?>
                                    </span> &nbsp; / &nbsp; <span><?php the_category(', '); ?></span> &nbsp; / &nbsp; <?php comments_popup_link( __( 'Leave a comment', 'udesign' ), __( '1 Comment', 'udesign' ), __( '% Comments', 'udesign' ) ); ?> <?php edit_post_link(__('Edit', 'udesign'), '<div style="float:right;margin:0 10px;">', '</div>'); ?>  
                                </div>
                                <?php echo do_shortcode('[divider]'); ?>
			    </div>
			</div>
<?php			comments_template();
		    endwhile; else: ?>
			<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'udesign'); ?></p>
<?php		endif; ?>
	    </div><!-- end main-content-padding -->
	</div><!-- end main-content -->
<?php
	    if( sidebar_exist('BlogSidebar') ) { get_sidebar('BlogSidebar'); }
?>
    </div><!-- end content-container -->
<?php
endif; // end normal Loop ?>

<div class="clear"></div>

<?php

get_footer(); 


