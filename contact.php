<?php
include "header.php";
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Blogs</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js"></script>
</head>

<section class="contact-section">
    <div class="container">
        <h2>Contact Us</h2>
        <p>If you have any questions or just want to get in touch, use the form below!</p>
        <form action="process_contact.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Send Message">
            </div>
        </form>
    </div>
</section>

<?php
include "footer.php";
?>
