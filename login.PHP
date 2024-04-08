<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
    <script src="scripts/script.js"></script>
</head>
<body>
<?php include "header.php"; ?>
<div class="login">
    <div class="log-text">
        <?php if (isset($_GET['redirected']) && $_GET['redirected'] == 'true') {
            echo '<span style="color: red">You must be logged in to post. Please log in.</span>';
        }
        ?>
        <h2>User Login</h2>
        <form action="login_check.php" method="post">
            <label for="user-name">User Name</label>
            <input id="user-name" name="userName" type="text" required>
            <label for="user-password">Password</label>
            <input id="user-password" name="passWord" type="password" required>
            <button type="submit" id="submit">Login</button>
        </form>
        <a href="regist.php" class="create">Register</a>
    </div>
</div>


<?php
include "footer.php"
?>
</body>
</html>