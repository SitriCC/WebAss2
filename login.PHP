<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
    <script src="scripts/script.js"></script>
</head>
<body>

<div class="login">
    <div class="log-text">
        <h2>Login to High Blog</h2>
        <label for="user-name">User Name</label>
        <input id="user-name" type="text">
        <label for="user-password">Pass Word</label>
        <input id="user-password" type="password">
        <button type="submit" id="submit">Login</button>
        <a href="regist.php" class="create">Register</a>
    </div>
</div>



<?php
include "footer.php"
?>
</body>
</html>