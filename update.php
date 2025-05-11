<?php
include 'config.php';

// Initialize variables
$upii = '';
$id = '1'; // Default ID if not specified
$update_success = false;

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $upii = $_POST['upii'];
    
    // Update database
    $update_sql = "UPDATE upiid SET upii=? WHERE id=?";
    $stmt = $conn->prepare($update_sql);
    
    if ($stmt) {
        $stmt->bind_param("si", $upii, $id);
        if ($stmt->execute()) {
            $update_success = true;
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Fetch current UPI ID
$sql = "SELECT * FROM upiid WHERE id=?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $upii = $row['upii'];
    } else {
        echo "No record found with ID: $id";
    }
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update UPI ID</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 500px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"] { 
            width: 100%; 
            padding: 8px; 
            box-sizing: border-box; 
        }
        .success { color: green; margin-bottom: 15px; }
        .error { color: red; margin-bottom: 15px; }
        .btn { 
            background-color: #4CAF50; 
            color: white; 
            padding: 10px 15px; 
            border: none; 
            cursor: pointer; 
        }
        .btn:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update UPI ID</h2>
        
        <?php if ($update_success): ?>
            <div class="success">UPI ID updated successfully!</div>
        <?php endif; ?>
        
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            
            <div class="form-group">
                <label for="upii">UPI ID:</label>
                <input type="text" name="upii" id="upii" 
                       value="<?php echo htmlspecialchars($upii); ?>" required>
            </div>
            
            <button type="submit" class="btn">Update UPI ID</button>
        </form>
    </div>
</body>
</html>