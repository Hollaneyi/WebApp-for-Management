<?php
  include 'heading.php';
  include 'nav.php';
?>


      <div class="front-ban front-banner position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
        <?php
          if(isset($_POST['signin']))
          {
            echo output_errors($errors);
          }
        ?>
        <div class="col-md-4 p-lg-5 mx-auto my-6">
          <form class="form-signin" action="" method="POST">
            <img class="mb-4" src="admin/img/oaulogo.png" alt="" width="72" height="72">
            <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Notice!!</strong> First time Users are expected to Register first, Using their correct Registration number.
          </div>
            <div class="alert alert-primary" role="alert">Please Enter your Credentials</div>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?php echo $_POST['email']; ?>" name="email" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
            <br>
            <input type="submit" name="signin" class="btn btn-lg btn btn-primary btn-block" value="Sign in">
          </form>
          <br>
          <p><a class="btn btn-info" href="register.php"> Register</a></p>
        </div>
        <!-- <div class="product-device box-shadow d-none d-md-block"></div> -->
        <!-- <div class="product-device product-device-2 box-shadow d-none d-md-block"></div> -->
      </div>
<?php
  include 'footing.php';
?>





