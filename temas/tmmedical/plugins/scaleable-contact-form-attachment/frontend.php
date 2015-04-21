<?php
/**
 * @package Scaleable Contact Form Attachment
 * @author Ulrich Kautz and Rafael Garrett
 * @version 0.8.2
 */
/*
Plugin Name: Scaleable Contact Form Attachment
Plugin URI: http://blog.foaa.de/scaleable-contact-form
Description: Outra forma de contato com campos muito escalável multi-tipo. Usa Captcha, não Akismet. Pode usar SMTP externo através wp_mail () e outros plugins. AJAX apoio!
Author: Ulrich Kautz and Rafael Garrett
Version: 0.8.2
Author URI: http://www.rafaelgarrett.com.br
Thanks to: Ulrich Kautz
*/

require_once( 'includes.php' );

// add the contact form by adding [scaleable-contact-form-attachment] in non-visual (aka html) editor:
//	in a page and / or a site
add_shortcode( 'scaleable-contact-form-attachment-ajax', 'scf_print_contact_form_attachment_ajax' );
add_shortcode( 'scaleable-contact-form-attachment', 'scf_print_contact_form_attachment' );



// announce the menu item for admin..
add_action( 'admin_menu', 'scf_init_admin_menu_attachment' );


// assure jquery
function scf_init_attachment() {
	wp_enqueue_script('jquery');
}
add_action('init', scf_init_attachment);

function scf_init_admin_menu_attachment() {
	$path = WP_CONTENT_DIR.'/plugins/'.plugin_basename(dirname(__FILE__).'/');
	add_options_page( 'Scaleable Contact Form Attachment', 'S.C.Attachment', 'manage_options', $path. '/admin.php', '' );
}



?>
