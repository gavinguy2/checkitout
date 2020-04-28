<?php 
	define('__CONFIG__', true);

	require_once "../inc/config.php"; 

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$return = [];

            $post_title = Filter::String( $_POST['post_title'] );
            $post_description = Filter::String( $_POST['post_description'] );
            $poster = $_SESSION['username'];
            $cat = $_SESSION["CAT"];
		
			
            $sql = "INSERT INTO post1 (poster, post_title, post_cat, post_description)
            VALUES ('$poster', '$post_title', '$cat', '$post_description')";
            $con->exec($sql);
            $return['redirect'] = $_SESSION["URL"];
			

            
		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		exit('Invalid URL');
	}
?>
