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
        $imageUrl = '';
        $blog = new blog(null, $_POST['title'], $_POST['content'], $imageUrl, $currentTime, $currentTime);
        $addSuccess = $blogDAO->addBlog($blog);
        echo '<h3 id="success_post">' . $addSuccess . '</h3>';
    }
}

$uploadSuccess = false;
$fileName = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if file was uploaded without errors
    if (isset($_FILES['imageUrl']) && $_FILES['imageUrl']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/images/';
        $fileName = basename($_FILES['imageUrl']['name']);
        $uploadFile = $uploadDir . $fileName;

        // Move the file from temporary location to the target directory
        if (move_uploaded_file($_FILES['imageUrl']['tmp_name'], $uploadFile)) {
            $uploadSuccess = true;
            if ($uploadSuccess) {
                alert('File "<?php echo htmlspecialchars($imageUrl); ?>" uploaded successfully.');
            }
        }
    }
}
if(isset($_GET['deleted'])){
    if($_GET['deleted'] == true){
        echo '<h3 id="success_del">Blog Deleted Success</h3>';
    }
}
?>
    <script type="text/javascript">
        // If a file was uploaded, alert the user with the file name
        <?php if ($uploadSuccess): ?>
        alert('File "<?php echo $fileName; ?>" uploaded successfully.');
        <?php endif; ?>
    </script>
<form name="addBlog" method="post" action="post_blog.php">
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
            <td><label for="imageUrl">Choose File:</label></td>
            <td><input type="file" id="imageUrl" name="imageUrl"></td>
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
//    if($blogs){
//        echo '<table class="form_showblog">';
//        echo '<tr><th>ImageID</th><th>Title</th><th>Content</th><th>CreatedTime</th><th>UpdatedTime</th></tr>';
//        foreach($blogs as $postBlg){
//            echo '<tr>';
//            echo '<td><img src="' . $postBlg->getImageUrl() . '" alt="ImageUrl ' . $postBlg->getBlogId() . '" style="width:500px; height:400px;"></td>';
//            echo '<td><a href=\'edit_blog.php?blogID='. $postBlg->getBlogId() . '\'>' . $postBlg->getTitle() . '</a></td>';
//            echo '<td>' . $postBlg->getContent() . '</td>';
//            echo '<td>' . $postBlg->getCreatedTime() . '</td>';
//            echo '<td>' . $postBlg->getUpdatedTime() . '</td>';
//            echo '</tr>';
//        }
//    }

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
