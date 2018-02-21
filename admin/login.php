<?php


	if(isset($_POST['signin']) && !empty($_POST['signin']))
	{
		$email	=	$_POST['email'];
		$password	=	$_POST['password'];

		if(empty($email) === true || empty($password) === true)
		{
			$errors[]	=	'One of the fields is empty';
		}
		elseif(admin_check_email_exists($email) === false)
		{
			$errors[]	=	'Sorry, we can\'t find your email. have you registered?';
		}
		elseif(admin_user_activated($email) === false)
		{
			$errors[]	=	'Oops, You havn\'t activate your account';
		}
		else
		{
			if(strlen($password) < 8)
			{
				$errors[]	=	'Sorry, password to short';
			}
			elseif(strlen($password) > 32)
			{
				$errors[]	=	'Sorry, password to long';
			}
			$login = admin_user_login($email, $password);
			if($login === false)
			{
				$errors[]	=	'It seems you enter invalid username and password';
			}
			else
			{
				$_SESSION['admin_Idn']	=	$login;
				header("Location: index.php");
				exit();
			}
		}
	}

?>