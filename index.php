<?php include ('includes/database.php'); ?>
<?php


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Easy Travel Egypt | Dashboard</title>

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
            <li role="presentation" class="active"><a href="index.php">Home</a></li>
			     <?php if( isset($_COOKIE['user_email']) ): ?>
              <li role="presentation"><a href="log_out.php">Log Out</a></li>
           <?php else: ?>
              <li role="presentation"><a href="log_in.php">Log In</a></li>
           <li role="presentation"><a href="sign_up.php">Sign Up</a></li>
           <?php endif; ?>
           <li role="presentation"><a href="reviews.php">Reviews</a></li>
		   <li role="presentation"><a href="about.php">About</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Easy Travel Egypt</h3>
      </div>

      <div class="jumbotron">
        <h1>Easy Travel Egypt</h1>
        <p class="lead">Join The First RFID based bus tecketing system in Egypt.</p>
		  <?php if( isset($_COOKIE['user_email']) ): ?>
		  <p><a class="btn btn-lg btn-success" href="profile.php" role="button">Your Profile </a></p>
		  <?php else: ?>
        <p><a class="btn btn-lg btn-success" href="sign_up.php" role="button">Sign Up </a></p>
		<?php endif; ?>
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Comfort</h4>
          <p>We release you from any efforts, dealings and transactions during travelling.</p>

          <h4>Automated dealings</h4>
          <p>No human dealings at all .</p>

        </div>

        <div class="col-lg-6">
          <h4>Cards</h4>
          <p>You can use magnet cards with your daily treatmens.</p>

          <h4>Tags</h4>
          <p>You can also use our nice shaped Tags.</p>

        </div>
      </div>

      <footer class="footer">
        <p>&copy; 2017 Abdelbary S.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
