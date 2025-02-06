<?php
session_start();
ob_start();

require_once '../components/dbconnect.php';
require_once '../components/ifLogin.php';

// print_r($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Page</title>
  <link rel="preload" href="<?= $baseurl ?>img/hospital.jpg" as="image" type="image/jpg">
  <?php require_once('../components/header_script.php') ?>
  <style>
    .row {
      display: flex;
      min-height: 100vh;
      align-items: center;
    }

    .login-side-img {
      max-height: 100vh;
      min-height: 100vh;
      object-fit: cover;
      width: 100%;
    }

    .bg-white {
      background-color: #fff !important;
    }

    .form-select {
      margin-bottom: 5px !important;
    }

    .input-icon .form-select:not(:first-child) {
      padding-left: 2.5rem;
    }

    @media(min-width: 1200px) {
      .section-2 {
        padding: 0px 6rem !important;
      }
    }

    @media(max-width: 576px) {
      .section-2-1 {
        padding: 0px 4rem !important;
      }
    }
  </style>
</head>


<body class="login-page">
  <div class="row justify-content-center w-100 bg-white">
    <!-- Left Side Image -->
    <div class="col-sm-6 col-md-7 col-lg-8 d-none d-md-block section-1">
      <img src="<?= $baseurl ?>img/side_img.png" alt="ISIKA MAHAPATRA" class="img-fluid login-side-img">
    </div>

    <!-- Login Form -->
    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 align-content-center section-2">
      <div class="container section-2-1">
        <a href="<?= $baseurl ?>index.html"></a>
        <!-- Alert -->
        <?php
        if (isset($_SESSION['message'])) {
          echo '
              <div id="" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> ' . $_SESSION['message'] . '.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          unset($_SESSION['message']);
        }
        ?>
        <div class="text-center w-100 content-center align-items-center mb-3">
          <a href="<?= $baseurl ?>index.html">
            <img src="<?= $baseurl ?>img/favicon/android-chrome-512x512.png" width="100" alt="HOSPITAX SYSTEM">
          </a>
        </div>
        <h2 class="text-center">Log into your account</h2>
        <form action="<?= $baseurl ?>controller/auth/login.php" method="POST">
          <div class="form-group mt-2">
            <div class="input-icon d-flex gap-2">
              <span class="input-icon-addon">
                <i class="fa fa-user-circle"></i>
              </span>
              <input type="text" class="form-control" placeholder="Username" name="user_name" value="taksh">
            </div>
          </div>
          <div class="form-group mt-2">
            <div class="input-icon d-flex gap-2">
              <span class="input-icon-addon">
                <i class="fa fa-key"></i>
              </span>
              <input type="password" class="form-control" placeholder="Password" name="password" value="taksh@123">
            </div>
          </div>
          <div class="text-center mt-3">
            <button class="btn btn-primary btn-block text-light" type="submit">Sign in</button>
            <hr>
            <p><?= $app ?> Designed by <strong>Isika Mahapatra </strong><span style="color:#999; font-size:10px;"> Version L-2.5.2</span></p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php require_once('../components/footer_script.php'); ?>
</body>

</html>