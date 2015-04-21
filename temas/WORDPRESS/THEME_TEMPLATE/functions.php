<?php
/*************************************************************/
/****** | PHP OPTIONS
/*************************************************************/

date_default_timezone_set("Brazil/East");

/*************************************************************/
/****** | CONSTANTS
/*************************************************************/

define('SITE_URL', get_bloginfo('wpurl'));
define('THEME_URL', get_bloginfo('template_url'));
define('THEME_DIR', get_bloginfo('template_directory'));

/*************************************************************/
/****** | VARS
/*************************************************************/



/*************************************************************/
/****** | THEME SUPPORT
/*************************************************************/

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

add_image_size( '978x275', 978, 275, true );

/*************************************************************/
/****** | IMPORTS
/*************************************************************/

# posttype helper class
require (dirname(__FILE__) . '/_theme/posttype.class.php');

# metabox breadcrumb
require( dirname( __FILE__ ) . '/_theme/breadcrumb.php' );

# post types archives in nav menu
require( dirname( __FILE__ ) . '/_theme/wordpress_custom_post_type_archives_in_menu.php' );

# admin settings
require( dirname( __FILE__ ) . '/_theme/settings.php' );

/*************************************************************/
/****** | POST TYPE, META, TAXONOMY
/*************************************************************/

# Mídia
$posttype_midia = new PostType('midia', array('name' => 'Fotos / Vídeos', 'menu_name' => 'Fotos / Vídeos'), array('supports' => array('title', 'thumbnail', 'tags', 'editor', 'excerpt')));
$posttype_midia->addTaxonomy('midia-tipo', array('label' => 'Tipo de mídia'));
$posttype_midia->addMeta(array( 'id' => 'video', 'label' => 'Vídeo', 'type' => MetaFactory::TEXT ));
$posttype_midia->save();

/*************************************************************/
/****** | GET YOUTUBE VIDEO ID
/*************************************************************/

function get_youtube_video_id($url){
	return preg_replace("#http://.*youtube.com/.*v=([aA-zZ0-9]*)?.*#", "$1", $url);
}

/*************************************************************/
/****** | PAGINAÇÃO
/*************************************************************/
function blog_pagination($wp_query = false, $pages = '', $range = 2)
{
	if(!$wp_query) global $wp_query;
	
	$showitems = ($range * 2)+1;

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	{
		
		$pages = $wp_query->max_num_pages;
			
		if(!$pages)
		{
			$pages = 1;
		}
	}

	if(1 != $pages)
	{
		?>
		<div class="pagination" data-paged="<?php echo $paged ?>" data-showitems="<?php echo $showitems; ?>" data-pages="<?php echo $pages; ?>">
			<?php if($paged < $pages) : ?>
			<a href="<?php echo get_pagenum_link($paged + 1); ?>" class="next-page">Próxima página</a>
			<?php endif; ?>
			<?php if($paged > 1): ?>
			<a href="<?php echo get_pagenum_link($paged - 1) ?>" class="prev-page">Página anterior</a>
			<?php endif; ?>
			<div class="clear"></div>
		</div>
		<?php
	}
}