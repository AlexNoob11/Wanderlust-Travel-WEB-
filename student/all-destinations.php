<?php
session_start();
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

/**
 * Categories: beach, nature, city, history, adventure, budget, luxury
 * Regions: philippines, international
 */
$destinations = [
    // --- PHILIPPINES (15) ---
    ["id" => "el-nido", "region" => "philippines", "category" => "beach", "price_tag" => "luxury", "title" => "El Nido, Palawan", "desc" => "Pristine lagoons and luxury island resorts.", "img" => "https://images.unsplash.com/photo-1518509194600-62ba0cb460d3?auto=format&fit=crop&w=800&q=80"],
    ["id" => "siargao", "region" => "philippines", "category" => "adventure", "price_tag" => "budget", "title" => "Siargao Island", "desc" => "The surfing capital with a laid-back island vibe.", "img" => "https://images.unsplash.com/photo-1542082843-c07a0470733a?auto=format&fit=crop&w=800&q=80"],
    ["id" => "boracay", "region" => "philippines", "category" => "beach", "price_tag" => "luxury", "title" => "Boracay Island", "desc" => "World-famous white sand and vibrant nightlife.", "img" => "https://images.unsplash.com/photo-1583212292454-1fe6229603b7?auto=format&fit=crop&w=800&q=80"],
    ["id" => "baguio", "region" => "philippines", "category" => "city", "price_tag" => "budget", "title" => "Baguio City", "desc" => "Fresh strawberries and cool mountain breezes.", "img" => "https://images.unsplash.com/photo-1626084446430-6725220c159f?auto=format&fit=crop&w=800&q=80"],
    ["id" => "batanes", "region" => "philippines", "category" => "nature", "price_tag" => "luxury", "title" => "Batanes", "desc" => "The 'New Zealand' of the Philippines.", "img" => "https://images.unsplash.com/photo-1541123303123-5e92be9c3f81?auto=format&fit=crop&w=800&q=80"],
    ["id" => "cebu", "region" => "philippines", "category" => "adventure", "price_tag" => "budget", "title" => "Cebu - Kawasan Falls", "desc" => "Canyoneering through turquoise jungle waters.", "img" => "https://images.unsplash.com/photo-1620050854492-2337a6b7201c?auto=format&fit=crop&w=800&q=80"],
    ["id" => "vigan", "region" => "philippines", "category" => "history", "price_tag" => "budget", "title" => "Vigan City", "desc" => "Spanish-era architecture and cobblestone streets.", "img" => "https://images.unsplash.com/photo-1625208453472-a0e2384a3297?auto=format&fit=crop&w=800&q=80"],
    ["id" => "bohol", "region" => "philippines", "category" => "nature", "price_tag" => "budget", "title" => "Chocolate Hills, Bohol", "desc" => "1,260 uniform hills that turn brown in summer.", "img" => "https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=800&q=80"],
    ["id" => "amanpulo", "region" => "philippines", "category" => "beach", "price_tag" => "luxury", "title" => "Amanpulo, Palawan", "desc" => "The pinnacle of ultra-luxury private islands.", "img" => "https://images.unsplash.com/photo-1506953823976-52e1fdc0149a?auto=format&fit=crop&w=800&q=80"],
    ["id" => "coron", "region" => "philippines", "category" => "adventure", "price_tag" => "luxury", "title" => "Coron, Palawan", "desc" => "World-class shipwreck diving and hidden lakes.", "img" => "https://images.unsplash.com/photo-1544085311-11a028465b03?auto=format&fit=crop&w=800&q=80"],
    ["id" => "sagada", "region" => "philippines", "category" => "nature", "price_tag" => "budget", "title" => "Sagada, Mt. Province", "desc" => "Hanging coffins and sea of clouds.", "img" => "https://images.unsplash.com/photo-1632506256247-495df0298a00?auto=format&fit=crop&w=800&q=80"],
    ["id" => "manila", "region" => "philippines", "category" => "city", "price_tag" => "luxury", "title" => "BGC, Taguig", "desc" => "Modern lifestyle, dining, and luxury shopping.", "img" => "https://images.unsplash.com/photo-1540974165411-d8f4e30744a8?auto=format&fit=crop&w=800&q=80"],
    ["id" => "davao", "region" => "philippines", "category" => "nature", "price_tag" => "budget", "title" => "Mt. Apo, Davao", "desc" => "Conquer the highest peak in the country.", "img" => "https://images.unsplash.com/photo-1555431189-0fabf2667795?auto=format&fit=crop&w=800&q=80"],
    ["id" => "camiguin", "region" => "philippines", "category" => "nature", "price_tag" => "budget", "title" => "Camiguin Island", "desc" => "The island born of fire and volcanoes.", "img" => "https://images.unsplash.com/photo-1505881502353-a1986add3732?auto=format&fit=crop&w=800&q=80"],
    ["id" => "la-union", "region" => "philippines", "category" => "beach", "price_tag" => "budget", "title" => "La Union", "desc" => "Weekend surf escapes and sunset bars.", "img" => "https://images.unsplash.com/photo-1502680390469-be75c86b636f?auto=format&fit=crop&w=800&q=80"],

    // --- INTERNATIONAL (15) ---
    ["id" => "kyoto-int", "region" => "international", "category" => "history", "price_tag" => "luxury", "title" => "Kyoto, Japan", "desc" => "Zen gardens and historic imperial palaces.", "img" => "https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?auto=format&fit=crop&w=800&q=80"],
    ["id" => "bali-int", "region" => "international", "category" => "adventure", "price_tag" => "budget", "title" => "Ubud, Bali", "desc" => "Lush rice terraces and sacred monkey forests.", "img" => "https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=800&q=80"],
    ["id" => "paris-int", "region" => "international", "category" => "city", "price_tag" => "luxury", "title" => "Paris, France", "desc" => "The world capital of art, fashion, and romance.", "img" => "https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=800&q=80"],
    ["id" => "swiss-int", "region" => "international", "category" => "nature", "price_tag" => "luxury", "title" => "Swiss Alps", "desc" => "Luxury ski resorts and crystal clear lakes.", "img" => "https://images.unsplash.com/photo-1530122037265-a5f1f91d3b99?auto=format&fit=crop&w=800&q=80"],
    ["id" => "hanoi-int", "region" => "international", "category" => "city", "price_tag" => "budget", "title" => "Hanoi, Vietnam", "desc" => "Incredible street food and rich French-Asian history.", "img" => "https://images.unsplash.com/photo-1509063459916-a7598df21f88?auto=format&fit=crop&w=800&q=80"],
    ["id" => "dubai-int", "region" => "international", "category" => "city", "price_tag" => "luxury", "title" => "Dubai, UAE", "desc" => "Ultra-modern luxury and desert adventures.", "img" => "https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=800&q=80"],
    ["id" => "peru-int", "region" => "international", "category" => "adventure", "price_tag" => "budget", "title" => "Machu Picchu", "desc" => "Hiking the legendary trail of the Incas.", "img" => "https://images.unsplash.com/photo-1587595431973-160d0d94add1?auto=format&fit=crop&w=800&q=80"],
    ["id" => "kenya-int", "region" => "international", "category" => "nature", "price_tag" => "luxury", "title" => "Maasai Mara", "desc" => "The ultimate African safari experience.", "img" => "https://images.unsplash.com/photo-1516422213484-2142eddf634d?auto=format&fit=crop&w=800&q=80"],
    ["id" => "santorini-int", "region" => "international", "category" => "beach", "price_tag" => "luxury", "title" => "Santorini, Greece", "desc" => "Blue domes and caldera sunset views.", "img" => "https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?auto=format&fit=crop&w=800&q=80"],
    ["id" => "egypt-int", "region" => "international", "category" => "history", "price_tag" => "budget", "title" => "Giza, Egypt", "desc" => "Stand before the last of the Ancient Wonders.", "img" => "https://images.unsplash.com/photo-1503177119275-0aa32b3a9368?auto=format&fit=crop&w=800&q=80"],
    ["id" => "iceland-int", "region" => "international", "category" => "nature", "price_tag" => "luxury", "title" => "Blue Lagoon, Iceland", "desc" => "Volcanic hot springs and the Northern Lights.", "img" => "https://images.unsplash.com/photo-1504893524553-f8589826c5bf?auto=format&fit=crop&w=800&q=80"],
    ["id" => "bangkok-int", "region" => "international", "category" => "city", "price_tag" => "budget", "title" => "Bangkok, Thailand", "desc" => "Vibrant street life and golden temples.", "img" => "https://images.unsplash.com/photo-1504609773096-104ff2c73ba4?auto=format&fit=crop&w=800&q=80"],
    ["id" => "newyork-int", "region" => "international", "category" => "city", "price_tag" => "luxury", "title" => "New York, USA", "desc" => "The energy of Times Square and Broadway.", "img" => "https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?auto=format&fit=crop&w=800&q=80"],
    ["id" => "maldives-int", "region" => "international", "category" => "beach", "price_tag" => "luxury", "title" => "Male, Maldives", "desc" => "Secluded overwater villas and coral reefs.", "img" => "https://images.unsplash.com/photo-1514282401047-d79a71a590e8?auto=format&fit=crop&w=800&q=80"],
    ["id" => "nepal-int", "region" => "international", "category" => "adventure", "price_tag" => "budget", "title" => "Everest Base Camp", "desc" => "The trek of a lifetime in the Himalayas.", "img" => "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WanderLust | Destinations Catalog</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #ff4d4d; --dark: #333; --light: #f8f9fa; }
        body { font-family: 'Poppins', sans-serif; background: #f4f4f4; margin: 0; }
        .catalog-header {
            padding: 120px 20px 80px; text-align: center;
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&w=1500&q=80');
            background-size: cover; background-position: center; color: white;
        }
        .filter-section { 
            background: white; padding: 25px; border-radius: 12px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin: -40px auto 40px; 
            max-width: 1000px; position: relative; z-index: 10;
        }
        .filter-group { display: flex; align-items: center; flex-wrap: wrap; margin-bottom: 10px; }
        .filter-label { font-weight: 600; min-width: 100px; color: var(--dark); }
        .filter-btn {
            background: #eee; border: none; padding: 8px 16px; margin: 4px;
            border-radius: 20px; cursor: pointer; transition: 0.3s; font-size: 0.85rem;
        }
        .filter-btn.active, .filter-btn:hover { background: var(--primary); color: white; }
        
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px; padding: 20px; }
        .card { background: white; border-radius: 12px; overflow: hidden; transition: 0.3s; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .card-img-wrapper { position: relative; width: 100%; height: 220px; }
        .card-img-wrapper img { width: 100%; height: 100%; object-fit: cover; }
        
        .badge-container { position: absolute; top: 15px; left: 15px; display: flex; gap: 5px; }
        .badge { padding: 4px 10px; border-radius: 4px; font-size: 0.65rem; text-transform: uppercase; font-weight: 600; color: white; }
        .bg-ph { background: #0052cc; } .bg-intl { background: #6c757d; }
        .bg-lux { background: #d4af37; } .bg-bud { background: #28a745; }

        .card-info { padding: 20px; }
        .card-info h3 { margin: 0 0 10px; font-size: 1.2rem; }
        .card-info p { font-size: 0.9rem; color: #666; line-height: 1.5; margin-bottom: 15px; }
        .detail-link { color: var(--primary); text-decoration: none; font-weight: 600; font-size: 0.9rem; }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <header class="catalog-header">
        <h1>Explore Destinations</h1>
        <div style="max-width: 500px; margin: 20px auto;">
            <input type="text" id="search" placeholder="Search by name..." onkeyup="filterLogic()" 
                   style="width:100%; padding:15px; border-radius:30px; border:none; outline:none;">
        </div>
    </header>

    <div class="container">
        <div class="filter-section">
            <div class="filter-group">
                <span class="filter-label">Region:</span>
                <button class="filter-btn active" data-type="region" data-value="all" onclick="setFilter(this)">All</button>
                <button class="filter-btn" data-type="region" data-value="philippines" onclick="setFilter(this)">🇵🇭 Philippines</button>
                <button class="filter-btn" data-type="region" data-value="international" onclick="setFilter(this)">🌎 International</button>
            </div>
            <div class="filter-group">
                <span class="filter-label">Type:</span>
                <button class="filter-btn active" data-type="category" data-value="all" onclick="setFilter(this)">Any Type</button>
                <button class="filter-btn" data-type="category" data-value="beach" onclick="setFilter(this)">🏖️ Beach</button>
                <button class="filter-btn" data-type="category" data-value="adventure" onclick="setFilter(this)">🔥 Adventure</button>
                <button class="filter-btn" data-type="category" data-value="nature" onclick="setFilter(this)">🏔️ Nature</button>
                <button class="filter-btn" data-type="category" data-value="luxury" onclick="setFilter(this)">💎 Luxury</button>
                <button class="filter-btn" data-type="category" data-value="budget" onclick="setFilter(this)">💰 Budget</button>
            </div>
        </div>
    </div>

    <main class="grid" id="destGrid">
        <?php foreach ($destinations as $place): ?>
        <div class="card destination-card" 
             data-region="<?= $place['region'] ?>" 
             data-cat="<?= $place['category'] ?>" 
             data-price="<?= $place['price_tag'] ?>">
            
            <div class="card-img-wrapper">
                <div class="badge-container">
                    <span class="badge <?= $place['region'] == 'philippines' ? 'bg-ph' : 'bg-intl' ?>"><?= $place['region'] ?></span>
                    <span class="badge <?= $place['price_tag'] == 'luxury' ? 'bg-lux' : 'bg-bud' ?>"><?= $place['price_tag'] ?></span>
                </div>
                <img src="<?= $place['img'] ?>" alt="<?= $place['title'] ?>">
            </div>
            
            <div class="card-info">
                <h3><?= $place['title'] ?></h3>
                <p><?= $place['desc'] ?></p>
                <a href="view-details.php?location=<?= $place['id'] ?>&uid=<?= $userId ?>" class="detail-link">View Details →</a>
            </div>
        </div>
        <?php endforeach; ?>
    </main>

    <script>
        let currentFilters = { region: 'all', category: 'all' };

        function setFilter(btn) {
            const type = btn.dataset.type;
            const value = btn.dataset.value;

            // UI active state
            btn.parentElement.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            currentFilters[type] = value;
            filterLogic();
        }

        function filterLogic() {
            const search = document.getElementById('search').value.toLowerCase();
            const cards = document.querySelectorAll('.destination-card');

            cards.forEach(card => {
                const title = card.querySelector('h3').innerText.toLowerCase();
                const region = card.dataset.region;
                const cat = card.dataset.cat;
                const price = card.dataset.price;

                const matchRegion = (currentFilters.region === 'all' || region === currentFilters.region);
                // Matches if type is all OR if it matches category OR if it matches the price tag (Budget/Luxury)
                const matchType = (currentFilters.category === 'all' || cat === currentFilters.category || price === currentFilters.category);
                const matchSearch = title.includes(search);

                card.style.display = (matchRegion && matchType && matchSearch) ? "block" : "none";
            });
        }
    </script>
    <script src="script.js"></script>
</body>
</html>