<?php
session_start();
include 'db.php';

$isLoggedIn = isset($_SESSION['user_id']);
$userId = $isLoggedIn ? $_SESSION['user_id'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Packages | WanderLust</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #ff4d4d;
            --dark: #1a1a1a;
            --light-bg: #f9fafb;
            --white: #ffffff;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
        }

        .packages-hero {
            text-align: center;
            padding: 150px 20px 60px;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                        url('https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?auto=format&fit=crop&w=1500&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            margin-bottom: -100px;
        }

        .packages-hero h1 { font-size: 3.5rem; margin-bottom: 10px; font-weight: 700; }
        .packages-hero p { font-size: 1.1rem; opacity: 0.9; }

        .pricing-container {
            max-width: 1200px;
            margin: 0 auto 80px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        .package-card {
            background: var(--white);
            border-radius: 24px;
            padding: 50px 40px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid #eee;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .package-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.1);
        }

        /* Popular / Adventure Highlight */
        .package-card.featured {
            background: var(--dark);
            color: white;
            transform: scale(1.05);
            border: none;
        }
        
        .package-card.featured:hover {
            transform: scale(1.08) translateY(-10px);
        }

        .badge {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary);
            color: white;
            padding: 5px 20px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .package-card h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .price {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .price span {
            font-size: 1rem;
            font-weight: 400;
            opacity: 0.7;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin: 0 0 40px;
            text-align: left;
            flex-grow: 1;
        }

        .features-list li {
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }

        .package-card.featured .features-list li {
            border-bottom: 1px solid #333;
        }

        .features-list li::before {
            content: '✓';
            margin-right: 12px;
            color: var(--primary);
            font-weight: bold;
        }

        .btn-package {
            display: inline-block;
            padding: 15px 35px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            border: 2px solid var(--primary);
        }

        .btn-starter, .btn-luxury {
            color: var(--primary);
            background: transparent;
        }

        .btn-starter:hover, .btn-luxury:hover {
            background: var(--primary);
            color: white;
        }

        .btn-featured {
            background: var(--primary);
            color: white;
        }

        .btn-featured:hover {
            background: #e64444;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .package-card.featured { transform: scale(1); }
            .pricing-container { margin-top: 50px; }
            .packages-hero h1 { font-size: 2.5rem; }
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <section class="packages-hero">
        <h1>Travel Experiences</h1>
        <p>Expertly curated plans for every type of explorer.</p>
    </section>

    <div class="pricing-container">
        
        <div class="package-card">
            <h3>Starter</h3>
            <div class="price">$499<span>/person</span></div>
            <ul class="features-list">
                <li>3 Days, 2 Nights</li>
                <li>Standard Boutique Hotel</li>
                <li>Daily Breakfast</li>
                <li>Guided City Walking Tour</li>
                <li>Arrival Airport Transfer</li>
            </ul>
            <a href="book.php?p=starter&uid=<?php echo $userId; ?>" class="btn-package btn-starter">Choose Starter</a>
        </div>

        <div class="package-card featured">
            <div class="badge">Most Popular</div>
            <h3>Adventure</h3>
            <div class="price">$1,299<span>/person</span></div>
            <ul class="features-list">
                <li>7 Days, 6 Nights</li>
                <li>4-Star Adventure Resort</li>
                <li>Half-Board (Breakfast & Dinner)</li>
                <li>All Excursion Entry Fees</li>
                <li>Private Local Guide</li>
                <li>24/7 Concierge Support</li>
            </ul>
            <a href="dashboard.php#contact"<?php echo $userId; ?>" class="btn-package btn-featured">Choose Adventure</a>
        </div>

        <div class="package-card">
            <h3>Luxury</h3>
            <div class="price">$2,999<span>/person</span></div>
            <ul class="features-list">
                <li>10 Days, 9 Nights</li>
                <li>Ultra-Luxury Private Villa</li>
                <li>All-Inclusive Gourmet Dining</li>
                <li>First-Class Internal Flights</li>
                <li>Dedicated Personal Butler</li>
                <li>Exclusive Private Tours</li>
            </ul>
            <a href="book.php?p=luxury&uid=<?php echo $userId; ?>" class="btn-package btn-luxury">Choose Luxury</a>
        </div>

    </div>

    <section style="text-align: center; padding-bottom: 80px;">
        <h3>Need a custom itinerary?</h3>
        <p style="color: #666;">Contact our travel experts for a tailored experience.</p>
        <br>
        <a href="dashboard.php#contact" class="btn-primary">Talk to an Expert</a>
    </section>

    <footer>
        <p>&copy; 2026 WanderLust Travel Co. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>