<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Changing excerpt length
function new_excerpt_length($length) {
	return 15;
}
add_filter('excerpt_length', 'new_excerpt_length');
 
// Changing excerpt more
function new_excerpt_more($more) {
	return ' [...]';
}

?>