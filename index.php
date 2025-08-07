<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Campus Crew</title>
    <link rel="stylesheet" href="./assets/css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
</head>

<body>
   <?php 
    include 'includes/navbar.php';
   ?>

    <main class="hero-section">
        <div class="hero-container">
            <div class="hero-info">
                <h1>Unite. Create. Celebrate.</h1>
                <h3>Your One-Stop Hub for All College Events</h3>
                <h6>Stay updated, register, and participate in vibrant campus activities — all in one place. From
                    cultural fests to tech talks, manage and explore every event effortlessly.</h6>
            </div>
            <div class="hero-img">
                <img src="./assets/images/hero-img1.webp" alt="Campus Events" />
            </div>
        </div>

        <div class="hero-container">
            <div class="hero-img">
                <img src="./assets/images/hero-img2.webp" alt="Organize Events Easily" />
            </div>
            <div class="hero-info">
                <h1>Organize Events Effortlessly</h1>
                <h3>Empower your creativity with simple event tools</h3>
                <h6>Whether you're hosting a seminar, fest, or hackathon — set it up in minutes. Add details, invite
                    participants, manage registrations, and share real-time updates — all from your dashboard.</h6>
            </div>
        </div>

        <div class="hero-container">
            <div class="hero-info">
                <h1>Discover & Join Events That Matter</h1>
                <h3>Be a part of exciting college life</h3>
                <h6>Explore cultural fests, technical workshops, and campus seminars tailored just for you. Get event
                    details, register with one click, and never miss an opportunity to participate and grow.</h6>
            </div>
            <div class="hero-img">
                <img src="./assets/images/mix-img.png" alt="Event Participation" />
            </div>
        </div>
    </main>

    <main class="features-section">
        <div class="features-container">
            <div class="features-box">
                <dotlottie-wc src="https://lottie.host/6f8540f0-abf1-4f96-9a91-b36bcc02f09c/UbxSbDJGoZ.lottie"
                    class="features-icon" speed="1" autoplay loop></dotlottie-wc>
                <h3>Easy Registration</h3>
                <h6>Register for your favorite events in a single click.</h6>
            </div>
            <div class="features-box">
                <dotlottie-wc src="https://lottie.host/c3397a4a-3e20-425d-a622-d97542a92494/BkTc9zLNRy.lottie"
                    class="features-icon" speed="1" autoplay loop></dotlottie-wc>
                <h3>Event Discovery</h3>
                <h6>Find fests, workshops, and talks happening around you.</h6>
            </div>
            <div class="features-box">
                <dotlottie-wc src="https://lottie.host/625a5482-14f9-4a74-adef-81db7f963725/74Xs6FIfxh.lottie"
                    class="features-icon" speed="1" autoplay loop></dotlottie-wc>
                <h3>Explore Smarter</h3>
                <h6>Narrow your search by event type, date, or location, and never miss the events you care about.</h6>
            </div>
        </div>

        <div class="features-container">
            <div class="features-box">
                <dotlottie-wc src="https://lottie.host/c32cbbe9-ecc3-4b13-bbf0-57498a83cfa0/AFBvOjHNTt.lottie"
                    class="features-icon" speed="1" autoplay loop></dotlottie-wc>
                <h3> Full Event Itinerary</h3>
                <h6> Know what to expect with detailed schedules, speakers, and sessions.</h6>
            </div>
            <div class="features-box">
                <dotlottie-wc src="https://lottie.host/89c0db24-6202-445d-8042-bfa7446b4425/bYyqWCdiMR.lottie"
                    class="features-icon" speed="1" autoplay loop></dotlottie-wc>
                <h3>Organizer Tools</h3>
                <h6>Host and manage events with our powerful dashboard.</h6>
            </div>
            <div class="features-box">
                <dotlottie-wc src="https://lottie.host/d3e6fcf7-5d8f-48f9-bed6-030eb4ab7345/PDD7ixgegK.lottie"
                    class="features-icon" speed="1" autoplay loop></dotlottie-wc>
                <h3>Instant Notifications</h3>
                <h6>Stay informed with updates and reminders in real-time.</h6>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <img src="./assets/images/logo.png" alt="Campus Crew Logo" class="footer-logo" />
                <p>Your Campus, Your Events, Your Way.</p>
            </div>

            <div class="footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h4>Contact Us</h4>
                <p>Email: campuscrew@gmail.com</p>
                <p>Phone: +91 98765 43210</p>
            </div>

            <div class="footer-social">
                <h4>Follow Us</h4>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Campus Crew. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>