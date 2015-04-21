<?php
function custom_admin_footer() {
	echo '&copy; '. date('Y') .' <a href="http://www.redirectdigital.com.br" target="_blank">Redirect Digital Marketing</a>.';
}

function custom_login() {
	?>
	<style type="text/css">
		#login h1 a { background:url(<?php print THEME_URL; ?>/_assets/images/global/redirect.png) no-repeat top center; height:40px;  }
	</style>
	<?php
}

add_filter('admin_footer_text', 'custom_admin_footer');
add_action('login_head', 'custom_login');

# Remover Widgets Default
add_action( 'widgets_init', 'my_unregister_widgets' );
function my_unregister_widgets() {
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Text' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Menu' );
}