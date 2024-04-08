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
        $blog = new blog(null, $_POST['title'], $_POST['content'], $_POST['imageUrl'], $currentTime, $currentTime);
        $addSuccess = $blogDAO->addBlog($blog);
        echo '<h3 id="success_post">' . $addSuccess . '</h3>';
    }
}
if(isset($_GET['deleted'])){
    if($_GET['deleted'] == true){
        echo '<h3 id="success_del">Blog Deleted Success</h3>';
    }
}

if(isset($_FILES['uploadimage'])) {
    $GLOBALS['imageUrl'] = $_FILES['uploadimage']['name'];
    $tempname = $_FILES['uploadimage']['tmp_name'];
    move_uploaded_file($tempname, "images/" . $GLOBALS['imageUrl']);
}
?>

<form name="addBlog" method="post" action="contact.php">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" placeholder="Blog Title...">
    <?php
    if(isset($errorMessages['titleError'])){
        echo '<span style=\'color:red\'>' . $errorMessages['titleError'] . '</span>';
    }
    ?></input>
    <label for="blogDate">Date:</label>
    <input type="text" id="blogDate" name="blogDate" value="<?php echo date('m/d/Y, h:i A'); ?>" readonly>

    <label for="imageUrl">Choose File:</label>
    <input type="file" id="imageUrl" name="imageUrl">

    <label for="Content">Content:</label>
    <textarea id="content" name="content" placeholder="Blog Paragraph..." rows="10" cols="10" >
           <?php
           if(isset($errorMessages['contentError'])){
               echo '<span style=\'color:red\'>' . $errorMessages['contentError'] . '</span>';
           }
           ?>
    </textarea>


    <input type="submit" class="form__btn" name="btnSubmit" id="btnSubmit" value="Post Blog">
    <input type="reset" class="form__btn" name="btnReset" id="btnReset" value="Reset">

</form>

<?php
include "footer.php";
?>
