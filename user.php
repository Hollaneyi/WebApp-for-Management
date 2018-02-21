<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html">
	<title>OAU Post Graduate | student login and Organisation search area</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/form-validate.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Oau PG Transcript</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="logout.php"><div class="alert alert-danger" role="alert">Log out</div> </a>
        </li>
      </ul>
    </div>
  </nav>


	<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="admin/img/oaulogo.png" alt="" width="72" height="72">
        <h2>Welcome</h2>
        <p class="lead"><div class="alert alert-success" role="alert"><?php echo $fetch_student_data['first_name'], ' ', $fetch_student_data['last_name'] ;?></div></p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted"><small>Your cart</small></span>
            <small><span class="badge badge-secondary badge-pill">1</span></small>
          </h4>
          <ul class="list-group mb-3">



            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Transcript</h6>
                <small>Request Fee</small>
              </div>
              <span class="text-success">₦5000:00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>₦5000:00</strong>
            </li>
          </ul>


        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Student Information</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" readonly class="form-control" id="firstName" placeholder="" value="<?php echo $fetch_student_data['first_name'], ' ', $fetch_student_data['other_name'] ;?>" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" readonly class="form-control" id="lastName" placeholder="" value="<?php echo $fetch_student_data['last_name'];?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Email</label>
              <div class="input-group">

                <input type="text" readonly class="form-control" id="username"  value="<?php echo $fetch_student_data['email'];?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Registration No</label>
              <input type="email" readonly class="form-control" id="email" value="<?php echo $fetch_student_data['registration'];?>" placeholder="you@example.com">
            </div>

            <div class="mb-3">
              <label for="address">Date Of Birth</label>
              <input type="text" readonly class="form-control" id="address" value="<?php echo $fetch_student_data['dob'];?>" placeholder="1234 Main St" required>
            </div>

            <div class="mb-3">
              <label for="address2">Year of Resumption</label>
              <input type="text" readonly class="form-control" id="address2" value="<?php echo $fetch_student_data['year'];?>" placeholder="Apartment or suite">
            </div>

            <div class="mb-3">
              <label for="address2">Awards</label>
              <input type="text" readonly class="form-control" id="address2" value="<?php echo $award_Identity['title'];?>" placeholder="Apartment or suite">
            </div>
            <div class="mb-3">
              <label for="address2">Department</label>
              <input type="text" readonly class="form-control" id="address2" value="<?php echo $department_Identity['title'];?>" placeholder="Apartment or suite">
            </div>

            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Shipping email address is the same as <strong class="text-primary"> <?php echo $fetch_student_data['email'];?></strong> </label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Kindly proceed to payment below</label>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Transcript Payment</h4>
            <a class="flwpug_getpaid btn btn-primary btn-lg btn-block" data-PBFPubKey="FLWPUBK-8c6d8605dfcfc7209826eb4c184d6d79-X" data-txref="rave-checkout-1518719540" data-amount="5000" data-customer_email="<?php echo $student_email;?>" data-currency = "NGN" data-pay_button_text = "" data-country="NG" data-custom_title = "Oau PG Transcript" data-custom_description = "" data-redirect_url = "http://www.oau-pgtranscript.senttrigg.com/processing.php" data-custom_logo = "" data-payment_method = "both" data-exclude_banks="">Continue to checkout</a>

          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-<?php echo date('Y');?> Oau PG Transcript</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>



      <script type="text/javascript" src="http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>