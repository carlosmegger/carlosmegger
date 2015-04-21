<?php

require (dirname(__FILE__) . '/_theme/posttype.class.php');

# CRIANDO POST TYPE
$args =  array(
	'name' => 'Notícias',
	'singular_name' => 'Notícia',
	'menu_name' => 'Notícias'
);
$posttype_noticias = new PostType('noticias', $args);

# CRIANDO TAXONOMIAS
$posttype_noticias->addTaxonomy('tipo', array('label' => 'Tipo'));
$posttype_noticias->addTaxonomy('cidade', array('label' => 'Cidade'));
$posttype_noticias->addTaxonomy('editora', array('label' => 'Editora'));

# CRIANDO METAS
$posttype_noticias->addMeta(array('id' => 'not_fonte', 'type' => MetaFactory::TEXT, 'label' => 'Fonte', 'desc' => 'Fonte de dados.', 'inColumn' => true));
$posttype_noticias->addMeta(array('id' => 'not_registro', 'type' => MetaFactory::TEXT, 'label' => 'Registro'));
$posttype_noticias->addMeta(array('id' => 'not_ativo', 'type' => MetaFactory::CHECKBOX, 'label' => 'Ativo'));

$args = array(
	array('label' => 'Azul', 'value' => 8),
	array('label' => 'Branco', 'value' => 1),
	array('label' => 'Vermelho', 'value' => 2),
	array('label' => 'Preto', 'value' => 5),
	array('label' => 'Verde', 'value' => 7),
	array('label' => 'Cinza', 'value' => 3),
);
$posttype_noticias->addMeta(array('id' => 'not_check_group', 'type' => MetaFactory::CHECKBOX_GROUP, 'label' => 'CKB Grupo', 'options' => $args));

$args = array(
	array(
		'label' => 'Grupo 1',
		'options' => array(
			array('label'	=> 'Option 1', 'value' => 1),
			array('label'	=> 'Option 2', 'value' => 2),
			array('label'	=> 'Option 3', 'value' => 3),
		)
	),
	array(
		'label' => 'Grupo 2',
		'options' => array(
			array('label'	=> 'Option 4', 'value' => 4),
			array('label'	=> 'Option 5', 'value' => 5),
			array('label'	=> 'Option 6', 'value' => 6),
		)
	),
	array(
		'label' => 'Grupo 3',
		'options' => array(
			array('label'	=> 'Option 7', 'value' => 7),
			array('label'	=> 'Option 8', 'value' => 8),
			array('label'	=> 'Option 9', 'value' => 9),
		)
	),
);
$posttype_noticias->addMeta(array('id' => 'not_select_group', 'type' => MetaFactory::SELECT_GROUP, 'label' => 'Select Grupo', 'options' => $args));

$args = array(
	array('label' => 'Sim', 'value' => 's'),
	array('label' => 'Não', 'value' => 'n'),
);
$posttype_noticias->addMeta(array('id' => 'not_radio', 'type' => MetaFactory::RADIO, 'label' => 'Radio button', 'options' => $args));

$posttype_noticias->addMeta(array('id' => 'not_data', 'type' => MetaFactory::DATE, 'label' => 'Data'));
$posttype_noticias->addMeta(array('id' => 'not_foto', 'type' => MetaFactory::IMAGE, 'label' => 'Foto'));
$posttype_noticias->addMeta(array('id' => 'not_file', 'type' => MetaFactory::FILE, 'label' => 'File'));
$posttype_noticias->addMeta(array('id' => 'not_repeat', 'type' => MetaFactory::REPEATABLE, 'label' => 'Repeatable'));
$posttype_noticias->addMeta(array('id' => 'not_txtarea', 'type' => MetaFactory::TEXAREA, 'label' => 'Text area'));
$posttype_noticias->addMeta(array('id' => 'not_slider', 'type' => MetaFactory::SLIDER, 'label' => 'Slider', 'options' => array('min' => 16, 'max' => '90', 'step' => 1)));

# SALVANDO METAS E TAXONOMIAS
$posttype_noticias->save();
?>