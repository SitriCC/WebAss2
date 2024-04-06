<?php
require_once('./dao/userDAO.php');

if (!isset($_GET['userID']) || !is_numeric($_GET['userID'])) {
    header("Location: index_user.php");
    exit;
} else {
    $userDAO = new UserDAO();
    $user = $userDAO->getUserById($_GET['userID']);
    if ($user) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document - <?php echo $user->getFirstName() . ' ' . $user->getLastName(); ?></title>
            <script type="text/javascript" src="scripts/script.js"></script>
        </head>
        <body>
        <?php
        if(isset($_GET['recordsUpdated'])){
            if(is_numeric($_GET['recordsUpdated'])){
                echo '<h3 id="success_edit"> '. $_GET['recordsUpdated']. ' Blog Record Updated.</h3>';
            }
        }
        if(isset($_GET['missingFields'])){
            if($_GET['missingFields']){
                echo '<h3 style="color:red;"> Please enter both title and content.</h3>';
            }
        }?>
        <h3>编辑员工</h3>
        <form  name="editUser" method="post" action="process_user.php?action=edit">
            <table>
                <tr>
                    <td>UserID</td>
                    <td>
                        <input type="hidden" name="userID" id="userID"
                               value="<?php echo $user->getUserID(); ?>"><?php echo $user->getUserID() ?>
                    </td>
                </tr>
                <tr>
                    <td>firstName</td>
                    <td>
                        <input type="text" name="firstName" id="firstName" value="<?php echo $user->getFirstName() ?>">
                    </td>
                </tr>
                <tr>
                    <td>lastName</td>
                    <td>
                        <input type="text" name="lastName" id="lastName" value="<?php echo $user->getLastName() ?>">
                    </td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>
                        <input type="text" name="email" id="email" value="<?php echo $user->getEmail() ?>">
                    </td>
                </tr>
                <tr>
                    <td>createdTime</td>
                    <td>
                        <input type="text" name="createdTime" id="createdTime"
                               value="<?php echo $user->getCreatedTime() ?>">
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="btnSubmit" id="btnSubmit" value="Update User"></td>
                    <td><button onclick="delUser(document.getElementById('userID').value)" id="btnDelete" name="btnDelete">Delete</td>
                </tr>
            </table>
        </form>
        <h4><a href="index_user.php">返回主页</a></h4>
        </body>
        </html>
    <?php } else {
        header("Location: index_user.php");
        exit;
    }

} ?>