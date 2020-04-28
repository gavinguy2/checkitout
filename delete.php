<?php
     $id = $_GET['id'];
     $pd = $_GET['pd'];
    define('__CONFIG__', true);
	require_once "inc/config.php"; 
    

    
    $return = [];
    $conn = mysqli_connect("localhost", "uge4rgg4trfhx", "checkitout69956294", "dbjqbahwzxt5k9");
    $query = mysqli_query($conn, "SELECT post_id, poster FROM replies WHERE reply_id = $id;");
    
    //$data = mysqli_fetch_assoc($query);
    

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}





if (mysqli_query($conn, "DELETE FROM replies WHERE reply_id = $id")) {
    mysqli_close($conn);
   
    header('Location: show.php?title='.$pd);
    //header('Location: index.php ');
    //$return['redirect'] = $_SESSION["URL"];
    //$return['redirect'] = 'show.php?title='.$_SESSION['delete'];
    //header('Location: show.php?title='.$post_id);
    exit;
} else {
    echo "Error deleting record";
}
    

?>