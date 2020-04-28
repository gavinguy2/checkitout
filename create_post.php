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

    <title>Create a post</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
          <link rel="stylesheet" href="/style.css" />

  </head>

  <body>

  	<div class="uk-section uk-container">
  		<div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid>
			<form class="uk-form-stacked js-post">
				
				<h2><b>Create a Post</b></h2>
                
                <div class="text_entry">
                <br>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="form-stacked-text">Post Title</label>
			        <div class="uk-form-controls">
			            <input class="uk-input" id="post_title" type="text" required='required' placeholder="Post Title">
			        </div>
			    </div>
                    

			    <div class="uk-margin">
			        <label class="uk-form-label" for="form-stacked-text">Description</label>
			        <div class="uk-form-controls">
			            <input class="uk-input" id="post_description" type="text" required='required' placeholder="Description">
			        </div>
			    </div>
                </div>
                <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>

                <div class="buttons">
			    <div class="uk-margin">
			        <button class="uk-button uk-button-default" type="submit">Post</button>
			    </div>
                </div>
			</form>
  		</div>
        
  	</div>

      
  	<?php require_once "inc/footer.php"; ?> 
  </body>
</html>
