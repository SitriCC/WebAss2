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
        $result = $this->mysqli->query('SELECT p.blogID, p.title, p.content FROM Blogs p');
        $arrBlog = Array();

        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new employee object, and add it to the array.
                $blog = new blog($row['blogID'], $row['title'], $row['content']);
                $arrBlog[] = $blog;
            }
            $result->free();
            return $arrBlog;
        }
        $result->free();
        return false;
    }


    public function getBlogById($blogID) {
//        $query = "SELECT p.BlogID, p.title, p.content, u.firstName, u.lastName, p.createdTime, p.updatedTime  FROM Blogs p     INNER JOIN Users u ON p.userID = u.userID  WHERE p.BlogID = :BlogID";

        $query = "SELECT p.BlogID, p.title, p.content, p.createdTime, p.updatedTime  FROM Blogs p";

        $stmt = $this->mysqli->prepare($query);
        // Bind the $blogID parameter to the query
        $stmt->bindParam(':BlogID', $blogID, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the result as an associative array
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
//            $user = new user($row['firstName'], $row['lastName']);
//            $blog = new blog($row['BlogID'], $row['title'], $row['content'], $row['createdTime'], $row['updatedTime'], $user);
            $blog = new blog($row['BlogID'], $row['title'], $row['content']);
            return $blog; // Return the blog
        } else {
            return null;
        }
    }




    public function addBlog($blog){
        if(!is_numeric($blog->getBlogID())){
            return 'EmployeeId must be a number.';
        }
        if(!$this->mysqli->connect_errno){
            //The query uses the question mark (?) as a
            //placeholder for the parameters to be used
            //in the query.
            $query = 'INSERT INTO Blogs VALUES (?,?,?)';
            //The prepare method of the mysqli object returns
            //a mysqli_stmt object. It takes a parameterized
            //query as a parameter.
            $stmt = $this->mysqli->prepare($query);
            //The first parameter of bind_param takes a string
            //describing the data. In this case, we are passing
            //three variables: an integer(employeeId), and two
            //strings (firstName and lastName).
            //
            //The string contains a one-letter datatype description
            //for each parameter. 'i' is used for integers, and 's'
            //is used for strings.
            $stmt->bind_param('iss',
                    $blog->getBlogID(),
                    $blog->getTitle(),
                    $blog->getContent());
            //Execute the statement
            $stmt->execute();
            //If there are errors, they will be in the error property of the
            //mysqli_stmt object.
            if($stmt->error){
                return $stmt->error;
            } else {
                return $blog->getTitle() . ' ' . $blog->getContent() . ' added successfully!';
            }
        } else {
            return 'Could not connect to Database.';
        }
    }
    /*
       public function deleteEmployee($employeeId){
           if(!$this->mysqli->connect_errno){
               $query = 'DELETE FROM employees WHERE employeeId = ?';
               $stmt = $this->mysqli->prepare($query);
               $stmt->bind_param('i', $employeeId);
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
   */
}