<?php 
   
	define('__CONFIG__', true);
	require_once "inc/config.php"; 

    ForceLogin();

?>

<!DOCTYPE html>
<html lang="en">

  <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">
      <?php 
            $conn = mysqli_connect("localhost", "uge4rgg4trfhx", "checkitout69956294", "dbjqbahwzxt5k9");
            $title = $_GET["title"];
            $query = mysqli_query($conn, "SELECT post_id, poster, post_title, post_description FROM post1 WHERE post_id='$title';");
            $data = mysqli_fetch_assoc($query);
            $current = $data["post_id"];
            $_SESSION["reply_title"] = $data["post_title"] ;
            ?>
    <title><?php echo $_SESSION["reply_title"]; ?></title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
      <link rel="stylesheet" href="/style.css" />
    
      <script type="text/javascript">
        $(document).ready(function() {
                $('#button').on('click', function(){
                    var url = document.URL;
                   
                    //$('#replies').load(document.URL +  ' #replies');
                    $('#replies').load(url +  ' #replies');
                    
                setInterval(function() {
               $('#replies').load(url +  ' #replies');
                    }, 100);
                
                }); 

          });
      </script>
  </head>
  <body>
      <br>
      <br>
      <div class="welcome"><p>
      <a href="/dashboard.php">Home</a> > 
      <a href=<?php echo $_SESSION["URL"]; ?>> <?php echo $_SESSION["CAT"]; ?></a>
          </p>
          </div>
      <div class="replies">      	
        <?php 
            $conn = mysqli_connect("localhost", "uge4rgg4trfhx", "checkitout69956294", "dbjqbahwzxt5k9");
            $title = $_GET["title"];
            
            if(is_null($title)){
                header("Location: index.php");
            }
        
        
            $query = mysqli_query($conn, "SELECT post_id, poster, post_title, post_description FROM post1 WHERE post_id='$title';");
            $data = mysqli_fetch_assoc($query);
            $current = $data["post_id"];
            if(is_null($data["post_id"])){
                header("Location: index.php");
            }
        
            echo "<h2>".$data["post_title"]. "</h2>";
            if($_SESSION['username'] == $data['poster']){
                 echo "&nbsp;&nbsp;&nbsp;<td><a  href='/delete_post.php?id=".$data['post_id']."'>Delete</a></td><br><br><br>"; }
            echo "<sup>by <b>".$data["poster"]. "</b></sup> <br><hr><br>";
            

            echo "<p>".$data["post_description"]. "</p><br><hr>";
            ?>
          
      </div>
      <script>var current = <?php echo json_encode($current); ?>;</script>
      <div id="replies">
        <?php
        $conn2 = mysqli_connect("localhost", "uge4rgg4trfhx", "checkitout69956294", "dbjqbahwzxt5k9");
            $query2 = mysqli_query($conn2, "SELECT post_id, reply_id, reply_poster, reply_description FROM replies;");
            while($data = mysqli_fetch_assoc($query2) ){
                $post_id = $data["post_id"];
                if($post_id == $title){
                    echo "<tr>";
                    echo "<td>".$data['reply_description']."</td>";
                    echo "<br> ";
                    echo "<td><sub>by ".$data['reply_poster']."</sub></td>";
                    if($_SESSION['username'] == $data['reply_poster']){
                    echo "<br><td><a href='/delete.php?id=".$data['reply_id']."&pd=".$data['post_id']."'>Delete</a></td>"; };
                    echo "</tr>";
                    echo"<br><hr>";}
                else{
                    echo "";
                }
                
            }
        ?>
          
       </div>
          <br>
  		<div class="uk-grid uk-child-width-1-5@s uk-child-width-1-1" uk-grid>
			<form class="uk-form-stacked js-reply">
				
                <div class="text_entry">
			    <div class="uk-margin">
			        <label class="uk-form-label" for="form-stacked-text">Reply</label>
			        <div class="uk-form-controls">
			            <input class="uk-textarea"  id="new_reply" type="text" required='required' placeholder="Reply">
			        </div>
			    </div>
            </div>
			    
                
                <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>

                <div class="buttons">
			    <div class="uk-margin" id="button">
			        <button class="uk-button uk-button-default" type="submit">Reply</button>
			    </div>
                </div>

			</form>
  		</div>

      
  	<?php require_once "inc/footer.php"; ?> 
  </body>
</html>