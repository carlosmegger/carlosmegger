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
add_filter('excerpt_more', 'new_excerpt_more');

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 232, 130, true ); // Normal post thumbnails
?>

<?php
// Seu negócio cabeçalho mutável começa aqui
//define( 'HEADER_TEXTCOLOR', '' );
// Não CSS, apenas IMG chamada. O% s é um espaço reservado para o tema modelo diretório URI.
define( 'HEADER_IMAGE', '%s/headers/cortina.jpg' );

// A altura e a largura do cabeçalho personalizado. Você pode ligar para os filtros do próprio tema para alterar estes valores.
// Adicionar um filtro para blogs_header_image_width e blogs_header_image_height alterar estes valores.
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'blogs_header_image_width', 900 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'blogs_header_image_height', 200) );

// Nós estaremos usando miniaturas de imagens pós cabeçalho personalizado em posts e páginas.
// Nós queremos que eles sejam 900 pixels de largura por 200 pixels de altura (imagens maiores serão auto-cortadas para caber).


// Adicione um caminho para o cabeçalho personalizada para ser nomeada no painel de administração que controla
// cabeçalhos personalizados. Veja blogs_admin_header_style (), abaixo.
add_custom_image_header( '', 'blogs_admin_header_style' );

// … E assim termina o negócio cabeçalho mutável.

// Cabeçalhos padrão personalizado embalado com o tema. % s é um espaço reservado para o tema modelo diretório URI.
register_default_headers( array (
'cortina1' => array (
'url' => '%s/headers/cortina.jpg',
'thumbnail_url' => '%s/headers/cortina-thumbnail.jpg',
'description' => __( 'Cortina', 'blogs' )
),
'cortina2' => array (
'url' => '%s/headers/cortina2.jpg',
'thumbnail_url' => '%s/headers/cortina2-thumbnail.jpg',
'description' => __( 'Cortina', 'blogs' )
),
'logo' => array (
'url' => '%s/headers/logo.jpg',
'thumbnail_url' => '%s/headers/logo-thumbnail.jpg',
'description' => __( 'cort2', 'blogs' )
),
) );

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