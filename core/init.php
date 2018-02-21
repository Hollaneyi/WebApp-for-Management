<?php


	ob_start();
	session_start();
	error_reporting(0);

	include 'database/database.con.php';
	include 'functions/security.php';
	include 'functions/function.inc.php';
	if(check_logged_In() === true)
	{
		$student_Idn  = $_SESSION['student_Idn'];
		$fetch_student_data		=	fetch_student_data($student_Idn,  'first_name', 'last_name', 'other_name', 'registration', 'dob', 'department_Idn', 'awards_Idn', 'year', 'email', 'email_code', 'password', 'active');

		$awards_Idn = $fetch_student_data['awards_Idn'];
		$department_Idn = $fetch_student_data['department_Idn'];
		$award_Identity = award_Identity($awards_Idn, `title`);
		$department_Identity = department_Identity($department_Idn, `title`);

		$student_email = $fetch_student_data['email'];

	}

	$errors = array();
?>
