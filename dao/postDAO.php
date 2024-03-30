<?php
require_once('abstractDAO.php');
require_once('./model/Post.php');
class postDAO  extends abstractDAO {

    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }


    public function getPosts() {
        $query = "SELECT p.postID, p.title, p.content, u.firstName, u.lastName, p.createdTime, p.updatedTime 
                  FROM Posts p 
                  INNER JOIN Users u ON p.userID = u.userID";

        $stmt = $this->mysqli->prepare($query);
        $stmt->execute();

        $posts = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['firstName'], $row['lastName']);
            $post = new Post($row['postID'], $row['title'], $row['content'], $row['createdTime'], $row['updatedTime'], $user);
            array_push($posts, $post);
        }

        return $posts;
    }



    public function getPostById($postID) {
        $query = "SELECT p.postID, p.title, p.content, u.firstName, u.lastName, p.createdTime, p.updatedTime 
                  FROM Posts p 
                  INNER JOIN Users u ON p.userID = u.userID 
                  WHERE p.postID = :postID";

        $stmt = $this->mysqli->prepare($query);
        // Bind the $postID parameter to the query
        $stmt->bindParam(':postID', $postID, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the result as an associative array
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $user = new User($row['firstName'], $row['lastName']);
            $post = new Post($row['postID'], $row['title'], $row['content'], $row['createdTime'], $row['updatedTime'], $user);
            return $post; // Return the Post
        } else {
            return null;
        }
    }
}