<?php
require_once('abstractDAO.php');
require_once('./model/user.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class userDAO extends abstractDAO
{

    function __construct()
    {
        try {
            parent::__construct();
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }

    /*
     * This is an example of how to use the query() method of a mysqli object.
     *
     * Returns an array of <code>user</code> objects. If no user exist, returns false.
     */
    public function getUsers()
    {
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM Users');
        //declaration of users array
        $users = array();

        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                //Create a new user object, and add it to the array.
                $user = new user($row['userID'], $row['firstName'], $row['lastName'], $row['email'], $row['createdTime']);
                $users[] = $user;
            }
            $result->free();
            return $users;
        }
        return false;
    }

    /*
     * This is method to query by userID
     */
    public function getUserById($userID)
    {
        $query = 'SELECT * FROM Users WHERE userID = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $temp = $result->fetch_assoc();
            $user = new user($temp['userID'], $temp['firstName'], $temp['lastName'], $temp['email'], $temp['createdTime']);
            $result->free();
            return $user;
        }
        $result->free();
        return false;
    }

    public function addUser($user)
    {
        if (!is_numeric($user->getUserID())) {
            return 'UserId must be a number.';
        }
        if (!$this->mysqli->connect_errno) {
            $query = 'INSERT INTO Users VALUES (?,?,?,?,?)';
            $stmt = $this->mysqli->prepare($query);
            $userID = $user->getUserID();
            $firstName = $user->getFirstName();
            $lastName = $user->getLastName();
            $email = $user->getEmail();
            $createdTime = date('Y-m-d H:i:s');
            $stmt->bind_param('issss', $userID, $firstName, $lastName, $email, $createdTime);
            $stmt->execute();
            if ($stmt->error) {
                return $stmt->error;
            } else {
                return $user->getFirstName() . ' ' . $user->getLastName() . ' ' . $user->getEmail() . ' ' . $createdTime . 'added successfully!';
            }
        } else {
            return 'Could not connect to Database.';
        }
    }

    public function updateUser($userID, $firstName, $lastName, $email): bool
    {

        if (!$this->mysqli->connect_errno) {
            $createdTime = date('Y-m-d H:i:s');
            $query = 'UPDATE Users SET firstName =?, lastName =?, email =?, createdTime =? WHERE userID =?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('ssssi',$firstName, $lastName, $email, $createdTime,$userID);
            $stmt->execute();
            if ($stmt->error) {
                return false;
            } else {
                return $stmt->affected_rows;
            }
        } else {
            return false;
        }
    }

    public function deleteUser($userID): bool
    {
        if (!$this->mysqli->connect_error){
            $query = 'DELETE FROM Users WHERE userID =?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $userID);
            $stmt->execute();
            if ($stmt->error) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function getMaxUserId() {
        $query = "SELECT MAX(userID) as maxId FROM Users";
        $result = $this->mysqli->query($query);
        if($result) {
            $row = $result->fetch_assoc();
            return $row['maxId'] + 1;
        } else {
            return null;
        }
    }
}

