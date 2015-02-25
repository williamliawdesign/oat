<?php

$studentHandbookLocation = "";
$studentHealthAndDentalPlanLocation = "";
$studentBenefitsContactsListLocation = "";

$siteClass = 'benefits';
$siteTitle = 'OAT Program at BCIT';

include('templates/header.php');
include('templates/navigation.php');

?>

<main>

	<section id="benefits">

		<article>
			<h1>Student Handbook</h1>
			<p>Contains BCIT policies on attendance, student conduct, use of technology, graduation requirements, harassment complaints, and other policies.</p>
			<span><i class="fa fa-file-pdf-o"></i></span>
			<a href="<?php echo $studentHandbookLocation; ?>">Student Handbook PDF</a>
		</article>
		
		<article>
			<h1>Benefits Handbook</h1>
			<p>Contains information on policy number, coverage period, a list of extended health and dental benefits, and how to make a claim.</p>
			<span><i class="fa fa-file-pdf-o"></i></span>
			<a href="<?php echo $studentHealthAndDentalPlanLocation; ?>">Student Health and Dental Plan PDF</a>
		</article>
		
		<article>
			<h1>Benefits Contact List</h1>
			<p>Who to contact for more information about student benefits.</p>
			<span><i class="fa fa-file-pdf-o"></i></span>
			<a href="<?php echo $studentBenefitsContactsListLocation; ?>">Benefits Contacts PDF</a>
		</article>
		
	</section>

</main>

<?php

include('templates/footer.php');

?>
