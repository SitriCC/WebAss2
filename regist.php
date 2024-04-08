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
try {
    $userDAO = new UserDAO();
    $hasError = false;
    $errorMessage = array();

    if (isset($_POST['userID']) ||
        isset($_POST['userName']) ||
        isset($_POST['passWord']) ||
        isset($_POST['email'])) {
        if (!is_numeric($_POST['userID']) || $_POST['userID'] == ""){
            $hasError = true;
            $errorMessage['userIdError'] = "user ID must be a number";
        }
        if ($_POST['userName'] == "") {
            $errorMessage['userNameError'] = "Please enter a name";
            $hasError = true;
        }
        if ($_POST['password'] == "") {
            $errorMessage['passWordError'] = "Please enter last name";
            $hasError = true;
        }
        if ($_POST['email'] == "") {
            $errorMessage['emailError'] = "Please enter your e-mail address";
            $hasError = true;
        }
        if (!$hasError) {
            $user = new user($_POST['userID'], $_POST['userName'], $_POST['password'], $_POST['email']);
            $addSuccess = $userDAO->addUser($user);
            echo '<h3>' . $addSuccess . '</h3>';
        }
    }
    $maxUserId = $userDAO->getMaxUserId();

}catch(Exception $e){
    echo '<h3>Error on page.</h3>';
    echo '<p>' . $e->getMessage() . '</p>';
}

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
        <label for="password2">Re-Password</label>
        <input type="password" id="password2" name="password2">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <?php
        if (isset($errorMessage['emailError'])) {
            echo '<span style=\'color:red\'>' . $errorMessage['emailError'] . '</span>';
        }
        ?>

        <button type="submit" class="create-btn">Create Account</button>
        <button type="button" class="main-page" onclick="window.location.href='index.php'">Back to main page</button>
    </form>
</div>
<?php
include "footer.php"
?>
</body>
</html>