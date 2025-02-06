<?php
session_start();
ob_start();
include("../../components/dbconnect.php"); // Include DB connection

$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 5; // Default limit
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Default page

$offset = ($page - 1) * $limit;

// Fetch total records
$totalQuery = $conn->query("SELECT COUNT(*) AS total FROM products");
$totalRow = $totalQuery->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch paginated products
$sql = "SELECT * FROM products ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

$products = [];
while ($row = $result->fetch_assoc()) {
  $products[] = $row;
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode([
  "success" => true,
  "products" => $products,
  "total_pages" => $totalPages,
  "current_page" => $page
]);

ob_end_flush();