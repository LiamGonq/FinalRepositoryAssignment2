<?php
    class User {
        private $user_id;
        private $email;
        private $username;
        private $password;
        
        function __construct($user_id, $email, $username, $password) {
            $this->setUser_id($user_id);
            $this->setEmail($email);
            $this->setUsername($username);
            $this->setPassword($password);
        }

        function getUser_id() {
            return $this->user_id;
        }

        function setUser_id($user_id) {
            $this->user_id = $user_id;
        }

        function getEmail() {
            return $this->email;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function getUsername() {
            return $this->username;
        }

        function setUsername($username) {
            $this->username = $username;
        }

        function getPassword() {
            return $this->password;
        }

        function setPassword($password) {
            $this->password = $password;
        }
    }

?>