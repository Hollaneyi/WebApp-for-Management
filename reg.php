<?php
  include 'heading.php';
  include 'nav.php';
?>

      <div class="front-ban front-banner position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
        <?php
            if(empty($errors) === false)
            {
              echo output_errors($errors);
            }
        ?>
        <div class="col-md-4 p-lg-5 mx-auto my-6">
          <form class="form-signin" action="" method="POST">
            <img class="mb-4" src="admin/img/oaulogo.png" alt="" width="72" height="72">
            <!--<h1 class="h3 mb-3 font-weight-normal"></h1>-->
            <div class="alert alert-warning" role="alert">Fill to Request Transcript</div>
            <label for="inputEmail" class="sr-only">First Name</label>
            <input type="text" id="inputEmail" class="form-control" placeholder="First Name" value="<?php echo $_POST['first_name']; ?>" name="first_name" required autofocus>
            <label for="inputPassword" class="sr-only">Last Name</label>
            <input type="text" id="inputPassword" class="form-control" placeholder="Last Name" value="<?php echo $_POST['last_name']; ?>"  name="last_name" required>
            <label for="inputPassword" class="sr-only">Other Name</label>
            <input type="text" id="inputPassword" class="form-control" placeholder="Other Name" value="<?php echo $_POST['other_name']; ?>" name="other_name" required>
            <label for="inputPassword" class="sr-only">Registration No</label>
            <input type="text" id="inputPassword" class="form-control" placeholder="Registration No" value="<?php echo $_POST['registration']; ?>" name="registration" required>
            <label for="inputPassword" class="sr-only">Date Of Birth</label>
            <input type="text" id="inputPassword" class="form-control" placeholder="Date Of Birth (dd/mm/yyyy)" value="<?php echo $_POST['dob']; ?>" name="dob" required>
            <label for="inputPassword" class="sr-only">Department</label>
            <select name="department_Idn" class="form-control custom-select d-block w-100" placeholder="Department" required>
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
            <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Department" required> -->
            <label for="inputPassword" class="sr-only">Awards</label>
            <select name="awards_Idn" class="form-control custom-select d-block w-100" placeholder="Awards" required>
                <option value="">Awards</option>
                <?php
                    $query = "SELECT `awards_Idn`, `title` FROM `awards`";
                    $run_query  = mysqli_query($Oau_auth, $query);
                    while($init_product = mysqli_fetch_assoc($run_query))
                    {
                        $awards_Idn     =   $init_product['awards_Idn'];
                        $title          =   $init_product['title'];
                        echo "<option value=\"$awards_Idn\">$title</option>";

                    }
                ?>
            </select>
            <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Awards" required> -->
            <label for="inputPassword" class="sr-only">Year</label>
            <input type="text" name="year" id="inputPassword" class="form-control" value="<?php echo $_POST['year']; ?>" placeholder="Year of Resumption" required>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
            <label for="inputPassword" class="sr-only">Password Again</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password_again" required>
            <label for="inputPassword" class="sr-only">Email</label>
            <input type="email" id="inputPassword" class="form-control" value="<?php echo $_POST['email']; ?>" placeholder="Email" name="email" required>
            <br>
            <input class="btn btn-lg btn-primary btn-block" name="signup" type="submit" value="Sign Up">
          </form>
          <br>
          <p btn btn-primary><a class="btn btn-secondary " href="index.php">Go back Home </a></p>
        </div>
      </div>

<?php
  include 'footing.php';
?>