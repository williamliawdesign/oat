<?php

session_start();

$_SESSION['id'] = 'saltString' . $_SERVER['HTTP_HOST'] . 'This should be secure' . session_id() . 'but to be sure a more complex saltstring...' . $_SERVER['HTTP_USER_AGENT'] . 'asdonufu9 hr oür$Q§TI9«¶¢†ƒ‚∂≈®Ω[]¨';

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
		
		<h3>Administration</h3>
		
	</header>
	
	<nav>
	
		<ul>
			<li><a href="../index.php">OAT Home</a></li>
		</ul>
	
	</nav>

	<main>
			
		<h1>Please log in to perform any changes</h1>
	
		<section>
			
			<?php
			
				if (isset($_SESSION['error'])) {
					echo "<div class=\"error\"><p>";
					echo $_SESSION['error'];
					echo "</p></div>";
					unset($_SESSION['error']);
				}
			
			?>
			
			<form class="login" action="index.php" method="post">
			
				<label for="username">Username</label>
				<input type="text" name="username" id="username">
				<br>
				
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
				<br>
				
				<input type="submit" value="Submit">
			
			</form>
		
		</section>
	
	</main>
	
	<footer id="footer">
	
	</footer>

</div>

</body>
</html>