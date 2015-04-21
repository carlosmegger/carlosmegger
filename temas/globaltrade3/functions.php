<?php
if (function_exists('register_sidebar'))
    register_sidebar(array(
		'name' => 'lateral',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
	
	
	// Changing excerpt length
function new_excerpt_length($length) {
	return 85;
}
add_filter('excerpt_length', 'new_excerpt_length');


 ?>
