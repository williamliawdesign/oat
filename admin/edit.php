<?php

session_start();
include_once('auth.php');
require_once('../functions.php');
require_once('../dbinfo.php');

if (!isset($_GET['group'])) {
	$_SESSION['error'] = 'No group transmitted';
	//die('<p>No group received... Go back to <a href="index.php">Home</a></p>');
	header('Location: index.php');
	exit;
}

$group = $_GET['group'];

if (!array_key_exists($group, $groups)) {
	$_SESSION['error'] = 'Selected group is invalid';
	//die('<p>Invalid group... Go back to <a href="index.php">Home</a></p>');
	header('Location: index.php');
	exit;
}

if (!isset($_GET['id'])) {
	$_SESSION['error'] = 'No id transmitted';
	//die('<p>No id received... Go back to <a href="overview.php?group=' . $group . '">overview.php?group=' . $group . '</a></p>');
	header('Location: overview.php?group=' . $group);
	exit;
}

if (!isset($_GET['task'])) {
	$_SESSION['error'] = 'No task transmitted';
	//die('<p>No task received... Go back to <a href="overview.php?group=' . $group . '">overview.php?group=' . $group . '</a></p>');
	header('Location: overview.php?group=' . $group . '');
	exit;
}

$id = $_GET['id'];
$task = $_GET['task'];

if (isset($_SESSION['oldPost'])) {
	$title = $_SESSION['error'];
	$record = $_SESSION['oldPost'];
	unset($_SESSION['oldPost']);
	// maybe move the unset to another location
}
else if ($task == 'add') {
	// prepare variables for adding an entry
	$title = 'Create a new ' . $groups[$group]['singularName'];
	foreach ($groups[$group]['fields'] as $index => $entry) {
		// input fields will be empty
		$record[$index] = '';
	}
	if ($group == 'schedule') {
		// the input field for the week will be according the submitted id
		$record['week'] = $id;
	}
}
else if (($task == 'edit') || ($task == 'delete')) {
	// prepare variables for editing or deleting an entry
	$title = ucfirst($task) . ' a ' . $groups[$group]['singularName'];
	/* start a database connection */
	$dbConnect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	if (mysqli_connect_errno() != 0) {
		$_SESSION['error'] = 'Unfortunately there was an error with the database connection, please try again later';
		//die('<p>Database error (try again). Go to <a href="index.php">Home</a></p>');
		header('Location: index.php');
		exit;
	}
	
	$id = $dbConnect->real_escape_string($id);
	$group = $dbConnect->real_escape_string($group);
	
	$query = 'SELECT * FROM ' . $group . ' WHERE ' . $groups[$group]['identifier'] . '=' . $id . ' ORDER BY ' . $groups[$group]['sortOrder'] . ';';
	$result = $dbConnect->query($query);
	
	if ($result->num_rows == 0) {
		$_SESSION['error'] = ucfirst($group) . ' does not exist';
		//die('<p>' . ucfirst($group) . ' does not exits... Go back to <a href="overview.php?group=' . $group . '">overview.php?group=' . $group . '</a></p>');
		header('Location: overview.php?group=' . $group);
		exit;
	}
	
	$record = $result->fetch_assoc();
}
else {
	$_SESSION['error'] = 'Invalid task transmitted';
	//die('<p>Task is invalid... Go back to <a href="overview.php?group=' . $group . '">overview.php?group=' . $group . '</a></p>');
	header('Location: overview.php?group=' . $group);
	exit;
}
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
			<li><a href="index.php">Administration Home</a></li>
			<li><a href="overview.php?group=<?php echo $group; ?>">Back to Overview</a></li>
			<li><a href="logout.php">Log out</a></li>
		</ul>
	
	</nav>

	<main>
	
		<h1><?php echo $title; ?></h1>
	
		<section>
		
			<?php
				
				// output errors if there are any...
				if (isset($_SESSION['errors'])) {
					echo "<div class=\"errors\">";
					if (isset($_SESSION['error'])) {
						echo "<p>";
						echo $_SESSION['error'];
						echo "</p>";
						unset($_SESSION['error']);
					}
					echo "<ul>";
					foreach ($_SESSION['errors'] as $index => $error) {
						echo "<li>";
						echo ucfirst($index) . ": " . $error;
						echo "</li>";
					}
					echo "</ul></div>";
					unset($_SESSION['errors']);
				}
				// error handling
				if (isset($_SESSION['error'])) {
					echo "<div class=\"error\"><p>";
					echo $_SESSION['error'];
					echo "</p></div>";
					unset($_SESSION['error']);
				}
				
				if (($task == 'add') || ($task == 'edit')) {
			?>
			
			<form action="update.php?group=<?php echo $group . "&id=" . $id . "&task=" . $task; ?>" method="post" novalidate>
			
			<?php
					foreach ($groups[$group]['fields'] as $field) {
						echo "<label for='" . $field['formName'] . "'>" . ucwords(str_replace('_', ' ', $field['formName'])) . "</label>";
						if ($field['formType'] == 'checkbox') {
							echo "<input type='" . $field['formType'] . "' id='" . $field['formName'] . "' name='" . $field['formName'] . "' value='yes'>";
						}
						else {
							echo "<input type='" . $field['formType'] . "' id='" . $field['formName'] . "' name='" . $field['formName'] . "' value='" . $record[$field['tableName']] . "' placeholder='" . $field['placeholder'] . "'>";
						}
						echo "<br>";
					}
			?>
				
				<input type="submit" value="Save">
			
			</form>
			
			<?php
				}
				else {
					// task is delete so a different form is required
			?>
			
			<h1>Are you sure you want to delete the <?php echo $groups[$group]['singularName'] . ' "' . $record[$groups[$group]['descriptor']]; ?>"?</h1>
			
			<form action="update.php?group=<?php echo $group . "&id=" . $id . "&task=" . $task; ?>" method="post">
			
				<input type="radio" name="delete" id="yes" value="yes">
				<label for="yes">Yes</label>
				<input type="radio" name="delete" id="no" value="no" checked="checked">
				<label for="no">No</label>
				
				<input type="submit" value="Submit">
			
			</form>
			
			<?php
				}
			?>
		
		</section>
	
	</main>
	
	<footer id="footer">
	
	</footer>

</div>

</body>
</html>