<?php 
	define('__CONFIG__', true);

	require_once "../inc/config.php"; 

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$return = [];

		$password = $_POST['password'];
        $username = Filter::String( $_POST['username'] );

		$findUser = $con->prepare("SELECT id, password FROM create_user WHERE username = :username LIMIT 1");
		$findUser->bindParam(':username', $username, PDO::PARAM_STR);
		$findUser->execute();

		if($findUser->rowCount() == 1) {
			$User = $findUser->fetch(PDO::FETCH_ASSOC);
            
            $user_id = (int) $User['id'];
            $hash = (string) $User['password'];
            
            if(password_verify($password, $hash)){
                //sign in
                $return['redirect'] = '/dashboard.php';
                
                $_SESSION['id'] = $user_id;
                $_SESSION['username'] = $username;
            }else{
                $return['error'] = "Invalid password";
            }
            
            
		} else { 
            $return['error'] = "You do not have an account.";
			
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		exit('Invalid URL');
	}
?>
