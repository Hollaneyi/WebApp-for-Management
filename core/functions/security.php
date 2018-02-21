<?php

	//protected pages
	function protect_page()
	{
		if(check_logged_In() === false)
		{
			header("Location: index.php");
			exit();
		}
	}

	// check sensitive pages
	function logged_in_redirect()
	{
		if(check_logged_In() === true)
		{
			header("Location: index.php");
			exit();
		}
	}

	//email activation
	function email($to, $subject, $body)
	{
		mail($to, $subject, $body, 'From: oau-pgtranscript@senttrigg.com');
	}

	// sanitize data in array
	function array_sanitize(&$item)
	{
		global $Oau_auth;
		$item = htmlentities(strip_tags(mysqli_real_escape_string($Oau_auth, $item)));
	}

	function sanitize($data)
	{

		global $Oau_auth;
		return	htmlentities(strip_tags(mysqli_real_escape_string($Oau_auth, $data)));

	}

	//error output handling
	function output_errors($errors)
	{

		$output = array();
		foreach ($errors as $error)
		{
			$output[] = '<li style="color:white;">' . $error . '</li>';
		}
		return '<ul style="list-style-type: none; margin: 0; padding: 0;">' . implode('', $output) . '</ul>';

	}

?>