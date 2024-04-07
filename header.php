<?php
// 确保会话已经开始
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
            <a href="home.php">Home</a>
            <a href="showblog.php">About</a>
            <a href="contact.php">Contact</a>
            <?php if (isset($_SESSION['userName'])): ?>
                <!-- 用户已登录，显示用户名 -->
                <a href="index.php"><?php echo htmlspecialchars($_SESSION['userName']); ?></a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <!-- 用户未登录，显示登录链接 -->
                <a href="login.php">Login</a>
            <?php endif; ?>
        </nav>
    </div>
</header>