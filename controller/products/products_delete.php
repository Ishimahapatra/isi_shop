<?php
session_start();
ob_start();
require_once('../../components/dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productsId = $_POST['id'] ?? null;
  $imagePath = $_SERVER['DOCUMENT_ROOT'] . $baseurl . 'img/uploads/products/' . ($_POST['image'] ?? '');

  if (!$productsId) {
    echo json_encode(['success' => false, 'message' => 'Products ID is missing.']);
    exit;
  }

  // Delete event record from the database
  $query = "DELETE FROM products WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('i', $productsId);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    // If deletion is successful, delete the image file
    if (file_exists($imagePath)) {
      unlink($imagePath);
    }
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false]);
  }
}

ob_end_flush();
