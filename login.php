<?php
// Database connection
include_once('conn.php');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Db connected<br>";

// Get form data safely
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Query user
$sql = "SELECT password FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    
    // Verify password
    if (password_verify($password, $row['password'])) {
        echo "<p style='color:green;'>Login successful!</p>";
        // header("Location: dashboard.php");
    } else {
        echo "<p style='color:red;'>Invalid password.</p>";
    }
} else {
    echo "<p style='color:red;'>User not found.</p>";
}

$stmt->close();
$conn->close();
?>
