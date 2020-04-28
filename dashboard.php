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

    <title>Check it out</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
    <link rel="stylesheet" href="/style.css" />

  </head>

  <body>
      <br>
      <img src="/photos/lable2.png" alt = "check it out">

         <br><br><br>
        <div class="welcome">
        <p >&nbsp;&nbsp;&nbsp;Welcome! <?php echo $_SESSION['username']; ?>
            <a href="/logout.php">Logout</a></p>
  	</div>
<br><br><br><br>
      <div class="intro">
      <p><b>
Welcome to Check it out! This is a forum for helping you find your next band/artist.
        </b>
          </p></div>
          
          <br>
      

      <div class="box">
      
      <div class="left_categories">
          
          <a href="/alternativerock.php">Alternative Rock</a>
          
          <br>
          <br>
          <br>
          
          <a href="/classical.php">Classical</a>
          
          <br>
          <br>
          <br>
          
          <a href="/country.php">Country</a>
          
          <br>
          <br>
          <br>
          
          <a href="/dubstep.php">Dubstep</a>
          
          <br>
          <br>
          <br>
          
          <a href="/electronic.php">Electronic</a>
          
          <br>
          <br>
          <br>
          
          <a href="/folk.php">Folk</a>
          
          <br>
          <br>
          <br>
          
          <a href="/hiphop.php">Hip hop</a>
          
          <br>
          <br>
          <br>
          
          <a href="/indierock.php">Indie Rock</a>
      
      </div>
      
          
    <div class="dummy" >
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        
          </div>
      <div class="right_categories">
          <a href="/jazz.php">Jazz</a>
          
          <br>
          <br>
          <br>
          
          <a href="/metal.php">Metal</a>
          
          <br>
          <br>
          <br>
          
          <a href="/pop.php">Pop</a>
          
          <br>
          <br>
          <br>
          
          <a href="/punkrock.php">Punk Rock</a>
          
          <br>
          <br>
          <br>
          
          <a href="/rap.php">Rap</a>
          
          <br>
          <br>
          <br>
          
          <a href="/reggae.php">Reggae</a>
          
          <br>
          <br>
          <br>
          
          <a href="/rhythm.php">Rhythm, and Blues</a>
          
          <br>
          <br>
          <br>
          
          <a href="/rock.php">Rock & Roll</a>
    </div>
      
      </div>

  	<?php require_once "inc/footer.php"; ?> 
  </body>
</html>
