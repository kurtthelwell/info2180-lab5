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

// Output the results as an HTML table
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Country Name</th>';
echo '<th>Continent</th>';
echo '<th>Independence Year</th>';
echo '<th>Head of State</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($results as $row) {
  echo '<tr>';
  echo '<td>' . $row['name'] . '</td>';
  echo '<td>' . $row['continent'] . '</td>';
  echo '<td>' . ($row['independence_year'] ? $row['independence_year'] : 'N/A') . '</td>';
  echo '<td>' . $row['head_of_state'] . '</td>';
  echo '</tr>';
}

echo '</tbody>';
echo '</table>';