<?php
global $udesign_options, $post;
$the_post_thumbnail_link = (get_post_meta($post->ID, 'post_thumbnail', true)) ? get_post_meta($post->ID, 'post_thumbnail', true) : get_post_meta($post->ID, 'thumbnail', true);
$default_thumb = get_bloginfo('template_url') . '/styles/common-images/default-thumb.png';
$shadow_class = ($thumb_frame_shadow == '' | $thumb_frame_shadow == false) ? '': ' frame-shadow'; // $thumb_frame_shadow is set in 'latestPost-widget.php' file
// the case when "Get The Image" plugin is available (installed and activated)
if ( function_exists('get_the_image') ) { 
	if ( $udesign_options['default_thumb_on'] == 'yes' ) { // Default thumbnail option is selected
		$the_thumb_html_as_array = get_the_image( array(
				    'meta_key' => array('post_thumbnail','thumbnail'),
                                    'format' => 'array',
				    'size' => 'full',
				    'default_image' => $default_thumb,
				    'link_to_post' => false,
				    'image_scan' => true,
				    'width' => $post_thumb_width,
				    'height' => $post_thumb_height,
                                    'cache' => false,
				    'echo' => false,
				) );
	} else { // Default thumbnail option is NOT selected
		$the_thumb_html_as_array = get_the_image( array(
				    'meta_key' => array('post_thumbnail','thumbnail'),
                                    'format' => 'array',
				    'size' => 'full',
				    'default_image' => false,
				    'link_to_post' => false,
				    'image_scan' => true,
				    'width' => $post_thumb_width,
				    'height' => $post_thumb_height,
                                    'cache' => false,
				    'echo' => false,
				) );
	}
	echo ( $the_thumb_html_as_array[src] ) ? '<span class="small-custom-frame alignleft'.$shadow_class.'"><a href="'.get_permalink().'" title="'.__("Permanent Link to", 'udesign').' '.the_title('', '', false).'"><img src="'.get_bloginfo("template_directory").'/scripts/timthumb.php?src='.$the_thumb_html_as_array[url].'&amp;w='.$post_thumb_width.'&amp;h='.$post_thumb_height.'&amp;zc=1&amp;q=100" width="'.$post_thumb_width.'" height="'.$post_thumb_height.'" alt="'.$the_thumb_html_as_array[alt].'" /></a></span>' : '';
	
} else { // the case when "Get The Image" plugin is NOT available
	if ( $udesign_options['default_thumb_on'] == 'yes' ) { // Default thumbnail option is selected
	    if ( $the_post_thumbnail_link ) { // look for the thumbnail passed as a 'post_thumbnail' or 'thumbnail' custom field ?>
                    <span class="small-custom-frame alignleft<?php echo $shadow_class; ?>"><a href="<?php the_permalink() ?>" title="<?php _e("Permanent Link to", 'udesign'); ?> <?php the_title(); ?>"><img src="<?php echo get_bloginfo("template_directory").'/scripts/timthumb.php?src='.$the_post_thumbnail_link.'&amp;w='.$post_thumb_width.'&amp;h='.$post_thumb_height; ?>&amp;zc=1&amp;q=100" width="<?php echo $post_thumb_width; ?>" height="<?php echo $post_thumb_height; ?>" alt="<?php _e("Post Thumbnail", 'udesign'); ?>" /></a></span>
<?php	    } else { // load default thumbnail image ?>
		    <span class="small-custom-frame alignleft<?php echo $shadow_class; ?>"><a href="<?php the_permalink() ?>" title="<?php _e("Permanent Link to, 'udesign'"); ?> <?php the_title(); ?>"><img src="<?php echo $default_thumb; ?>" width="<?php echo $post_thumb_width; ?>" height="<?php echo $post_thumb_height; ?>" alt="<?php _e("Post Thumbnail", 'udesign'); ?>" /></a></span>
<?php	    }
	} else { // Default thumbnail option is NOT selected
	    if ( $the_post_thumbnail_link ) { // look for the thumbnail passed as a 'post_thumbnail' or 'thumbnail' custom field ?>
		    <span class="small-custom-frame alignleft<?php echo $shadow_class; ?>"><a href="<?php the_permalink() ?>" title="<?php _e("Permanent Link to", 'udesign'); ?> <?php the_title(); ?>"><img src="<?php echo get_bloginfo("template_directory").'/scripts/timthumb.php?src='.$the_post_thumbnail_link.'&amp;w='.$post_thumb_width.'&amp;h='.$post_thumb_height; ?>&amp;zc=1&amp;q=100" width="<?php echo $post_thumb_width; ?>" height="<?php echo $post_thumb_height; ?>" alt="<?php _e("Post Thumbnail", 'udesign'); ?>" /></a></span>
<?php	    }
	}
}


