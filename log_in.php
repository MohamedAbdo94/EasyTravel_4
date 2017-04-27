<?php include('includes/database.php'); 

if( isset($_COOKIE['user_email']) && $_COOKIE['user_email'] != null){
  header('Location: profile.php');
}

session_start();

	if($_POST){
		//Get variables from post array
		
		$email = mysql_real_escape_string($_POST['email']);		
		$password = mysql_real_escape_string(md5($_POST['password']));
		
		 $sql="SELECT * FROM customers WHERE email='$email' AND password='$password'";
     $result=mysqli_query($mysqli ,$sql);
    if(mysqli_num_rows($result)==1)
    {
        setcookie( 'user_email' , $email );   
        header('Location: profile.php');
        exit;
    }
   else
   
   {
    $_SESSION['error'] = 'User name or password incorrect.';
	
   }
	    
		//exit;
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Easy Travel Egypt | Log In</title>

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
			<li role="presentation" class="active"><a href="log_in.php">Log In</a></li>
			<li role="presentation"><a href="sign_up.php">Sign Up</a></li>
           <li role="presentation"><a href="reviews.php">Reviews</a></li>
		   <li role="presentation"><a href="about.php">About</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Easy Travel Egypt</h3>
      </div>
	  
	 <?php if(isset($_SESSION['error'])){
			echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
		}
    session_unset(); 

    // destroy the session 
    session_destroy(); 
	?>


     

  <div class="row marketing">
     <div>
         <h2>Log In</h2>
  	 </div>
        
		 <form role="form" method="post" action="log_in.php">


      <div class="form-group">
         <label>Email address</label>
         <input name="email" type="email" class="form-control"placeholder="Enter Email" required>
      </div>
      <div class="form-group">
         <label>Password</label>
       	   <input name="password" type="password" class="form-control" placeholder="Enter Password" required>
       </div>

     <input type="submit" class="btn btn-default" value="Log In" />
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