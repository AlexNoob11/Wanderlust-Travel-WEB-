<?php
session_start();

// 1. Database Connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "travel_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Handle Registration
if (isset($_POST['register'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $checkEmail = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
    
    if (mysqli_num_rows($checkEmail) > 0) {
        header("Location: index.php?status=exists");
    } else {
        $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?status=success");
        } else {
            header("Location: index.php?status=error");
        }
    }
    exit();
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['fullname'];
        header("Location: student/dashboard.php?status=loggedin");
    } else {
        header("Location: index.php?status=wrongpass");
    }
    exit();
}
?>
