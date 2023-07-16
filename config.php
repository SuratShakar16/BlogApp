<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'blogapp';

// Create a database connection
$conn = new mysqli($host, $username, $password, $dbname);
$sql="CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )";
$result= mysqli_query($conn,$sql);

$sql="CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT,
    author VARCHAR(255) NOT NULL,
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
  )";
  $result= mysqli_query($conn,$sql);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
