<?php
session_start();

// 1. Database Connection
$host = 'localhost';
$db_user = 'root'; 
$db_pass = '';     
$db_name = 'travel_db'; 

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Security Check: Is the user logged in?
if (!isset($_SESSION['user_id'])) {
    die("Error: You must be logged in to book a trip.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // We get the ID directly from the session for maximum security
    $user_id        = $_SESSION['user_id']; 
    $location_id    = $_POST['location_id'];
    $travel_date    = $_POST['travel_date'];
    $guests         = $_POST['guests'];
    $payment_method = $_POST['payment_method'];
    $total_price    = $_POST['total_price'];

    // 3. Insert into Bookings
    // Note: 'i' for integer (user_id), 's' for strings
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, location_id, travel_date, guests, payment_method, total_price) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $user_id, $location_id, $travel_date, $guests, $payment_method, $total_price);

    if ($stmt->execute()) {
        // Success Message with JavaScript Redirect
        echo "<script>
                alert('Success! Trip to " . htmlspecialchars($location_id) . " booked under your account.');
                window.location.href = 'my-bookings.php'; 
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: all-destinations.php");
    exit();
}
?>