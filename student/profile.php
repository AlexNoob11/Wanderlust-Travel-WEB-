<?php
session_start();
include 'db.php'; // Your database connection file ($conn)

// Force login - if no session, redirect to login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?status=unauthorized");
    exit();
}

$userId = $_SESSION['user_id'];

// Fetch user data from the database based on the SQL table provided
$query = "SELECT fullname, email, created_at FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fallback if user doesn't exist
if (!$user) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$fullName = $user['fullname'];
$email = $user['email'];
$memberSince = date("F d, Y", strtotime($user['created_at']));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | WanderLust</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        .profile-container {
            max-width: 600px;
            margin: 120px auto 50px; /* Offset for fixed navbar */
            padding: 20px;
        }
        .profile-card {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
            background: #e74c3c;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: 600;
            margin: 0 auto 20px;
        }
        .info-row {
            text-align: left;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f0f0f0;
        }
        .info-row label {
            display: block;
            font-size: 12px;
            color: #888;
            text-transform: uppercase;
            font-weight: 600;
        }
        .info-row p {
            font-size: 18px;
            color: #333;
            margin: 5px 0;
        }
        .profile-footer {
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-avatar">
                <?php echo strtoupper(substr($fullName, 0, 1)); ?>
            </div>
            
            <h1>User Profile</h1>
            <p style="color: #666; margin-bottom: 30px;">Manage your travel account information</p>

            <div class="info-row">
                <label>Full Name</label>
                <p><?php echo htmlspecialchars($fullName); ?></p>
            </div>

            <div class="info-row">
                <label>Email Address</label>
                <p><?php echo htmlspecialchars($email); ?></p>
            </div>

            <div class="info-row">
                <label>Member Since</label>
                <p><?php echo $memberSince; ?></p>
            </div>

            <div class="profile-footer">
                <a href="edit-profile.php" class="btn-primary" style="text-decoration:none; display:inline-block; padding: 10px 20px; margin-right: 10px;">Edit Profile</a>
                <a href="logout.php" class="logout-btn" style="text-decoration:none; display:inline-block; padding: 10px 20px;">Logout</a>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 WanderLust Travel Co. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>