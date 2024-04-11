<?php require_once('./dao/blogDAO.php');
?>
<!DOCTYPE html>
<html lang="en">
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
try {
    // Instantiate a new blogDAO object
    $blogDAO = new blogDAO();
    $blogs = $blogDAO->getBlogs();
    if ($blogs) {
        // Start a table to display the blogs
        echo '<table class="form_showblog">';
        foreach ($blogs as $postBlg) {
            echo '<tr style="text-align: center;">';
            echo '<td><img src="' . $postBlg->getImageUrl() . '" alt="ImageUrl: ' . $postBlg->getImageUrl() . '" style="width:50%; height:20%; padding-left:50px; padding-right: 50px; padding-bottom:2px; padding-top:20px; text-align: center;"></td>';
            if (isset($_SESSION["userName"])):
                echo '<td><tr><td style="text-align: center; font-size: 30px; font-weight: bold;">        
                    <a href=\'edit_blog.php?blogID=' . $postBlg->getBlogId() . '\'>' . $postBlg->getTitle() . '</a>
                    <a href=\'comments.php?blogID=' . $postBlg->getBlogId() . '\'>View Comments</a> 
                    </td></td></tr><tr><td style="padding-left:25%; padding-right: 25%; text-align: left;">' . $postBlg->getContent() . '</td></tr></td>';
            else:
                echo '<td><tr><td style="text-align: center; font-size: 30px; font-weight: bold;">
                      <a href="login.PHP?redirected=true">' . $postBlg->getTitle() . '</a><a href="login.PHP?redirected=true">View Comments</a>
                      </td></td></tr><tr><td style="padding-left:25%; padding-right: 25%; text-align: left;">' . $postBlg->getContent() . '</td></tr></td>';
            endif;
                echo '<td style="text-align: center;">' . '<span>CreatedTime: </span>' . $postBlg->getCreatedTime() . '</td>';
                echo '</tr>';
            }
    }

} catch (Exception $e) {
    echo '<h3>Error on page.</h3>';
    echo '<p>' . $e->getMessage() . '</p>';
}
?>
<?php
// Include the footer section of the page
include "footer.php"
?>
</body>
</html>
