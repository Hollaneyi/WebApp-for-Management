<?php

	if(isset($_POST['signup']) === true && empty($_POST['signup']) === false)
	{

		if(empty($_POST) === false)
		{

			$oaupostgrad_fields = array('first_name', 'last_name', 'other_name', 'registration', 'dob', 'department_Idn', 'awards_Idn', 'year', 'email', 'password');

			foreach($_POST as $key => $value)
			{

				if(empty($value) === true && is_array($key, $oaupostgrad_fields) === true)
				{
					$errors[] = 'All fields are required without excemption';
					break 1;
				}


			}

			if(empty($errors) === true)
			{

				if(check_email_exists($_POST['email']) === true)
				{
					$errors[] = 'Sorry, the email \'' .htmlentities($_POST['email']) . '\' is already taken';
				}

				if(preg_match("/\\s/", $_POST['first_name']) == true)
				{
					$errors[] = 'Your first_name must not contain any spaces';
				}

				if(preg_match("/\\s/", $_POST['last_name']) == true)
				{
					$errors[] = 'Your lastname must not contain any spaces';
				}

				if(preg_match("/\\s/", $_POST['other_name']) == true)
				{
					$errors[] = 'Your middlename must not contain any spaces';
				}

				if(preg_match("/\\s/", $_POST['registration']) == true)
				{
					$errors[] = 'Your registration must not contain any spaces';
				}

				if(preg_match("/\\s/", $_POST['department']) == true)
				{
					$errors[] = 'Your department must not contain any spaces';
				}

				if(strlen($_POST['password']) < 8)
				{
					$errors[] = 'Your password must be atleat 8 characters';
				}

				if($_POST['password'] !== $_POST['password_again'])
				{
					$errors[] = 'Oops, your passwords do not match';
				}

				if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
				{
					$errors[] = 'Please, a valid email address is required';
				}


			}

		}

	}

	if(isset($_GET['success']) && empty($_GET['success']))
	{

		echo '<div style="background-color: grey; border-radius: 3px; color: white; padding: 5px 10px;">' . 'You have been registered successffuly. We have sent an activation link to your email ' . '<a href="index.php">Login</a>';
	}
	else
	{

		if(empty($_POST) === false && empty($errors) === true)
		{
				$Oau_postgrads	=	array(
					'first_name'		=>	$_POST['first_name'],
					'last_name'			=>	$_POST['last_name'],
					'other_name'		=>	$_POST['other_name'],
					'registration' 		=>	$_POST['registration'],
					'dob'				=>	$_POST['dob'],
					'department_Idn' 		=>	(int)$_POST['department'],
					'awards_Idn' 		=>	(int)$_POST['awards_Idn'],
					'year'   			=>	$_POST['year'],
					'password' 			=>	$_POST['password'],
					'email' 			=>	$_POST['email'],
					'email_code'		=> 	md5($_POST['email'] + microtime())
				);

				user_signup($Oau_postgrads);
				header("Location: signup.php?success");
				exit();
			}
			else
			{

			}

	}
?>