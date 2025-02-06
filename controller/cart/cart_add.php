<?php
session_start();
require_once('../../components/dbconnect.php');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $quantity = isset($_POST['product_quantity']) ? intval($_POST['product_quantity']) : 1;

    if ($product_id <= 0 || $quantity <= 0) {
        echo json_encode(["success" => false, "message" => "Invalid product or quantity"]);
        exit;
    }

    // Insert into database
    $query = "INSERT INTO cart_items (product_id, quantity, created_at) 
                  VALUES ('$product_id', '$quantity', NOW())";

    if (!mysqli_query($conn, $query)) {
        echo json_encode(["success" => false, "message" => "Database error"]);
        exit;
    }

    echo json_encode(["success" => true, "message" => "Product added to cart successfully"]);
}