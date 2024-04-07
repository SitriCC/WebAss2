<?php require_once('./dao/userDAO.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>UserDAO</title>
    <link rel="stylesheet" type="text/css" href="styles/userStyle.css">
</head>
<body>
<h1>UserDAO</h1>
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
?>
<form name="addUserForm" method="post" action="user_manage.php">
    <table>
        <tr>
            <td>UserID</td>
            <td>
                <input type="text" name="userID" id="userID" readonly
                       value="<?php echo $maxUserId; ?>"
            </td>
        </tr>
        <tr>
            <td>userName</td>
            <td>
                <input type="text" name="userName" id="userName">
                <?php
                if (isset($errorMessage['userNameError'])) {
                    echo '<span style=\'color:red\'>' . $errorMessage['userNameError'] . '</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>passWord</td>
            <td>
                <input type="password" name="passWord" id="passWord">
                <?php
                if (isset($errorMessage['passWordError'])) {
                    echo '<span style=\'color:red\'>' . $errorMessage['passWordError'] . '</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>email</td>
            <td>
                <input type="text" name="email" id="email">
                <?php
                if (isset($errorMessage['emailError'])) {
                    echo '<span style=\'color:red\'>' . $errorMessage['emailError'] . '</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="btnSubmit" id="btnSubmit" value="Add User"></td>
            <td><input type="reset" name="btnReset" id="btnReset" value="Reset"></td>
        </tr>
    </table>

    <?php
    $user = $userDAO->getUsers();
    if ($user) {
        echo '<table border=\'1\'>';
        echo '<tr><th>UserID</th><th>userName</th><th>passWord</th><th>Email</th><th>createdTime</th></tr>';
        foreach ($user as $users) {
            echo '<tr>';
            echo '<td><a href=\'edit_user.php?userID=' . $users->getUserId() . '\'>' . $users->getUserId() . '</a></td>';
            echo '<td>' . $users->getUserName() . '</td>';
            echo '<td>' . $users->getPassWord() . '</td>';
            echo '<td>' . $users->getEmail() . '</td>';
            echo '<td>' . $users->getCreatedTime() . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    } catch (Exception $e) {
        echo '<h3>Page Error</h3>';
        echo '<p>' . $e->getMessage() . '</p>';
    }
    ?>
</form>
</body>
</html>