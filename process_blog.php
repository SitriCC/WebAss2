<?php
require_once('./dao/blogDAO.php');
if(isset($_GET['action'])){
    if($_GET['action'] == "edit"){
        if(isset($_POST['blogID']) &&
                isset($_POST['title']) &&
                isset($_POST['content'])){
        
        if(is_numeric($_POST['blogID']) &&
                $_POST['title'] != "" &&
                $_POST['content'] != ""){
               
                $blogDAO = new blogDAO();
                $result = $blogDAO->editBlog($_POST['blogID'],
                        $_POST['title'], $_POST['content']);
                if($result > 0){
                    header('Location:edit_blog.php?recordsUpdated='.$result.'&blogID=' . $_POST['blogID']);
                } else {
                    header('Location:edit_blog.php?blogID=' . $_POST['blogID']);
                }
            } else {
                header('Location:edit_blog.php?missingFields=true&blogID=' . $_POST['blogID']);
            }
        } else {
            header('Location:edit_blog.php?error=true&blogID=' . $_POST['blogID']);
        }
    }
    
    if($_GET['action'] == "delete"){
        if(isset($_GET['blogID']) && is_numeric($_GET['blogID'])){
            $blogDAO = new blogDAO();
            $success = $blogDAO->deleteBlog($_GET['blogID']);
            echo $success;
            if($success){
                header('Location:index.php?deleted=true');
            } else {
                header('Location:index.php?deleted=false');
            }
        }
    }
}
?>
