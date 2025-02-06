<?php
session_start();
ob_start();
require_once('../../components/dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $stock = $_POST['stock'];

  $query = "UPDATE products SET 
            name='$name', 
            price='$price', 
            description='$description', 
            stock='$stock'";

  // Handle Image Upload
  if (!empty($_FILES["new_image"]["name"])) {
    $old_image = $_POST["old_image"];
    $target_dir = "../../img/uploads/products/";
    $new_image_name = time() . "_" . basename($_FILES["new_image"]["name"]);
    $target_file = $target_dir . $new_image_name;

    if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $target_file)) {
      // Delete old image
      if (!empty($old_image) && file_exists($target_dir . $old_image)) {
        unlink($target_dir . $old_image);
      }

      $query .= ", image='$new_image_name'";
    }
  }

  $query .= " WHERE id='$id'";

  if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false]);
  }
}
ob_end_flush();
