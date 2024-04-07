<?php require_once ('./dao/userDAO.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <link rel="stylesheet" href="styles/create.css">
    <script src="scripts/create.js"></script>
</head>
<body>
<?php
include "header.php";
$userDAO = new UserDAO();
    $maxUserId = $userDAO->getMaxUserId();

?>
<div class="create-box">
    <form class="create-account" action="regist.php" method="post">
        <input type="hidden" name="userID" id="userID" readonly
               value="<?php echo $maxUserId; ?>">
        <label for="userName">UserName</label>
        <input type="text" name="userName" id="userName">
        <?php
        if (isset($errorMessage['userNameError'])) {
            echo '<span style=\'color:red\'>' . $errorMessage['userNameError'] . '</span>';
        }
        ?>

        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <?php
        if (isset($errorMessage['passWordError'])) {
            echo '<span style=\'color:red\'>' . $errorMessage['passWordError'] . '</span>';
        }
        ?>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <?php
        if (isset($errorMessage['emailError'])) {
            echo '<span style=\'color:red\'>' . $errorMessage['emailError'] . '</span>';
        }
        ?>


        <label for="password2">Re-Password</label>
        <input type="password" id="password2" name="password2">
        <button type="submit" class="create-btn">Create Account</button>
        <button type="button" class="main-page" onclick="window.location.href='index.php'">Back to main page</button>
    </form>
</div>
<?php
include "footer.php"
?>
</body>
</html>