<?php
	if(isset($_GET['action'])){
		$func = $_GET['action'];

		define('WP_USE_THEMES', false);
		require('../../../../wp-blog-header.php');
		status_header('200');
		
		if($func == 'my_function'){
			my_function('param');
		}
	}
	
	function my_function($param){
		echo json_encode($param);
	}
	
	
?>