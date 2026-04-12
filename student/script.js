document.addEventListener('DOMContentLoaded', () => {
    // --- Navbar & Mobile Menu Logic ---
    const menuToggle = document.querySelector('#mobile-menu');
    const navLinks = document.querySelector('.nav-links');

    const toggleMenu = () => {
        navLinks.classList.toggle('active');
        menuToggle.classList.toggle('is-active');
    };

    if (menuToggle) {
        menuToggle.addEventListener('click', toggleMenu);
    }

    // --- Authentication Modal Logic ---
    const modal = document.getElementById("authModal");
    const loginBtn = document.getElementById("loginBtn");
    const signupBtn = document.getElementById("signupBtn");
    const closeBtn = document.querySelector(".close-modal");

    const loginForm = document.getElementById("loginForm");
    const signupForm = document.getElementById("signupForm");
    const switchToSignup = document.getElementById("switchToSignup");
    const switchToLogin = document.getElementById("switchToLogin");

    // Helper function to close mobile menu when opening modal
    const prepareModal = () => {
        modal.style.display = "block";
        // If the mobile menu is open, close it so the modal isn't hidden behind it
        if (navLinks.classList.contains('active')) {
            toggleMenu();
        }
    };

    // Open Login
    if (loginBtn) {
        loginBtn.onclick = () => {
            prepareModal();
            loginForm.style.display = "block";
            signupForm.style.display = "none";
        };
    }

    // Open Sign Up
    if (signupBtn) {
        signupBtn.onclick = () => {
            prepareModal();
            loginForm.style.display = "none";
            signupForm.style.display = "block";
        };
    }

    // Close Modal
    if (closeBtn) {
        closeBtn.onclick = () => modal.style.display = "none";
    }

    // Close if user clicks outside the box
    window.onclick = (event) => {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

    // Switch between forms
    if (switchToSignup) {
        switchToSignup.onclick = (e) => {
            e.preventDefault(); // Prevent page jump
            loginForm.style.display = "none";
            signupForm.style.display = "block";
        };
    }

    if (switchToLogin) {
        switchToLogin.onclick = (e) => {
            e.preventDefault(); // Prevent page jump
            signupForm.style.display = "none";
            loginForm.style.display = "block";
        };
    }
});