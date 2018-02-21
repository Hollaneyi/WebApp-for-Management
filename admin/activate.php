<?php

	include '../core/init.php';

	if(isset($_GET['success']) === true && empty($_GET['success']) === true)
	{
		$home = 'index.php';
		header("Location: " .$home);
		exit();

	}
	else if(isset($_GET['email'], $_GET['email_code']))
	{

		$email 			= 	trim($_GET['email']);
		$email_code 	=	trim($_GET['email_code']);

		if(admin_check_email_exists($email) === false)
		{
			$errors[] = 'Oops, Something went wrong, and we couldn\'t find that email address';
		}
		if(oaupostgrad_admin_activator($email, $email_code) === false)
		{
			$errors[] = 'We had problems activating your account, please try again later or contact us through our customer care';
		}


		if(empty($errors) === false)
		{
			echo output_errors($errors);
		}
		else
		{

			header("Location: activate.php?success");
			exit();

		}

	}
	else
	{
		header("Location: index.php");
		exit();
	}

?>