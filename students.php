<?php

$siteClass = 'students';
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

<main>

	<section>
		
        <?php
            fetchAndDisplayStudents($dbConnect);
        ?>
	
	</section>

</main>

<?php

include('templates/footer.php');

?>
