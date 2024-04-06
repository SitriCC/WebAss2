<?php require_once('./dao/userDAO.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>UserDAO</title>
</head>
<body>
<h1>UserDAO</h1>
<?php
try {
$userDAO = new UserDAO();
$hasError = false;
$errorMessage = array();
if (isset($_POST['userID']) ||
    isset($_POST['firstName']) ||
    isset($_POST['lastName']) ||
    isset($_POST['email']) ||
    isset($_POST['createdTime'])) {

        if (!is_numeric($_POST['userID']) || $_POST['userID'] == ""){
            $hasError = true;
            $errorMessage['userIdError'] = "user ID must be a number";
        }

    if ($_POST['firstName'] == "") {
        $errorMessage['firstNameError'] = "请输入名字";
        $hasError = true;
    }

    if ($_POST['lastName'] == "") {
        $errorMessage['lastNameError'] = "请输入姓";
        $hasError = true;
    }

    if ($_POST['email'] == "") {
        $errorMessage['emailError'] = "请输入邮箱";
        $hasError = true;
    }

    if ($_POST['createdTime'] == "") {
        $errorMessage['createdTimeError'] = "请输入创建时间";
        $hasError = true;
    }
    if (!$hasError) {
        $user = new user($_POST['userID'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['createdTime']);
        $addSuccess = $userDAO->addUser($user);
        echo '<h3>' . $addSuccess . '</h3>';
    }
}

if (isset($_GET['deleted'])) {
    if ($_GET['deleted'] == true) {
        echo '<h3>员工以删除</h3>';
    }
}
?>
<form name="addUserForm" method="post" action="index_user.php">
    <table>
        <tr>
            <td>UserID</td>
            <td>
                <input type="text" name="userID" id="userID">
                <?php
                if (isset($errorMessage['userIdError'])) {
                    echo '<span style=\'color:red\'>' . $errorMessage['userIdError'] . '</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>firstName</td>
            <td>
                <input type="text" name="firstName" id="firstName">
                <?php
                if (isset($errorMessage['firstNameError'])) {
                    echo '<span style=\'color:red\'>' . $errorMessage['firstNameError'] . '</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>lastName</td>
            <td>
                <input type="text" name="lastName" id="lastName">
                <?php
                if (isset($errorMessage['lastNameError'])) {
                    echo '<span style=\'color:red\'>' . $errorMessage['lastNameError'] . '</span>';
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
            <td>createdTime</td>
            <td>
                <input type="text" name="createdTime" id="createdTime">
                <?php
                if (isset($errorMessage['createdTimeError'])) {
                    echo '<span style=\'color:red\'>' . $errorMessage['createdTimeError'] . '</span>';
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
        echo '<tr><th>UserID</th><th>firstName</th><th>lastName</th><th>Email</th><th>createdTime</th></tr>';
        foreach ($user as $users) {
            echo '<tr>';
            echo '<td><a href=\'edit.php?userID=' . $users->getUserId() . '\'>' . $users->getUserId() . '</a></td>';
            echo '<td>' . $users->getFirstName() . '</td>';
            echo '<td>' . $users->getLastName() . '</td>';
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