<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

// Create connection
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// Get the country parameter from the URL
$country = isset($_GET['country']) ? $_GET['country'] : '';

// Build the SQL query with LIKE operator for partial matching
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output the results as an HTML list
echo '<ul>';
foreach ($results as $row) {
  echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
}
echo '</ul>';
?>