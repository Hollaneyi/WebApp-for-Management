<?php

	include 'core/init.php';
	include 'login.php';

?>
<?php

	if(check_logged_In() === false)
	{
		include 'log.php';
	}
	else
	{
		include 'user.php';
	}

?>





<!-- 	<form action="" method="POST">
		<input type="email" name="email">
		<input type="password" name="password">
		<input type="submit" name="signin" value="Sign In">
	</form>
	<a href="register.php">Registration Page</a>
	<a href="logout.php">Logout </a>
<hr />

	<form action="" method="POST">
		<input type="text" name="">
		<input type="submit" name="search" value="Search">
	</form>
</body>
</html -->