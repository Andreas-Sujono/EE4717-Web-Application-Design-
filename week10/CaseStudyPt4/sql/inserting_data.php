<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// insert LAPTOP product
$sql = "INSERT INTO `Menu` (name, price, quantity)
VALUES ('Just Java', 2, 10);";

$sql .= "INSERT INTO `Menu` (name, price, quantity)
VALUES ('Cafe au Lait (single)', 2, 8);";

$sql .= "INSERT INTO `Menu` (name, price, quantity)
VALUES ('Cafe au Lait (double)', 3, 15);";

$sql .= "INSERT INTO `Menu` (name, price, quantity)
VALUES ('Iced Cappucino (single)', 4.75, 12);";

$sql .= "INSERT INTO `Menu` (name, price, quantity)
VALUES ('Iced Cappucino (double)', 5.75, 13);";


if (mysqli_multi_query($conn, $sql)) {
    echo "Database and tables are created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
