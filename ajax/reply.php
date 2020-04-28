<?php 
	session_start();
	define('__CONFIG__', true);

	require_once "../inc/config.php"; 


	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$return = [];

		
           
            $reply = Filter::String( $_POST['new_reply'] );
            $username = $_SESSION['username'];
            
            $post_id = $_POST['post_id'];
		
			
                 $sql = "INSERT INTO replies (post_id, reply_poster, reply_description) VALUES ('$post_id', '$username', '$reply')";
            $con->exec($sql);
			

            
		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		exit('Invalid URL');
	}
?>

