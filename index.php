<?php require_once('./dao/blogDAO.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Blogs</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js"></script>
</head>
<body>
<?php
include "header.php"
?>
<?php
try{
$blogDAO = new blogDAO();
$hasError = false;
$errorMessages = Array();

if(
    isset($_POST['title']) ||
    isset($_POST['content'])){
    if($_POST['title'] == ""){
        $errorMessages['titleError'] = "Please enter a Title.";
        $hasError = true;
    }

    if($_POST['content'] == ""){
        $errorMessages['contentError'] = "Please enter a Content.";
        $hasError = true;
    }

    if(!$hasError){
        $currentTime = date('Y-m-d H:i:s');
        $blog = new blog(null, $_POST['title'], $_POST['content'], $currentTime, $currentTime);
        $addSuccess = $blogDAO->addBlog($blog);
        echo '<h3 id="success_post">' . $addSuccess . '</h3>';
    }
}
if(isset($_GET['deleted'])){
    if($_GET['deleted'] == true){
        echo '<h3 id="success_del">Blog Deleted Success</h3>';
    }
}
?>
<form name="addBlog" method="post" action="index.php">
    <table>
        <tr>
            <td>Title:</td>
            <td><input name="title" type="text" id="title">
                <?php
                if(isset($errorMessages['titleError'])){
                    echo '<span style=\'color:red\'>' . $errorMessages['titleError'] . '</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Content:</td>
            <td>


                <textarea id="content" name="content" rows="20" cols="100">
                                   <?php
                                   if(isset($errorMessages['contentError'])){
                                       echo '<span style=\'color:red\'>' . $errorMessages['contentError'] . '</span>';
                                   }
                                   ?>
                         </textarea>

            </td>
        </tr>
        <tr class="form__box">
            <td><input type="submit" class="form__btn" name="btnSubmit" id="btnSubmit" value="Post Blog"></td>
            <td><input type="reset" class="form__btn" name="btnReset" id="btnReset" value="Reset"></td>
        </tr>
    </table>

    <?php
    $blogs = $blogDAO->getBlogs();
    if($blogs){
        echo '<table class="form_showblog">';
        echo '<tr><th>Title</th><th>Content</th><th>CreatedTime</th><th>UpdatedTime</th></tr>';
        foreach($blogs as $postBlg){
            echo '<tr>';
//            echo '<td><a href=\'edit_blog.php?blogID='. $postBlg->getBlogId() . '\'>' . $postBlg->getBlogId() . '</a></td>';
            echo '<td><a href=\'edit_blog.php?blogID='. $postBlg->getBlogId() . '\'>' . $postBlg->getTitle() . '</a></td>';
//            echo '<td>' . $postBlg->getTitle() . '</td>';
            echo '<td>' . $postBlg->getContent() . '</td>';
            echo '<td>' . $postBlg->getCreatedTime() . '</td>';
            echo '<td>' . $postBlg->getUpdatedTime() . '</td>';
            echo '</tr>';
        }
    }

    }catch(Exception $e){
        echo '<h3>Error on page.</h3>';
        echo '<p>' . $e->getMessage() . '</p>';
    }
    ?>
</form>
<?php
include "footer.php"
?>
</body>
</html>
