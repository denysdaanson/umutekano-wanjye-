<?php
include_once('conn.php');
// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data (and prevent SQL injection using prepared statements)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $method   = $_POST['method'];
    $mobile   = $_POST['mobile'];
    $idNumber = $_POST['idNumber'];

    if (empty($method) || empty($mobile) || empty($idNumber)) {
        echo "All fields are required.";
        exit;
    }

    // Prepare the SQL insert statement
    $stmt = $conn->prepare("INSERT INTO payments (method, mobile, idNumber) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $method, $mobile, $idNumber);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Payment record inserted successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>
