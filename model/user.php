<?php
class user
{
    private $userID;
    private $userName;
    private $passWord;
    private $email;
    private $createdTime;

    /**
     * @param $userID
     * @param $userName
     * @param $passWord
     * @param $email
     * @param $createdTime
     */
    public function __construct($userID, $userName, $passWord, $email, $createdTime = null) {
        $this->userID = $userID;
        $this->userName = $userName;
        $this->passWord = $passWord;
        $this->email = $email;
        if ($createdTime !== null) {
            $this->createdTime = $createdTime;
        }

    }


    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID) {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getPassWord()
    {
        return $this->passWord;
    }

    /**
     * @param mixed $passWord
     */
    public function setPassWord($passWord)
    {
        $this->passWord = $passWord;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * @param mixed $createdTime
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;
    }
}
?>