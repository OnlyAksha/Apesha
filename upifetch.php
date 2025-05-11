<?php
 //------insert.php------
     $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "utrtbl";

// get_upi_id.php
header('Content-Type: application/json');

// Create connection
    $conn = mysqli_connect($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

// Fetch UPI ID from database (adjust query as needed)
$stmt = $db->query("SELECT upii FROM upitbl WHERE id = 1");
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    echo json_encode(['upiId' => $result['upi_id']]);
} else {
    echo json_encode(['error' => 'No UPI ID found']);
}
    mysqli_close($conn);
?>