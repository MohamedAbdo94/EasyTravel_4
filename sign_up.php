<?php 

if( isset($_COOKIE['user_email']) ){
  header('Location: profile.php');

}

session_start();

include('includes/database.php'); 

	if($_POST){
		//Get variables from post array
		$first_name = mysql_real_escape_string($_POST['first_name']);
		$last_name = mysql_real_escape_string($_POST['last_name']); 
		$email = mysql_real_escape_string($_POST['email']);		
		
    $password = mysql_real_escape_string(md5($_POST['password']));
    $password2 = mysql_real_escape_string(md5($_POST['password2']));		
		
    $address = mysql_real_escape_string($_POST['address']);
		$city = mysql_real_escape_string($_POST['city']);
		$card_id = mysql_real_escape_string($_POST['card_id']);

	if( ($password == $password2) && strlen($password) > 6 )
  {
		//Create customer query
		$query ="INSERT INTO customers (first_name,last_name,email,password)
								VALUES ('$first_name','$last_name','$email','$password')";
		//Run query
		$mysqli->query($query);
		
		//Create address query
		$query ="INSERT INTO customer_addresses (customer,address,city)
								VALUES ('$mysqli->insert_id','$address','$city')";
		//Run query
		$mysqli->query($query);
		
		//Create customer_id query
		$query ="INSERT INTO customer_id (customer_id,card_id)
								VALUES ('$mysqli->insert_id','$card_id')";
		//Run query
		$mysqli->query($query);
		
    setcookie('user_email' , $email);
		header('Location: profile.php');
	}    
	else
  {
      $_SESSION[ 'message' ]="The two password do not match or length < 6";
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

    <title>Easy Travel Egypt | Sign UP</title>

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
			<li role="presentation"><a href="log_in.php">Log In</a></li>
			<li role="presentation" class="active"><a href="sign_up.php">Sign Up</a></li>
           <li role="presentation"><a href="reviews.php">Reviews</a></li>
		   <li role="presentation"><a href="about.php">About</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Easy Travel Egypt</h3>
      </div>
	  
	  
	  <?php
    if(isset($_SESSION['message']))
    {
         echo "<div class='alert alert-danger'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
    
    session_unset(); 

    // destroy the session 
    session_destroy(); 
?>


     

  <div class="row marketing">
       <div>
         <h2>Sign Up</h2>
    	 </div>
		 <form role="form" method="post" action="sign_up.php">
			<div class="form-group">
				<label>First Name</label>
				<input name="first_name" type="text" class="form-control" placeholder="Enter First Name" required>
			</div>
	  <div class="form-group">
         <label>Last Name</label>
         <input name="last_name" type="text" class="form-control"placeholder="Enter Last Name">
      </div>
      <div class="form-group">
         <label>Email address</label>
         <input name="email" type="email" class="form-control"placeholder="Enter Email">
      </div>
      <div class="form-group">
         <label>Password</label>
         <input name="password" type="password"  class="form-control" placeholder="Enter Password More Than 6 Chars." required>
      </div>
	        <div class="form-group">
         <label>Re-Enter Password</label>
         <input name="password2" type="password" class="form-control" placeholder="Enter Password again" required>
      </div>
	     <div class="form-group">
         <label>Card ID</label>
         <input name="card_id" type="text" class="form-control"placeholder="Enter Card ID" required>
      </div>
	     <div class="form-group">
         <label>Address</label>
         <input name="address" type="text" class="form-control"placeholder="Enter Address">
      </div>
	     <div class="form-group">
         <label>City</label>
         <input name="city" type="text" class="form-control"placeholder="Enter City">
      </div>
     <input type="submit" class="btn btn-default" value="sign up" />
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