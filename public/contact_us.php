<!-- contact.php -->
<?php include '../includes/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us - Campus Crew</title>
  <link rel="stylesheet" href="../assets/css/contact_us.css" />
  <link rel="stylesheet" href="../assets/css/index.css" />
</head>
<body>

  <section class="contact-section">
    <div class="contact-container">
      <h1>Contact Us</h1>
      <p>Got a question or feedback? We'd love to hear from you!</p>

      <div class="contact-content">
        <!-- Contact Form -->
        <form action="#" method="POST" class="contact-form">
          <input type="text" name="name" placeholder="Your Name" required />
          <input type="email" name="email" placeholder="Your Email" required />
          <input type="text" name="subject" placeholder="Subject" required />
          <textarea name="message" placeholder="Your Message" rows="6" required></textarea>
          <button type="submit">Send Message</button>
        </form>

        <!-- Contact Info -->
        <div class="contact-info">
          <h3>Reach Us</h3>
          <p><strong>Email:</strong> support@campuscrew.edu</p>
          <p><strong>Phone:</strong> +91 98765 43210</p>
          <p><strong>Address:</strong> Campus Crew HQ, College Road, India</p>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
