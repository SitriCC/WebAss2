<?php
require_once('abstractDAO.php');
require_once('./model/blog.php');

class commentDAO extends abstractDAO{

    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }

    public function updateComment($blogID, $comment): bool
    {
        $currentComments = $this->getComment($blogID);
        if (!empty($currentComments)){
            $comment = $currentComments . '||' . $comment;
        }
        if(!$this->mysqli->connect_errno){
            $query = 'UPDATE Blogs SET comment = ? WHERE blogID = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('si', $comment, $blogID);
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


    public function getBlogById($blogID){
        $query = 'SELECT b.blogID, b.title, b.content, b.imageUrl, b.comment FROM Blogs b WHERE blogID = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $blogID);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $temp = $result->fetch_assoc();
            $bl = new Blog($temp['blogID'], $temp['title'], $temp['content'], $temp['imageUrl'], $temp['comment']);
            $result->free();
            return $bl;
        }
        $result->free();
        return false;
    }

    public function getComment($blogID){
        $query = 'SELECT comment FROM Blogs WHERE blogID = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $blogID);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $comment = $row['comment'];
            $result->free();
            return $comment;
        }
        $result->free();
        return false;
    }

}