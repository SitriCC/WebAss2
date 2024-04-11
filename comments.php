<?php
require_once('./dao/commentDAO.php');
if (!isset($_GET['blogID']) || !is_numeric($_GET['blogID'])) {
    header("Location: login.php");
    exit;
} else {
    $commentDAO = new commentDAO();
    $blogID = $_GET['blogID'];
    $blog = $commentDAO->getBlogById($blogID);

    if ($blog) {

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Edit Comment for Blog - </title>
            <link rel="stylesheet" href="styles/cmt.css">
        </head>
        <body>
        <?php include "header.php"; ?>
        <?php
        if (isset($_GET['error'])) {
            echo "<p>Error updating the comment.</p>";
        }

        if (isset($_GET['missingFields']) && $_GET['missingFields']) {
            echo "<p>Please fill in all required fields.</p>";
        }
        ?>
        <h3>Comment Page</h3>

        <div class="image-comment-container">
            <!-- Image Container -->
            <div class="img-container">
                <img src="<?php echo $blog->getImageUrl(); ?>" alt="Blog Image">
            </div>

            <!-- Comments -->
            <div class="comment-section">
                <?php
                $commentsString = $commentDAO->getComment($blogID);
                if (!empty($commentsString)) {
                    $commentsArray = explode("||", $commentsString);
                    echo '<ul>';
                    foreach ($commentsArray as $comment) {
                        echo '<li>' . htmlspecialchars($comment) . '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo "<p>No comments yet.</p>";
                }
                ?>
            </div>
        </div>
        <form name="editComment" method="post" action="comment_process.php">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="blogID" value="<?php echo $blogID; ?>">
            <h3>Content</h3>
            <p class="content"><?php echo $blog->getContent()?></p>
            <h3>Comments:</h3>
            <textarea name="comment" rows="10" cols="100"></textarea>
            <br>
            <input type="submit" value="Update Comments">
        </form>

        <?php include "footer.php"; ?>
        </body>
        </html>
        <?php
    } else {
        echo "<p>Blog not found.</p>";

    }
}
?>
