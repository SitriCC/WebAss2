<?php
require_once('./dao/blogDAO.php');

if(!isset($_GET['blogID']) || !is_numeric($_GET['blogID'])){
    header("Location: index.php");
    exit;
} else{
    $blogDAO = new blogDAO();
    $blg = $blogDAO->getBlogById($_GET['blogID']);
    if($blg){
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Edit Current Blog -
                <?php echo $blg->getTitle() . ' '
                    . $blg->getContent();?>
            </title>
            <link rel="stylesheet" href="styles/index.css">
            <script type="text/javascript" src="scripts/script.js"></script>
        </head>
        <body>
        <?php
        include "header.php"
        ?>
        <?php
        if(isset($_GET['recordsUpdated'])){
            if(is_numeric($_GET['recordsUpdated'])){
                echo '<h3 id="success_edit" style="text-align: center"> '. $_GET['recordsUpdated']. ' BLOG UPDATED SUCEESSFULLY!.</h3>';
            }
        }
        if(isset($_GET['missingFields'])){
            if($_GET['missingFields']){
                echo '<h3 style="color:red;"> Please enter both title and content.</h3>';
            }
        }?>
        <h3>Edit Blog</h3>
        <form name="editBlog" method="post" action="process_blog.php?action=edit">
            <table>
                <tr>
                    <td>Blog ID:</td>
                    <td><input type="hidden" name="blogID" id="blogID"
                               value="<?php echo $blg->getBlogID();?>"><?php echo $blg->getBlogID();?></td>
                </tr>
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" id="title"
                               value="<?php echo $blg->getTitle();?>"></td>
                </tr>
                <tr>
                    <td>Content:</td>

                    <td>
                        <textarea id="content" name="content" rows="20" cols="100">
                            <?php echo $blg->getContent();?>
                         </textarea>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" class="form__btn" name="btnSubmit" id="btnSubmit" value="Update Blog"></td>
                    <td><input type="submit" class="form__btn" name="btnSubmit" id="btnSubmit" onclick="delBlog(document.getElementById('blogID').value)"
                               value="Delete Blog"></td>
                </tr>
            </table>
        </form>
        <?php
        include "footer.php"
        ?>
        </body>
        </html>
    <?php } else{
        header("Location: index.php");
        exit;
    }

} ?>