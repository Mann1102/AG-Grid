<?php
$servername = "localhost";
$username = "root"; // replace with your own username
$password = ""; // replace with your own password
$dbname = "manaj";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, p_name as productName, price, availability FROM products";
$result = $conn->query($sql);

$rows = array();
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows); // This line should be removed to allow the correct JSON response to be sent to the JavaScript fetch request.
} else {
    echo "0 results";
}
$conn->close();
?>
