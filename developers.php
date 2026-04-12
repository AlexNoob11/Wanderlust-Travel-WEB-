<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WanderLust | Explore the World</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Developer Section Specific Styles */
        .developers-section {
            padding: 100px 20px;
            background-color: #ffffff;
            text-align: center;
        }
        .dev-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .dev-card {
            background: #fff;
            border: 1px solid #f0f0f0;
            padding: 40px 20px;
            border-radius: 20px;
            width: 220px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        }
        .dev-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(255, 77, 77, 0.15);
            border-color: #ff4d4d;
        }
        .dev-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ff4d4d, #ff8e8e);
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 20px;
            box-shadow: 0 8px 15px rgba(255, 77, 77, 0.3);
        }
        .dev-card h3 {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #2d3436;
            line-height: 1.2;
        }
        .dev-card p {
            font-size: 0.85rem;
            color: #ff4d4d;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        @media (max-width: 768px) {
            .dev-card { width: 100%; max-width: 300px; }
        }
    </style>
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
    <section id="developers" class="developers-section">
        <div class="container">
            <h2 style="font-size: 2.8rem; color: #2d3436; margin-bottom: 15px;">Meet the Developers</h2>
            <p style="color: #636e72; max-width: 600px; margin: 0 auto 60px; line-height: 1.6;">
                The talented team of engineers and designers who brought the WanderLust travel platform to life.
            </p>

            <div class="dev-container">
                <div class="dev-card">
                    <div class="dev-avatar">ES</div>
                    <h3>Euziah Eunice Sinining</h3>
                    <p>Project Lead</p>
                </div>

                <div class="dev-card">
                    <div class="dev-avatar">MS</div>
                    <h3>Mariandel Sevilla</h3>
                    <p>UI/UX Designer</p>
                </div>

                <div class="dev-card">
                    <div class="dev-avatar">JL</div>
                    <h3>John August Laustica</h3>
                    <p>Backend Dev</p>
                </div>

                <div class="dev-card">
                    <div class="dev-avatar">EC</div>
                    <h3>Erika Cuanico</h3>
                    <p>Frontend Dev</p>
                </div>

                <div class="dev-card">
                    <div class="dev-avatar">AS</div>
                    <h3>Angela Sandoy</h3>
                    <p>Database Admin</p>
                </div>
            </div>
        </div>
    </section>

    <footer style="background: #2d3436; color: white; padding: 60px 20px; text-align: center;">
        <div style="margin-bottom: 20px;">
            <h2 style="color: #ff4d4d; margin-bottom: 10px;">WanderLust.</h2>
            <p style="opacity: 0.7; font-size: 0.9rem;">Making travel dreams come true since 2026.</p>
        </div>
        <hr style="border: 0; border-top: 1px solid rgba(255,255,255,0.1); margin: 30px auto; max-width: 800px;">
        <p style="font-size: 0.8rem; opacity: 0.6;">&copy; 2026 WanderLust Travel Co. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>