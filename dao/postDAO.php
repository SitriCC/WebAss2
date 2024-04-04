<?php
require_once('abstractDAO.php');
require_once('./model/PostBlog.php');
class PostBlogBlogDAO  extends abstractDAO {

    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }


    public function getPostBlogs() {
        $query = "SELECT p.PostBlogID, p.title, p.content, u.firstName, u.lastName, p.createdTime, p.updatedTime 
                  FROM PostBlogs p 
                  INNER JOIN Users u ON p.userID = u.userID";

        $stmt = $this->mysqli->prepare($query);
        $stmt->execute();

        $PostBlogs = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['firstName'], $row['lastName']);
            $PostBlog = new PostBlog($row['PostBlogID'], $row['title'], $row['content'], $row['createdTime'], $row['updatedTime'], $user);
            array_push($PostBlogs, $PostBlog);
        }

        return $PostBlogs;
    }



    public function getPostBlogById($PostBlogID) {
        $query = "SELECT p.PostBlogID, p.title, p.content, u.firstName, u.lastName, p.createdTime, p.updatedTime 
                  FROM PostBlogs p 
                  INNER JOIN Users u ON p.userID = u.userID 
                  WHERE p.PostBlogID = :PostBlogID";

        $stmt = $this->mysqli->prepare($query);
        // Bind the $PostBlogID parameter to the query
        $stmt->bindParam(':PostBlogID', $PostBlogID, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the result as an associative array
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $user = new User($row['firstName'], $row['lastName']);
            $PostBlog = new PostBlog($row['PostBlogID'], $row['title'], $row['content'], $row['createdTime'], $row['updatedTime'], $user);
            return $PostBlog; // Return the PostBlog
        } else {
            return null;
        }
    }
}