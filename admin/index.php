<?php

session_start();
include_once('auth.php');

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
			<li><a href="logout.php">Log out</a></li>
		</ul>
	
	</nav>

	<main class="index">
	
		<h1>What entries would you like to change</h1>
			
		<?php
		
			if (isset($_SESSION['error'])) {
				echo "<div class=\"error\"><p>";
				echo $_SESSION['error'];
				echo "</p></div>";
				unset($_SESSION['error']);
			}
		
		?>
	
		<section>

			<a href="overview.php?group=schedule">
				<article>
					<span><i class="fa fa-calendar"></i></span>
					<h1>Schedule</h1>
				</article>
			</a>
	
			<a href="overview.php?group=students">
				<article>
					<span><i class="fa fa-user"></i></span>
					<h1>Students</h1>
				</article>
			</a>
	
			<a href="overview.php?group=staff">
				<article>
					<span><i class="fa fa-users"></i></span>
					<h1>Staff</h1>
				</article>
			</a>

			<a href="overview.php?group=courses">
				<article>
					<span><i class="fa fa-laptop"></i></span>
					<h1>Courses</h1>
				</article>
			</a>
		
		</section>
	
	</main>
	
	<footer id="footer">
	
	</footer>

</div>

</body>
</html>