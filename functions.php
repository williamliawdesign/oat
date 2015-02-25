<?php

const NUMBER_OF_GROUPS						= 4;
//const NUMBER_OF_WEEKS						= 13;

/***************************************************************/
/* groups (array):															*/
/* 	index:																	*/
/*			same as the table name in the database						*/
/*		value (array):															*/
/*			'fields' (array):													*/
/*				index:															*/
/*					field name as in the table								*/
/*				value (array):													*/
/*					'tableName': name as used in database tables		*/
/*					'formName': name as used in HTML forms				*/
/*					'formType': type as used in HTML forms				*/
/*					'placeholder': placeholder text used in forms	*/
/*					'regex': regular expression to validate data		*/
/*						may be empty when no regex is required			*/
/*					'regexError': Message to show if regex fails		*/
/*					'isRequired': true if field needs to exist		*/
/*					'otherRequirement': can be one of following		*/
/*						- 'none': no other requirements					*/
/*						- 'date': must be a valid date					*/
/*						- 'noifholiday': not required on holidays		*/
/*						- 'exclbool': only one of these can be true	*/
/*						- string: may not be like the string			*/
/*					'otherError': Message to show if other				*/
/*									  requirement is not met				*/
/*					'isBoolean': use checkbox if true					*/
/*			'singularName':													*/
/*				the group name in singular form							*/
/*			'sortOrder':														*/
/*				when running a query, how data shoud be ordered		*/
/*			'identifier':														*/
/*				when running a query, on what the respective id		*/
/*				should be applied												*/
/*			'descriptor':														*/
/*				the field that is used to describe an entry			*/
/*			'ovTableIgnore' (array):										*/
/*				values:															*/
/*					table columns that should be ignored when			*/
/*					displaying the table in the overview				*/
/***************************************************************/
$groups['courses'] = array(
	'fields'=>array(
		'abbreviation'=>array(
			'tableName'=>'abbreviation',
			'formName'=>'abbreviation',
			'formType'=>'text',
			'placeholder'=>'OATP',
			'regex'=>'/^[a-zA-Z]{4}$/',
			'regexError'=>'Wrong format (var) only letters allowed and 4 characters long',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'number'=>array(
			'tableName'=>'number',
			'formName'=>'number',
			'formType'=>'number',
			'placeholder'=>'1000',
			'regex'=>'/^[0-9]{4}$/',
			'regexError'=>'Wrong format (var) only numbers allowed and 4 digits long',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'title'=>array(
			'tableName'=>'title',
			'formName'=>'title',
			'formType'=>'text',
			'placeholder'=>'Communication Skills',
			'regex'=>'/^[a-z A-Z]{4,64}$/',
			'regexError'=>'Wrong format (var) only letters and spaces allowed and between 4 and 64 characters long',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'credits'=>array(
			'tableName'=>'credits',
			'formName'=>'credits',
			'formType'=>'number',
			'placeholder'=>'5',
			'regex'=>'/^[0-9]{1,2}$/',
			'regexError'=>'Wrong format (var) only numbers allowed and 1 or 2 digits long',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'description'=>array(
			'tableName'=>'description',
			'formName'=>'description',
			'formType'=>'text',
			'placeholder'=>'Describe the course',
			'regex'=>'',
			'regexError'=>'Can not be empty',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'pdf_location'=>array(
			'tableName'=>'pdf_location',
			'formName'=>'pdf_location',
			'formType'=>'text',
			'placeholder'=>'pdf/filename.pdf',
			'regex'=>'/^pdf\/[a-zA-Z0-9-_.]+$/',
			'regexError'=>'Wrong format (var) should be in "pdf" subfolder and only containing letters, numbers, dashes (-), underscores (_) and dots',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'pdf_name'=>array(
			'tableName'=>'pdf_name',
			'formName'=>'pdf_name',
			'formType'=>'text',
			'placeholder'=>'Communication Skills PDF',
			'regex'=>'/^[a-z A-Z]+$/',
			'regexError'=>'Wrong format (var) only letters and spaces allowed, preferably ending with "PDF"',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
	),
	'singularName'=>'course',
	'sortOrder'=>'number',
	'identifier'=>'id',
	'descriptor'=>'title',
	'ovTableIgnore'=>array(
		'id'
	)
);
$groups['schedule'] = array(
	'fields'=>array(
		'week'=>array(
			'tableName'=>'week',
			'formName'=>'week',
			'formType'=>'number',
			'placeholder'=>'1',
			'regex'=>'/^[0-9]{1,2}$/',
			'regexError'=>'Wrong format (var) only numbers allowed and 1 or 2 digits long',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'date'=>array(
			'tableName'=>'date',
			'formName'=>'date',
			'formType'=>'date',
			'placeholder'=>'2014-12-24',
			'regex'=>'/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/',
			'regexError'=>'Wrong format (var) should be like "2014-12-24"',
			'isRequired'=>true,
			'otherRequirement'=>'date',
			'otherError'=>'The date you entered was not recognized as a valid date',
			'isBoolean'=>false
		),
		'duration'=>array(
			'tableName'=>'duration',
			'formName'=>'duration',
			'formType'=>'number',
			'placeholder'=>'in days',
			'regex'=>'/(^[0-5]{1}\.[05]{1}$)|(^[0-5]{1}$)/',
			'regexError'=>'Wrong format (var) should either be a number with decimal separated by a dot (.) like "1.5" or a number with only one digit<br>Can only separate in half days and maximum duration is 5 days',
			'isRequired'=>true,
			'otherRequirement'=>'0.0',
			'otherError'=>'Duration of "0.0" should not be entered in database',
			'isBoolean'=>false
		),
		'course_name'=>array(
			'tableName'=>'course_name',
			'formName'=>'course_name',
			'formType'=>'text',
			'placeholder'=>'MS Word 2013',
			'regex'=>'',
			'regexError'=>'Can not be empty',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'room'=>array(
			'tableName'=>'room',
			'formName'=>'room',
			'formType'=>'text',
			'placeholder'=>'300 or 300/310',
			'regex'=>'/(^[0-9]{3}$)|(^[0-9]{6}$)|(^[0-9]{3} ?\/ ?[0-9]{3}$)/',
			'regexError'=>'Wrong format (var) only numbers allowed and 3 digits long. For two room numbers use one of the following formats: "300400", "300/400", "300 / 400"',
			'isRequired'=>false,
			'otherRequirement'=>'noifholiday',
			'otherError'=>'Can only be empty on a holiday',
			'isBoolean'=>false
		),
		'instructor'=>array(
			'tableName'=>'instructor',
			'formName'=>'instructor',
			'formType'=>'text',
			'placeholder'=>'Firstname Lastname',
			'regex'=>'',
			'regexError'=>'Can not be empty',
			'isRequired'=>false,
			'otherRequirement'=>'noifholiday',
			'otherError'=>'Can only be empty on a holiday',
			'isBoolean'=>false
		),
		'instructor_email'=>array(
			'tableName'=>'instructor_email',
			'formName'=>'instructor_email',
			'formType'=>'email',
			'placeholder'=>'example@bcit.ca',
			'regex'=>'/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/',
			'regexError'=>'Wrong format (var) Please enter a valid email address',
			'isRequired'=>false,
			'otherRequirement'=>'noifholiday',
			'otherError'=>'Can only be empty on a holiday',
			'isBoolean'=>false
		),
		'holiday'=>array(
			'tableName'=>'holiday',
			'formName'=>'holiday',
			'formType'=>'checkbox',
			'regex'=>'',
			'regexError'=>'',
			'isRequired'=>true,
			'otherRequirement'=>'exclbool',
			'otherError'=>'Can not plan exam on a holiday',
			'isBoolean'=>true
		),
		'exam'=>array(
			'tableName'=>'exam',
			'formName'=>'exam',
			'formType'=>'checkbox',
			'regex'=>'',
			'regexError'=>'',
			'isRequired'=>true,
			'otherRequirement'=>'exclbool',
			'otherError'=>'Can not plan exam on a holiday',
			'isBoolean'=>true
		),
	),
	'singularName'=>'schedule entry',
	'sortOrder'=>'week, date',
	'identifier'=>'id',
	'descriptor'=>'course_name',
	'ovTableIgnore'=>array(
		'id',
		'week'
	)
);
$groups['staff'] = array(
	'fields'=>array(
		'firstname'=>array(
			'tableName'=>'firstname',
			'formName'=>'firstname',
			'formType'=>'text',
			'placeholder'=>'Firstname',
			'regex'=>'/^[a-zA-Z]{2,16}$/',
			'regexError'=>'Wrong format (var) only letters allowed and between 2 and 16 characters long',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'middlename'=>array(
			'tableName'=>'middlename',
			'formName'=>'middlename',
			'formType'=>'text',
			'placeholder'=>'Middlename',
			'regex'=>'/^[a-zA-Z]$/',
			'regexError'=>'Wrong format (var) only letters allowed and between 2 and 16 characters long or empty field',
			'isRequired'=>false,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'lastname'=>array(
			'tableName'=>'lastname',
			'formName'=>'lastname',
			'formType'=>'text',
			'placeholder'=>'Lastname',
			'regex'=>'/^[a-zA-Z]{2,16}$/',
			'regexError'=>'Wrong format (var) only letters allowed and between 2 and 16 characters long',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'function'=>array(
			'tableName'=>'function',
			'formName'=>'function',
			'formType'=>'text',
			'placeholder'=>'Function of the employee',
			'regex'=>'',
			'regexError'=>'Can not be empty',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'phonenumber'=>array(
			'tableName'=>'phonenumber',
			'formName'=>'phonenumber',
			'formType'=>'tel',
			'placeholder'=>'604-123-4567',
			'regex'=>'/(^[0-9]{3}-[0-9]{3}-[0-9]{4}$)|(^[0-9]{10}$)/',
			'regexError'=>'Wrong format (var) should be a phonenumber either only numbers and 10 digits or grouped by dash (-) like 604-123-1234',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'email'=>array(
			'tableName'=>'email',
			'formName'=>'email',
			'formType'=>'email',
			'placeholder'=>'[employee prefix]@bcit.ca',
			'regex'=>'/^[a-z]{3,16}_[a-z]{3,16}[0-9]{0,4}@bcit.ca$/',
			'regexError'=>'Wrong format (var) should be like "[employee prefix]@bcit.ca"<br>Replace [employee prefix] with first name followed by a dash (-) followed by last name and optional unique number',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		)
	),
	'singularName'=>'employee',
	'sortOrder'=>'lastname',
	'identifier'=>'id',
	'descriptor'=>'lastname',
	'ovTableIgnore'=>array(
		'id'
	)
);
$groups['students'] = array(
	'fields'=>array(
		'firstname'=>array(
			'tableName'=>'firstname',
			'formName'=>'firstname',
			'formType'=>'text',
			'placeholder'=>'Firstname',
			'regex'=>'/^[a-zA-Z]{2,16}$/',
			'regexError'=>'Wrong format (var) only letters allowed and between 2 and 16 characters long',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'middlename'=>array(
			'tableName'=>'middlename',
			'formName'=>'middlename',
			'formType'=>'text',
			'placeholder'=>'Middlename',
			'regex'=>'/^[a-zA-Z]{2,16}$/',
			'regexError'=>'Wrong format (var) only letters allowed and between 2 and 16 characters long or empty field',
			'isRequired'=>false,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'lastname'=>array(
			'tableName'=>'lastname',
			'formName'=>'lastname',
			'formType'=>'text',
			'placeholder'=>'Lastname',
			'regex'=>'/^[a-zA-Z]{2,16}$/',
			'regexError'=>'Wrong format (var) only letters allowed and between 2 and 16 characters long',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'url'=>array(
			'tableName'=>'url',
			'formName'=>'url',
			'formType'=>'url',
			'placeholder'=>'http://oat.htp.bcit.ca/sites/[student prefix]',
			'regex'=>'/^(https?:\/\/)?oat\.htp\.bcit\.ca\/sites\/[a-z]{3,17}[0-9]{0,4}$/',
			'regexError'=>'Wrong format (var) should be like "http://oat.htp.bcit.ca/sites/[student prefix]"<br>Replace [student prefix] with first letter of first name followed by last name and optional unique number',
			'isRequired'=>true,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		),
		'email'=>array(
			'tableName'=>'email',
			'formName'=>'email',
			'formType'=>'email',
			'placeholder'=>'[student prefix]@my.bcit.ca',
			'regex'=>'/^[a-z]{3,17}[0-9]{0,4}@my.bcit.ca$/',
			'regexError'=>'Wrong format (var) should be like "[student prefix]@my.bcit.ca"<br>Replace "[student prefix]" with first letter of first name followed by last name and optional unique number',
			'isRequired'=>false,
			'otherRequirement'=>'none',
			'otherError'=>'',
			'isBoolean'=>false
		)
	),
	'singularName'=>'student',
	'sortOrder'=>'lastname',
	'identifier'=>'id',
	'descriptor'=>'lastname',
	'ovTableIgnore'=>array(
		'id'
	)
);

function decipherRoomNumber($number) {
	if ($number > 999) {
		$roomNumber = strval(floor($number / 1000));
		$roomNumber .= " / " . strval($number % 1000);
	}
	else {
		$roomNumber = strval($number);
	}
	return $roomNumber;
}

function findNextLetter($db, $letter, $wantedNumberOfStudents) {
	$currentLetter = $letter;
	$currentNumberOfStudents = 0;
	while ($wantedNumberOfStudents > $currentNumberOfStudents) {
		$currentLetter++;
		/* Create and run a query */
		$query = 'SELECT * FROM students WHERE lastname REGEXP "^[' . $letter . '-' . $currentLetter . ']"';
		$result = $db->query($query);
		
		$currentNumberOfStudents = $result->num_rows;
		if ($currentLetter == 'Z') {
			break;
		}
	}
	return $currentLetter;
}

function getDateForEntry($date, $days) {
	if ($days <= 1) {
		$result = date("M d", strtotime($date));
	}
	else {
		$result = date("M d", strtotime($date));
		$result .= " - ";
		$result .= date("M d", strtotime($date) + 60*60*24*($days-1));
	}
	return $result;
}

function getDateForTitle($date) {
	$result = date("M d", strtotime($date));
	$result .= " - ";
	$result .= date("M d", strtotime($date) + 60*60*24*4);
	return $result;
}

function getFullName($record) {
	$result = $record['firstname'];
	if ($record['middlename'] != '') {
		$result .= " " . $record['middlename'];
	}
	$result .= " " . $record['lastname'];
	return $result;
}

function getNextDay($db) {
	if (!isTodayInbetweenSchedule($db)) {
		return 0;
	}
	
	$searchDayUNIX = time();
	
	/* Search for the next previous day that is in the database */
	do {
		$searchDay = date('Y-m-d', $searchDayUNIX);
		$query = 'SELECT * FROM schedule WHERE date="' . $searchDay . '";';
		$result = $db->query($query);
		$searchDayUNIX -= 60*60*24;
	} while ($result->num_rows == 0);
	
	$previousRecord = $result->fetch_assoc();
	$maxTimeFromPreviousRecord = strtotime($previousRecord['date']) + 60*60*24*($previousRecord['duration']-1);
	$todayTime = strtotime(date('Y-m-d', time()));
	//echo $maxTimeFromPreviousRecord . ' ' . $todayTime;
	if ($maxTimeFromPreviousRecord > $todayTime) {
		// previous record holds information for next day entry
		return $previousRecord['date'];
	}
	else {
		// next record will hold information for next day entry
		/* Search for the next day that is in the database */
		$searchDayUNIX = time();
		do {
			$searchDay = date('Y-m-d', $searchDayUNIX);
			$query = 'SELECT * FROM schedule WHERE date="' . $searchDay . '";';
			$result = $db->query($query);
			$searchDayUNIX += 60*60*24;
		} while ($result->num_rows == 0);
		$nextRecord = $result->fetch_assoc();
		return $nextRecord['date'];
	}
}

function getNumberOfWeeks($db) {
	// create and run query
	$query = 'SELECT week FROM schedule ORDER BY week DESC LIMIT 1;';
	$result = $db->query($query);
	$numberOfWeeks = $result->fetch_assoc();
	$numberOfWeeks = $numberOfWeeks['week'];
	return $numberOfWeeks;
}

function getToday($db) {
	if (!isTodayInbetweenSchedule($db)) {
		return 0;
	}
	
	$searchDayUNIX = time();
	
	// search for the next previous day that is in the database
	do {
		$searchDay = date('Y-m-d', $searchDayUNIX);
		$query = 'SELECT * FROM schedule WHERE date="' . $searchDay . '";';
		$result = $db->query($query);
		$searchDayUNIX -= 60*60*24;
	} while ($result->num_rows == 0);
	
	// check if this schedule entry is expanding to today
	$record = $result->fetch_assoc();
	$thisDate = $record['date'];
	$thisDuration = $record['duration'];
	$today = date('Y-m-d', time());
	while ($thisDuration) {
		if ($thisDate == $today) {
			return $record['date'];
		}
		$thisDate = date('Y-m-d', strtotime($thisDate . '+1 days'));
		$thisDuration--;
	}
	return 0;
}

function getWeekNumber($db) {
	if (!isTodayInbetweenSchedule($db)) {
		return 0;
	}
	
	$searchDayUNIX = time();
	
	/* search for the next previous day that is in the database */
	do {
		$searchDay = date('Y-m-d', $searchDayUNIX);
		$query = 'SELECT week FROM schedule WHERE date="' . $searchDay . '";';
		$result = $db->query($query);
		$searchDayUNIX -= 60*60*24;
	} while ($result->num_rows == 0);
	
	$weekNumber = $result->fetch_array();
	$weekNumber = $weekNumber[0];
	return $weekNumber;
}

function isTodayInbetweenSchedule($db) {
	$today = time();
	
	/* get first day of schedule */
	$query = 'SELECT date FROM schedule ORDER BY date ASC LIMIT 1;';
	$result = $db->query($query);
	$record = $result->fetch_array();
	$firstDayOfSchedule = strtotime($record[0]);
	
	/* get last day of schedule */
	$query = 'SELECT date FROM schedule ORDER BY date DESC LIMIT 1;';
	$result = $db->query($query);
	$record = $result->fetch_array();
	$lastDayOfSchedule = strtotime($record[0]);
	
	if (($firstDayOfSchedule > $today) || ($today > $lastDayOfSchedule)) {
		return false;
	}
	else {
		return true;
	}
}

function showEmail($email, $name = null) {
	if (!isset($email)) {
		return "";
	}
	if (!isset($name)) {
		$name = $email;
	}
	$result = "<span><i class='fa fa-envelope'></i></span>";
	$result .= "<a href='mailto:";
	$result .= $email;
	$result .= "'>";
	$result .= $name;
	$result .= "</a>";
	return $result;
}

function showPDF($pdf, $name = null) {
	if (!isset($pdf)) {
		return "";
	}
	if (!isset($name)) {
		$name = $pdf;
	}
	$result = "<span><i class='fa fa-file-pdf-o'></i></span>";
	$result .= "<a href='";
	$result .= $pdf;
	$result .= "' target='_blank'>";
	$result .= $name;
	$result .= "</a>";
	return $result;
}

function showPhonenumber($phone, $name = null) {
	if (!isset($phone)) {
		return "";
	}
	if (!isset($name)) {
		$name = $phone;
	}
	$result = "<span><i class='fa fa-phone'></i></span>";
	$result .= "<a href='tel:";
	$result .= str_replace('-', '', $phone);
	$result .= "'>";
	$result .= $name;
	$result .= "</a>";
	return $result;
}

function showURL($url, $name = null) {
	if (!isset($url)) {
		return "";
	}
	if (!isset($name)) {
		$name = $url;
	}
	if (strpos($url, 'http') === false) {
		$url = 'http://' . $url;
	}
	$result = "<span><i class='fa fa-globe'></i></span>";
	$result .= "<a href='";
	$result .= $url;
	$result .= "' target='_blank'>";
	$result .= $name;
	$result .= "</a>";
	return $result;
}

// --------------------------------------- Output Contacts
function fetchAndDisplayContacts($db) {
	/* Create and run a query */
	$query = 'SELECT * FROM staff';
	$result = $db->query($query);
	
	while ($record = $result->fetch_assoc()) {
		echo "<article class='staff'>";
		echo	"<h1>";
		echo		getFullName($record);
		echo	"</h1>";
		echo	"<p>";
		echo		$record['function'];
		echo	"</p>";
		echo	showPhonenumber($record['phonenumber']);
		echo	"<br />";
		echo	showEmail($record['email']);
		echo "</article>";
	}
}

// --------------------------------------- Output Courses
function fetchAndDisplayCourses($db) {
	/* Create and run query */
	$query = 'SELECT * FROM courses';
	$result = $db->query($query);
	
	while ($record = $result->fetch_assoc()) {
		echo "<article>";
		echo 	"<h1>";
		echo		"<span class='course_number'>";
		echo 			$record['abbreviation'];
		echo 			" ";
		echo 			$record['number'];
		echo 		"</span> ";
		echo 		$record['title'];
		echo 	"</h1>";
		echo 	"<h2>Credits: ";
		echo		number_format($record['credits'], 1);
		echo 	"</h2>";
		echo	"<p>";
		echo		$record['description'];
		echo 	"</p>";
		echo	showPDF($record['pdf_location'], $record['pdf_name']);
		echo "</article>";
	}
}

// --------------------------------------- Output Students
function fetchAndDisplayStudents($db) {
	/* Create and run a query */
	$query = 'SELECT * FROM students';
	$result = $db->query($query);
	
	$currentLetter = 'A';
	$numberOfStudents = $result->num_rows;
	$numberOfStudentsPerGroup = ceil($numberOfStudents / NUMBER_OF_GROUPS);
	for ($i = 0; $i < NUMBER_OF_GROUPS; $i++) {
		$nextLetter = findNextLetter($db, $currentLetter, $numberOfStudentsPerGroup);
		
		$query = 'SELECT * FROM students WHERE lastname REGEXP "^[' . $currentLetter . '-' . $nextLetter . ']" ORDER BY lastname';
		$result = $db->query($query);
		
		echo "<article>";
		echo "<h1>";
		echo $currentLetter;
		echo " - ";
		echo $nextLetter;
		echo "</h1>";
		
		while ($record = $result->fetch_assoc()) {
			echo "<div>";
			echo	"<h1>";
			echo	getFullName($record);
			echo	"</h1>";
			echo	showURL($record['url']);
			echo	"<br>";
			echo	showEmail($record['email']);
			echo "</div>";
		}
		
		echo "</article>";
		
		$currentLetter = ++$nextLetter;
	}
}

// --------------------------------------- Output Weeks
function fetchAndDisplayWeeks($db) {
	$today = getToday($db);
	for ($i = 1; $i <= getNumberOfWeeks($db); $i++) {
		/* Create and run query */
		$query = 'SELECT * FROM schedule WHERE week="' . $i . '" ORDER BY date';
		$result = $db->query($query);
		
		$record = $result->fetch_assoc();
		
		echo "<article class='week' id='week_" . $i . "'>";
		echo "<h1>Week " . $i . " | " . getDateForTitle($record['date']) . "</h1>";
		echo "<div>";
		echo 	"<table>";
		echo 		"<tr>";
		echo			"<th width='160'>Date</th>";
		echo			"<th width='80'>Days</th>";
		echo			"<th width='240'>Course Name</th>";
		echo			"<th width='80'>Room</th>";
		echo			"<th width='160'>Instructor</th>";
		echo 		"</tr>";
		
		$result->data_seek(0);
		
		while ($record = $result->fetch_assoc()) {
			if ($record['date'] == $today) {
				echo "<tr class='today'>";
			}
			else if ($record['exam']) {
				echo "<tr class='exam'>";
			}
			else if ($record['holiday']) {
				echo "<tr class='holiday'>";
			}
			else {
				echo 	"<tr>";
			}
			echo		"<td>" . getDateForEntry($record['date'], $record['duration']) . "</td>";
			echo		"<td>" . number_format($record['duration'], 1) . "</td>";
			echo		"<td>" . $record['course_name'] . "</td>";
			echo		"<td>" . decipherRoomNumber($record['room']) . "</td>";
			echo		"<td>" . showEmail($record['instructor_email'], $record['instructor']) . "</td>";
			echo 	"</tr>";
		}
		
		echo 	"</table>";
		echo "</div>";
		echo "</article>";
	}
}

/************************************************/
/* Administrative functions							*/
/************************************************/

function checkFormTransmit($group, $groups) {
	foreach ($groups[$group]['fields'] as $index => $field) {
		if (!isset($_POST[$field['formName']])) {
			if ($field['isBoolean'] == false) {
				return false;
			}
		}
	}
	return true;
}

function validateEntry($entry, $group, $groups) {
	$result = true;
	$exclbool = false;
	$noifholidayEmpty = false;
	foreach ($groups[$group]['fields'] as $index => $field) {
		// check if the entry is empty and return an error if field is required
		if ($entry[$index] == '') {
			if ($field['isRequired'] == true) {
				// a required field is empty
				if ($field['isBoolean'] == false) {
					// only an error if the field was no checkbox
					$_SESSION['errors'][$index] = 'This is a required field and cannot be left empty';
					$result = false;
					continue;
				}
			}
			else {
				if ($field['otherRequirement'] == 'noifholiday') {
					// optionally non required field is empty
				}
				else {
					// non required field is empty
					continue;
				}
			}
		}
		// perform a regular expression check on the entry!
		else if ($field['regex'] != '') {
			if (!preg_match($field['regex'], $entry[$index])) {
				$_SESSION['errors'][$index] = str_replace('(var)', $entry[$index], $field['regexError']);
				$result = false;
				continue;
			}
			else {
				// regex was successful
			}
		}
		// check for other requirements that may be applicable to the entry
		switch ($field['otherRequirement']) {
			case 'none':
				// no other requirements necessary
				break;
			case 'date':
				if (date('Y-m-d', strtotime($entry[$index])) != $entry[$index]) {
					$_SESSION['errors'][$index] = $field['otherError'];
					$result = false;
					continue;
				}
				else {
					// entry appears to be a vaild date
				}
				break;
			case 'noifholiday':
				if ($entry[$index] == '') {
					$noifholidayEmpty[$index] = true;
				}
				break;
			case 'exclbool':
				if ($exclbool) {
					$_SESSION['errors'][$index] = $field['otherError'];
					$result = false;
					continue;
				}
				if ((isset($entry[$index])) && ($entry[$index] == 'yes')) {
					$exclbool = true;
				}
				else {
					// checkbox was not selected
				}
				break;
			default:
				if ($field['otherRequirement'] == $entry[$index]) {
					$_SESSION['errors'][$index] = $field['otherError'];
					$result = false;
					continue;
				}
				else {
					// other requirements passed
				}
				break;
		}
	}
	if ($entry['holiday'] != 'yes') {
		if (is_array($noifholidayEmpty)) {
			foreach ($noifholidayEmpty as $index => $value) {
				$_SESSION['errors'][$index] = $groups[$group]['fields'][$index]['otherError'];
				$result = false;
			}
		}
	}
	unset($exclbool);
	return $result;
}

// --------------------------------------- Courses functions deprecated
function checkCourseEditForm() {
	if (!isset($_POST['abbreviation'])) {
		return false;
	}
	if (!isset($_POST['number'])) {
		return false;
	}
	if (!isset($_POST['title'])) {
		return false;
	}
	if (!isset($_POST['credits'])) {
		return false;
	}
	if (!isset($_POST['description'])) {
		return false;
	}
	if (!isset($_POST['pdf_location'])) {
		return false;
	}
	if (!isset($_POST['pdf_name'])) {
		return false;
	}
	return true;
}

function validateCourseEntry($abbreviation, $number, $title, $credits, $description, $pdfLocation, $pdfName) {
	$result = true;
	if (!preg_match('/^[a-zA-Z]{4}$/', $abbreviation)) {
		$_SESSION['errors']['abbreviation'] = 'Wrong format (' . $abbreviation . ') only letters allowed and 4 characters long';
		echo "<p>Abreviation wrong format: " . $abbreviation . "</p>";
		$result = false;
	}
	if (!preg_match('/^[0-9]{4}$/', $number)) {
		$_SESSION['errors']['number'] = 'Wrong format (' . $number . ') only numbers allowed and 4 digits long';
		echo "<p>Number wrong format: " . $number . "</p>";
		$result = false;
	}
	if (!preg_match('/^[a-z A-Z]{4,64}$/', $title)) {
		$_SESSION['errors']['title'] = 'Wrong format (' . $title . ') only letters and spaces allowed and between 4 and 64 characters long';
		echo "<p>Title wrong format: " . $title . "</p>";
		$result = false;
	}
	if (!preg_match('/^[0-9]{1,2}$/', $credits)) {
		$_SESSION['errors']['credits'] = 'Wrong format (' . $credits . ') only numbers allowed and 1 or 2 digits long';
		echo "<p>Credits wrong format: " . $credits . "</p>";
		$result = false;
	}
	if ($description == '') {
		$_SESSION['errors']['description'] = 'Can not be empty';
		echo "<p>Description is empty</p>";
		$result = false;
	}
	if (!preg_match('/^pdf\/[a-zA-Z0-9-_.]+$/', $pdfLocation)) {
		$_SESSION['errors']['pdf_location'] = 'Wrong format (' . $pdfLocation . ') should be in "pdf" subfolder and only containing letters, numbers, dashes (-), underscores (_) and dots';
		echo "<p>PDF Location wrong format: " . $pdfLocation . "</p>";
		$result = false;
	}
	if (!preg_match('/^[a-z A-Z]+$/', $pdfName)) {
		$_SESSION['errors']['pdf_name'] = 'Wrong format (' . $pdfName . ') only letters and spaces allowed, preferably ending with "PDF"';
		echo "<p>PDF Name wrong format: " . $pdfName . "</p>";
		$result = false;
	}
	return $result;
}

// --------------------------------------- Staff functions deprecated
function checkEmployeeEditForm() {
	if (!isset($_POST['firstname'])) {
		return false;
	}
	if (!isset($_POST['middlename'])) {
		return false;
	}
	if (!isset($_POST['lastname'])) {
		return false;
	}
	if (!isset($_POST['function'])) {
		return false;
	}
	if (!isset($_POST['phonenumber'])) {
		return false;
	}
	if (!isset($_POST['email'])) {
		return false;
	}
	return true;
}

function validateEmployeeEntry($firstname, $middlename, $lastname, $function, $phonenumber, $email) {
	$result = true;
	if (!preg_match('/^[a-zA-Z]{2,16}$/', $firstname)) {
		echo "<p>Firstname wrong format: " . $firstname . "</p>";
		$result = false;
	}
	if (!preg_match('/(^[a-zA-Z]$){0,1}/', $middlename)) {
		echo "<p>Middlename wrong format: " . $middlename . "</p>";
		$result = false;
	}
	if (!preg_match('/^[a-zA-Z]{2,16}$/', $lastname)) {
		echo "<p>Lastname wrong format: " . $lastname . "</p>";
		$result = false;
	}
	if ($function == '') {
		echo "<p>Function not filled in</p>";
		$result = false;
	}
	if (!preg_match('/(^[0-9]{3}-[0-9]{3}-[0-9]{4}$)|(^[0-9]{10}$)/', $phonenumber)) {
		echo "<p>Phonenumber wrong format: " . $phonenumber . "</p>";
		$result = false;
	}
	if (!preg_match('/^[a-z]{3,16}_[a-z]{3,16}[0-9]{0,4}@bcit.ca$/', $email)) {
		echo "<p>E-Mail wrong format: " . $email . "</p>";
		$result = false;
	}
	return $result;
}

// --------------------------------------- Students functions deprecated
function checkStudentEditForm() {
	if (!isset($_POST['firstname'])) {
		return false;
	}
	if (!isset($_POST['middlename'])) {
		return false;
	}
	if (!isset($_POST['lastname'])) {
		return false;
	}
	if (!isset($_POST['url'])) {
		return false;
	}
	if (!isset($_POST['email'])) {
		return false;
	}
	return true;
}

function validateStudentEntry($firstname, $middlename, $lastname, $url, $email) {
	$result = true;
	if (!preg_match('/^[a-zA-Z]{2,16}$/', $firstname)) {
		echo "<p>Firstname wrong format: " . $firstname . "</p>";
		$result = false;
	}
	if (!preg_match('/(^[a-zA-Z]$){0,1}/', $middlename)) {
		echo "<p>Middlename wrong format: " . $middlename . "</p>";
		$result = false;
	}
	if (!preg_match('/^[a-zA-Z]{2,16}$/', $lastname)) {
		echo "<p>Lastname wrong format: " . $lastname . "</p>";
		$result = false;
	}
	if (!preg_match('/^(https?:\/\/)?oat\.htp\.bcit\.ca\/sites\/[a-z]{3,17}[0-9]{0,4}$/', $url)) {
		echo "<p>URL wrong format: " . $url . "</p>";
		$result = false;
	}
	if (!preg_match('/(^[a-z]{3,17}[0-9]{0,4}@my.bcit.ca$){0,1}/', $email)) {
		echo "<p>E-Mail wrong format: " . $email . "</p>";
		$result = false;
	}
	return $result;
}

// --------------------------------------- Schedule functions deprecated
function checkScheduleEditForm() {
	for ($i = 0; $i < 10; $i++) {
		if (!isset($_POST['date'])) {
			return false;
		}
		if (!isset($_POST['duration'])) {
			return false;
		}
		if (!isset($_POST['course_name'])) {
			return false;
		}
		if (!isset($_POST['room'])) {
			return false;
		}
		if (!isset($_POST['instructor'])) {
			return false;
		}
		if (!isset($_POST['instructor_email'])) {
			return false;
		}
		return true;
	}
}

function validateScheduleEntry($index, $date, $duration, $courseName, $room, $instructor, $instructorEmail, $holiday, $exam) {
	$_SESSION['errors'] = array();
	$_SESSION['errors'][$index] = array();
	$result = true;
	// check for all empties
	if (($date == '') && ($duration == '') && ($courseName == '') && ($room == '') && ($instructor == '') && ($instructorEmail == '') && (!$holiday) && (!$exam)) {
		return 0;
	}
	// check date
	if (!preg_match('/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/', $date)) {
		$_SESSION['errors'][$index]['date'] = '<span class="error">Date has wrong format</span>';
		$result = false;
		echo "<p>Date wrong format " . $date . "</p>";
		var_dump($_SESSION['errors']);
	}
	else if (date('Y-m-d', strtotime($date)) != $date) {
		$_SESSION['errors'][$index]['date'] = '<span class="error">Entry was not a date</span>';
		$result = false;
		echo "<p>Date was not a date</p>";
		var_dump($_SESSION['errors']);
	}
	// check duration
	if (!preg_match('/(^[0-5]{1}\.[05]{1}$)|(^[0-5]{1}$)/', $duration)) {
		$_SESSION['errors'][$index]['duration'] = '<span class="error">Duration has wrong format</span>';
		$result = false;
		echo "<p>Duration wrong format " . $duration . "</p>";
		var_dump($_SESSION['errors']);
	}
	else if ($duration == '0.0') {
		$_SESSION['errors'][$index]['duration'] = '<span class="error">0.0 is not a valid duration</span>';
		$result = false;
		echo "<p>Duration 0.0</p>";
		var_dump($_SESSION['errors']);
	}
	// check course name
	if ($courseName == '') {
		$_SESSION['errors'][$index]['course_name'] = '<span class="error">Course name is empty</span>';
		$result = false;
		echo "<p>Course name is empty</p>";
		var_dump($_SESSION['errors']);
	}
	// check room
	if (!($holiday || $exam)) {
		if (!preg_match('/(^[0-9]{3}$)|(^[0-9]{6}$)|(^[0-9]{3} ?\/ ?[0-9]{3}$)/', $room)) {
			$_SESSION['errors'][$index]['room'] = '<span class="error">Room number is not in a valid format</span>';
			$result = false;
		echo "<p>Room number wrong format " . $room . "</p>";
		var_dump($_SESSION['errors']);
		}
	}
	// check instructor
	if (!($holiday || $exam)) {
		if ($instructor == '') {
			$_SESSION['errors'][$index]['instructor'] = '<span class="error">Instructor name is empty</span>';
			$result = false;
		echo "<p>Instructor name is empty</p>";
		var_dump($_SESSION['errors']);
		}
	}
	// check instructor email
	if (!($holiday || $exam)) {
		if (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/', $instructorEmail)) {
			$_SESSION['errors'][$index]['instructor_email'] = '<span class="error">Instructor email is not in a valid format</span>';
			$result = false;
		echo "<p>Instructor email wrong format " . $instructorEmail . "</p>";
		var_dump($_SESSION['errors']);
		}
	}
	// check holiday/exam exclusivity
	if ($holiday && $exam) {
		$_SESSION['errors'][$index]['exam'] = '<span class="error">You cannot plan an exam on a holiday</span>';
		$result = false;
		echo "<p>Both checked</p>";
		var_dump($_SESSION['errors']);
	}
	return $result;
}

// --------------------------------------- Not yet working
function autoFillWeeks($db) {

	do {
		// create temporary table
		$query = CREATE_SCHED_TABLE;
		$result = $db->query($query);
		
		if (!$result) {
			$query = 'DROP TABLE temp';
			$db->query($query);
		}
	} while (!$result);
	
	$query = 'ALTER TABLE `temp` ADD PRIMARY KEY(`id`);';
	$result = $db->query($query);
	
	$query = 'ALTER TABLE `temp` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;';
	$result = $db->query($query);
	
	// select all entries from old table
	$query = 'SELECT * FROM schedule;';
	$result = $db->query($query);
	$currentWeek = 1;
	while ($record = $result->fetch_assoc()) {
		$query = 'SELECT * FROM holidays WHERE day=' . $currentDay;
		$holidayResult = $db->query($query);
		if ($holidayResult->num_rows == 1) {
			$holiday = $holidayResult->fetch_assoc();
			// skip this day due to holidays
			$query = 'INSERT INTO temp (week, date, duration, course_name, room, instructor, instructor_email, holiday, exam) VALUES (' . $currentWeek . ', "' . $currentDay . '", 1, "' . $holiday['name'] . '", NULL, NULL, NULL, 1, 0);';
			$db->query($query);
			// go instead to next day
			$currentDay = goToNextDay($currentDay);
			$query = 'INSERT INTO temp (week, date, duration, course_name, room, instructor, instructor_email, holiday, exam) VALUES ()';
		}
		else {
			// save the new date with the old information
		}
	}
}

?>