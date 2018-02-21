<?php

	include '../core/init.php';
	include 'login.php';
	include 'fetch_all_data.php';
?>

    <?php
    if(admin_check_logged_In() === false)
    {
        include 'signin.php';
    }
    else
    {
        include 'home.php';
    }
    ?>






