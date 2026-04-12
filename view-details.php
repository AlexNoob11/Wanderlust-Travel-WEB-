<?php
session_start();

// 1. Get User Session Info
$isLoggedIn = isset($_SESSION['user_id']);
$userId = $isLoggedIn ? $_SESSION['user_id'] : (isset($_GET['uid']) ? $_GET['uid'] : null);

// 2. Comprehensive Destination Data
$destinations = [
    // --- PHILIPPINES ---
    "el-nido" => ["title" => "El Nido, Palawan", "region" => "Philippines", "category" => "Beach", "price" => "$850", "duration" => "6 Days", "img" => "https://images.unsplash.com/photo-1518509194600-62ba0cb460d3", "desc" => "Pristine lagoons and luxury island resorts."],
    "siargao" => ["title" => "Siargao Island", "region" => "Philippines", "category" => "Adventure", "price" => "$450", "duration" => "5 Days", "img" => "https://images.unsplash.com/photo-1542082843-c07a0470733a", "desc" => "The surfing capital with a laid-back island vibe."],
    "boracay" => ["title" => "Boracay Island", "region" => "Philippines", "category" => "Beach", "price" => "$700", "duration" => "4 Days", "img" => "https://images.unsplash.com/photo-1583212292454-1fe6229603b7", "desc" => "World-famous white sand and vibrant nightlife."],
    "baguio" => ["title" => "Baguio City", "region" => "Philippines", "category" => "City", "price" => "$300", "duration" => "3 Days", "img" => "https://images.unsplash.com/photo-1519011245084-29759d587024", "desc" => "Fresh strawberries and cool mountain breezes."],
    "batanes" => ["title" => "Batanes", "region" => "Philippines", "category" => "Nature", "price" => "$900", "duration" => "5 Days", "img" => "https://images.unsplash.com/photo-1541123303123-5e92be9c3f81", "desc" => "The 'New Zealand' of the Philippines with rolling hills."],
    "cebu" => ["title" => "Kawasan Falls, Cebu", "region" => "Philippines", "category" => "Adventure", "price" => "$350", "duration" => "4 Days", "img" => "https://images.unsplash.com/photo-1620050854492-2337a6b7201c", "desc" => "Canyoneering through turquoise jungle waters."],
    "vigan" => ["title" => "Vigan City", "region" => "Philippines", "category" => "History", "price" => "$250", "duration" => "3 Days", "img" => "https://images.unsplash.com/photo-1625208453472-a0e2384a3297", "desc" => "Spanish-era architecture and cobblestone streets."],
    "bohol" => ["title" => "Chocolate Hills, Bohol", "region" => "Philippines", "category" => "Nature", "price" => "$400", "duration" => "4 Days", "img" => "https://images.unsplash.com/photo-1516690561799-46d8f74f9abf", "desc" => "1,260 uniform hills that turn brown in summer."],
    "amanpulo" => ["title" => "Amanpulo, Palawan", "region" => "Philippines", "category" => "Luxury", "price" => "$3,500", "duration" => "5 Days", "img" => "https://images.unsplash.com/photo-1506953823976-52e1fdc0149a", "desc" => "The pinnacle of ultra-luxury private islands."],
    "coron" => ["title" => "Coron, Palawan", "region" => "Philippines", "category" => "Adventure", "price" => "$800", "duration" => "6 Days", "img" => "https://images.unsplash.com/photo-1544085311-11a028465b03", "desc" => "World-class shipwreck diving and hidden lakes."],
    "sagada" => ["title" => "Sagada, Mt. Province", "region" => "Philippines", "category" => "Nature", "price" => "$280", "duration" => "4 Days", "img" => "https://images.unsplash.com/photo-1632506256247-495df0298a00", "desc" => "Hanging coffins and sea of clouds."],
    "manila" => ["title" => "BGC, Taguig", "region" => "Philippines", "category" => "City", "price" => "$600", "duration" => "3 Days", "img" => "https://images.unsplash.com/photo-1540974165411-d8f4e30744a8", "desc" => "Modern lifestyle, dining, and luxury shopping."],
    "davao" => ["title" => "Mt. Apo, Davao", "region" => "Philippines", "category" => "Adventure", "price" => "$400", "duration" => "5 Days", "img" => "https://images.unsplash.com/photo-1555431189-0fabf2667795", "desc" => "Conquer the highest peak in the country."],
    "camiguin" => ["title" => "Camiguin Island", "region" => "Philippines", "category" => "Nature", "price" => "$320", "duration" => "4 Days", "img" => "https://images.unsplash.com/photo-1505881502353-a1986add3732", "desc" => "The island born of fire and volcanoes."],
    "la-union" => ["title" => "La Union", "region" => "Philippines", "category" => "Beach", "price" => "$250", "duration" => "3 Days", "img" => "https://images.unsplash.com/photo-1502680390469-be75c86b636f", "desc" => "Weekend surf escapes and sunset bars."],

    // --- INTERNATIONAL ---
    "kyoto-int" => ["title" => "Kyoto, Japan", "region" => "International", "category" => "History", "price" => "$1,500", "duration" => "10 Days", "img" => "https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e", "desc" => "Zen gardens and historic imperial palaces."],
    "bali-int" => ["title" => "Ubud, Bali", "region" => "International", "category" => "Adventure", "price" => "$700", "duration" => "8 Days", "img" => "https://images.unsplash.com/photo-1537996194471-e657df975ab4", "desc" => "Lush rice terraces and sacred monkey forests."],
    "paris-int" => ["title" => "Paris, France", "region" => "International", "category" => "City", "price" => "$1,400", "duration" => "4 Days", "img" => "https://images.unsplash.com/photo-1502602898657-3e91760cbb34", "desc" => "The world capital of art, fashion, and romance."],
    "swiss-int" => ["title" => "Swiss Alps", "region" => "International", "category" => "Luxury", "price" => "$2,000", "duration" => "7 Days", "img" => "https://images.unsplash.com/photo-1530122037265-a5f1f91d3b99", "desc" => "Luxury ski resorts and crystal clear lakes."],
    "hanoi-int" => ["title" => "Hanoi, Vietnam", "region" => "International", "category" => "Budget", "price" => "$500", "duration" => "6 Days", "img" => "https://images.unsplash.com/photo-1509063459916-a7598df21f88", "desc" => "Incredible street food and rich history."],
    "dubai-int" => ["title" => "Dubai, UAE", "region" => "International", "category" => "Luxury", "price" => "$2,200", "duration" => "4 Days", "img" => "https://images.unsplash.com/photo-1512453979798-5ea266f8880c", "desc" => "Ultra-modern luxury and desert adventures."],
    "peru-int" => ["title" => "Machu Picchu, Peru", "region" => "International", "category" => "Adventure", "price" => "$1,300", "duration" => "5 Days", "img" => "https://images.unsplash.com/photo-1587595431973-160d0d94add1", "desc" => "Hiking the legendary trail of the Incas."],
    "kenya-int" => ["title" => "Maasai Mara, Kenya", "region" => "International", "category" => "Nature", "price" => "$1,900", "duration" => "6 Days", "img" => "https://images.unsplash.com/photo-1516422213484-2142eddf634d", "desc" => "The ultimate African safari experience."],
    "santorini-int" => ["title" => "Santorini, Greece", "region" => "International", "category" => "Luxury", "price" => "$1,100", "duration" => "6 Days", "img" => "https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff", "desc" => "Blue domes and caldera sunset views."],
    "egypt-int" => ["title" => "Giza, Egypt", "region" => "International", "category" => "History", "price" => "$900", "duration" => "6 Days", "img" => "https://images.unsplash.com/photo-1503177119275-0aa32b3a9368", "desc" => "Stand before the last of the Ancient Wonders."],
    "iceland-int" => ["title" => "Blue Lagoon, Iceland", "region" => "International", "category" => "Nature", "price" => "$1,800", "duration" => "5 Days", "img" => "https://images.unsplash.com/photo-1504893524553-f8589826c5bf", "desc" => "Volcanic hot springs and the Northern Lights."],
    "bangkok-int" => ["title" => "Bangkok, Thailand", "region" => "International", "category" => "Budget", "price" => "$450", "duration" => "5 Days", "img" => "https://images.unsplash.com/photo-1504609773096-104ff2c73ba4", "desc" => "Vibrant street life and golden temples."],
    "newyork-int" => ["title" => "New York, USA", "region" => "International", "category" => "City", "price" => "$1,700", "duration" => "9 Days", "img" => "https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9", "desc" => "The energy of Times Square and Broadway."],
    "maldives-int" => ["title" => "Male, Maldives", "region" => "International", "category" => "Beach", "price" => "$2,500", "duration" => "7 Days", "img" => "https://images.unsplash.com/photo-1514282401047-d79a71a590e8", "desc" => "Secluded overwater villas and coral reefs."],
    "nepal-int" => ["title" => "Everest Base Camp", "region" => "International", "category" => "Adventure", "price" => "$1,100", "duration" => "12 Days", "img" => "https://images.unsplash.com/photo-1544735716-392fe2489ffa", "desc" => "The trek of a lifetime in the Himalayas."]
];

// 3. Get ID and Validate
$location_id = isset($_GET['location']) ? $_GET['location'] : '';
if (!array_key_exists($location_id, $destinations)) {
    header("Location: all-destinations.php");
    exit();
}
$place = $destinations[$location_id];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $place['title']; ?> | WanderLust Details</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fdfdfd; margin: 0; }
        .details-container {
            display: flex; gap: 50px; align-items: flex-start;
            padding: 120px 5% 60px; flex-wrap: wrap; max-width: 1300px; margin: 0 auto;
        }
        .details-image { flex: 1.2; min-width: 350px; position: sticky; top: 120px; }
        .details-image img {
            width: 100%; height: 600px; object-fit: cover;
            border-radius: 25px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .details-info { flex: 1; min-width: 300px; }
        .details-info h1 { font-size: 3rem; margin: 15px 0; color: #1a1a1a; letter-spacing: -1px; }
        
        .meta-info { display: flex; gap: 10px; margin-bottom: 25px; flex-wrap: wrap; }
        .meta-item {
            background: #f8f9fa; color: #555; padding: 10px 18px;
            border-radius: 10px; font-weight: 600; font-size: 0.85rem;
            border: 1px solid #eee;
        }
        .price-tag { background: #ff4d4d; color: white; border: none; font-size: 1.1rem; }
        .region-tag { background: #333; color: white; border: none; }
        
        .user-badge {
            background: #fff5f5; border-left: 4px solid #ff4d4d;
            padding: 15px; margin: 20px 0; font-size: 0.9rem;
            color: #ff4d4d; border-radius: 0 12px 12px 0;
        }

        /* Professional Booking Form Styling */
        .booking-card {
            background: white; border: 1px solid #eee; padding: 35px;
            border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-top: 40px;
        }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-weight: 600; margin-bottom: 8px; font-size: 0.9rem; color: #333; }
        .form-input {
            width: 100%; padding: 14px; border: 1px solid #ddd;
            border-radius: 10px; font-family: inherit; font-size: 0.95rem;
            box-sizing: border-box; outline: none; transition: 0.3s;
        }
        .form-input:focus { border-color: #ff4d4d; box-shadow: 0 0 0 3px rgba(255,77,77,0.1); }

        .payment-toggle { display: flex; gap: 10px; margin: 20px 0; }
        .pay-option {
            flex: 1; border: 1px solid #ddd; padding: 12px; border-radius: 10px;
            text-align: center; cursor: pointer; font-weight: 600; font-size: 0.85rem; transition: 0.3s;
        }
        .pay-option input { display: none; }
        .pay-option:has(input:checked) { background: #333; color: white; border-color: #333; }

        .btn-confirm {
            width: 100%; background: #ff4d4d; color: white; padding: 18px;
            border: none; border-radius: 12px; font-weight: 600; font-size: 1.1rem;
            cursor: pointer; transition: 0.3s; box-shadow: 0 10px 20px rgba(255,77,77,0.2);
            margin-top: 10px;
        }
        .btn-confirm:hover { background: #e64444; transform: translateY(-2px); }

        .map-wrapper {
            width: 100%; height: 250px; border-radius: 15px; overflow: hidden;
            margin-top: 30px; border: 1px solid #eee;
        }

        @media (max-width: 900px) {
            .details-image { position: relative; top: 0; }
            .details-image img { height: 400px; }
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <main class="details-container">
        <div class="details-image">
            <img src="<?php echo $place['img']; ?>?auto=format&fit=crop&w=1000&q=85" 
                 alt="<?php echo $place['title']; ?>"
                 onerror="this.src='https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=1000&q=80'">
        </div>
        
        <div class="details-info">
            <a href="all-destinations.php?uid=<?php echo $userId; ?>" style="color: #ff4d4d; font-weight: 600; text-decoration: none; font-size: 0.9rem;">
                ← Back to Destinations
            </a>

            <?php if($userId): ?>
                <div class="user-badge">
                    ✨ Welcome back! Your traveler ID <strong>#<?php echo htmlspecialchars($userId); ?></strong> is active for this booking.
                </div>
            <?php endif; ?>

            <h1><?php echo $place['title']; ?></h1>
            
            <div class="meta-info">
                <div class="meta-item region-tag">📍 <?php echo $place['region']; ?></div>
                <div class="meta-item">⏱ <?php echo $place['duration']; ?></div>
                <div class="meta-item">🏷️ <?php echo $place['category']; ?></div>
                <div class="meta-item price-tag">From <?php echo $place['price']; ?></div>
            </div>

            <p style="line-height: 1.8; color: #666; font-size: 1.05rem;">
                <?php echo $place['desc']; ?> Experience the trip of a lifetime with WanderLust. Our 2026 packages include premium accommodation, guided local tours, and all-inclusive transportation options.
            </p>

           <div class="map-section" style="margin-top: 30px;">
                <h3 style="font-size: 1.2rem; margin-bottom: 10px;">Location Overview</h3>
                <div class="map-wrapper" style="width: 100%; height: 300px; border-radius: 20px; overflow: hidden; border: 1px solid #eee; box-shadow: inset 0 0 10px rgba(0,0,0,0.05);">
                    <iframe 
                        width="100%" 
                        height="100%" 
                        frameborder="0" 
                        scrolling="no" 
                        marginheight="0" 
                        marginwidth="0" 
                        src="https://maps.google.com/maps?q=<?php echo urlencode($place['title']); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        style="filter: contrast(1.1) brightness(0.95);">
                    </iframe>
                </div>
                <p style="font-size: 0.8rem; color: #888; margin-top: 8px;">
                    📍 Localized view of <?php echo htmlspecialchars($place['title']); ?>. Exact meeting points are provided after confirmation.
                </p>
            </div>

            <div class="booking-card">
    <h2 style="margin-top:0; font-size: 1.5rem;">Secure Your Booking</h2>
    <form action="process-payment.php" method="POST">
        <input type="hidden" name="location_id" value="<?php echo $location_id; ?>">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userId); ?>">
        <input type="hidden" name="total_price" value="<?php echo $place['price']; ?>">
        
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:15px;">
            <div class="form-group">
                <label>Check-in Date</label>
                <input type="date" class="form-input" name="travel_date" required min="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
                <label>Travelers</label>
                <select class="form-input" name="guests">
                    <option value="1 Guest">1 Guest</option>
                    <option value="2 Guests" selected>2 Guests</option>
                    <option value="3-4 Guests">3-4 Guests</option>
                    <option value="Group 5+">Group 5+</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Payment Method</label>
            <div class="payment-toggle">
                <label class="pay-option">
                    <input type="radio" name="payment_method" value="Credit Card" checked> Credit Card
                </label>
                <label class="pay-option">
                    <input type="radio" name="payment_method" value="PayPal"> PayPal
                </label>
            </div>
        </div>

        <div id="card-details">
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Cardholder Name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-input" placeholder="0000 0000 0000 0000" required>
            </div>
            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:15px;">
                <input type="text" class="form-input" placeholder="MM / YY" required>
                <input type="text" class="form-input" placeholder="CVC" required>
            </div>
        </div>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px dashed #ddd; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <span style="display:block; font-size: 0.8rem; color: #888;">Due Today</span>
                <span style="font-size: 1.8rem; font-weight: 600; color: #1a1a1a;"><?php echo $place['price']; ?></span>
            </div>
            <button type="submit" class="btn-confirm">Complete Booking</button>
        </div>
    </form>
    <p style="text-align: center; font-size: 0.75rem; color: #999; margin-top: 15px;">
        🔒 SSL Encrypted & Secure Database Storage
    </p>
</div>
<script src="script.js"></script>
</body>
</html>