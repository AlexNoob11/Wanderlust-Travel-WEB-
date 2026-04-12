<?php
session_start();
// Include your database connection
include 'db.php'; 

// 1. Force Login Check
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?status=unauthorized");
    exit();
}

$userId = $_SESSION['user_id'];

// 2. The Comprehensive Destination Data (Copy of your view-details array)
$destinations = [
    // --- PHILIPPINES ---
    "el-nido" => ["title" => "El Nido, Palawan", "img" => "https://images.unsplash.com/photo-1518509194600-62ba0cb460d3"],
    "siargao" => ["title" => "Siargao Island", "img" => "https://images.unsplash.com/photo-1542082843-c07a0470733a"],
    "boracay" => ["title" => "Boracay Island", "img" => "https://images.unsplash.com/photo-1583212292454-1fe6229603b7"],
    "baguio" => ["title" => "Baguio City", "img" => "https://images.unsplash.com/photo-1519011245084-29759d587024"],
    "batanes" => ["title" => "Batanes", "img" => "https://images.unsplash.com/photo-1541123303123-5e92be9c3f81"],
    "cebu" => ["title" => "Kawasan Falls, Cebu", "img" => "https://images.unsplash.com/photo-1620050854492-2337a6b7201c"],
    "vigan" => ["title" => "Vigan City", "img" => "https://images.unsplash.com/photo-1625208453472-a0e2384a3297"],
    "bohol" => ["title" => "Chocolate Hills, Bohol", "img" => "https://images.unsplash.com/photo-1516690561799-46d8f74f9abf"],
    "amanpulo" => ["title" => "Amanpulo, Palawan", "img" => "https://images.unsplash.com/photo-1506953823976-52e1fdc0149a"],
    "coron" => ["title" => "Coron, Palawan", "img" => "https://images.unsplash.com/photo-1544085311-11a028465b03"],
    "sagada" => ["title" => "Sagada, Mt. Province", "img" => "https://images.unsplash.com/photo-1632506256247-495df0298a00"],
    "manila" => ["title" => "BGC, Taguig", "img" => "https://images.unsplash.com/photo-1540974165411-d8f4e30744a8"],
    "davao" => ["title" => "Mt. Apo, Davao", "img" => "https://images.unsplash.com/photo-1555431189-0fabf2667795"],
    "camiguin" => ["title" => "Camiguin Island", "img" => "https://images.unsplash.com/photo-1505881502353-a1986add3732"],
    "la-union" => ["title" => "La Union", "img" => "https://images.unsplash.com/photo-1502680390469-be75c86b636f"],

    // --- INTERNATIONAL ---
    "kyoto-int" => ["title" => "Kyoto, Japan", "img" => "https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e"],
    "bali-int" => ["title" => "Ubud, Bali", "img" => "https://images.unsplash.com/photo-1537996194471-e657df975ab4"],
    "paris-int" => ["title" => "Paris, France", "img" => "https://images.unsplash.com/photo-1502602898657-3e91760cbb34"],
    "swiss-int" => ["title" => "Swiss Alps", "img" => "https://images.unsplash.com/photo-1530122037265-a5f1f91d3b99"],
    "hanoi-int" => ["title" => "Hanoi, Vietnam", "img" => "https://images.unsplash.com/photo-1509063459916-a7598df21f88"],
    "dubai-int" => ["title" => "Dubai, UAE", "img" => "https://images.unsplash.com/photo-1512453979798-5ea266f8880c"],
    "peru-int" => ["title" => "Machu Picchu, Peru", "img" => "https://images.unsplash.com/photo-1587595431973-160d0d94add1"],
    "kenya-int" => ["title" => "Maasai Mara, Kenya", "img" => "https://images.unsplash.com/photo-1516422213484-2142eddf634d"],
    "santorini-int" => ["title" => "Santorini, Greece", "img" => "https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff"],
    "egypt-int" => ["title" => "Giza, Egypt", "img" => "https://images.unsplash.com/photo-1503177119275-0aa32b3a9368"],
    "iceland-int" => ["title" => "Blue Lagoon, Iceland", "img" => "https://images.unsplash.com/photo-1504893524553-f8589826c5bf"],
    "bangkok-int" => ["title" => "Bangkok, Thailand", "img" => "https://images.unsplash.com/photo-1504609773096-104ff2c73ba4"],
    "newyork-int" => ["title" => "New York, USA", "img" => "https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9"],
    "maldives-int" => ["title" => "Male, Maldives", "img" => "https://images.unsplash.com/photo-1514282401047-d79a71a590e8"],
    "nepal-int" => ["title" => "Everest Base Camp", "img" => "https://images.unsplash.com/photo-1544735716-392fe2489ffa"]
];

// 3. Fetch User Bookings from Database
$query = "SELECT * FROM bookings WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings | WanderLust</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; }
        .bookings-container { max-width: 1000px; margin: 120px auto 50px; padding: 0 20px; }
        .header-box { margin-bottom: 40px; }
        .header-box h1 { font-size: 2.5rem; color: #333; margin-bottom: 5px; }
        .header-box p { color: #888; }

        .booking-card {
            background: white;
            border-radius: 20px;
            display: flex;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            margin-bottom: 25px;
            border: 1px solid #eee;
            transition: 0.3s ease;
        }
        .booking-card:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(0,0,0,0.1); }

        .booking-img { width: 300px; height: auto; object-fit: cover; }

        .booking-content { padding: 30px; flex: 1; position: relative; }

        .status-badge {
            position: absolute; top: 30px; right: 30px;
            padding: 6px 15px; border-radius: 30px; font-size: 0.75rem;
            font-weight: 600; text-transform: uppercase;
            background: #e1f5fe; color: #0288d1; /* Default Confirmed Blue */
        }

        .booking-content h3 { font-size: 1.6rem; color: #222; margin: 0 0 15px; }

        .info-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 20px; }
        .info-item label { display: block; font-size: 10px; color: #aaa; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
        .info-item p { margin: 0; font-size: 0.95rem; color: #444; font-weight: 600; }

        .empty-state { text-align: center; padding: 80px 20px; background: white; border-radius: 20px; border: 2px dashed #ddd; }

        @media (max-width: 768px) {
            .booking-card { flex-direction: column; }
            .booking-img { width: 100%; height: 200px; }
            .status-badge { position: static; display: inline-block; margin-bottom: 15px; }
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="bookings-container">
        <div class="header-box">
            <h1>My Journeys</h1>
            <p>You have <?php echo $result->num_rows; ?> active bookings.</p>
        </div>

        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): 
                $loc_id = $row['location_id'];

                // Safety Logic: Get title/img from array. 
                // If ID is missing, format the ID string so it doesn't say "Unknown"
                if (isset($destinations[$loc_id])) {
                    $title = $destinations[$loc_id]['title'];
                    $image = $destinations[$loc_id]['img'];
                } else {
                    $title = ucwords(str_replace('-', ' ', $loc_id)); 
                    $image = "https://images.unsplash.com/photo-1539635278303-d4002c07eae3"; // Placeholder
                }
            ?>
                <div class="booking-card">
                    <img src="<?php echo $image; ?>?auto=format&fit=crop&w=600&q=80" class="booking-img" alt="Destination">
                    
                    <div class="booking-content" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                        <span class="status-badge" style="position: static; margin-bottom: 15px;">
                            <?php echo htmlspecialchars($row['status']); ?>
                        </span>
                        
                        <h3 style="margin-top: 0;"><?php echo htmlspecialchars($title); ?></h3>
                        
                        <div class="info-grid" style="width: 100%; justify-items: center;">
                            <div class="info-item">
                                <label>Travel Date</label>
                                <p>📅 <?php echo date("F d, Y", strtotime($row['travel_date'])); ?></p>
                            </div>
                            <div class="info-item">
                                <label>Guests</label>
                                <p>👥 <?php echo htmlspecialchars($row['guests']); ?></p>
                            </div>
                            <div class="info-item">
                                <label>Amount Paid</label>
                                <p>💰 <?php echo htmlspecialchars($row['total_price']); ?></p>
                            </div>
                            <div class="info-item">
                                <label>Reference No.</label>
                                <p>#WL-<?php echo str_pad($row['booking_id'], 5, '0', STR_PAD_LEFT); ?></p>
                            </div>
                            
                            <div class="info-item" style="grid-column: 1 / -1; margin-top: 20px;">
                                <a href="generate-receipt.php?bid=<?php echo $row['booking_id']; ?>" 
                                target="_blank" 
                                class="btn-secondary" 
                                style="display: inline-flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #ff4d4d; text-decoration: none; border: 2px solid #ff4d4d; padding: 10px 25px; border-radius: 30px; transition: 0.3s; font-weight: 600;">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                    Download Receipt (PDF)
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="empty-state">
                <p style="font-size: 3rem; margin-bottom: 10px;">🏝️</p>
                <h3 style="color: #666;">No bookings yet!</h3>
                <p style="margin-bottom: 25px;">The world is waiting. Where would you like to go first?</p>
                <a href="all-destinations.php" class="btn-primary" style="text-decoration:none; padding: 12px 30px; border-radius: 10px;">Explore Destinations</a>
            </div>
        <?php endif; ?>
    </div>

    <footer style="text-align:center; padding: 40px 0; color: #bbb;">
        <p>&copy; 2026 WanderLust Travel Co. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>