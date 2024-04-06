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
        $result = $this->mysqli->query('SELECT b.blogID, b.title, b.content, b.createdTime, b.updatedTime FROM Blogs b');
        $arrBlog = Array();

        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new employee object, and add it to the array.
                $blog = new blog($row['blogID'], $row['title'], $row['content'], $row['createdTime'], $row['updatedTime']);
                $arrBlog[] = $blog;
            }
            $result->free();
            return $arrBlog;
        }
        $result->free();
        return false;
    }

    public function getBlogById($blogID){
        $query = 'SELECT b.blogID, b.title, b.content, b.createdTime, b.updatedTime FROM Blogs b WHERE blogID = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $blogID);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $temp = $result->fetch_assoc();
            $bl = new Blog($temp['blogID'], $temp['title'], $temp['content'], $temp['createdTime'], $temp['updatedTime']);
            $result->free();
            return $bl;
        }
        $result->free();
        return false;
    }


    public function addBlog($blog){
        if(!is_numeric($blog->getBlogID())){
            return 'BlogID must be a number.';
        }
        if(!$this->mysqli->connect_errno){
            $query = 'INSERT INTO Blogs (blogID, title, content,createdTime,updatedTime) VALUES (?,?,?,?,?)';
            $stmt = $this->mysqli->prepare($query);


            // Assign the results to variables
            $blogID = $blog->getBlogID();
            $title = $blog->getTitle();
            $content = $blog->getContent();
            $createdTime = $blog->getCreatedTime();
            $updatedTime = $blog->getUpdatedTime();

            // Bind the variables to the statement
            $stmt->bind_param('issss', $blogID, $title, $content, $createdTime, $updatedTime);
//            $stmt->bind_param('issss',
//                $blog->getBlogID(),
//                $blog->getTitle(),
//                $blog->getContent(),
//                $blog->getCreatedTime(),
//                $blog->getUpdatedTime()
//            );
            //Execute the statement
            $stmt->execute();

            if($stmt->error){
                return $stmt->error;
            } else {
//                return $blog->getTitle() . ' post successfully!';
                return $title . ' <br>post successfully!';
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