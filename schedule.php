<?php

$siteClass = 'schedule';
$siteTitle = 'OAT Program at BCIT';

include('templates/header.php');
include('templates/navigation.php');

require_once('dbinfo.php');
require_once('functions.php');

/* Establish a connection to the database */
$dbConnect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno() != 0) {
	die('<p>Connection to Database failed</p>');
}

?>
<div class="intake_time">
			<p>Intake 25: <time datetime="2014-11-03">November 3, 2014</time> to <time date="2015-04-17">April 17, 2015</time></p>
</div>

<main>

	<section>
	
		<?php fetchAndDisplayWeeks($dbConnect); ?>
	
	</section>

</main>

<?php

include('templates/footer.php');

?>
