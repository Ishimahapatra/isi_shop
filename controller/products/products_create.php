<?php
session_start();
ob_start();
require_once('../../components/dbconnect.php');

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'] ?? '';
  $price = $_POST['price'] ?? '';
  $description = $_POST['description'] ?? '';
  $stock = $_POST['stock'] ?? '';
  $files = $_FILES['image'];

  // Create patient directory if not exists
  $uploadDir = "../../img/uploads/products/";
  if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
  }

  $uploadErrors = [];
  if (!empty($files['name'])) {
    $fileName = basename($files['name']);
    $fileTmpPath = $files['tmp_name'];
    $fileSize = $files['size']; // Get file size
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Allowed file extensions
    $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
    if (!in_array($fileExt, $allowedExtensions)) {
      $uploadErrors[] = "$fileName has an invalid file type.";
    }

    // File size limit (1MB)
    if ($fileSize > 1048576) { // 1MB = 1048576 bytes
      $uploadErrors[] = "$fileName exceeds the 1MB file size limit.";
    }

    $newFileName = time() . "_" . $fileName;
    $targetFilePath = $uploadDir . $newFileName;

    // Move the file to the upload directory
    if (move_uploaded_file($fileTmpPath, $targetFilePath)) {

      // Insert into database
      $query = "INSERT INTO products (name, price, description, stock, image, created_at) 
                  VALUES ('$name', '$price', '$description', '$stock', '$newFileName', NOW())";
      if (!mysqli_query($conn, $query)) {
        $uploadErrors[] = "Database error for $fileName.";
      }
    } else {
      $uploadErrors[] = "Failed to upload $fileName.";
    }
  }

  if (empty($uploadErrors)) {
    echo json_encode(['success' => true, 'message' => 'product registered successfully']);
  } else {
    echo json_encode(['success' => false, 'message' => implode(', ', $uploadErrors)]);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Invalid request']);
}

ob_end_flush();
