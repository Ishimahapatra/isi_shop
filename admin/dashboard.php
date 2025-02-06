<?php
require_once '../components/ifNotLogin.php';
require_once '../components/dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <?php require_once('../components/header_script.php'); ?>
</head>

<body>
  <?php require_once('./components/sidebar.php'); ?>


  <div class="my-5">
    <div class="container">
      <h1 class="text-center my-4">
        Welcome to ISI Shoping Project Dashboard
      </h1>
    </div>
  </div>
  <?php require_once('../components/footer_script.php'); ?>
</body>

</html>