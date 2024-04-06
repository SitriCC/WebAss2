<?php
require_once('./dao/userDAO.php');
// 检查是否通过GET方法传递了'action'参数
if (isset($_GET['action'])) {
    // 如果'action'的值为'edit'，则执行编辑员工信息的操作
    if ($_GET['action'] == "edit") {
        // 确保所有必要的字段都已传递和设置
        if (isset($_POST['userID']) &&
            isset($_POST['firstName']) &&
            isset($_POST['lastName']) &&
            isset($_POST['email'])){

            // 检查员工ID是否为数字，且名字和姓氏字段不为空
            if (is_numeric($_POST['userID']) &&
                $_POST['firstName'] != "" &&
                $_POST['lastName'] != "" &&
                $_POST['email'] != "") {

                // 实例化employeeDAO类，以便使用其方法
                $userDAO = new userDAO();
                // 调用editEmployee方法编辑员工信息，并获取操作结果
                $result = $userDAO->updateUser($_POST['userID'],
                    $_POST['firstName'], $_POST['lastName'], $_POST['email']);

                // 根据操作结果重定向到不同的页面
                if ($result > 0) {
                    // 如果编辑成功，重定向到编辑页面，并附带更新记录的数量和员工ID
                    header('Location:edit_user.php?recordsUpdated=' . $result . '&userID=' . $_POST['userID']);
                } else {
                    // 如果没有记录被更新，也重定向到编辑页面，但只附带员工ID
                    header('Location:edit_user.php?userID=' . $_POST['userID']);
                }
            } else {
                // 如果必要字段缺失，重定向到编辑页面，并提示缺失字段
                header('Location:edit_user.php?missingFields=true&userID=' . $_POST['userID']);
            }
        } else {
            // 如果表单没有正确提交，重定向到编辑页面，并提示错误
            header('Location:edit_user.php?error=true&userID=' . $_POST['userID']);
        }
    }

    // 如果'action'的值为'delete'，则执行删除员工信息的操作
    if ($_GET['action'] == "delete") {
        // 确保传递的员工ID存在且为数字
        if (isset($_GET['userID']) && is_numeric($_GET['userID'])) {
            // 实例化employeeDAO类
            $userDAO = new userDAO();
            // 调用deleteEmployee方法删除员工，并获取操作结果
            $success = $userDAO->deleteUser($_GET['userID']);
            // 根据操作结果重定向到不同的页面
            if ($success) {
                // 如果删除成功，重定向到主页，并附带删除成功的标志
                header('Location:user_manage.php?deleted=true');
            } else {
                // 如果删除失败，重定向到主页，并附带删除失败的标志
                header('Location:user_manage.php?deleted=false');
            }
        }
    }
}
?>
