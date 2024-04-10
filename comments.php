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
        <h3>Edit Comment</h3>

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
        <form name="editComment" method="post" action="comment_process.php">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="blogID" value="<?php echo $blogID; ?>">
            <?php
            echo '<img src="' . $blog->getImageUrl() . '" alt="ImageUrl ' . $blog->getBlogId() . '" style="width:50%; height:20%; padding-left:50px; padding-right: 50px; padding-bottom:2px; padding-top:20px; text-align: center;">'
            ?>

            <p>Comments:</p>
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
