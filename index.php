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
            echo '<tr style="text-align: center;">';
            echo '<td><img src="' . $postBlg->getImageUrl() . '" alt="ImageUrl ' . $postBlg->getBlogId() . '" style="width:50%; height:20%; padding-left:50px; padding-right: 50px; padding-bottom:2px; padding-top:20px; text-align: center;"></td>';
            echo '<td><tr><td style="text-align: center;"><a href=\'edit_blog.php?blogID='. $postBlg->getBlogId() . '\'>' . $postBlg->getTitle() . '</a></td></tr><tr><td style="padding-left:25%; padding-right: 25%; text-align: left;">' . $postBlg->getContent() . '</td></tr></td>';
            echo '<td style="text-align: center;">' . $postBlg->getCreatedTime() . '</td>';
            echo '</tr>';
        }
    }

    }catch(Exception $e){
        echo '<h3>Error on page.</h3>';
        echo '<p>' . $e->getMessage() . '</p>';
    }
    ?>
<?php
include "footer.php"
?>
</body>
</html>
