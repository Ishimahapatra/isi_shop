<?php
session_start();
ob_start();
require_once('../../components/dbconnect.php');

header('Content-Type: application/json');

$query = "SELECT * FROM products ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

$products = [];

while ($row = mysqli_fetch_assoc($result)) {
  $products[] = [
    'id' => $row['id'],
    'name' => $row['name'],
    'image' => $row['image'],
    'price' => $row['price'],
    'description' => $row['description'],
    'stock' => $row['stock'],
    'created_at' => $row['created_at'],
    'updated_at' => $row['updated_at'],
  ];
}

if (!empty($products)) {
  echo json_encode(['success' => true, 'products' => $products]);
} else {
  echo json_encode(['success' => false, 'message' => 'No products found.']);
}

ob_end_flush();
