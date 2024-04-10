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

    public function addUser($user): string
    {
        if (!is_numeric($user->getUserID())) {
            return 'UserId must be a number.';
        }
        if (!$this->mysqli->connect_errno) {
            $query = 'INSERT INTO Users VALUES (?,?,?,?,?)';
            $stmt = $this->mysqli->prepare($query);
            $userID = $user->getUserID();
            $userName = $user->getUserName();
            $passWord = $user->getPassWord();
            $email = $user->getEmail();
            $createdTime = date('Y-m-d H:i:s');
            $stmt->bind_param('issss', $userID, $userName, $passWord, $email, $createdTime);
            $stmt->execute();
            if ($stmt->error) {
                return $stmt->error;
            } else {
                return $user->getUserName() . ' ' . $user->getPassWord() . ' ' . $user->getEmail() . ' ' . $createdTime . 'added successfully!';
            }
        } else {
            return 'Could not connect to Database.';
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

    public function authenticateUser($userName, $passWord) {
        $query = "SELECT userID FROM Users WHERE userName = ? AND passWord = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('ss', $userName, $passWord);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            // username and password are ture;
            return true;
        } else {
            // username and password are false;
            return false;
        }
    }

}

