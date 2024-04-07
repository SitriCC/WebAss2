<?php
require_once('abstractDAO.php');
require_once('./model/blog.php');
class blogDAO extends abstractDAO{
    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }

    public function getBlogs(){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT b.blogID, b.title, b.content, b.imageUrl, b.createdTime, b.updatedTime FROM Blogs b');
        $arrBlog = Array();

        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new employee object, and add it to the array.
                $blog = new blog($row['blogID'], $row['title'], $row['content'], $row['imageUrl'], $row['createdTime'], $row['updatedTime']);
                $arrBlog[] = $blog;
            }
            $result->free();
            return $arrBlog;
        }
        $result->free();
        return false;
    }

    public function getBlogById($blogID){
        $query = 'SELECT b.blogID, b.title, b.content, b.imageUrl, b.createdTime, b.updatedTime FROM Blogs b WHERE blogID = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $blogID);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $temp = $result->fetch_assoc();
            $bl = new Blog($temp['blogID'], $temp['title'], $temp['content'], $temp['imageUrl'], $temp['createdTime'], $temp['updatedTime']);
            $result->free();
            return $bl;
        }
        $result->free();
        return false;
    }


    public function addBlog($blog){
        if(!$this->mysqli->connect_errno){
            $query = 'INSERT INTO Blogs (title, content,imageUrl,createdTime,updatedTime) VALUES (?,?,?,?,?)';
            $stmt = $this->mysqli->prepare($query);
            $title = $blog->getTitle();
            $content = $blog->getContent();
            $imageUrl = $blog->getImageUrl();
            $createdTime = $blog->getCreatedTime();
            $updatedTime = $blog->getUpdatedTime();
            $stmt->bind_param('sssss',  $title, $content,$imageUrl, $createdTime, $updatedTime);
            //Execute the statement
            $stmt->execute();
            if($stmt->error){
                return $stmt->error;
            } else {
                return '[' . $title . ']' . ' <br>POST SUCCESSFULLY!';
            }
        } else {
            return 'Could not connect to Database.';
        }
    }


    public function deleteBlog($blogID){
        if(!$this->mysqli->connect_errno){
            $query = 'DELETE FROM Blogs WHERE blogID = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $blogID);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function editBlog($blogID, $title, $content){
        if(!$this->mysqli->connect_errno){
            $query = 'UPDATE Blogs SET title = ?, content = ? WHERE blogID = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('ssi', $title, $content, $blogID);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return $stmt->affected_rows;
            }
        } else {
            return false;
        }
    }


}