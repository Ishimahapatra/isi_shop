<?php
session_start();
if(isset($_SESSION['login']) != true){
    print_r($_SESSION);
    header("Location: " . $baseurl . "admin/index.php");
    exit();
}
?>