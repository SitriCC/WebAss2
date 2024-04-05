<?php require_once('./dao/blogDAO.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Blogs</title>
</head>
<body>
<h1>Blogs</h1>
<?php
try{
$blogDAO = new blogDAO();
//Tracks errors with the form fields
$hasError = false;
//Array for our error messages
$errorMessages = Array();

if(isset($_POST['blogID']) ||
    isset($_POST['title']) ||
    isset($_POST['title'])){

    //We know they are set, so let's check for values
    //EmployeeID should be a number
    if(!is_numeric($_POST['blogID']) || $_POST['blogID'] == ""){
        $hasError = true;
        $errorMessages['blogIDError'] = 'Please enter a numeric Employee ID.';
    }

    if($_POST['title'] == ""){
        $errorMessages['titleError'] = "Please enter a first name.";
        $hasError = true;
    }

    if($_POST['title'] == ""){
        $errorMessages['titleError'] = "Please enter a last name.";
        $hasError = true;
    }

    if(!$hasError){
        $blog = new blog($_POST['blogID'], $_POST['title'], $_POST['title']);
        $addSuccess = $blogDAO->addBlog($blog);
        echo '<h3>' . $addSuccess . '</h3>';
    }
}

//The code that deletes a user directs them
//back to this page with a parameter in the
//URL called 'deleted'. If this is set,
//display a confirmation message.
if(isset($_GET['deleted'])){
    if($_GET['deleted'] == true){
        echo '<h3>blog Deleted</h3>';
    }
}


?>
<form name="addEmployee" method="post" action="index.php">
    <table>
        <tr>
            <td>Employee ID:</td>
            <td><input type="text" name="blogID" id="blogID">
                <?php
                //If there was an error with the blogID field, display the message
                if(isset($errorMessages['blogIDError'])){
                    echo '<span style=\'color:red\'>' . $errorMessages['blogIDError'] . '</span>';
                }
                ?></td>
        </tr>
        <tr>
            <td>First Name:</td>
            <td><input name="title" type="text" id="title">
                <?php
                //If there was an error with the title field, display the message
                if(isset($errorMessages['titleError'])){
                    echo '<span style=\'color:red\'>' . $errorMessages['titleError'] . '</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="text" name="title" id="title">
                <?php
                //If there was an error with the title field, display the message
                if(isset($errorMessages['titleError'])){
                    echo '<span style=\'color:red\'>' . $errorMessages['titleError'] . '</span>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="btnSubmit" id="btnSubmit" value="Add Employee"></td>
            <td><input type="reset" name="btnReset" id="btnReset" value="Reset"></td>
        </tr>
    </table>

    <?php
    $blogs = $blogDAO->getBlogs();
    if($blogs){
        //We only want to output the table if we have employees.
        //If there are none, this code will not run.
        echo '<table border=\'1\'>';
        echo '<tr><th>blog ID</th><th>Title</th><th>Content</th></tr>';
        foreach($blogs as $postBlg){
            echo '<tr>';
            echo '<td><a href=\'edit_postbolg.php?blogID='.
                $postBlg->getBlogId() . '\'>' .
                $postBlg->getBlogId() . '</a></td>';
            echo '<td>' . $postBlg->getTitle() . '</td>';
            echo '<td>' . $postBlg->getContent() . '</td>';
            echo '</tr>';
        }
    }

    }catch(Exception $e){
        //If there were any database connection/sql issues,
        //an error message will be displayed to the user.
        echo '<h3>Error on page.</h3>';
        echo '<p>' . $e->getMessage() . '</p>';
    }
    ?>
</form>
</body>
</html>
