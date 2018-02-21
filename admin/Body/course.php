      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Department</h6>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <?php

                $query = "SELECT `course_Idn`, `course_code`, `course_title`, `remarks_unit`, `department_Idn`, `awards_Idn` FROM `course`";
                    $run_query  = mysqli_query($Oau_auth, $query);

                    echo "<table>";
                    while($init_product = mysqli_fetch_assoc($run_query))
                    {
                        $course_code          =   $init_product['course_code'];
                        $course_title         =   $init_product['course_title'];
                        $remarks_unit         =   $init_product['remarks_unit'];
                        $department_Idn       =   $init_product['department_Idn'];
                        $awards_Idn           =   $init_product['awards_Idn'];
                          $query2 = "SELECT * FROM `department` WHERE `department_Idn` = '$department_Idn'";
                          $run_query2 = mysqli_query($Oau_auth, $query2);
                          $rows2 = mysqli_fetch_assoc($run_query2);
                          $departments = $rows2['title'];

                          $query3 = "SELECT * FROM `awards` WHERE `awards_Idn` = '$awards_Idn'";
                          $run_query3 = mysqli_query($Oau_auth, $query3);
                          $rows3 = mysqli_fetch_assoc($run_query3);
                          $awards = $rows3['title'];
                        echo "
                              <tr class=\"border-left border-right border-info\">
                                <td style=\"padding: 0 20px !important;\">
                                  $course_code
                                </td>
                                <td style=\"padding: 0 20px !important;\">
                                  $course_title
                                </td>
                                <td style=\"padding: 0 20px !important;\">
                                  $remarks_unit
                                </td>
                                <td style=\"padding: 0 20px !important;\">
                                  $departments
                                </td>
                                <td style=\"padding: 0 20px !important;\">
                                  $awards
                                </td>
                              </tr>
                            ";
                    }
                    echo "</table>";
              ?>

        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
          <?php
            if(isset($_POST['send_course']) === true && empty($_POST['send_course']) === false)
            {
                $course_code    = $_POST['course_code'];
                $course_title   = $_POST['course_title'];
                $remarks_unit   = $_POST['remarks_unit'];
                $department_Idn = $_POST['department_Idn'];
                $awards_Idn     = $_POST['awards_Idn'];

                if(!empty($course_code) && !empty($course_title) && !empty($remarks_unit) && !empty($department_Idn) && !empty($awards_Idn))
                {
                    $course_code    = sanitize($course_code);
                    $course_title   = sanitize($course_title);
                    $remarks_unit   = sanitize($remarks_unit);
                    $department_Idn = sanitize($department_Idn);
                    $awards_Idn     = (int)$awards_Idn;

                    $query = "INSERT INTO `course` (`course_code`, `course_title`, `remarks_unit`, `department_Idn`, `awards_Idn`) VALUES ('$course_code', '$course_title', '$remarks_unit', '$department_Idn', '$awards_Idn')";
                    if($run_query = mysqli_query($Oau_auth, $query))
                    {
                        header("Location: course.php");
                        exit();
                    }
                }
            }
          ?>
          <form action="" method="POST" class="form-inline">
            <legend>Course</legend>
            <div class="form-group mx-sm-2 mb-2">
              <input type="text" placeholder="Course Code" name="course_code" class="form-control">
            </div>
            <div class="form-group mx-sm-2 mb-2">
              <input type="text" placeholder="Course Title" name="course_title" class="form-control">
            </div>
            <div class="form-group mx-sm-2 mb-2">
              <input type="text" placeholder="Remarks Unit" name="remarks_unit" class="form-control">
            </div>
            <div class="form-group mx-sm-2 mb-2">
              <select name="department_Idn" class="custom-select mr-sm-2">
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
            </div>
            <div class="form-group mx-sm-2 mb-2">
              <select name="awards_Idn" id="" class="custom-select mr-sm-2">
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
            </div>
            <input type="submit" name="send_course" value="Add course" class="btn btn-primary mb-2">
          </form>

        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
            <?php
            if(isset($_POST['delete_course']) === true && empty($_POST['delete_course']) === false)
            {
                $course_Idn     =  $_POST['course_Idn'];
                if(empty($course_Idn) === false)
                {
                    $course_Idn     =   (int)$course_Idn;
                    $query = "DELETE FROM `course` WHERE `course_Idn` = '$course_Idn'";
                    if($run_query = mysqli_query($Oau_auth, $query))
                    {
                        header("Location: course.php");
                        exit();
                    }
                }
                else
                {
                    echo "You did not select any course to be deleted";
                }
            }
          ?>
            <form action="" method="POST" class="form-inline">
            <legend>Delete Course</legend>
            <div class="form-group mx-sm-3 mb-2">
              <select name="awards_Idn" class="custom-select mr-sm-2">
                  <option value="">Course</option>
                  <?php
                    $query = "SELECT `course_Idn`, `course_code` FROM `course`";
                    $run_query  = mysqli_query($Oau_auth, $query);
                    while($init_product = mysqli_fetch_assoc($run_query))
                    {
                        $course_Idn  =   $init_product['course_Idn'];
                        $course_code =   $init_product['course_code'];
                        echo "<option value=\"$course_Idn\">$course_code</option>";

                    }
                ?>
              </select>
            </div>
            <input type="submit" name="delete_course" value="Delete Course" class="btn btn-primary mb-2">
        </form>
        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
            <?php
             if(isset($_POST['edit_course']) === true && empty($_POST['edit_course']) === false)
              {
                  $course_Idn     = $_POST['title'];
                  $course_code    = $_POST['course_code'];
                  $course_title   = $_POST['course_title'];
                  $remarks_unit   = $_POST['remarks_unit'];
                  $department_Idn = $_POST['department_Idn'];
                  $awards_Idn     = $_POST['awards_Idn'];

                  if(!empty($course_Idn) && !empty($course_code) && !empty($course_title) && !empty($remarks_unit) && !empty($department_Idn) && !empty($awards_Idn))
                  {
                      $course_Idn     = (int)$course_Idn;
                      $course_code    = sanitize($course_code);
                      $course_title   = sanitize($course_title);
                      $remarks_unit   = sanitize($remarks_unit);
                      $department_Idn = sanitize($department_Idn);
                      $awards_Idn     = (int)$awards_Idn;

                      $query = "UPDATE `course` SET `course_code` = '$course_code', `course_title` = '$course_title', `remarks_unit` = '$remarks_unit', `department_Idn` = '$department_Idn', `awards_Idn` = '$awards_Idn' WHERE `course_Idn` = '$course_Idn'";
                      if($run_query = mysqli_query($Oau_auth, $query))
                      {
                          header("Location: course.php");
                          exit();
                      }
                  }
              }
          ?>
            <form action="" method="POST" class="form-inline">
            <legend>Edit Course</legend>
            <div class="form-group mx-sm-1 mb-2">
              <select name="title" id="" class="custom-select mr-sm-2">
                  <option value="">Course</option>
                  <?php
                    $query = "SELECT `course_Idn`, `course_code` FROM `course`";
                    $run_query  = mysqli_query($Oau_auth, $query);
                    while($init_product = mysqli_fetch_assoc($run_query))
                    {
                        $course_Idn  =   $init_product['course_Idn'];
                        $course_code =   $init_product['course_code'];
                        echo "<option value=\"$course_Idn\">$course_code</option>";

                    }
                  ?>
              </select>
            </div>
            <div class="form-group mx-sm-2 mb-2">
              <input type="text" placeholder="Course Code" name="course_code" class="form-control">
            </div>
            <div class="form-group mx-sm-2 mb-2">
              <input type="text" placeholder="Course Title" name="course_title" class="form-control">
            </div>
            <div class="form-group mx-sm-2 mb-2">
              <input type="text" placeholder="Remarks Unit" name="remarks_unit" class="form-control">
            </div>
            <div class="form-group mx-sm-1 mb-2">
              <select name="department_Idn" class="custom-select mr-sm-2">
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
            </div>
            <div class="form-group mx-sm-1 mb-2">
              <select name="awards_Idn" id="" class="custom-select mr-sm-2">
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
            </div>
            <input type="submit" name="edit_course" value="Edit Course" class="btn btn-primary mb-2">
        </form>
        </div>
        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
      </div>
