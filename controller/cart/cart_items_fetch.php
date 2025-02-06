<?php
session_start();
require_once('../../components/dbconnect.php');
header('Content-Type: application/json');

$sql = "SELECT COUNT(*) AS total FROM cart_items";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $total = isset($row['total']) ? $row['total'] : 0;
    echo json_encode(['success' => true, 'total' => $total]);
} else {
    echo json_encode(['success' => false, 'total' => 0, 'error' => $conn->error]);
}
?>
