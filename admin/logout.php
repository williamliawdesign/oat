<?php

session_start();

unset($_SESSION['id']);
unset($_SESSION['error']);
unset($_SESSION['errors']);
unset($_SESSION['message']);
unset($_SESSION['oldPost']);
unset($_SESSION['retry']);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Entries</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="../styles/font-awesome.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body class="admin">

	<header id="header">
		
		<h1>OAT</h1>
	
		<h2>Office Administrator<br>with Technology Program</h2>
		
	</header>
	
	<nav>
	
		<ul>
			<li><a href="../index.php">OAT Home</a></li>
			<li><a href="login.php">Log in</a></li>
		</ul>
	
	</nav>

	<main>
	
		<section>
			
			<h1>You have successfully logged out</h1>
			
			<p>Go back to the <a href="login.php">login page</a></p>
			
			<p>Go to the <a href="../index.php">OAT homepage</a></p>
		
		</section>
	
	</main>
	
	<footer id="footer">
	
	</footer>

</div>

</body>
</html>