    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="#">OAU Posgraduate Transcript</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Award</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="department.php">Department</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="course.php">Course</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="transcript.php">Transcript</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo  $fetch_admin_data['full_name']; ?></a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="../logout.php"><div class="btn btn-danger" role="alert">Logout</div></a>
              </li>
          </ul>
          <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> -->
        </form>
      </div>
    </nav>