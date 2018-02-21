      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Pick a Student</h6>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
            <?php
                  if(isset($_POST['insert_score']) === true && empty($_POST['insert_score']) === false)
                  {
                      $registration   = $_POST['registration'];
                      $department_Idn = $_POST['department_Idn'];
                      $departments    = $_POST['departments'];
                      $awarded        = $_POST['awarded'];
                      $score          = $_POST['score'];
                      $course_code    = $_POST['course_code'];
                      $course_title   = $_POST['course_title'];
                      $remarks_unit   = $_POST['remarks_unit'];
                      $all_data_fields = array(
                                              'registration'      =>      $registration,
                                              'department_Idn'    =>      $department_Idn,
                                              'course_code'       =>      $course_code,
                                              'course_title'      =>      $course_title,
                                              'remarks_unit'      =>      $remarks_unit,
                                              'score'             =>      $score,
                                              'awarded'           =>      $awarded,
                                              'departments'       =>      $departments,
                      );

                          $all_data_fields = array();
                          for($i=0 ;$i < count($_POST['registration']); $i++) {
                              $all_data_fields[] = '("' . $_POST['registration'][$i] . '","' . $_POST['department_Idn'][$i] . '", "' . $_POST['course_code'][$i] . '", "' . $_POST['course_title'][$i] . '", "' . $_POST['remarks_unit'][$i] . '", "' . $_POST['score'][$i] . '", "' . $_POST['awarded'][$i] . '", "' . $_POST['departments'][$i] . '")';
                          }
                          $query_Okay  = "INSERT INTO `transcript` ( `registration`, `department_Idn`, `course_code`, `course_title`, `remarks_unit`, `grade`, `award`, `department`) VALUES" .implode(',', $all_data_fields);
                          if($run_query_Okay = mysqli_query($Oau_auth, $query_Okay))
                          {
                              header("Location: index.php");
                              exit();
                          }
                  }


              ?>

              <?php
                  if(isset($_POST['student_pick']) === true && empty($_POST['student_pick']) === false)
                  {
                      $student_picked =  $_POST['student_Idn'];

                      if(empty($student_picked) === false)
                      {
                          $student_picked = (int)$student_picked;
                          $query = "SELECT `registration`, `department_Idn`, `first_name`, `last_name`, `awards_Idn` FROM `student` WHERE `student_Idn` = '$student_picked'";
                          $run_query = mysqli_query($Oau_auth, $query);
                          if(mysqli_num_rows($run_query) > 0)
                          {
                              $rows = mysqli_fetch_assoc($run_query);
                              $registration   = $rows['registration'];
                              $department_Idn = $rows['department_Idn'];
                              $awards_Idn     = $rows['awards_Idn'];
                              $first_name = $rows['first_name'];
                              $last_name = $rows['last_name'];

                              // $first_name, ' ', $last_name;
                              $query3 = "SELECT `title` FROM `department` WHERE `department_Idn` = '$department_Idn'";
                              $run_query3 = mysqli_query($Oau_auth, $query3);
                              $rows3 = mysqli_fetch_assoc($run_query3);
                              $departments = $rows3['title'];
                              $query4 = "SELECT `title` FROM `awards` WHERE `awards_Idn` = '$awards_Idn'";
                              $run_query4 = mysqli_query($Oau_auth, $query4);
                              $rows4 = mysqli_fetch_assoc($run_query4);
                              $awarded = $rows4['title'];
                              $query2 = "SELECT `course_code`, `course_title`, `remarks_unit` FROM `course` WHERE `department_Idn` = '$department_Idn' AND `awards_Idn` = '$awards_Idn'";
                              $run_query2 = mysqli_query($Oau_auth, $query2);
                              if(mysqli_num_rows($run_query2) > 0)
                              {
                                  echo "
                                        <div class=\"modal\" id=\"student_picked\" tabindex=\"-1\" role=\"dialog\">
                                            <div class=\"modal-dialog\" role=\"document\">
                                              <div class=\"modal-content\">
                                                <div class=\"modal-header\">
                                                  <h5 class=\"modal-title\">$first_name $last_name</h5>
                                                  <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                                    <span aria-hidden=\"true\">&times;</span>
                                                  </button>
                                                </div>
                                                <div class=\"modal-body\">
                                          <table>
                                          <form action=\"\" method=\"POST\">


                                  ";
                                  while($rows2 = mysqli_fetch_assoc($run_query2))
                                  {
                                      $course_code  = $rows2['course_code'];
                                      $course_title = $rows2['course_title'];
                                      $remarks_unit = $rows2['remarks_unit'];
                                      echo
                                      "

                                          <tr>
                                          <td>
                                          <div class=\"form-group mx-sm-2 mb-2\">
                                            <input type=\"hidden\" value=\"$registration\" name=\"registration[]\">
                                          </div>
                                          </td>
                                          <td>
                                          <div class=\"form-group mx-sm-2 mb-2\">
                                            <input type=\"hidden\" value=\"$department_Idn\" name=\"department_Idn[]\">
                                          </div>
                                          </td>
                                          <td>
                                          <div class=\"form-group mx-sm-2 mb-2\">
                                            <input type=\"hidden\" value=\"$departments\" name=\"departments[]\">
                                          </div>
                                          </td>
                                          <td>
                                          <div class=\"form-group mx-sm-2 mb-2\">
                                            <input type=\"hidden\" value=\"$awarded\" name=\"awarded[]\">
                                          </div>
                                          </td>
                                          <td>
                                          <div class=\"form-group mx-sm-2 mb-2\">
                                            <input type=\"hidden\" value=\"$course_code\" name=\"course_code[]\">$course_code
                                          </div>
                                          </td>
                                          <td>
                                          <div class=\"form-group mx-sm-2 mb-2\">
                                            <input type=\"hidden\" value=\"$course_title\" name=\"course_title[]\">$course_title
                                          </div>
                                          </td>
                                          <td>
                                          <div class=\"form-group mx-sm-2 mb-2\">
                                            <input type=\"hidden\" value=\"$remarks_unit\" name=\"remarks_unit[]\">$remarks_unit
                                          </div>
                                          </td>
                                          <td>
                                          <div class=\"form-group mx-sm-2 mb-2\">
                                            <input type=\"text\"  name=\"score[]\" class=\"form-control\">
                                          </div>
                                          </td>

                                      ";
                                  }
                                  echo "

                                          <td></td>
                                           </tr>
                                          </table>
                                          </div>
                                                <div class=\"modal-footer\">
                                                  <input type=\"submit\" name=\"insert_score\" class=\"btn btn-primary\" value=\"Insert Score\"></form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                  ";


                              }
                          }

                      }
                      else
                      {
                          echo "You did not pick any student";
                      }
                  }

              ?>
              <form action="" method="POST" class="form-inline">
                    <legend>Student course pick</legend>
                    <div class="form-group mx-sm-2 mb-2">
                      <select name="student_Idn" class="custom-select mr-sm-2">
                          <option value="">Registration No</option>
                          <?php
                              $query = "SELECT `student_Idn`, `registration` FROM `student`";
                              $run_query  = mysqli_query($Oau_auth, $query);
                              while($init_product = mysqli_fetch_assoc($run_query))
                              {
                                  $student_Idn  =   $init_product['student_Idn'];
                                  $registration =   $init_product['registration'];
                                  echo "<option value=\"$student_Idn\">$registration</option>";

                              }
                          ?>
                      </select>
                    </div>
                    <input type="submit" name="student_pick" value="Pick a student" class="btn btn-primary mb-2">
              </form>
            </div>
          </div>
        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <?php
                    if(isset($_POST['view_transcript']) === true && empty($_POST['view_transcript']) === false)
                    {
                        $registration = $_POST['registration'];

                        if(empty($student_Idn) === false)
                        {
                            $registration = sanitize($registration);
                            $query = "SELECT * FROM `transcript` WHERE `registration` = '$registration'";
                            $run_query = mysqli_query($Oau_auth, $query);
                            if(mysqli_num_rows($run_query) > 0)
                            {
                              echo "<table>";
                              while($rows = mysqli_fetch_assoc($run_query))
                              {
                                 $registration      = $rows['registration'];
                                 $department_Idn    = $rows['department_Idn'];
                                 $course_code       = $rows['course_code'];
                                 $course_title      = $rows['course_title'];
                                 $remarks_unit      = $rows['remarks_unit'];
                                 $grade             = $rows['grade'];
                                 $award             = $rows['award'];
                                 $department        = $rows['department'];

                                 echo "
                                        <tr>
                                        <th style=\"padding: 0 20px !important;\">Student Registration No</th>
                                        <th style=\"padding: 0 20px !important;\">Course Code</th>
                                        <th style=\"padding: 0 20px !important;\">Course Title</th>
                                        <th style=\"padding: 0 20px !important;\">Remarks Unit</th>
                                        <th style=\"padding: 0 20px !important;\">Grades </th>
                                        <th style=\"padding: 0 20px !important;\">Awards</th>
                                        <th style=\"padding: 0 20px !important;\">Department</th>
                                        </tr>
                                        <tr>
                                        <td style=\"padding: 0 20px !important;\">$registration</td>
                                        <td style=\"padding: 0 20px !important;\">$course_code</td>
                                        <td style=\"padding: 0 20px !important;\">$course_title</td>
                                        <td style=\"padding: 0 20px !important;\">$remarks_unit</td>
                                        <td style=\"padding: 0 20px !important;\">$grade</td>
                                        <td style=\"padding: 0 20px !important;\">$award</td>
                                        <td style=\"padding: 0 20px !important;\">$department</td>
                                        </tr>
                                 ";
                              }
                              echo "</table>";
                            }
                            else
                            {
                              echo "Transcript not ready for the accorded student" ."<br />" . "Did you want to insert his transcript?";
                            }
                        }
                        else
                        {
                          echo "You did not pick any student";
                        }
                    }



              ?>
              <?php
                  if(!isset($_POST['view_transcript']))
                  {
              ?>
              <form action="" method="POST" class="form-inline">
                    <legend>Student transcript view</legend>
                    <div class="form-group mx-sm-2 mb-2">
                      <select name="registration" class="custom-select mr-sm-2">
                          <option value="">Registration No</option>
                          <?php
                              $query = "SELECT `student_Idn`, `registration` FROM `student`";
                              $run_query  = mysqli_query($Oau_auth, $query);
                              while($init_product = mysqli_fetch_assoc($run_query))
                              {
                                  $student_Idn  =   $init_product['student_Idn'];
                                  $registration =   $init_product['registration'];
                                  echo "<option value=\"$registration\">$registration</option>";

                              }
                          ?>
                      </select>
                    </div>
                    <input type="submit" name="view_transcript" value="View transcript" class="btn btn-primary mb-2">
              </form>
            <?php
                }
            ?>
            </div>

          </div>
        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">Full Name</strong>
              <a href="#">Follow</a>
            </div>
            <span class="d-block">@username</span>
          </div>
        </div>
        <small class="d-block text-right mt-3">
          <a href="#">All suggestions</a>
        </small>
      </div>
    </main>
