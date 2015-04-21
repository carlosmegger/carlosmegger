<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */

    get_header();

    $content_position = ( $udesign_options['portfolio_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
?>
    <div id="content-container" class="container_24">
	<div id="main-content" class="<?php echo $content_position; ?>">
	    <div class="main-content-padding">
<?php	    if (have_posts()) :
		while (have_posts()) : the_post(); ?>
		    <div <?php post_class() ?> id="post-<?php the_ID();?>">
			<div class="entry">
                            <div class="post-top">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="clear"></div>
<?php			    the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign'));
			    wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
<?php                       if( $udesign_options['show_portfolio_postmetadata'] == 'yes' ) : ?>
<?php                           echo do_shortcode('[divider]'); ?>
                                <div class="postmetadata">
                                    <span>
<?php                                   if( $udesign_options['show_portfolio_postmetadata_author'] == 'yes' ) :
                                            printf( __('By %1$s on %2$s ', 'udesign'), '</span>'.get_the_author_link().'<span>', get_the_time('F jS, Y') );
                                        else :
                                            printf( __('On %1$s ', 'udesign'), get_the_time('F jS, Y') );
                                        endif; ?>
                                    </span> &nbsp; / &nbsp; <span><?php the_category(', '); ?></span> &nbsp; / &nbsp; <?php comments_popup_link( __( 'Leave a comment', 'udesign' ), __( '1 Comment', 'udesign' ), __( '% Comments', 'udesign' ) ); ?> <?php edit_post_link(__('Edit', 'udesign'), '<div style="float:right;margin:0 10px;">', '</div>'); ?>  
                                </div>
<?php                       endif; ?>
<?php                       echo do_shortcode('[divider]'); ?>
			</div>
		    </div>

<?php		    if( $udesign_options['show_portfolio_comments'] == 'yes' ) {
			comments_template();
		    }
		    
		endwhile; else: ?>
		    <p><?php esc_html_e("Sorry, no posts matched your criteria.", 'udesign'); ?></p>
<?php	    endif; ?>

	    </div><!-- end main-content-padding -->
	</div><!-- end main-content -->
<?php
	    if( sidebar_exist('PortfolioSidebar') ) { get_sidebar('PortfolioSidebar'); }
?>
    </div><!-- end content-container -->



