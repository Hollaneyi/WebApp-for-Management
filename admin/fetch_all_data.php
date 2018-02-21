<?php
	if(admin_check_logged_In() === true)
	{
		$admin_user_Idn 		=	$_SESSION['admin_Idn'];
		$fetch_admin_data 	= fetch_admin_data($admin_user_Idn, 'full_name', 'department', 'superadmin', 'position', 'faculty', 'email', 'email_code', 'password');

		// echo $fetch_admin_data['full_name'];
	}


?>