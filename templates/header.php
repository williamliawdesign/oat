<?php

require_once('dbinfo.php');
require_once('functions.php');

/* Establish a connection to the database */
$dbConnect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno() != 0) {
	die('<p>Connection to Database failed</p>' . mysqli_connect_error());
}

$weekNumber = getWeekNumber($dbConnect);
if ($weekNumber == 0) {
	$weekHash = '';
}
else {
	$weekHash = '#week_' . $weekNumber;
}

//$test = getNextDay($dbConnect);

?>
<!doctype html>
<html class="no_js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $siteTitle; ?></title>
<link href="styles/style.css" rel="stylesheet" type="text/css">
<link href="styles/font-awesome.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body class="<?php echo $siteClass; ?>">

	<header id="header">
		<h1>OAT</h1>
		<img src="images/logo_small.png" alt="BCIT OAT Full-Time Program" title="Office Administrator">
	
		<h1>Office Administrator<br>with Technology Program</h1>
		
		<div class="outgoing_links">
		
			<a href="//www.bcit.ca/">BCIT</a>
			
			<a href="//my.bcit.ca/">MYBCIT</a>
		
		</div>
	
	</header>

