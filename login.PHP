<?php require_once('./dao/userDAO.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
<?php
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
        $errorMessage['userNameError'] = "请输入名字";
        $hasError = true;
    }
    if ($_POST['passWord'] == "") {
        $errorMessage['passWordError'] = "请输入姓";
        $hasError = true;
    }
    if ($_POST['email'] == "") {
        $errorMessage['emailError'] = "请输入邮箱";
        $hasError = true;
    }
    if (!$hasError) {
        $user = new user($_POST['userID'], $_POST['userName'], $_POST['passWord'], $_POST['email']);
        $addSuccess = $userDAO->addUser($user);
        echo '<h3>' . $addSuccess . '</h3>';
    }
}
if (isset($_GET['deleted'])) {
    if ($_GET['deleted'] == true) {
        echo '<h3>员工以删除</h3>';
    }
}
$userDAO = new UserDAO();
$maxUserId = $userDAO->getMaxUserId();

}catch(Exception $e){
echo '<h3>Error on page.</h3>';
echo '<p>' . $e->getMessage() . '</p>';
}
?>
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


</form>
<?php
include "footer.php"
?>
</body>
</html>