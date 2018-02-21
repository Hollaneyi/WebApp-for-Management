<?php
	include '../core/init.php';
	include 'signup.php';

?>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>Registration page for student</title>
</head>
<body>
	<form action="" method="POST">

	<legend>Sign Up Page</legend>

	<input type="text" placeholder="Full Name" name="full_name"><br>
	<select name="department"> -->
		<!-- <option value="">Department</option>
                <?php
                    // $query = "SELECT `department_Idn`, `title` FROM `department`";
                    // $run_query  = mysqli_query($Oau_auth, $query);
                    // while($init_product = mysqli_fetch_assoc($run_query))
                    // {
                    //     $department_Idn  =   $init_product['department_Idn'];
                    //     $title =   $init_product['title'];
                    //     echo "<option value=\"$department_Idn\">$title</option>";

                    // }
                ?>
	</select><br> -->
	<!-- <input type="text" placeholder="department" name="department"> -->
<!-- 	<input type="text" placeholder="position" name="position"><br>
	<input type="text" placeholder="faculty" name="faculty"><br>
	<input type="email" placeholder="email" name="email"><br>
	<input type="password" placeholder="password" name="password"><br>
	<input type="password" placeholder="password_again" name="password_again"><br>
	<input type="submit"  value="Sign Up" name="signup">

</form>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html">
	<title>OAU Post Graduate | Admin Sign in</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/signin.css">
</head>
<body style="background-color: rgba(255, 255, 255, 0.30);">

	<form class="form-signin" action="" method="POST">

      <center><img class="mb-4" src="img/oaulogo.png" alt="" width="72" height="72"></center>
      <h1 class="h3 mb-3 font-weight-normal text-center">Admin sign in</h1>
      <label for="inputEmail" class="sr-only">Full Name</label>
      <input type="text" id="inputEmail" class="form-control" value="<?php echo $_POST['full_name'];?>" placeholder="Full Name" name="full_name" required autofocus>
      <label for="inputPassword" class="sr-only">Department</label>
      <select name="department" class="form-control custom-select d-block w-100">
         <option value="">Department</option>
                    <?php
                        $query = "SELECT `department_Idn`, `title` FROM `department`";
                        $run_query  = mysqli_query($Oau_auth, $query);
                        while($init_product = mysqli_fetch_assoc($run_query))
                        {
                            $department_Idn  =   $init_product['department_Idn'];
                            $title =   $init_product['title'];
                            echo "<option value=\"$department_Idn\">$title</option>";

                        }
                    ?>
      </select>
      <label for="inputPassword" class="sr-only">Position</label>
      <input type="text" id="inputPassword" class="form-control" value="<?php echo $_POST['position'];?>" placeholder="Position" name="position" required>
      <label for="inputPassword" class="sr-only">faculty</label>
      <input type="text" id="inputPassword" class="form-control" value="<?php echo $_POST['faculty'];?>" placeholder="faculty" name="faculty" required>
      <label for="inputPassword" class="sr-only">email</label>
      <input type="email" id="inputPassword" class="form-control" value="<?php echo $_POST['email'];?>" placeholder="email" name="email" required>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control"  placeholder="Password" name="password" required>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control"  placeholder="Password again" name="password_again" required>

      <div class="checkbox mb-3">
      <?php
        if(isset($_POST['signup']))
          if(empty($errors) === false)
              echo "<div style=\"padding: 5px 10px; border-radius: 8px; background-color: grey;\">" .output_errors($errors) . "</div>";
      ?>
      </div>
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="signup" value="Add Admin">
      <p class="small">Already a member?</p>
      <a href="index.php" class="btn btn-lg btn btn-primary" btn-block">Sign in </a>
      <p class="mt-5 mb-3 text-muted text-center">2018 -- <?php echo date('Y'); ?></p>
    </form>

     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>