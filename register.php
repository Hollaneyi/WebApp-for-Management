<?php
	include 'core/init.php';
	include 'signup.php';

?>
<?php

    if(check_logged_In() === false)
    {
        include 'reg.php';
    }

?>
