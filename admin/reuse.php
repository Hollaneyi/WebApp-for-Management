<?php
        if(admin_check_logged_In() === true)
        {
    ?>
        <?php
            if(isset($_POST['send_awards']) === true && empty($_POST['send_awards']) === false)
            {
                $awards = $_POST['awards'];
                if(empty($awards) === false)
                {
                    $awards = sanitize($awards);
                    $query = "INSERT INTO `awards` (`title`) VALUES ('$awards')";
                    if($run_query = mysqli_query($Oau_auth, $query))
                    {
                    header("Location: index.php");
                    exit();
                    }
                }
                else
                {
                    echo "The award field is empty";
                }
            }

        ?>
        <form action="" method="POST">
            <legend>Awards</legend>
            <input type="text" name="awards">
            <input type="submit" name="send_awards" value="send awards">
        </form>
        <?php
            if(isset($_POST['delete_award']) === true && empty($_POST['delete_award']) === false)
            {
                $awards_Idn = $_POST['awards_Idn'];
                if(empty($awards_Idn) === false)
                {
                    $awards_Idn = (int)$awards_Idn;
                    echo $awards_Idn;
                    $query = "DELETE FROM `awards` WHERE `awards_Idn` = '$awards_Idn'";
                    if($run_query = mysqli_query($Oau_auth, $query))
                    {
                        header("Location: index.php");
                        exit();
                    }
                }
                else
                {
                    echo "Please chose an award to be deleted";
                }
            }

        ?>
        <form action="" method="POST">
            <legend>Delete Award</legend>
            <select name="awards_Idn" id="">
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
            <input type="submit" name="delete_award" value="Delete Award">
        </form>
        <?php
            if (isset($_POST['edit_award']) === true && empty($_POST['edit_award']) === false)
            {
                $title      = $_POST['title'];
                $new_title  = $_POST['new_title'];
                if(!empty($title) && !empty($new_title))
                {
                    $title      = sanitize($title);
                    $new_title  = sanitize($new_title);
                    $query = "UPDATE `awards` SET `title` = '$new_title' WHERE `title` = '$title'";
                    if($run_query = mysqli_query($Oau_auth, $query))
                    {
                        header("Location: index.php");
                        exit();
                    }
                }
            }


        ?>
        <form action="" method="POST">
            <legend>Edit Award</legend>
            <select name="title" id="">
                <option value="">Awards</option>
                <?php
                    $query = "SELECT `awards_Idn`, `title` FROM `awards`";
                    $run_query  = mysqli_query($Oau_auth, $query);
                    while($init_product = mysqli_fetch_assoc($run_query))
                    {
                        $awards_Idn     =   $init_product['awards_Idn'];
                        $title          =   $init_product['title'];
                        echo "<option value=\"$title\">$title</option>";

                    }
                ?>
            </select>
            <input type="text" name="new_title">
            <input type="submit" name="edit_award" value="Edit Award">
        </form>
        <hr />
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
                        header("Location: index.php");
                        exit();
                    }
                }
                else
                {
                    echo "Department is empty";
                }

            }
        ?>
        <form action="" method="POST">
            <legend>deparment</legend>
            <input type="text" name="department">
            <input type="submit" name="send_department" value="send department">
        </form>
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
                        header("Location: index.php");
                        exit();
                    }
                }
                else
                {
                    echo "Please chose an award to be deleted";
                }
            }

        ?>
        <form action="" method="POST">
            <legend>Delete Department</legend>
            <select name="awards_Idn" id="">
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
            <input type="submit" name="delete_department" value="Delete Department">
        </form>
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
                        header("Location: index.php");
                        exit();
                    }
                }
            }


        ?>
        <form action="" method="POST">
            <legend>Edit Department</legend>
            <select name="title" id="">
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
            <input type="text" name="new_title">
            <input type="submit" name="edit_department" value="Edit Department">
        </form>
        <hr />
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
                        header("Location: index.php");
                        exit();
                    }
                }
            }
        ?>
        <form action="" method="POST">
            <legend>courses</legend>
            <input type="text" name="course_code">
            <input type="text" name="course_title">
            <input type="text" name="remarks_unit">
            <select name="department_Idn">
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
            <select name="awards_Idn" id="">
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
            <input type="submit" name="send_course" value="send course">
        </form>
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
                        header("Location: index.php");
                        exit();
                    }
                }
                else
                {
                    echo "You did not select any course to be deleted";
                }
            }

        ?>
        <form action="" method="POST">
            <legend>Delete Course</legend>
            <select name="course_Idn">
                <option value="">Course Code</option>
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
            <input type="submit" name="delete_course" value="Delete Course">
        </form>
        <?php
            if(isset($_POST['edit_course']) === true && empty($_POST['edit_course']) === false)
            {
                $course_Idn     = $_POST['course_Idn'];
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
                        header("Location: index.php");
                        exit();
                    }
                }
            }

        ?>
        <form action="" method="POST">
            <legend>Edit Course</legend>
            <select name="course_Idn">
                <option value="">Course Code</option>
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
            <input type="text" name="course_code">
            <input type="text" name="course_title">
            <input type="text" name="remarks_unit">
            <select name="department_Idn">
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
            <select name="awards_Idn" id="">
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
            <input type="submit" name="edit_course" value="Edit Course">
        </form>
        <hr />
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

                        echo $first_name, ' ', $last_name;
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
                                    <td><input type=\"hidden\" value=\"$registration\" name=\"registration[]\"></td>
                                    <td><input type=\"hidden\" value=\"$department_Idn\" name=\"department_Idn[]\"></td>
                                    <td><input type=\"hidden\" value=\"$departments\" name=\"departments[]\"></td>
                                    <td><input type=\"hidden\" value=\"$awarded\" name=\"awarded[]\"></td>
                                    <td><input type=\"hidden\" value=\"$course_code\" name=\"course_code[]\">$course_code</td>
                                    <td><input type=\"hidden\" value=\"$course_title\" name=\"course_title[]\">$course_title</td>
                                    <td><input type=\"hidden\" value=\"$remarks_unit\" name=\"remarks_unit[]\">$remarks_unit</td>
                                    <td><input type=\"text\"  name=\"score[]\"></td>

                                ";
                            }
                            echo "

                                    <td><input type=\"submit\" name=\"insert_score\" value=\"Insert Score\"></form></td>
                                     </tr>
                                    </table>
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
    	<form action="" method="POST">
            <legend>Student course pick</legend>
            <select name="student_Idn">
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
            <input type="submit" name="student_pick" value="Pick a student">
    	</form>
    <?php
    }
    ?>