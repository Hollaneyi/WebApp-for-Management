      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Department</h6>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <?php
                $query = "SELECT `department_Idn`, `title` FROM `department`";
                    $run_query  = mysqli_query($Oau_auth, $query);

                    while($init_product = mysqli_fetch_assoc($run_query))
                    {
                        $title          =   $init_product['title'];
                        echo "
                              <span class=\"border-left border-right border-info\" style=\"padding: 0 20px !important;\">
                                $title
                              </span>
                            ";
                    }

              ?>

        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
          <?php
            if(isset($_POST['send_department']) === true && empty($_POST['send_department']) === false)
            {
                $department = $_POST['department'];
                if(empty($department) === false)
                {
                    $department = sanitize($department);
                    $query = "INSERT INTO `department` (`title`) VALUES ('$department')";
                    if($run_query = mysqli_query($Oau_auth, $query))
                    {
                        header("Location: department.php");
                        exit();
                    }
                }
                else
                {
                    echo "Department is empty";
                }
            }
          ?>
          <form action="" method="POST" class="form-inline">
            <legend>Department</legend>
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" placeholder="Department" name="department" class="form-control">
            </div>
              <input type="submit" name="send_department" value="Add department" class="btn btn-primary mb-2">
          </form>

        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
            <?php
            if(isset($_POST['delete_department']) === true && empty($_POST['delete_department']) === false)
            {
                $department_Idn = $_POST['department_Idn'];
                if(empty($department_Idn) === false)
                {
                    $department_Idn = (int)$department_Idn;
                    echo $department_Idn;
                    $query = "DELETE FROM `department` WHERE `department_Idn` = '$department_Idn'";
                    if($run_query = mysqli_query($Oau_auth, $query))
                    {
                        header("Location: department.php");
                        exit();
                    }
                }
                else
                {
                    echo "Please chose an award to be deleted";
                }
            }
          ?>
            <form action="" method="POST" class="form-inline">
            <legend>Delete Department</legend>
            <div class="form-group mx-sm-3 mb-2">
              <select name="awards_Idn" class="custom-select mr-sm-2">
                  <option value="">Department</option>
                  <?php
                      $query = "SELECT `department_Idn`, `title` FROM `department`";
                      $run_query  = mysqli_query($Oau_auth, $query);
                      while($init_product = mysqli_fetch_assoc($run_query))
                      {
                          $department_Idn     =   $init_product['department_Idn'];
                          $title          =   $init_product['title'];
                          echo "<option value=\"$department_Idn\">$title</option>";

                      }
                  ?>
              </select>
            </div>
            <input type="submit" name="delete_department" value="Delete Department" class="btn btn-primary mb-2">
        </form>
        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
            <?php
            if (isset($_POST['edit_department']) === true && empty($_POST['edit_department']) === false)
            {
                $title      = $_POST['title'];
                $new_title  = $_POST['new_title'];
                if(!empty($title) && !empty($new_title))
                {
                    $title      = sanitize($title);
                    $new_title  = sanitize($new_title);
                    $query = "UPDATE `department` SET `title` = '$new_title' WHERE `title` = '$title'";
                    if($run_query = mysqli_query($Oau_auth, $query))
                    {
                        header("Location: department.php");
                        exit();
                    }
                }
            }
        ?>
            <form action="" method="POST" class="form-inline">
            <legend>Edit Department</legend>
            <div class="form-group mx-sm-3 mb-2">
              <select name="title" id="" class="custom-select mr-sm-2">
                  <option value="">Department</option>
                  <?php
                      $query = "SELECT `department_Idn`, `title` FROM `department`";
                      $run_query  = mysqli_query($Oau_auth, $query);
                      while($init_product = mysqli_fetch_assoc($run_query))
                      {
                          $department_Idn     =   $init_product['department_Idn'];
                          $title          =   $init_product['title'];
                          echo "<option value=\"$title\">$title</option>";

                      }
                  ?>
              </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" placeholder="New Department Name" name="new_title" class="form-control">
            </div>
            <input type="submit" name="edit_department" value="Edit Department" class="btn btn-primary mb-2">
        </form>
        </div>
        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
      </div>