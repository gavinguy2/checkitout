<?php 

	define('__CONFIG__', true);
	require_once "../inc/config.php"; 

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$return = [];

		$email = Filter::String( $_POST['email'] );
		$username = Filter::String( $_POST['username'] );

		$findUser = $con->prepare("SELECT id FROM create_user WHERE email = LOWER(:email) LIMIT 1");
		$findUser->bindParam(':email', $email, PDO::PARAM_STR);
		$findUser->execute();

		$findUser1 = $con->prepare("SELECT id FROM create_user WHERE username = LOWER(:username) LIMIT 1");
		$findUser1->bindParam(':username', $username, PDO::PARAM_STR);
		$findUser1->execute();

		if($findUser->rowCount() == 1) {
			$return['error'] = "You already have an account.";
			$return['is_logged_in'] = false;
		}
		elseif($findUser1->rowCount() == 1){
            $return['error'] = "Username is taken.";
			$return['is_logged_in'] = false;
            
        } else { 
            
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            
		
			$user_id = $con->lastInsertId();

			$_SESSION['id'] = (int) $user_id;

			
            $sql = "INSERT INTO create_user (username, email, password)
            VALUES ('$username', '$email', '$password')";
            $con->exec($sql);
            $return['redirect'] = '/dashboard.php';
			$return['is_logged_in'] = true;
            $user_id = $con->lastInsertId();

			$_SESSION['id'] = (int) $user_id;
            $_SESSION['username'] = $username;
    
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		exit('Invalid URL');
	}
?>
