<?php 

	define('__CONFIG__', true);
	require_once "inc/config.php"; 

    ForceLogin();
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">

    <title>Rhythm, and Blues</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
            <link rel="stylesheet" href="/style.css" />

      
  </head>
    

  <body>
      <br>
      <h2><b>Rhythm, and Blues</b></h2>
      
      
      <div class="welcome">
             <p>
                 <a href="/dashboard.php">Home</a><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp; Welcome! <?php echo $_SESSION['username']; ?>
        <a href="/logout.php">Logout</a><br><br>
                 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/create_post.php">Create a post</a>
                 <br><br>
  		</p>
      </div>
     
      
    <div class="posts">
      
         <?php
        $conn = mysqli_connect("localhost", "uge4rgg4trfhx", "checkitout69956294", "dbjqbahwzxt5k9");
       $query = mysqli_query($conn, "SELECT post_id, post_title, post_cat, poster FROM post1;");
            
            
            while($data = mysqli_fetch_assoc($query)){
                $cat = $data["post_cat"];
                
                if($cat == "rhythm"){
                echo "<a href ='show.php?title=".$data["post_id"]."'>" ." &nbsp; &nbsp;      ".$data["post_title"]. " <sub>by <b>".$data["poster"]."</b></sub></a><br><br>";
                }
            }
      
      ?>
      
        
      </div>
      
    <?php
      $_SESSION["URL"] = "/rhythm.php";
      $_SESSION["CAT"] = "rhythm";
      
      ?>
      
     
      
      

  	<?php require_once "inc/footer.php"; ?> 
  </body>
</html>
