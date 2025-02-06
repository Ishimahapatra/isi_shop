<?php

session_start();
session_unset();
session_destroy();
require_once '../../components/dbconnect.php';

header("Location: " . $baseurl . "admin/index.php");
exit();

?>