<?php
	// $db_host	=	"db724515342.db.1and1.com";
	// $db_user	=	"dbo724515342";
	// $db_pass	=	"DogaraAbbah123@";
	// $db_name	=	"db724515342";

	$db_host	=	"localhost";
	$db_user	=	"root";
	$db_pass	=	"";
	$db_name	=	"oaupostgrad";
	$Oau_auth	=	mysqli_connect($db_host, $db_user, $db_pass);

	if(!$Oau_auth)
	{
		die("Sorry, At This moment Server Authentication is experiencing downtime ... ");
	}
	else
	{
		$Authenticate_database = mysqli_select_db($Oau_auth, $db_name);

		if(!$Authenticate_database)
		{
			die('Sorry, Access to Data-Bank is Denied');
		}

	}
?>