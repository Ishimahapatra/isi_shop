<?php
ob_start();  // Start output buffering
session_start();
require_once '../../components/dbconnect.php';
require_once '../../components/ifLogin.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_name = $_POST["user_name"];
  $password = $_POST["password"];

  echo $user_name . " " . $password . '<br>';
  $sql = "SELECT * FROM `users` WHERE `user_name` = ? AND `password` = ?";
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ss", $user_name, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);

      $_SESSION['login'] = true;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['user_id'] = $row['user_id'];

      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit();
    } else {
      $_SESSION['message'] = "Invalid Credentials";
      header("Location: " . $_SERVER['HTTP_REFERER']);
      exit();
    }
  } else {
    $_SESSION['message'] = "An error occurred. Please try again.";
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
  }
}

echo json_encode($_SESSION);
ob_end_flush();