<?php

session_start();

include('auth.php');
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

$dbConnect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno() != 0) {
	$_SESSION['error'] = 'Unfortunately there was an error with the database connection, please try again later';
	//die('<p>Database error (try again). Go to <a href="index.php">Home</a></p>');
	header('Location: index.php');
	exit;
}

$group = $dbConnect->real_escape_string($group);
$id = $dbConnect->real_escape_string($id);

if (($task == 'add') || ($task == 'edit')) {
	if (!checkFormTransmit($group, $groups)) {
		$_SESSION['error'] = 'The form was not transmitted correctly';
		//die('<p>Form not transmitted. Go to <a href="overview.php?group=' . $group . '">overview.php?group=' . $group . '</a></p>');
		header('Location: overview.php?group=' . $group);
		exit;
	}
	foreach ($groups[$group]['fields'] as $index => $field) {
		$values[$index] = trim($_POST[$index]);
	}
	if (!validateEntry($values, $group, $groups)) {
		$_SESSION['error'] = 'One or more entries were in the wrong format';
		$_SESSION['oldPost'] = $_POST;
		//die('<p>One or more entries were in the wrong format... Go back to <a href="edit.php?group=' . $group . '&id=' . $id . '&task=' . $task . '">edit.php?group=' . $group . '&id=' . $id . '&task=' . $task . '</a></p>');
		header('Location: edit.php?group=' . $group . '&id=' . $id . '&task=' . $task . '');
		exit;
	}
	else {
		// entry appears to be valid... proceed with changing database entry
	}
	// create real escape strings for the values
	foreach ($values as $index => $value) {
		$values[$index] = $dbConnect->real_escape_string($value);
	}
	if ($task == 'add') {
		// create the insert into query for the task is add
		$query = 'INSERT INTO ' . $group . ' (';
		foreach ($groups[$group]['fields'] as $index => $field) {
			$query .= $field['tableName'] . ', ';
		}
		$query .= ') VALUES (';
		foreach ($groups[$group]['fields'] as $index => $field) {
			if ($values[$index] == '') {
				if ($field['isBoolean']) {
					$query .= '0, ';
				}
				else {
					$query .= 'NULL, ';
				}
			}
			else if ($field['formType'] == 'number') {
				$query .= $values[$index] . ', ';
			}
			else if ($field['formType'] == 'checkbox') {
				$query .= '1, ';
			}
			else {
				$query .= '"' . $values[$index] . '", ';
			}
		}
		$query .= ');';
		$query = str_replace(', )', ')', $query);
	}
	else {
		// create the update query for the task is edit
		$query = 'UPDATE ' . $group . ' SET ';
		foreach ($groups[$group]['fields'] as $index => $field) {
			if ($values[$index] == '') {
				if ($field['isBoolean']) {
					$query .= $field['tableName'] . '=0, ';
				}
				else {
					$query .= $field['tableName'] . '=NULL, ';
				}
			}
			else if ($field['formType'] == 'number') {
				$query .= $field['tableName'] . '=' . $values[$index] . ', ';
			}
			else if ($field['formType'] == 'checkbox') {
				$query .= $field['tableName'] . '=1, ';
			}
			else {
				$query .= $field['tableName'] . '="' . $values[$index] . '", ';
			}
		}
		$query .= 'WHERE id=' . $id . ';';
		$query = str_replace(', WHERE', ' WHERE', $query);
	}
	// the query is ready and can be run
	$result = $dbConnect->query($query);
	if ($result) {
		$_SESSION['message'] = 'The ' . ucwords($groups[$group]['singularName']) . ' entry was successfully ' . $task . 'ed';
		//die('<p>The ' . ucwords($groups[$group]['singularName']) . ' entry was successfully ' . $task . 'ed... Go on to <a href="overview.php?group=' . $group . '">overview.php?group=' . $group . '</a></p>');
		header('Location: overview.php?group=' . $group);
		exit;
	}
	else {
		$_SESSION['error'] = 'The ' . ucwords($groups[$group]['singularName']) . ' entry was not ' . $task . 'ed';
		//die('<p>The ' . ucwords($groups[$group]['singularName']) . ' entry was not successfully ' . $task . 'ed... Go back to <a href="edit.php?group=' . $group . '&id=' . $id . '&task=' . $task . '">edit.php?group=' . $group . '&id=' . $id . '&task=' . $task . '</a></p>');
		header('Location: edit.php?group=' . $group . '&id=' . $id . '&task=' . $task);
		exit;
	}
}
else if ($task == 'delete') {
	if (!isset($_POST['delete'])) {
		$_SESSION['error'] = 'The form was not transmitted correctly';
		//die('<p>Form not transmitted... Go back to <a href="overview.php?group=' . $group . '>overview.php?group=' . $group . '</a></p>');
		header('Location: overview.php?group=' . $group);
		exit;
	}
	$delete = $_POST['delete'];
	if ($delete == 'yes') {
		// create the delete query for the task is delete
		$query = 'DELETE FROM ' . $group . ' WHERE id=' . $id . ';';
		$result = $dbConnect->query($query);
		if ($result) {
			$_SESSION['message'] = 'The ' . ucwords($groups[$group]['singularName']) . ' entry was successfully deleted';
			//die('<p>The ' . ucwords($groups[$group]['singularName']) . ' entry was successfully deleted... Go on to <a href="overview.php?group=' . $group . '">overview.php?group=' . $group . '</a></p>');
			header('Location: overview.php?group=' . $group);
			exit;
		}
		else {
			$_SESSION['error'] = 'The ' . ucwords($groups[$group]['singularName']) . ' entry was not deleted';
			//die('<p>The ' . ucwords($groups[$group]['singularName']) . ' entry was not successfully deleted... Go back to <a href="edit.php?group=' . $group . '&id=' . $id . '&task=delete">edit.php?group=' . $group . '&id=' . $id . '&task=delete</a></p>');
			header('Location: edit.php?group=' . $group . '&id=' . $id . '&task=delete');
			exit;
		}
	}
	else if ($delete == 'no') {
		$_SESSION['message'] = 'No entry was deleted';
		//die('<p>No entry was deleted... Go back to <a href="overview.php?group=' . $group . '">overview.php?group=' . $group . '</a></p>');
		header('Location: overview.php?group=' . $group);
		exit;
	}
	else {
		$_SESSION['error'] = 'The form value was not recognized';
		//die('<p>Form value unknown... Go back to <a href="overview.php?group=' . $group . '">overview.php?group=' . $group . '</a></p>');
		header('Location: overview.php?group=' . $group);
		exit;
	}
}
else {
	$_SESSION['error'] = "No valid task was selected";
	//die('<p>No valid task was selected... Go back to <a href="overview.php?group=' . $group . '">overview.php?group=' . $group . '</p>');
	header('Location: overview.php?group=' . $group);
	exit;
}

?>