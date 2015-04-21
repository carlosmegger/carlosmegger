<?php
/*
 * Version 1.0
 * Date: 2012-05-11
 * Author: Marcel Rodrigo
 * URL: www.marcelrodrigo.com.br
 * Description: Classe auxiliar para manipulação de Posttypes, taxonomias e metas.
 */
class PostType{
	
	private $name;
	private $labels = array();
	private $args = array();
	
	private $taxonomies = array();
	private $metabox = array();
	
	private $__tax;
	private $__meta;
	
	public function __cb_pt_register(){
		register_post_type($this->name, $this->args);
	}
	
	public function __construct($name, $labels = array(), $args = array()){
		
		$this->setDefaults();
		
		$this->name = $name;
		$this->labels = array_merge($this->labels, $labels);
		$this->args = array_merge($this->args, $args);
		
		$this->args['labels'] = $this->labels;
		
		if( ! post_type_exists( $name ) ){
			add_action('init', array(&$this, '__cb_pt_register'));
		}
		
	}
	
	public function save(){
		if($this->taxonomies){
			$this->registerTaxonomies();
		}
		
		if($this->metabox){
			$this->registerMeta();
		}
				
	}
	
	public function addTaxonomy($name, $args = array(), $inColumn = true, $inFilter = true){
		$defaults = array(
			'label' => '',
			'hierarchical' =>true, 
			'show_ui' => true, 
			'query_var' => true, 
			'show_in_nav_menus' => true, 
			'public' => true
		);
		
		$this->taxonomies[] = array(
			'name'		=> $name,
			'args'		=> array_merge($defaults, $args),
			'inFilter'	=> $inFilter,
			'inColumn' 	=> $inColumn,
		);
	}
	
	public function addMeta($meta = array() ){
		$this->metabox[] = array('meta' => $meta);
	}

	private function setDefaults(){
		$labels = $this->labels;
		$this->labels = array(
				'name' => '',
				'singular_name' => '',
			    'add_new' => 'Adicionar ítem',
				'add_new_item' => 'Adicionar ítem',
				'edit_item' => 'Editar ítem',
				'new_item' => 'Novo ítem',
				'all_items' => 'Todos os ítens',
				'view_item' => 'Ver ítens',
				'search_items' => 'Buscar ítens',
				'not_found' =>  'Nenhum ítem encontrado',
				'not_found_in_trash' => 'Nenhum ítem na lixeira', 
				'parent_item_colon' => '',
				'menu_name' => ''
		);
		
		$this->args = array(
				'labels' => $this->labels,
				'public' => true,
		        'publicly_queryable' => true,
		        'show_ui' => true,
		        'show_in_menu' => true,
		        'show_in_nav_menus' => true,
		        'query_var' => true,
		        'menu_position' => 4,
		        'capability_type' => 'post',
		        'hierarchical' => true,
		        'has_archive' => true,
		        'rewrite' => array('slug' => '', 'with_front' => true, 'hierarchical' => true ),
		        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'tags' ),
		);
	}
	
	public function __cb_taxonomy_register(){
		foreach ($this->taxonomies as $current){
			register_taxonomy( $current['name'], $this->name,  $current['args']);
		}
	}
	
	public function __cb_taxonomy_insert_filter(){
		global $typenow;
		
		for($i = 0, $s = count($this->__tax['filters']); $i < $s; $i++){
			
			if($this->__tax['filters'][$i]['inFilter'] && $typenow == $this->name ){
				$filters = array($this->__tax['filters'][$i]['name']);
			
				foreach ($filters as $tax_slug) {
					$tax_obj = get_taxonomy($tax_slug);
					$tax_name = $tax_obj->labels->name;
					$terms = get_terms($tax_slug);
						
					echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
					echo "<option value=''>".$this->__tax['filters'][$i]['args']['label']."&nbsp;&nbsp;</option>";
						
					foreach ($terms as $term) {
					echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
					}
					
					echo "</select>";
				}
			}
			
		}
		
	}
	
	public function __cb_taxonomy_setup_filter($query){
		global $pagenow;
		if ( is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_FIELD_NAME']) && $_GET['ADMIN_FILTER_FIELD_NAME'] != '') {
			$query->query_vars['meta_key'] = $_GET['ADMIN_FILTER_FIELD_NAME'];
			if (isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != '')
			$query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
		}
	}
	
	public function __cb_taxonomy_add_column($columns){
		$columns[$this->__tax['columns'][0]['name']] = $this->__tax['columns'][0]['args']['label'];
		
		array_shift($this->__tax['columns']);
		
		return $columns;
	}
	
	public function __cb_taxonomy_add_column_content($column_name, $post_id){
		global $custom_columns;
	
		if(!isset($custom_columns[$post_id][$column_name])){
			$taxonomy = $column_name;
			$terms = get_the_terms($post_id, $taxonomy);
				
			if ( !empty($terms) ) {
				$post_terms = array();
				foreach ( $terms as $term ){
					$post_terms[] = "<a href='edit.php?post_type={$posttype}&{$taxonomy}={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
				}
				echo join( ', ', $post_terms );
			}
				
			$custom_columns[$post_id][$column_name] = true;
		}
	}
	
	private function registerTaxonomies(){
		
		$posttype = $this->name;
		
		// REGISTER
		add_action('init', array(&$this, '__cb_taxonomy_register'));
		
		foreach($this->taxonomies as $tax){
			extract($tax);	
			
			// SHOW FILTER
			if($inFilter){
				$this->__tax['filters'][] = $tax;
				
				add_action( 'restrict_manage_posts', array(&$this, '__cb_taxonomy_insert_filter'));
				
				add_filter( 'parse_query', array(&$this, '__cb_taxonomy_setup_filter'));
					
			}// END FILTER
			
			// SHOW COLUMN
			if($inColumn){
				$this->__tax['columns'][] = $tax;
				
				add_filter("manage_edit-{$posttype}_columns", array( &$this, '__cb_taxonomy_add_column'));
				
				add_action("manage_{$posttype}_posts_custom_column", array(&$this, '__cb_taxonomy_add_column_content'), 10, 3);
				do_action("manage_{$posttype}_posts_custom_column", $column_name, $post_id, $posttype);
			}// END COLUMN
			
		}// END LOOP
		
	}
		
	public function __cb_mt_head_date(){
		$output = '<script type="text/javascript">jQuery(function() {';
		$output .= 'jQuery(".datepicker").datepicker();';
		$output .= '});</script>';
		echo $output;
	}
	
	public function __cb_mt_head_slider(){
		global $post;
		
		$output = '<script type="text/javascript">jQuery(function() {';
		
		$meta = $this->__meta['head'][0];
		
		$value = get_post_meta($post->ID, $meta['id'], true);
		if ($value == '') $value = $meta['options']['min'];
		
		$output .=
		'
			jQuery( "#'.$meta['id'].'-slider" ).slider({
				value: '.$value.',
				min: '.$meta['options']['min'].',
				max: '.$meta['options']['max'].',
				step: '.$meta['options']['step'].',
				slide: function( event, ui ) {
					jQuery( "#'.$meta['id'].'" ).val( ui.value );
				}
			});
		';
			
		$output .= '});</script>';
			
		echo $output;
		
		array_shift($this->__meta['head']);
	}
	
	public function __cb_mt_filter_inColumn($columns){
		$meta = $this->__meta['columns'][0];
		$columns[$meta['id']] = $meta['label'];
		
		array_shift($this->__meta['columns']);
		return $columns;
	}
	
	public function __cb_mt_action_inColumn($column_name, $post_id){
		if(!isset($custom_columns[$post_id][$column_name])){
			$value = get_post_meta($post_id, $column_name, true);
				
			if ( !empty($value) ) {
				echo "<a href='edit.php?post_type={$this->name}&meta_key={$column_name}&meta_value={$value}'>{$value}</a>";
			}
		
		}
	}
	
	public function __cb_mt_save_post($post_id){
		
		for($i = 0, $s = count($this->__meta['save']); $i < $s; $i++){
			$meta = $this->__meta['save'][$i];
		
			// verify nonce
			if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) return $post_id;
				
			// check autosave
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
				
			// check permissions
			if ('page' == $_POST['post_type']) {
				if (!current_user_can('edit_page', $post_id))
				return $post_id;
			} elseif (!current_user_can('edit_post', $post_id)) {
				return $post_id;
			}
				
			$old = get_post_meta($post_id, $meta['id'], true);
			$new = $_POST[$meta['id']];
				
			if ($new && $new != $old) {
				update_post_meta($post_id, $meta['id'], $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $meta['id'], $old);
			}
		
		}
	}
	
	public function __cb_mt_add_metabox(){
		add_meta_box('custom_meta_box', 'Opções', array(&$this, '__cb_mt_view_metabox'), $this->name, 'normal', 'high');
	}
	
	public function __cb_mt_view_metabox(){
		global $post;
		
		$meta = $this->__meta['metabox'][0];
			
		echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
		
		echo '<table class="form-table">';
		
		foreach($this->metabox as $item){
			extract($item);
			$value = get_post_meta($post->ID, $meta['id'], true);
				
			echo '<tr><th><label for="'.$meta['id'].'">'.$meta['label'].'</label></th><td>';
				
			echo MetaFactory::get($meta, $value);
				
			echo '</td></tr>';
		}
		
		echo '</table>';
		
		array_shift($this->__meta['metabox']);
	}
	
	private function registerMeta(){
		
		foreach ($this->metabox as $item){
			extract($item);
					
			// HEADER
			if(is_admin()) {

				wp_enqueue_script('admin-js', get_template_directory_uri().'/_assets/js/admin.js');
				wp_enqueue_style('jquery-ui-custom', get_template_directory_uri().'/_assets/css/jquery-ui-custom.css');
				wp_enqueue_style('admin-css', get_template_directory_uri().'/_assets/css/admin.css');
			
				// DATE
				if($meta['type'] == MetaFactory::DATE){
					wp_enqueue_script('jquery-ui-datepicker');
					
					add_action('admin_head', array(&$this, '__cb_mt_head_date'));
				}
			
				// SLIDER
				else if($meta['type'] == MetaFactory::SLIDER){
					wp_enqueue_script('jquery-ui-slider');
					$this->__meta['head'][] = $meta;
					add_action('admin_head', array(&$this, '__cb_mt_head_slider'));
				}
			}// END HEADER
			
			if(isset($meta['inColumn']) && $meta['inColumn'] == true){
				$this->__meta['columns'][] = $meta;
				add_filter("manage_edit-{$this->name}_columns", array(&$this, '__cb_mt_filter_inColumn'));
				
				add_action("manage_{$this->name}_posts_custom_column", array(&$this, '__cb_mt_action_inColumn'));
			
			}// END COLUMN
			
			$this->__meta['save'][] = $meta;
			add_action('save_post', array(&$this, '__cb_mt_save_post'));
			
			
		}// END EACH
			
		$this->__meta['metabox'][] = $meta;
		add_action('add_meta_boxes', array(&$this, '__cb_mt_add_metabox'));
	}
	
}

class MetaFactory{
	
	const TEXT 							= 1;
	const TEXTAREA 						= 2;
	const CHECKBOX 						= 3;
	const CHECKBOX_GROUP 				= 4;
	const CHECKBOX_MULTI_VALUES_GROUP	= 5;
	const SELECT 						= 6;
	const SELECT_GROUP					= 7;
	const RADIO 						= 9;
	const DATE 							= 10;
	const SLIDER 						= 11;
	const IMAGE 						= 12;
	const FILE 							= 13;
	const REPEATABLE 					= 14;
	
	
	public static function get($meta, $value){
	
		if($meta['type'] == self::TEXT){
			$out = '<input type="text" name="'.$meta['id'].'" id="'.$meta['id'].'" value="'.$value.'" size="60" />';
		}
	
		else if ($meta['type'] == self::TEXTAREA){
			$out = '<textarea class="classic" name="'.$meta['id'].'" id="'.$meta['id'].'" cols="40" rows="1">'.$value.'</textarea>';
		}
	
		else if ($meta['type'] == self::CHECKBOX){
			$out = '<input type="checkbox" name="'.$meta['id'].'" id="'.$meta['id'].'" '.($value ? ' checked="checked"' : '').'/>';
		}
	
		else if ($meta['type'] == self::CHECKBOX_GROUP){
			$out = "";
			foreach ($meta['options'] as $option) {
				$out .= '<input type="checkbox" value="'.$option['value'].'" name="'.$meta['id'].'[]" id="'.$option['value'].'" '. (is_array($value) && in_array($option['value'], $value) ? "checked=\"checked\"" : "").'  />';
				$out .= '<label for="'.$meta['id'].'[]">'.$option['label'].'</label><br />';
			}
		}
		
		else if ($meta['type'] == self::CHECKBOX_MULTI_VALUES_GROUP){
			$out = "";
			
			for ($i = 0, $s = count($meta['options']['id']); $i < $s; $i++) {				
				$arr_class = array('green', 'yellow', 'red');
				$class = is_array($value) && isset($value['status']) ? $arr_class[$value['status'][$i]] : 0;
				
				$out .= '<span class="checkbox '.$class.'" id="'.$meta['id'].$i.'"></span>';
				$out .= '<label>'.$meta['options']['label'][$i].'</label>';
				$out .= '<input type="hidden" class="'.$meta['id'].$i.'" value="'.(is_array($value) && isset($value['status']) ? $value['status'][$i] : 0 ).'" name="'.$meta['id'].'[status][]" />';
				$out .= '<input type="hidden" class="'.$meta['options']['id'][$i].'" value="'.(is_array($value) && isset($value['id']) ? $value['id'][$i] : $meta['options']['id'][$i] ).'" name="'.$meta['id'].'[id][]" /><br />';
			}	
		}
	
		else if ($meta['type'] == self::SELECT){
			$out = '<select name="'.$meta['id'].'" id="'.$meta['id'].'">';
			foreach ($meta['options'] as $option) {
				$out .= "\n\r<option". $value == $option['value'] ? ' selected=\"selected\"' : ''. " value=\"".$option['value']."\">".$option['label']."</option>";
			}
			$out .= '</select>';
		}
		
		else if ($meta['type'] == self::SELECT_GROUP){
			$out = '<select name="'.$meta['id'].'" id="'.$meta['id'].'">';
			$out .= '<option value=""></option>';
			foreach ($meta['options'] as &$group) {
				$out .= '<optgroup label="'.$group['label'].'">';
				foreach($group['options'] as $option){
					$out .= "\n\r<option". ($value == $option['value'] ? ' selected="selected"' : ''). " value=\"".$option['value']."\">".$option['label']."</option>";
				}				
				$out .= '</optgroup>';
				
				
			}
			$out .= '</select>';
		}
		
		else if ($meta['type'] == self::RADIO){
			$out = "";
			foreach ($meta['options'] as $option) {
				$out .= '<input type="radio" value="'.$option['value'].'" name="'.$meta['id'].'" id="'.$meta['id'].'-'.$option['value'].'" '.($option['value'] == $value ? "checked=\"checked\"" : "").'  />';
				$out .= '<label for="'.$meta['id'].'">'.$option['label'].'</label><br />';
			}
		}
		
		else if ($meta['type'] == self::DATE){
			$out = '<input type="text" class="datepicker" name="'.$meta['id'].'" id="'.$meta['id'].'" value="'.$value.'" size="30" />';
		}
		
		else if ($meta['type'] == self::SLIDER){
			$value = ($value != '' ? $value : $meta['option']['min']);
			
			$out = '<div id="'.$meta['id'].'-slider"></div>';
			$out .= '<input type="text" name="'.$meta['id'].'" id="'.$meta['id'].'" value="'.$value.'" size="5" readonly="readonly" />';
			
		}
		
		else if ($meta['type'] == self::IMAGE){
			$image = "";
			$out = '<span class="custom_default_image" style="display:none">'.$image.'</span>';
			if($value){
			 	$image = $value;
			} else {
				$image = '';
			}
			
			$out .= '<img src="'.$image.'" class="custom_preview_image" alt="" /><br />';
			
			$out .= '<input name="'.$meta['id'].'" type="hidden" class="custom_upload_image" value="'.$value.'" />';
			$out .= '<input class="custom_upload_image_button button" type="button" value="Selecione a imagem" />';
			$out .= '<small>&nbsp;<a href="#" class="custom_clear_image_button">Remover imagem</a></small>';
		}
	
		else if ($meta['type'] == self::FILE){
			$out = '<input name="'.$meta['id'].'" type="hidden" class="custom_upload_file" value="'.$value.'" />';
			$out .= '<input name="custom_preview_file" readonly="readonly" type="text" class="custom_preview_file" value="'.$value.'" />';
			$out .= '<input class="custom_upload_file_button button" type="button" value="Escolha um arquivo" />';
			$out .= '<small>&nbsp;<a href="#" class="custom_clear_file_button">Remova o arquivo</a></small>';
		}
		
		else if ($meta['type'] == self::REPEATABLE){
			$out = '<a class="repeatable-add button" href="#">+</a>';
			$out .= '<ul id="'.$meta['id'].'-repeatable" class="custom_repeatable">';
			$i = 0;
			if ($value) {
				foreach($value as $row) {
					$out .= "\n\r<li><span class=\"sort hndle\">|||</span>";
					$out .= '<input type="text" name="'.$meta['id'].'['.$i.']" id="'.$meta['id'].'" value="'.$row.'" size="30" />';
					$out .= '<a class="repeatable-remove button" href="#">-</a></li>';
					$i++;
				}
			}
			else {
				$out .= '<li><span class="sort hndle">|||</span>';
				$out .= '<input type="text" name="'.$meta['id'].'['.$i.']" id="'.$meta['id'].'" value="" size="30" />';
				$out .= '<a class="repeatable-remove button" href="#">-</a></li>';
			}
			$out .= '</ul>';
		}
		
		if(isset($meta['desc'])){
			$out .= '<br /><span class="description">'.$meta['desc'].'</span>';
		}
	
		return $out;
	
	}
}
?>