<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'isi';
$charset = 'utf8mb4';
$baseurl = '/isi_shop/';
$app = 'isi';


// $server = 'localhost';
// $username = 'technoce';
// $password = '5Wyt4L@1Q1n(uS';
// $database = 'technoce_gross';
// $charset = 'utf8mb4';
// $baseurl = 'https://grrosshospital.technocenter.in/';

$developmentMode = true;

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// First database connection
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
  die('Database error');
}

// Second database connection
try {
  // Create a new PDO instance
  $connect = new PDO("mysql:host=$server;dbname=$database;charset=$charset", $username, $password);

  // Set PDO error mode to exception for better error handling
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Optional: Set PDO to use associative array for fetched results
  $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  // If there is an error in the connection, handle it here
  die("Connection failed: " . $e->getMessage());
}

// Set the default time zone
date_default_timezone_set('Asia/Kolkata');
