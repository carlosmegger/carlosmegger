<?php

/* Stop the theme from killing WordPress if BuddyPress is not enabled. */
if ( !class_exists( 'BP_Core_User' ) )
	return false;

/* Register the widget columns */
register_sidebars( 1,
	array(
		'name' => 'Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
	)
);

/* Register the widget posts */
register_sidebars( 1,
	array(
		'name' => 'Todos os posts',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
	)
);

/* Load the AJAX functions for the theme */
require_once( TEMPLATEPATH . '/_inc/ajax.php' );

/* Load the javascript for the theme */
wp_enqueue_script( 'dtheme-ajax-js', get_template_directory_uri() . '/_inc/global.js', array( 'jquery' ) );

/* Add the JS needed for blog comment replies */
function bp_dtheme_add_blog_comments_js() {
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'template_redirect', 'bp_dtheme_add_blog_comments_js' );

/* HTML for outputting blog comments as defined by the WP comment API */
function bp_dtheme_blog_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>

	<?php if ( 'pingback' == $comment->comment_type ) return false; ?>

	<li id="comment-<?php comment_ID(); ?>">
		<div class="comment-avatar-box">
			<div class="avb">
				<a href="<?php echo get_comment_author_url() ?>" rel="nofollow">
					<?php if ( $comment->user_id ) : ?>
						<?php echo bp_core_fetch_avatar( array( 'item_id' => $comment->user_id, 'width' => 50, 'height' => 50, 'email' => $comment->comment_author_email ) ); ?>
					<?php else : ?>
						<?php echo get_avatar( $comment, 50 ) ?>
					<?php endif; ?>
				</a>
			</div>
		</div>

		<div class="comment-content">

			<div class="comment-meta">
				<a href="<?php echo get_comment_author_url() ?>" rel="nofollow"><?php echo get_comment_author(); ?></a> <?php _e( 'said:', 'buddypress' ) ?>
				<em><?php _e( 'On', 'buddypress' ) ?> <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date() ?></a></em>
			</div>

			<?php if ( $comment->comment_approved == '0' ) : ?>
			 	<em class="moderate"><?php _e('Your comment is awaiting moderation.'); ?></em><br />
			<?php endif; ?>

			<?php comment_text() ?>

			<div class="comment-options">
				<?php echo comment_reply_link( array('depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ?>
				<?php edit_comment_link( __( 'Edit' ),'','' ); ?>
			</div>

		</div>
	</li>
<?php
}

/* Filter the dropdown for selecting the page to show on front to include "Activity Stream" */
function bp_dtheme_wp_pages_filter( $page_html ) {
	if ( !bp_is_active( 'activity' ) )
		return $page_html;

	if ( 'page_on_front' != substr( $page_html, 14, 13 ) )
		return $page_html;

	$selected = false;
	$page_html = str_replace( '</select>', '', $page_html );

	if ( bp_dtheme_page_on_front() == 'activity' )
		$selected = ' selected="selected"';

	$page_html .= '<option class="level-0" value="activity"' . $selected . '>' . __( 'Activity Stream', 'buddypress' ) . '</option></select>';
	return $page_html;
}
add_filter( 'wp_dropdown_pages', 'bp_dtheme_wp_pages_filter' );

/* Hijack the saving of page on front setting to save the activity stream setting */
function bp_dtheme_page_on_front_update( $oldvalue, $newvalue ) {
	if ( !is_admin() || !is_site_admin() )
		return false;

	if ( 'activity' == $_POST['page_on_front'] )
		return 'activity';
	else
		return $oldvalue;
}
add_action( 'pre_update_option_page_on_front', 'bp_dtheme_page_on_front_update', 10, 2 );

/* Load the activity stream template if settings allow */
function bp_dtheme_page_on_front_template( $template ) {
	global $wp_query;

	if ( empty( $wp_query->post->ID ) )
		return locate_template( array( 'activity/index.php' ), false );
	else
		return $template;
}
add_filter( 'page_template', 'bp_dtheme_page_on_front_template' );

/* Return the ID of a page set as the home page. */
function bp_dtheme_page_on_front() {
	if ( 'page' != get_option( 'show_on_front' ) )
		return false;

	return apply_filters( 'bp_dtheme_page_on_front', get_option( 'page_on_front' ) );
}

/* Force the page ID as a string to stop the get_posts query from kicking up a fuss. */
function bp_dtheme_fix_get_posts_on_activity_front() {
	global $wp_query;

	if ( !empty($wp_query->query_vars['page_id']) && 'activity' == $wp_query->query_vars['page_id'] )
		$wp_query->query_vars['page_id'] = '"activity"';
}
add_action( 'pre_get_posts', 'bp_dtheme_fix_get_posts_on_activity_front' );

/* WP 3.0 requires there to be a non-null post in the posts array */
function bp_dtheme_fix_the_posts_on_activity_front( $posts ) {
	global $wp_query;

	// NOTE: the double quotes around '"activity"' are thanks to our previous function bp_dtheme_fix_get_posts_on_activity_front()
	if ( empty( $posts ) && !empty( $wp_query->query_vars['page_id'] ) && '"activity"' == $wp_query->query_vars['page_id'] )
		$posts = array( (object) array( 'ID' => 'activity' ) );

	return $posts;
}
add_filter( 'the_posts', 'bp_dtheme_fix_the_posts_on_activity_front' );

/* Show a notice when the theme is activated - workaround by Ozh (http://old.nabble.com/Activation-hook-exist-for-themes--td25211004.html) */
function bp_dtheme_show_notice() { ?>
	<div id="message" class="updated fade">
		<p><?php printf( __( 'Theme activated! This theme contains <a href="%s">custom header image</a> support and <a href="%s">sidebar widgets</a>.', 'buddypress' ), admin_url( 'themes.php?page=custom-header' ), admin_url( 'widgets.php' ) ) ?></p>
	</div>

	<style type="text/css">#message2, #message0 { display: none; }</style>
	<?php
}
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" )
	add_action( 'admin_notices', 'bp_dtheme_show_notice' );

/* Add words that we need to use in JS to the end of the page so they can be translated and still used. */
function bp_dtheme_js_terms() { ?>
<script type="text/javascript">
	var bp_terms_my_favs = '<?php _e( "My Favorites", "buddypress" ) ?>';
	var bp_terms_accepted = '<?php _e( "Accepted", "buddypress" ) ?>';
	var bp_terms_rejected = '<?php _e( "Rejected", "buddypress" ) ?>';
	var bp_terms_show_all_comments = '<?php _e( "Show all comments for this thread", "buddypress" ) ?>';
	var bp_terms_show_all = '<?php _e( "Show all", "buddypress" ) ?>';
	var bp_terms_comments = '<?php _e( "comments", "buddypress" ) ?>';
	var bp_terms_close = '<?php _e( "Close", "buddypress" ) ?>';
	var bp_terms_mention_explain = '<?php printf( __( "%s is a unique identifier for %s that you can type into any message on this site. %s will be sent a notification and a link to your message any time you use it.", "buddypress" ), '@' . bp_get_displayed_user_username(), bp_get_user_firstname(bp_get_displayed_user_fullname()), bp_get_user_firstname(bp_get_displayed_user_fullname()) ); ?>';
	</script>
<?php
}
add_action( 'wp_footer', 'bp_dtheme_js_terms' );

//minha classe posts
function bp_my_ajax_querystring_activity_filter( $query_string, $scope ) {
        global $bp;

        if ( $scope != 'posts' || !is_user_logged_in() )
                return $query_string;

        $args = array();
        parse_str( $query_string, $args );
        $args['object'] = $bp->groups->id;
        $args['primary_id'] = function_to_get_group_id_for_logged_in_user();

        return http_build_query( $args );
}
add_filter( 'bp_dtheme_ajax_querystring_activity_filter',
 'bp_my_ajax_querystring_activity_filter', 1, 2 );
//minha classe posts

/** Diga ao WordPress para executar blogs_setup () quando o gancho 'after_setup_theme'é executado. */
add_action( 'after_setup_theme', 'blogs_setup' );

if ( ! function_exists('blogs_setup') ):
/**
* @uses add_custom_image_header() Para adicionar suporte para um cabeçalho personalizado.
* @uses register_default_headers() Para registrar o padrão de imagens do cabeçalho personalizado fornecido com o tema.
*
* @since 3.0.0
*/
function blogs_setup() {

// Este tema utiliza miniaturas post
add_theme_support( 'post-thumbnails' );

// Seu negócio cabeçalho mutável começa aqui
//define( 'HEADER_TEXTCOLOR', '' );
// Não CSS, apenas IMG chamada. O% s é um espaço reservado para o tema modelo diretório URI.
define( 'HEADER_IMAGE', '%s/headers/blog_tema.jpg' );

// A altura e a largura do cabeçalho personalizado. Você pode ligar para os filtros do próprio tema para alterar estes valores.
// Adicionar um filtro para blogs_header_image_width e blogs_header_image_height alterar estes valores.
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'blogs_header_image_width', 980 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'blogs_header_image_height', 114 ) );

// Nós estaremos usando miniaturas de imagens pós cabeçalho personalizado em posts e páginas.
// Nós queremos que eles sejam 940 pixels de largura por 198 pixels de altura (imagens maiores serão auto-cortadas para caber).
set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

// Não apoio o texto dentro da imagem do cabeçalho.
define( 'NO_HEADER_TEXT', true );

// Adicione um caminho para o cabeçalho personalizada para ser nomeada no painel de administração que controla
// cabeçalhos personalizados. Veja blogs_admin_header_style (), abaixo.
add_custom_image_header( '', 'blogs_admin_header_style' );

// … E assim termina o negócio cabeçalho mutável.

// Cabeçalhos padrão personalizado embalado com o tema. % s é um espaço reservado para o tema modelo diretório URI.
register_default_headers( array (
'ciencias' => array (
'url' => '%s/headers/blog_tema2.jpg',
'thumbnail_url' => '%s/headers/blog_tema2-thumbnail.jpg',
'description' => __( 'Ciências', 'blogs' )
),
'paraquedismo' => array (
'url' => '%s/headers/blog_tema.jpg',
'thumbnail_url' => '%s/headers/blog_tema-thumbnail.jpg',
'description' => __( 'Paraquedismo', 'blogs' )
),
'qualidade' => array (
'url' => '%s/headers/blog_tema3.jpg',
'thumbnail_url' => '%s/headers/blog_tema3-thumbnail.jpg',
'description' => __( 'Qualidade de vida', 'blogs' )
),
'vida' => array (
'url' => '%s/headers/blog_tema4.jpg',
'thumbnail_url' => '%s/headers/blog_tema4-thumbnail.jpg',
'description' => __( 'Vida Saudavel', 'blogs' )
),
'coracao' => array (
'url' => '%s/headers/blog_tema5.jpg',
'thumbnail_url' => '%s/headers/blog_tema5-thumbnail.jpg',
'description' => __( 'Meu Coração Saudavel', 'blogs' )
),
'ortopedia' => array (
'url' => '%s/headers/blog_tema6.jpg',
'thumbnail_url' => '%s/headers/blog_tema6-thumbnail.jpg',
'description' => __( 'Ortopedia', 'blogs' )
),
) );
}
endif;

if ( ! function_exists( 'blogs_admin_header_style' ) ) :
/**
* Estilos a imagem do cabeçalho exibida no painel Aparência cabeçalho > admin.
*
* Referenciado via add_custom_image_header () em blogs_setup ().
*
* @since 3.0.0
*/
function blogs_admin_header_style() {
?>
<style type="text/css">
#headimg {
height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}
#headimg h1, #headimg #desc {
display: none;
}
</style>
<?php
}
endif;

?>