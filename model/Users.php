<?php
	class Users
    {
        private $userID;
        private $firstName;
        private $lastName;
        private $email;
        private $createdTime;

        /**
         * @param $userID
         * @param $firstName
         * @param $lastName
         * @param $email
         * @param $createdTime
         */
        public function __construct($userID, $firstName, $lastName, $email, $createdTime)
        {
            $this->userID = $userID;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->createdTime = $createdTime;
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
        public function setUserID($userID)
        {
            $this->userID = $userID;
        }

        /**
         * @return mixed
         */
        public function getFirstName()
        {
            return $this->firstName;
        }

        /**
         * @param mixed $firstName
         */
        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
        }

        /**
         * @return mixed
         */
        public function getLastName()
        {
            return $this->lastName;
        }

        /**
         * @param mixed $lastName
         */
        public function setLastName($lastName)
        {
            $this->lastName = $lastName;
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