<?php
// Database configuration
include 'config.php';



try {
    // SQL query to fetch data
    $stmt = $conn->prepare("SELECT * FROM utr");
    $stmt->execute();
    
    // Get result set
    $result = $stmt->get_result();
    
    // Fetch all rows as associative array (MySQLi way)
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    
    // Now you can use $rows
    // print_r($rows);
    
} catch(Exception $e) {
    die("Query failed: " . $e->getMessage());
} finally {
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Data Display</title>
    <style>
        /* Same styles as above */
    </style>
</head>
<body>
    <h1>User Data</h1>
    
    <?php if (count($rows) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UTR No.</th>
                    <th>Amount </th>
                    <th>Date_Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['sn']); ?></td>
                        <td><?php echo htmlspecialchars($row['utrno']); ?></td>
                        <td><?php echo htmlspecialchars($row['amt']); ?></td>
                        <td><?php echo htmlspecialchars($row['tims']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No records found</p>
    <?php endif; ?>
    
    <?php
    // Close connection
    $conn = null;
    ?>
</body>
</html>