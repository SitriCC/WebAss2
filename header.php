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
        <?php if (isset($_SESSION['userName'])): ?>
            <p class="username">Welcome <?php echo htmlspecialchars($_SESSION['userName']); ?> !</p>
        <?php endif; ?>
        <nav class="blog-nav">
            <a href="index.php">Home</a>
            <?php if (isset($_SESSION['userName'])): ?>
                <a href="post_blog.php">Post</a>
            <?php else: ?>
                <a href="login.PHP?redirected=true">Post</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['userName'])): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.PHP">Login</a>
            <?php endif; ?>
        </nav>
    </div>

</header>