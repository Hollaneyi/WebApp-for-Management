      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Awards Feeds</h6>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
          <?php
                $query = "SELECT `awards_Idn`, `title` FROM `awards`";
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
          <form action="" method="POST" class="form-inline">
            <legend>Awards</legend>
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" placeholder="Awards" name="awards" class="form-control">
            </div>
              <input type="submit" name="send_awards" value="Add awards" class="btn btn-primary mb-2">
          </form>

        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
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
            <form action="" method="POST" class="form-inline">
            <legend>Delete Award</legend>
            <div class="form-group mx-sm-3 mb-2">
              <select name="awards_Idn" class="custom-select mr-sm-2">
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
            <input type="submit" name="delete_award" value="Delete Award" class="btn btn-primary mb-2">
        </form>
        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
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
            <form action="" method="POST" class="form-inline">
            <legend>Edit Award</legend>
            <div class="form-group mx-sm-3 mb-2">
              <select name="title" id="" class="custom-select mr-sm-2">
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
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" placeholder="New Award Name" name="new_title" class="form-control">
            </div>
            <input type="submit" name="edit_award" value="Edit Award" class="btn btn-primary mb-2">
        </form>
        </div>
        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
      </div>