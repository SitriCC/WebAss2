<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<head>
    <meta charset="UTF-8">
    <title>Blog Platform</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<header class="blog-header">
    <div class="container">
        <h1>Blog Platform</h1>
        <nav class="blog-nav">
            <a href="index.php">Home</a>
            <a href="post_blog.php">Post</a>
            <?php if (isset($_SESSION['userName'])): ?>
                <a href="index.php"><?php echo htmlspecialchars($_SESSION['userName']); ?></a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </nav>
    </div>
</header>