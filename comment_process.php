<?php
// comment_process.php
require_once('./dao/commentDAO.php');

if(isset($_POST['action']) && $_POST['action'] == "edit") {
    if (isset($_POST['blogID']) && isset($_POST['comment']) && is_numeric($_POST['blogID']) && $_POST['comment'] != "") {
        $commentDAO = new commentDAO();
        $result = $commentDAO->updateComment($_POST['blogID'], $_POST['comment']);
        if ($result) {
            header('Location: comments.php?blogID=' . $_POST['blogID']);
        } else {
            header('Location: comments.php?error=true&blogID=' . $_POST['blogID']);
        }
    } else {
        header('Location: comments.php?missingFields=true&blogID=' . $_POST['blogID']);
    }
} else {
    header('Location: login.php');
    exit;
}
?>
