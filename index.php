<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WanderLust | Explore the World</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div id="authModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            
            <div id="loginForm">
                <h2>Welcome Back</h2>
                <form class="contact-form" action="auth.php" method="POST">
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login" class="btn-primary">Login</button>
                </form>
                <p>Don't have an account? <a href="#" id="switchToSignup">Sign Up</a></p>
            </div>

            <div id="signupForm" style="display:none;">
                <h2>Create Account</h2>
                <form class="contact-form" action="auth.php" method="POST">
                    <input type="text" name="fullname" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="password" name="password" placeholder="Create Password" required>
                    <button type="submit" name="register" class="btn-primary">Register</button>
                </form>
                <p>Already have an account? <a href="#" id="switchToLogin">Login</a></p>
            </div>
        </div>
    </div>

    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Escape the Ordinary</h1>
            <p>Your journey to the world's most beautiful places starts here.</p>
            <a href="#destinations" class="btn-primary">View Destinations</a>
        </div>
    </section>

    <section id="destinations" class="section">
        <h2 class="title">Destinations</h2>
        <div class="grid">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1516483638261-f4dbaf036963?auto=format&fit=crop&w=500&q=80" alt="Italy">
                <div class="card-info">
                    <h3>Amalfi Coast, Italy</h3>
                    <p>Sun-drenched cliffs and sparkling seas.</p>
                    <a href="view-details.php?location=italy" class="detail-link">View Details →</a>
                </div>
            </div>
            <div class="card">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=500&q=80" alt="Yosemite">
                <div class="card-info">
                    <h3>Yosemite, USA</h3>
                    <p>Majestic granite cliffs and ancient giant sequoias.</p>
                    <a href="view-details.php?location=usa" class="detail-link">View Details →</a>
                </div>
            </div>
            <div class="card">
                <img src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?auto=format&fit=crop&w=500&q=80" alt="Kyoto">
                <div class="card-info">
                    <h3>Kyoto, Japan</h3>
                    <p>Classical temples, gardens, and imperial palaces.</p>
                    <a href="view-details.php?location=japan" class="detail-link">View Details →</a>
                </div>
            </div>
            <div class="card">
                <img src="https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?auto=format&fit=crop&w=500&q=80" alt="Santorini">
                <div class="card-info">
                    <h3>Santorini, Greece</h3>
                    <p>Iconic white-washed buildings and blue domes.</p>
                    <a href="view-details.php?location=greece" class="detail-link">View Details →</a>
                </div>
            </div>
            <div class="card">
                <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=500&q=80" alt="Bali">
                <div class="card-info">
                    <h3>Bali, Indonesia</h3>
                    <p>Tropical jungles, sacred temples, and spiritual retreats.</p>
                    <a href="view-details.php?location=bali" class="detail-link">View Details →</a>
                </div>
            </div>
            <div class="card">
                <img src="https://images.unsplash.com/photo-1504893524553-f8589826c5bf?auto=format&fit=crop&w=500&q=80" alt="Iceland">
                <div class="card-info">
                    <h3>Reykjavík, Iceland</h3>
                    <p>Dramatic landscapes of fire, ice, and Northern Lights.</p>
                    <a href="view-details.php?location=iceland" class="detail-link">View Details →</a>
                </div>
            </div>
        </div>
        
        <div class="view-all-container" style="text-align: center; margin-top: 40px;">
            <a href="all-destinations.php" class="btn-outline">View All Destinations</a>
        </div>
    </section>

    <section id="packages" class="section bg-light">
        <h2 class="title">Travel Packages</h2>
        <div class="package-container">
            <div class="p-card">
                <h3>Starter</h3>
                <div class="price">$499<span>/person</span></div>
                <ul>
                    <li>3 Days, 2 Nights</li>
                    <li>Standard Hotel</li>
                    <li>Guided City Tour</li>
                </ul>
                <a href="#contact" class="btn-outline">Book Starter</a>
            </div>
            <div class="p-card featured">
                <div class="badge">Popular</div>
                <h3>Adventure</h3>
                <div class="price">$1,299<span>/person</span></div>
                <ul>
                    <li>7 Days, 6 Nights</li>
                    <li>4-Star Resort</li>
                    <li>All Activities Included</li>
                </ul>
                <a href="#contact" class="btn-primary">Book Adventure</a>
            </div>
            <div class="p-card">
                <h3>Luxury</h3>
                <div class="price">$2,999<span>/person</span></div>
                <ul>
                    <li>10 Days, 9 Nights</li>
                    <li>Private Villa</li>
                    <li>Personal Concierge</li>
                </ul>
                <a href="#contact" class="btn-outline">Book Luxury</a>
            </div>
        </div>
    </section>

    <section id="gallery" class="section">
        <h2 class="title">Traveler Gallery</h2>
        <div class="gallery-grid">
            <div class="gallery-item"><img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=400&q=80" alt=""></div>
            <div class="gallery-item"><img src="https://images.unsplash.com/photo-1502791440351-599d123b76a6?auto=format&fit=crop&w=400&q=80" alt=""></div>
            <div class="gallery-item"><img src="https://images.unsplash.com/photo-1488085061387-422e29b40080?auto=format&fit=crop&w=400&q=80" alt=""></div>
            <div class="gallery-item"><img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=400&q=80" alt=""></div>
        </div>
         <div class="view-all-container" style="text-align: center; margin-top: 40px;">
            <a href="all-gallery.php" class="btn-outline">View All Gallery</a>
        </div>
    </section>
    

    <section id="contact" class="section contact-section">
    <div class="contact-box">
        <div class="contact-info">
            <h2 style="font-size: 2.5rem; margin-bottom: 15px;">Plan Your 2026 Escape</h2>
            <p style="font-size: 1.1rem; line-height: 1.6; opacity: 0.9;">
                Whether you're eye-ing a **Luxury Villa** in Amanpulo or a **Starter Pack** in Kyoto, our experts will handle the details.
            </p>
            <div style="margin-top: 30px;">
                <p><strong>📍 HQ:</strong> Bonifacio Global City, Taguig, PH</p>
                <p><strong>📧 Email:</strong> hello@wanderlust.com</p>
                <p><strong>📞 Phone:</strong> +63 917 123 4567</p>
            </div>
        </div>

        <form class="contact-form" action="process_inquiry.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                <select name="interest_type" required>
                    <option value="" disabled selected>Interest / Package</option>
                    <optgroup label="Travel Packages">
                        <option value="Starter Package">Starter Package ($499)</option>
                        <option value="Adventure Package">Adventure Package ($1,299)</option>
                        <option value="Luxury Package">Luxury Package ($2,999)</option>
                    </optgroup>
                    <optgroup label="General Inquiries">
                        <option value="Custom Itinerary">Custom Itinerary</option>
                        <option value="Group Booking">Group Booking</option>
                        <option value="Corporate Travel">Corporate Travel</option>
                    </optgroup>
                </select>

                <select name="destination" required>
                    <option value="" disabled selected>Preferred Destination</option>
                    <optgroup label="Philippines">
                        <option value="El Nido">El Nido, Palawan</option>
                        <option value="Siargao">Siargao Island</option>
                        <option value="Boracay">Boracay</option>
                        <option value="Batanes">Batanes</option>
                        <option value="Cebu">Kawasan Falls, Cebu</option>
                        <option value="Bohol">Chocolate Hills, Bohol</option>
                    </optgroup>
                    <optgroup label="International">
                        <option value="Kyoto">Kyoto, Japan</option>
                        <option value="Bali">Ubud, Bali</option>
                        <option value="Paris">Paris, France</option>
                        <option value="Swiss Alps">Swiss Alps</option>
                        <option value="Iceland">Blue Lagoon, Iceland</option>
                        <option value="Maldives">Male, Maldives</option>
                    </optgroup>
                </select>
            </div>

            <textarea name="message" placeholder="Tell us about your dream trip (e.g., specific dates, number of travelers, special requests)..." rows="5" required></textarea>
            
            <button type="submit" class="btn-primary" style="width: 100%; padding: 18px; font-size: 1.1rem; cursor: pointer;">
                Send Inquiry
            </button>
            <p style="font-size: 0.75rem; color: #999; text-align: center; margin-top: 10px;">
                We typically respond within 2-4 business hours.
            </p>
        </form>
    </div>
</section>

    <footer>
        <p>&copy; 2026 WanderLust Travel Co. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
    <script>
        // Toggle between Login and Signup
        document.getElementById('switchToSignup').onclick = function() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('signupForm').style.display = 'block';
        };
        document.getElementById('switchToLogin').onclick = function() {
            document.getElementById('signupForm').style.display = 'none';
            document.getElementById('loginForm').style.display = 'block';
        };

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target == document.getElementById('authModal')) {
                document.getElementById('authModal').style.display = "none";
            }
        };

        // Handle Status Alerts
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status === 'success') {
            Swal.fire('Success!', 'Registration complete. You can now log in!', 'success');
        } else if (status === 'loggedin') {
            Swal.fire('Logged In!', 'Welcome to your next adventure!', 'success');
        } else if (status === 'wrongpass') {
            Swal.fire('Error', 'Invalid email or password.', 'error');
        } else if (status === 'exists') {
            Swal.fire('Notice', 'That email is already registered.', 'warning');
        }
    </script>
</body>
</html>