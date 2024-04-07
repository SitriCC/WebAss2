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
    $blogs = $blogDAO->getBlogs();
    if($blogs){
        echo '<table class="form_showblog">';
        foreach($blogs as $postBlg){
            echo '<tr>';
            echo '<td><img src="' . $postBlg->getImageUrl() . '" alt="ImageUrl ' . $postBlg->getBlogId() . '" style="width:50%; height:40%;"></td>';
            echo '<td><tr><td><a href=\'edit_blog.php?blogID='. $postBlg->getBlogId() . '\'>' . $postBlg->getTitle() . '</a></td></tr><tr><td>' . $postBlg->getContent() . '</td></tr></td>';
            echo '<td>' . $postBlg->getCreatedTime() . '</td>';
            echo '</tr>';
        }
    }

    }catch(Exception $e){
        echo '<h3>Error on page.</h3>';
        echo '<p>' . $e->getMessage() . '</p>';
    }
    ?>
<!--</form>-->
<?php
include "footer.php"
?>
</body>
</html>
