<?php
     $id = $_GET['id'];
    define('__CONFIG__', true);
	require_once "inc/config.php"; 
    

    
    $return = [];
    $conn = mysqli_connect("localhost", "uge4rgg4trfhx", "checkitout69956294", "dbjqbahwzxt5k9");
    $query = mysqli_query($conn, "SELECT post_id, poster FROM replies WHERE reply_id = $id;");
   


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}





if (mysqli_query($conn, "DELETE FROM post1 WHERE post_id = $id")) {
    mysqli_close($conn);
   
    header('Location: '.$_SESSION["URL"]);
    exit;
} else {
    echo "Error deleting record";
}


?>