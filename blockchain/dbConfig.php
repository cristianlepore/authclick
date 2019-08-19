<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "#ViU1n4xgDde";
$dbName     = "Progetto_Blockchain_20190605";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>