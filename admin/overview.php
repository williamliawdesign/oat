<?php

session_start();
require_once('auth.php');
require_once('../functions.php');
require_once('../dbinfo.php');

if (!isset($_GET['group'])) {
	$_SESSION['error'] = 'No group transmitted';
	//die('<p>No group was transmitted... Go back to <a href="index.php">Home</a></p>');
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

/* start a database connection */
$dbConnect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno() != 0) {
	$_SESSION['error'] = 'Unfortunately there was an error with the database connection, please try again later';
	//die('<p>Database error (try again). Go to <a href="index.php">home</a></p>');
	header('Location: index.php');
	exit;
}

// create and run a query
$query = 'SELECT * FROM ' . $group . ' ORDER BY ' . $groups[$group]['sortOrder'] . ';';
$result = $dbConnect->query($query);

if ($result->num_rows == 0) {
	$_SESSION['error'] = ucfirst($group) . ' does not exist';
	//die('<p>' . ucfirst($group) . ' does not exist... Go back to <a href="overview.php?group=' . $group . '">overview.php?group=' . $group . '</a></p>');
	header('Location: overview.php?group=' . $group);
	exit;
}

$result->data_seek(0);
$record = $result->fetch_assoc();
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
			<li><a href="logout.php">Log out</a></li>
		</ul>
	
	</nav>

	<main>
	
		<h1>Overview of <?php echo $group; ?></h1>
		
<?php
// error and message handling
if (isset($_SESSION['error'])) {
	echo "<div class=\"error\"><p>";
	echo $_SESSION['error'];
	echo "</p></div>";
	unset($_SESSION['error']);
}
if (isset($_SESSION['message'])) {
	echo "<div class=\"message\"><p>";
	echo $_SESSION['message'];
	echo "</p></div>";
	unset($_SESSION['message']);
}
?>
	
		<section>
		
<?php
if (isset($record['week'])) {
	// if the schedule is to be edited, show a title with the week number
	echo "<h1>Week " . $record['week'] . "</h1>";
	$oldWeek = $record['week'];
}
?>
			<table>
				<tr>
					<th width='40'>Delete</th>
					<th width='40'>Edit</th>
<?php
foreach ($record as $index => $element) {
	if (!in_array($index, $groups[$group]['ovTableIgnore'])) {
		// if the index from the DB result is not in the ignore list, show it as a table header
		echo "<th>" . ucwords(str_replace('_', ' ', $index)) . "</th>";
	}
}
?>
				</tr>
				<!-- table header finished -->
				
<?php
$result->data_seek(0);
while ($record = $result->fetch_assoc()) {
	if (isset($record['week'])) {
		if ($oldWeek != $record['week']) {
			// you want to show the next week so close the table
			echo "</table>";
			// create "add entry" for this week
			echo "<a href='edit.php?group=" . $group . "&id=" . $oldWeek . "&task=add'>Add " . $groups[$group]['singularName'] . "</a>";
			$oldWeek = $record['week'];
			// create your new title with the week number
			echo "<h1>Week " . $record['week'] . "</h1>";
			// and create your new table with header
			echo "<table>";
			echo "<tr>";
			echo "<th width='40'>Delete</th>";
			echo "<th width='40'>Edit</th>";
			foreach ($record as $index => $element) {
				if (!in_array($index, $groups[$group]['ovTableIgnore'])) {
					// if the index from the DB result is not in the ignore list, show it as a table header
					echo "<th>" . ucwords(str_replace('_', ' ', $index)) . "</th>";
				}
			}
			echo "</tr>";
		}
	}
	echo "<tr>";
	echo "<td>";
	// create the delete font awesome icon
	echo "<a href='edit.php?group=" . $group . "&id=" . $record['id'] . "&task=delete'>";
	echo "<i class='fa fa-minus-circle'></i>";
	echo "</a>";
	echo "</td>";
	echo "<td>";
	// create the add font awesome icon
	echo "<a href='edit.php?group=" . $group . "&id=" . $record['id'] . "&task=edit'>";
	echo "<i class='fa fa-pencil-square-o'></i>";
	echo "</a>";
	echo "</td>";
	foreach ($record as $index => $entry) {
		if (!in_array($index, $groups[$group]['ovTableIgnore'])) {
			// if the index from the DB result is not in the ignore list, show the entry
			echo "<td>";
			echo $entry;
			echo "</td>";
		}
	}
	echo "</tr>";
}
// close the (last) table
echo "</table>";
if (isset($record['week'])) {
	// create add entry for the last week
	echo "<a href='edit.php?group=" . $group . "&id=" . $oldWeek . "&task=add'>Add " . $groups[$group]['singularName'] . "</a>";
}
else {
	// or create a general add entry
	echo "<a href='edit.php?group=" . $group . "&id=0&task=add'>Add " . $groups[$group]['singularName'] . "</a>";
}
$dbConnect->close();
?>
		
		</section>
	
	</main>
	
	<footer id="footer">
	
	</footer>

</div>

</body>
</html>