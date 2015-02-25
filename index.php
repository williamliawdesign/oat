<?php

$siteClass = 'home';
$siteTitle = 'OAT Program at BCIT';

include('templates/header.php');
include('templates/navigation.php');

?>

<main>
    <div class="column">
        <a href="schedule.php<?php echo $weekHash; ?>" class="icon top_icon">
            <article>
                <span><i class="fa fa-calendar"></i></span>
                <h1>Schedule</h1>
            </article>
        </a>
    </div>
    
    <div class="column">
        <a href="students.php" class="icon top_icon">
            <article>
                <span><i class="fa fa-user"></i></span>
                <h1>Students</h1>
            </article>
        </a>
    </div>
        
    <div class="column">
        <a href="courses.php" class="icon top_icon">
            <article>
                <span><i class="fa fa-laptop"></i></span>
                <h1>Courses</h1>
            </article>
        </a>
    </div>    
    
    <div class="column">
        <a href="certifications.php" class="icon bottom_icon">
            <article>
                <span><i class="fa fa-graduation-cap"></i></span>
                <h1>Certifications</h1>
            </article>
        </a>
    </div>    
        
    <div class="column">
        <a href="benefits.php" class="icon bottom_icon">
            <article>
                <span><i class="fa fa-thumbs-up"></i></span>
                <h1>Benefits</h1>
            </article>
        </a>
    </div>    

    <div class="column">    
        <a href="jobs.php" class="icon bottom_icon">
            <article>
                <span><i class="fa fa-paper-plane"></i></span>
                <h1>Jobs</h1>
            </article>
        </a>
    </div>    
        
</main>

<?php

include('templates/footer.php');

?>
