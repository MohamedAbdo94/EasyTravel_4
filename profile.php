<?php include('includes/database.php'); 

// todo check if user is logged in 
if( ! isset($_COOKIE['user_email']) || $_COOKIE['user_email'] == null  )
{
  header('Location: log_in.php');
}

// getting current user
$current_user = $mysqli->query( "SELECT * FROM customers WHERE email LIKE '%".$_COOKIE['user_email']."%' ;" );

// check if data exists
if(  $current_user->num_rows > 0 )
{
  // fetch as array
  $current_user = $current_user->fetch_assoc();
  
  // getting user location
  $location = $mysqli->query( "SELECT * FROM locations WHERE customer_id = '".$current_user['id']."';" );

  if( $location->num_rows > 0 )
  {
    // fetch as array
    $location = $location->fetch_assoc();
  }else
  {
    $location = [];
  }

  $credit = $mysqli->query( "SELECT * FROM customer_id WHERE customer_id = ".$current_user['id'].";" );

  if( $credit->num_rows > 0 )
  {
    // fetch as array
    $credit = $credit->fetch_assoc();
  }else
  {
    $credit = [];
  }

}else
{
  $current_user = [];
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
			<li role="presentation"><a href="log_out.php">Logout</a></li>
            <li role="presentation"><a href="reviews.php">Reviews</a></li>
			  <li role="presentation"><a href="about.php">About</a></li>
            
          </ul>
          </ul>
        </nav>
        <h3 class="text-muted">Easy Travel Egypt</h3>
      </div>

     

  <div class="row marketing">
   
      <h2> Your Profile <h2>
  </div>
  
  <div>
     <div class="form-group">
	 <h2>Hi <?php echo isset( $current_user['first_name']) ? $current_user['first_name'] : ''; ?></h2>
      <h3>Your credit is <?php echo isset($credit['balance']) ? $credit['balance'] . ' L.E.' : '0' . ' L.E.'; ?></h3>
      <h3>Your last location was <?php echo isset($location['last_location1']) ? $location['last_location1'] : 'non'; ?></h3>
		    
	</div>

      <footer class="footer">
        <p>&copy; 2017 Abdelbary S.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
