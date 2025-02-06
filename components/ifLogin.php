<?php

// Check if the user is logged in
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: " . $baseurl . "admin/products.php");
    exit();
}
?>
