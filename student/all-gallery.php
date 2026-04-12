<?php
// Comprehensive Gallery Data with verified Unsplash IDs
$gallery_items = [
    // --- PHILIPPINES ---
    ["img" => "https://images.unsplash.com/photo-1518509194600-62ba0cb460d3", "title" => "El Nido", "cat" => "Beach"],
    ["img" => "https://images.unsplash.com/photo-1542082843-c07a0470733a", "title" => "Siargao", "cat" => "Adventure"],
    ["img" => "https://images.unsplash.com/photo-1583212292454-1fe6229603b7", "title" => "Boracay", "cat" => "Beach"],
    ["img" => "https://images.unsplash.com/photo-1519011245084-29759d587024", "title" => "Baguio", "cat" => "City"],
    ["img" => "https://images.unsplash.com/photo-1541123303123-5e92be9c3f81", "title" => "Batanes", "cat" => "Nature"],
    ["img" => "https://images.unsplash.com/photo-1620050854492-2337a6b7201c", "title" => "Cebu", "cat" => "Adventure"],
    ["img" => "https://images.unsplash.com/photo-1625208453472-a0e2384a3297", "title" => "Vigan", "cat" => "History"],
    ["img" => "https://images.unsplash.com/photo-1516690561799-46d8f74f9abf", "title" => "Bohol", "cat" => "Nature"],
    ["img" => "https://images.unsplash.com/photo-1506953823976-52e1fdc0149a", "title" => "Amanpulo", "cat" => "Luxury"],
    ["img" => "https://images.unsplash.com/photo-1544085311-11a028465b03", "title" => "Coron", "cat" => "Adventure"],
    ["img" => "https://images.unsplash.com/photo-1632506256247-495df0298a00", "title" => "Sagada", "cat" => "Nature"],
    ["img" => "https://images.unsplash.com/photo-1540974165411-d8f4e30744a8", "title" => "Manila", "cat" => "City"],
    ["img" => "https://images.unsplash.com/photo-1555431189-0fabf2667795", "title" => "Mt. Apo", "cat" => "Adventure"],
    ["img" => "https://images.unsplash.com/photo-1505881502353-a1986add3732", "title" => "Camiguin", "cat" => "Nature"],
    ["img" => "https://images.unsplash.com/photo-1502680390469-be75c86b636f", "title" => "La Union", "cat" => "Beach"],

    // --- INTERNATIONAL ---
    ["img" => "https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e", "title" => "Kyoto", "cat" => "History"],
    ["img" => "https://images.unsplash.com/photo-1537996194471-e657df975ab4", "title" => "Bali", "cat" => "Adventure"],
    ["img" => "https://images.unsplash.com/photo-1502602898657-3e91760cbb34", "title" => "Paris", "cat" => "City"],
    ["img" => "https://images.unsplash.com/photo-1530122037265-a5f1f91d3b99", "title" => "Swiss Alps", "cat" => "Nature"],
    ["img" => "https://images.unsplash.com/photo-1509063459916-a7598df21f88", "title" => "Hanoi", "cat" => "Budget"],
    ["img" => "https://images.unsplash.com/photo-1512453979798-5ea266f8880c", "title" => "Dubai", "cat" => "Luxury"],
    ["img" => "https://images.unsplash.com/photo-1587595431973-160d0d94add1", "title" => "Machu Picchu", "cat" => "Adventure"],
    ["img" => "https://images.unsplash.com/photo-1516422213484-2142eddf634d", "title" => "Kenya", "cat" => "Nature"],
    ["img" => "https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff", "title" => "Santorini", "cat" => "Beach"],
    ["img" => "https://images.unsplash.com/photo-1503177119275-0aa32b3a9368", "title" => "Giza", "cat" => "History"],
    ["img" => "https://images.unsplash.com/photo-1504893524553-f8589826c5bf", "title" => "Iceland", "cat" => "Nature"],
    ["img" => "https://images.unsplash.com/photo-1504609773096-104ff2c73ba4", "title" => "Bangkok", "cat" => "Budget"],
    ["img" => "https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9", "title" => "New York", "cat" => "City"],
    ["img" => "https://images.unsplash.com/photo-1514282401047-d79a71a590e8", "title" => "Maldives", "cat" => "Beach"],
    ["img" => "https://images.unsplash.com/photo-1544735716-392fe2489ffa", "title" => "Nepal", "cat" => "Adventure"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Gallery | WanderLust</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background: #fdfdfd; margin: 0; font-family: 'Poppins', sans-serif; }
        .catalog-header {
            padding: 160px 20px 100px;
            text-align: center;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=1600&q=80');
            background-size: cover; background-position: center; color: white;
        }

        .gallery-container {
            padding: 40px 5%;
            columns: 4 280px;
            column-gap: 20px;
        }

        .gallery-card {
            position: relative;
            margin-bottom: 20px;
            border-radius: 12px;
            overflow: hidden;
            break-inside: avoid;
            background: #f0f0f0; /* Show light grey while loading */
            transition: all 0.3s ease;
        }

        .gallery-card img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
            min-height: 200px; /* Prevents layout collapse */
        }

        .gallery-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 60%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
            opacity: 0;
            transition: 0.3s ease;
        }

        .gallery-card:hover .gallery-overlay { opacity: 1; }
        .gallery-card:hover img { transform: scale(1.05); }

        .gallery-overlay h3 { color: white; margin: 0; font-size: 1.1rem; }
        .gallery-overlay span { 
            color: #ff4d4d; 
            font-size: 0.7rem; 
            text-transform: uppercase; 
            letter-spacing: 2px; 
            font-weight: 600; 
        }

        @media (max-width: 768px) { .gallery-container { columns: 2; } }
        @media (max-width: 480px) { .gallery-container { columns: 1; } }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <header class="catalog-header">
        <h1>World Photography</h1>
        <p>A visual journey through our 30 premier destinations.</p>
    </header>

    <main class="gallery-container">
        <?php foreach ($gallery_items as $item): ?>
        <div class="gallery-card">
            <img src="<?php echo $item['img']; ?>?auto=format&fit=crop&w=600&q=80" 
                 alt="<?php echo $item['title']; ?>"
                 onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&w=600&q=80';">
            <div class="gallery-overlay">
                <span><?php echo $item['cat']; ?></span>
                <h3><?php echo $item['title']; ?></h3>
            </div>
        </div>
        <?php endforeach; ?>
    </main>

    <footer style="text-align:center; padding: 40px; background:#1a1a1a; color:#888;">
        <p>&copy; 2026 WanderLust Travel Co.</p>
    </footer>
<script src="script.js"></script>
</body>
</html>