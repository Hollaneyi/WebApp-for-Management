<?php
	/* Authenticating User Before Logining In*/
	function user_login($email, $password)
	{

		global $Oau_auth;
		$student_Idn 	=	fetch_user_Idn($email);
		$email	=	sanitize($email);
		$password	=	md5($password);

		$query = "SELECT `email`, `password` FROM `student` WHERE `email` = '$email' AND `password` = '$password'";
		$run_query = mysqli_query($Oau_auth, $query);
		if(mysqli_num_rows($run_query) > 0)
		{
			return $student_Idn;
		}
		else
		{
			return false;
		}

	}

	/* checking User exist*/
	function check_email_exists($email)
	{

		global $Oau_auth;
		$email = sanitize($email);

		$query = "SELECT `student_Idn` FROM `student` WHERE `email` = '$email'";
		$run_query = mysqli_query($Oau_auth, $query);

		if(mysqli_num_rows($run_query) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	/* Checking user is activated*/
	function user_activated($email)
	{

		global $Oau_auth;
		$email = sanitize($email);
		$activated = 1;
		$query = "SELECT `student_Idn` FROM `student` WHERE `email` = '$email' AND `active` = '$activated'";
		$run_query = mysqli_query($Oau_auth, $query);

		if(mysqli_num_rows($run_query) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	/* Fetching the user_Idn */
	function fetch_user_Idn($email)
	{

		global $Oau_auth;
		$email	=	sanitize($email);

		$query = "SELECT `student_Idn` FROM `student` WHERE `email` = '$email'";
		$run_query = mysqli_query($Oau_auth, $query);
		$rows = mysqli_fetch_assoc($run_query);
		$student_Idn = $rows['student_Idn'];
		return $student_Idn;

	}

	/* checking logins*/
	function check_logged_In()
	{
		return (isset($_SESSION['student_Idn'])) ? true : false;
	}


	function fetch_student_data($student_Idn)
	{
		global $Oau_auth;

		$student_user_data	=	array();
		$student_Idn		=	(int)$student_Idn;

		$func_num_args	=	func_num_args();
		$func_get_args	=	func_get_args();
		if($func_num_args > 1)
		{
			unset($func_get_args[0]);
			$fields = '`' . implode('`, `', $func_get_args) . '`';
			$query = "SELECT $fields FROM `student` WHERE `student_Idn` = '$student_Idn'";
			$student_user_data = mysqli_fetch_assoc(mysqli_query($Oau_auth, $query));
			return $student_user_data;
		}

	}
	function award_Identity($awards_Idn)
	{
		global $Oau_auth;

		$awards_Idn = (int)$awards_Idn;
		$award_Identity_data = array();

			$query = "SELECT `title` FROM `awards` WHERE `awards_Idn` = '$awards_Idn'";
			// echo $query;
			$run_query = mysqli_query($Oau_auth, $query);
			// var_dump($run_query);
			// die();
			$award_Identity_data = mysqli_fetch_assoc($run_query);
			return $award_Identity_data;
	}

	function department_Identity($department_Idn)
	{
		global $Oau_auth;

		$department_Idn = (int)$department_Idn;
		$department_Identity_data = array();

		$query = "SELECT `title` FROM `department` WHERE `department_Idn` = '$department_Idn'";
		// echo $query;
		$run_query = mysqli_query($Oau_auth, $query);
		// var_dump($run_query);
		// die();
		$department_Identity_data = mysqli_fetch_assoc($run_query);
		return $department_Identity_data;

	}
/* -------------------------------- Login Administrators ---------------------------*/

	/* Authenticating User Before Logining In*/
	function admin_user_login($email, $password)
	{

		global $Oau_auth;
		$admin_Idn 	=	admin_fetch_user_Idn($email);
		$email	=	sanitize($email);
		$password	=	md5($password);

		$query = "SELECT `email`, `password` FROM `administrator` WHERE `email` = '$email' AND `password` = '$password'";
		$run_query = mysqli_query($Oau_auth, $query);
		if(mysqli_num_rows($run_query) > 0)
		{
			return $admin_Idn;
		}
		else
		{
			return false;
		}

	}

	/* checking User exist*/
	function admin_check_email_exists($email)
	{

		global $Oau_auth;
		$email = sanitize($email);

		$query = "SELECT `admin_Idn` FROM `administrator` WHERE `email` = '$email'";
		$run_query = mysqli_query($Oau_auth, $query);

		if(mysqli_num_rows($run_query) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	/* Checking user is activated*/
	function admin_user_activated($email)
	{

		global $Oau_auth;
		$email = sanitize($email);
		$activated = 1;
		$query = "SELECT `admin_Idn` FROM `administrator` WHERE `email` = '$email' AND `active` = '$activated'";
		$run_query = mysqli_query($Oau_auth, $query);

		if(mysqli_num_rows($run_query) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	/* Fetching the user_Idn */
	function admin_fetch_user_Idn($email)
	{

		global $Oau_auth;
		$email	=	sanitize($email);

		$query = "SELECT `admin_Idn` FROM `administrator` WHERE `email` = '$email'";
		$run_query = mysqli_query($Oau_auth, $query);
		$rows = mysqli_fetch_assoc($run_query);
		$admin_Idn = $rows['admin_Idn'];
		return $admin_Idn;

	}

	/* checking logins*/
	function admin_check_logged_In()
	{
		return (isset($_SESSION['admin_Idn'])) ? true : false;
	}

/* -------------------------------- End Login Administrators ---------------------------*/

/* -------------------------------- We are creating registration form for users ---------------------------*/

	/* Authenticating Users Registration Portal*/
	function user_signup($Oau_postgrads)
	{

		global $Oau_auth;

		array_walk($Oau_postgrads, 'array_sanitize');
		$Oau_postgrads['password'] = md5($Oau_postgrads['password']);
		$fields = '`' .implode('`, `', array_keys($Oau_postgrads)) . '`';
		$data = '\'' .implode('\', \'', $Oau_postgrads) . '\'';
		$query = "INSERT INTO `student` ($fields) VALUES ($data)";
		$run_query = mysqli_query($Oau_auth, $query);

		email($Oau_postgrads['email'], 'Activate your account', "
		Hello " . $Oau_postgrads['fname'] .", \n\n

		You need to activate your student login account, so use the link below:\n\n

		http://www.oau-pgtranscript.senttrigg.com/activate.php?email=" .$Oau_postgrads['email']. "&email_code=" .$Oau_postgrads['email_code']. "\n\n

		--Oau PG Transcript\n\n
		https://wwww.oau-pgtranscript.senttrigg.com
		");

	}



	/* Activating finmarks user signups*/
	function oaupostgrad_users_activator($email, $email_code)
	{

		global $Oau_auth;
		$email 			= 	sanitize($email);
		$email_code		=	sanitize($email_code);
		$deactivator	=	0;
		$activator 		=	1;

		$query1 = "SELECT `student_Idn` FROM `student` WHERE `email` = '$email' AND `email_code` = '$email_code' AND `active` = $deactivator";
		$run_query1 = mysqli_query($Oau_auth, $query1);

		if(mysqli_num_rows($run_query1) > 0)
		{

			$query2 = "UPDATE `student` SET `active` = $activator WHERE `email` = '$email' AND `email_code` = '$email_code'";
			$run_query2 = mysqli_query($Oau_auth, $query2);

			return true;
		}
		else
		{
			return false;
		}

	}




	/* -------------------------------- Registration is completed ---------------------------*/

	/* -------------------------------- We are creating registration form for Admin ---------------------------*/

	/* Authenticating Users Registration Portal*/
	function admin_user_signup($Admin_Oau_postgrads)
	{

		global $Oau_auth;

		array_walk($Admin_Oau_postgrads, 'array_sanitize');
		$Admin_Oau_postgrads['password'] = md5($Admin_Oau_postgrads['password']);
		$fields = '`' .implode('`, `', array_keys($Admin_Oau_postgrads)) . '`';
		$data = '\'' .implode('\', \'', $Admin_Oau_postgrads) . '\'';
		$query = "INSERT INTO `administrator` ($fields) VALUES ($data)";
		$run_query = mysqli_query($Oau_auth, $query);

		email($Admin_Oau_postgrads['email'], 'Activate your account', "
		Hello " . $Admin_Oau_postgrads['fname'] .", \n\n

		You need to activate your admin login account, so use the link below:\n\n

		http://www.oau-pgtranscript.senttrigg.com/admin/activate.php?email=" .$Admin_Oau_postgrads['email']. "&email_code=" .$Admin_Oau_postgrads['email_code']. "\n\n

		--Oau PG Transcript\n\n
		https://wwww.oau-pgtranscript.senttrigg.com
		");
	}



	/* Activating finmarks user signups*/
	function oaupostgrad_admin_activator($email, $email_code)
	{

		global $Oau_auth;
		$email 			= 	sanitize($email);
		$email_code		=	sanitize($email_code);
		$deactivator	=	0;
		$activator 		=	1;

		$query1 = "SELECT `admin_Idn` FROM `administrator` WHERE `email` = '$email' AND `email_code` = '$email_code' AND `active` = $deactivator";
		$run_query1 = mysqli_query($Oau_auth, $query1);

		if(mysqli_num_rows($run_query1) > 0)
		{

			$query2 = "UPDATE `administrator` SET `active` = $activator WHERE `email` = '$email' AND `email_code` = '$email_code'";
			$run_query2 = mysqli_query($Oau_auth, $query2);

			return true;
		}
		else
		{
			return false;
		}

	}


	/* -------------------------------- Registration for Admin is completed ---------------------------*/

	/* -------------------------------- We are fetching  Admin data ---------------------------*/
	function fetch_admin_data($admin_user_Idn)
	{
		global $Oau_auth;
		$admin_user	=	array();
		$admin_user_Idn		=	(int)$admin_user_Idn;

		$func_num_args	=	func_num_args();
		$func_get_args	=	func_get_args();
		if($func_num_args > 1)
		{
			unset($func_get_args[0]);
			$fields = '`' . implode('`, `', $func_get_args) . '`';
			$query = "SELECT $fields FROM `administrator` WHERE `admin_Idn` = '$admin_user_Idn'";
			$admin_user = mysqli_fetch_assoc(mysqli_query($Oau_auth, $query));
			return $admin_user;
		}
	}
	function transcript($galon)
	{
		global $Oau_auth;
		$query = "INSERT INTO `trancsript` () VALUES($galon)";


	}
	function fetch_department()
	{

	}

	function fetch_course()
	{

	}

	function fetch_transcript()
	{

	}

	function fetch_awards()
	{

	}
	/* -------------------------------- End We are fetching  Admin data ---------------------------*/
?>