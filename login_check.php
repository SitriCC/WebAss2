<?php
require_once('./dao/userDAO.php');
require_once('header.php');
$userDAO = new userDAO();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];

    if ($userDAO->authenticateUser($userName, $passWord)) {
        session_start();
        $_SESSION['userName'] = $userName;
        header('Location: index.php');
        exit();
    } else {
        header('Location: login.php?error=Invalid credentials');
        exit();
    }
}
?>
