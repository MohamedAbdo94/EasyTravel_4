<?php 

unset($_COOKIE['user_email']);
$_COOKIE['user_email'] = null;
setcookie('user_email', null);

header('Location: index.php');
