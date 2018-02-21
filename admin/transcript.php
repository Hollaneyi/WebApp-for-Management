<?php

	include '../core/init.php';
	include 'fetch_all_data.php';
?>

<?php
    if(admin_check_logged_In() === true)
    {
    		include 'nav/headNav.php';
			include 'nav/nav.php';
			include 'nav/subnav.php';
			include 'headingcategories/transcript.php';
			include 'Body/transcript.php';
			include 'footer/foot.php';
    }
?>

