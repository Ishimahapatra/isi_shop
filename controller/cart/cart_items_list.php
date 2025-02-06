<?php
session_start();
ob_start();
include("../../components/dbconnect.php"); // Include DB connection

// Fetch cart items with product details
$sql = "SELECT 
            p.name, 
            p.price, 
            p.image,
            ci.quantity, 
            (p.price * ci.quantity) AS total 
        FROM cart_items ci 
        JOIN products p ON ci.product_id = p.id
        ORDER BY ci.created_at DESC";

$result = $conn->query($sql);

$cart_items = [];
while ($row = $result->fetch_assoc()) {
  $cart_items[] = $row;
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode([
  "success" => true,
  "items" => $cart_items
]);

ob_end_flush();
