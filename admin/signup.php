<?php

	if(isset($_POST['signup']) === true && empty($_POST['signup']) === false)
	{

		if(empty($_POST) === false)
		{

			$admin_oaupostgrad_fields = array('full_name', 'department', 'superadmin', 'position', 'faculty', 'email', 'password');

			foreach($_POST as $key => $value)
			{

				if(empty($value) === true && in_array($key, $admin_oaupostgrad_fields) === true)
				{
					$errors[] = 'All fields are required without excemption';
					break 1;
				}


			}

			if(empty($errors) === true)
			{

				if(admin_check_email_exists($_POST['email']) === true)
				{
					$errors[] = 'Sorry, the email \'' .htmlentities($_POST['email']) . '\' is already taken';
				}


				if(preg_match("/\\s/", $_POST['department']) == true)
				{
					$errors[] = 'Your department must not contain any spaces';
				}

				if(preg_match("/\\s/", $_POST['position']) == true)
				{
					$errors[] = 'Your position must not contain any spaces';
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

				if(admin_check_email_exists($_POST['email']) === true)
				{
					$errors[] = 'Sorry the email \'' .htmlentities($_POST['email']) . '\' is already in use';
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
				$admin_Oau_postgrads	=	array(
					'full_name'			=>	$_POST['full_name'],
					'department'		=>	(int)$_POST['department'],
					'position'			=>	$_POST['position'],
					'faculty' 			=>	$_POST['faculty'],
					'email'				=>	$_POST['email'],
					'password' 			=>	$_POST['password'],
					'email_code'		=> 	md5($_POST['email'] + microtime())
				);

				admin_user_signup($admin_Oau_postgrads);
				header("Location: signup.php?success");
				exit();
			}
			else
			{

			}

	}
ob_end_flush();
?>