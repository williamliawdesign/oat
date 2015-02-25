<?php

$siteClass = 'contact';
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
	<section id="contact">
		<h1>Faculty and Staff</h1>
		
		<?php
			fetchAndDisplayContacts($dbConnect);
		?>
		
	</section>
	
	<section class="program_location">
		<h1>Program Location</h1>
		<article>
			<p><a href="#">BCIT Downtown Campus</a></p>
			<p>555 Seymour Street</p>
			<p>Vancouver, BC</p>
		</article>
    </section>
    <section class="program_location">
		<h1>Current Information</h1>
		<article>
			<!--<span><i class="fa fa-phone"></i></span>-->
            <p>Telephone: <a href="tel:604-412-7788">604-412-7788</a></p>
			
			<!--<span><i class="fa fa-envelope"></i></span>-->
            <p>Email: <a href="mailto:htp@bcit.ca">htp@bcit.ca</a></p>
			
			<!--<span><i class="fa fa-globe"></i></span>-->
            <p>Website: <a href="//www.bcit.ca/cas/htp" target="_blank">http://www.bcit.ca/cas/htp</a></p>
			<p>Address: High-Tech Professional Programs</p>
			<p>#350 - 555 Seymour Street</p>
			<p>Vancouver, BC V6B 3H6</p>
		</article>
	</section>

</main>

<?php

include('templates/footer.php');

?>
