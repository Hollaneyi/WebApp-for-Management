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
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" placeholder="<?php echo $_POST['email'];?>" name="email" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
      <div class="checkbox mb-3">
        <?php
      if(isset($_POST['signin']))
        echo "<div style=\"padding: 5px 10px; border-radius: 8px; background-color: grey;\">" .output_errors($errors) . "</div>";
      ?>
      </div>
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="signin" value="Sign in">
      <a href="register.php" class="btn btn-lg btn-primary btn-block">Registration Page</a>
      <p class="mt-5 mb-3 text-muted text-center">2018 -- <?php echo date('Y'); ?></p>
    </form>

     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>