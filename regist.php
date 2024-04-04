<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <link rel="stylesheet" href="styles/create.css">
    <script src="scripts/create.js"></script>
</head>
<body>
<div class="create-box">
    <form class="create-account" action="/submit-form-url" method="post">
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
        <label for="user-name">UserName</label>
        <input type="text" id="user-name" name="username">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <label for="password2">Re-Password</label>
        <input type="password" id="password2" name="password2">
        <button type="submit" class="create-btn">Create Account</button>
    </form>
</div>
</body>
</html>