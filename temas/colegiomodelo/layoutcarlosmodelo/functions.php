<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */


if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	
	    register_sidebar(array(
		  'name' => 'pop',
        'before_widget' => '<div class="pop_widget">  <a class="fechar" title="Clique Aqui Para Fechar" onclick="remove_pop(this);">fechar</a>',
        'after_widget' => '</div>',
        'before_title' => '<span class="hiden">',
        'after_title' => '</span>',
    ));
	
	
}



// Changing excerpt length
function new_excerpt_length($length) {
	return 15;
}
add_filter('excerpt_length', 'new_excerpt_length');
 
// Changing excerpt more
function new_excerpt_more($more) {
	return ' [...]';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 60, 60, true ); // Normal post thumbnails


?>