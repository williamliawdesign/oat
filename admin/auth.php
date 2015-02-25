<?php

const ALLOWED_USERNAME = 'oat';
const ALLOWED_PASSWORD = 'bcit';

$saltString = 'saltString' . $_SERVER['HTTP_HOST'] . 'This should be secure' . session_id() . 'but to be sure a more complex saltstring...' . $_SERVER['HTTP_USER_AGENT'] . 'asdonufu9 hr oür$Q§TI9«¶¢†ƒ‚∂≈®Ω[]¨';

if (!isset($_SESSION['id'])) {
	//die('<p>Not authorized (id not set). Go to <a href="login.php">login</a></p>');
	header('Location: login.php');
	exit;
}

if ($_SESSION['id'] != $saltString) {
	//die('<p>Not authorized (wrong session id). Go to <a href="login.php">login</a></p>');
	header('Location: login.php');
	exit;
}

if (!isset($_SESSION['loggedin'])) {
	// you should be coming from the login page
	if (!isset($_POST['username']) && !isset($_POST['password'])) {
		//die('<p>Not authorized (no login forms). Go to <a href="login.php">login</a></p>');
		header('Location: login.php');
		exit;
	}
	if (($_POST['username'] != ALLOWED_USERNAME) && ($_POST['password'] != ALLOWED_PASSWORD)) {
		$_SESSION['error'] = 'You entered a wrong username and password combination, please try again';
		//die('<p>Not authorized (wrong username and/or password). Go to <a href="login.php">login</a></p>');
		header('Location: login.php');
		exit;
	}
	else {
		$_SESSION['loggedin'] = true;
	}
}

if (!$_SESSION['loggedin']) {
		$_SESSION['error'] = 'You successfully logged out';
		//die('<p>Not authorized (just logged out). Go to <a href="login.php">login</a></p>');
		header('Location: login.php');
		exit;
}

?>