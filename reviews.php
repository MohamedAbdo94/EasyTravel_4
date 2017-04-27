<?php include('includes/database.php'); ?>
<?php
	if($_POST){
		//Get variables from post array        
		$name = mysql_real_escape_string($_POST['name']);
		$body = mysql_real_escape_string($_POST['body']);
     { 
		//Create reviews query
		$query ="INSERT INTO reviews (name,body)
								VALUES ('$name','$body')";
		//Run query
		$mysqli->query($query);
		
		header('Location: reviews_list.php');
	 } 
    
	
		exit;
		}
		
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Easy Travel Egypt | Reviews</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="index.php">Home</a></li>
			     <?php if( isset($_COOKIE['user_email']) ): ?>
              <li role="presentation"><a href="log_out.php">Log Out</a></li>
           <?php else: ?>
              <li role="presentation"><a href="log_in.php">Log In</a></li>
           <li role="presentation"><a href="sign_up.php">Sign Up</a></li>
           <?php endif; ?>
           <li role="presentation"class="active"><a href="reviews.php">Reviews</a></li>
		   <li role="presentation"><a href="about.php">About</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Easy Travel Egypt</h3>
      </div>

     

  <div class="row marketing">
      
        <div>
        <h2> Help us be better <h2>
		</div>
<form role="form" method="post" action="reviews.php">
		

   <div class="form-group">
   
    <input name="name" type="text" class="form-control" placeholder="Your Name">
   </div>
   
   <div class="form-group">
   
  
    <textarea name="body" class="form-control" rows="6" placeholder="Your Review"></textarea>
   </div>
	
	
	 <input type="submit" class="btn btn-default" value= "Submit" />
</form>
   </div>

      <footer class="footer">
        <p>&copy; 2017 Abdelbary S.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
