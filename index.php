<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Crew</title>
    <link rel="stylesheet" href="./assets/css/index.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>
    <nav class="nav-container">
        <div class="nav-content">
            <img src="./assets/images/logo.png" class="logo" alt="CampusCrew">
            <ul class="nav-list">
                <li>Home</li>
                <li>Events</li>
                <li>About Us</li>
                <li>Contact us</li>
            </ul>
        </div>
        <div class="auth-btn">
            <button class="login-btn">Log In</button>
            <button class="signup-btn">Sign Up</button>
        </div>
    </nav>

    <main class="hero-section">
        <!-- Hero Section 1 -->
        <div class="hero-container">
            <div class="hero-info">
                <h1>Unite. Create. Celebrate.</h1>
                <h3>Your One-Stop Hub for All College Events</h3>
                <h6>Stay updated, register, and participate in vibrant campus activities — all in one place.
                    From cultural fests to tech talks, manage and explore every event effortlessly.</h6>
            </div>
            <div class="hero-img">
                <img src="./assets/images/hero-img1.webp" alt="Campus Events">
            </div>
        </div>

        <!-- Hero Section 2 -->
        <div class="hero-container">
            <div class="hero-img">
                <img src="./assets/images/hero-img2.webp" alt="Organize Events Easily">
            </div>
            <div class="hero-info">
                <h1>Organize Events Effortlessly</h1>
                <h3>Empower your creativity with simple event tools</h3>
                <h6>Whether you're hosting a seminar, fest, or hackathon — set it up in minutes. Add details, invite
                    participants, manage registrations, and share real-time updates — all from your dashboard.</h6>
            </div>
        </div>

        <!-- Hero Section 3 -->
        <div class="hero-container">
            <div class="hero-info">
                <h1>Discover & Join Events That Matter</h1>
                <h3>Be a part of exciting college life</h3>
                <h6>Explore cultural fests, technical workshops, and campus seminars tailored just for you. Get event
                    details, register with one click, and never miss an opportunity to participate and grow.</h6>
            </div>
            <div class="hero-img">
                <img src="./assets/images/mix-img.png" alt="Live Leaderboards">
            </div>
        </div>
    </main>

    <!-- Add in <head> section -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <main class="features-section">
        <div class="features-container">
            <div class="features-box">
                <lottie-player src="./assets/animations/registration.json" background="transparent" speed="1"
                    style="width: 60px; height: 60px;" loop autoplay>
                </lottie-player>

                <h3>Easy Registration</h3>
                <h6>Register for your favorite events in a single click.</h6>
            </div>
            <div class="features-box">
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_ihw8myaw.json"
                    background="transparent" speed="1" style="width: 60px; height: 60px;" loop autoplay></lottie-player>
                <h3>Event Discovery</h3>
                <h6>Find fests, workshops, and talks happening around you.</h6>
            </div>
            <div class="features-box">
                <lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_jkh23txk.json"
                    background="transparent" speed="1" style="width: 60px; height: 60px;" loop autoplay></lottie-player>
                <h3>Digital Certificates</h3>
                <h6>Get instant downloadable e-certificates post-event.</h6>
            </div>
        </div>

        <div class="features-container">
            <div class="features-box">
                <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_Cc8Bpg.json" background="transparent"
                    speed="1" style="width: 60px; height: 60px;" loop autoplay></lottie-player>
                <h3>Team Participation</h3>
                <h6>Create or join teams and participate together.</h6>
            </div>
            <div class="features-box">
                <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_e3qzya1a.json"
                    background="transparent" speed="1" style="width: 60px; height: 60px;" loop autoplay></lottie-player>
                <h3>Organizer Tools</h3>
                <h6>Host and manage events with our powerful dashboard.</h6>
            </div>
            <div class="features-box">
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_mznpnr.json" background="transparent"
                    speed="1" style="width: 60px; height: 60px;" loop autoplay></lottie-player>
                <h3>Instant Notifications</h3>
                <h6>Stay informed with updates and reminders in real-time.</h6>
            </div>
        </div>
    </main>

</body>

</html>