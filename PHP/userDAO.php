<?php
    require_once('abstractDAO.php');
    require_once('user.php');

    class userDAO extends abstractDAO {
        function __construct() {
            try{
                parent::__construct();
            } catch(mysqli_sql_exception $e){
                throw $e;
            }
        }
        
        public function getUser_password($username) {
            $query = 'SELECT password FROM users WHERE username = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result->num_rows == 1){
                $temp = $result->fetch_assoc();
                $dbRecord = new User($temp['user_id'], $temp['email'], $temp['username'], $temp['password']);
                $result->free();
                return $dbRecord;
            }
            else {
                $result->free();
                return false;
            }
        }

        public function getUser_Username($password) {
            $query = 'SELECT username FROM users WHERE password = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('s', $password);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result->num_rows == 1){
                $temp = $result->fetch_assoc();
                $dbRecord = new User($temp['user_id'], $temp['email'], $temp['username'], $temp['password']);
                $result->free();
                return $dbRecord;
            }
            else {
                $result->free();
                return false;
            }
        }

        public function addUser($user){
            if(!$this->mysqli->connect_errno){
                //The query uses the question mark (?) as a
                //placeholder for the parameters to be used
                //in the query.
                $query = 'INSERT INTO users VALUES (?,?,?,?)';
                //The prepare method of the mysqli object returns
                //a mysqli_stmt object. It takes a parameterized 
                //query as a parameter.
                $stmt = $this->mysqli->prepare($query);
                if (!$stmt) {
                    // Handle prepare error
                    die('Prepare Error: ' . $this->mysqli->error);
                }
                //The first parameter of bind_param takes a string
                //describing the data. 
                //
                //The string contains a one-letter datatype description
                //for each parameter. 'i' is used for integers, and 's'
                //is used for strings.

                $stmt->bind_param('isss',
                        $user->getUser_id(),
                        $user->getEmail(), 
                        $user->getUsername(), 
                        $user->getPassword());
                //Execute the statement
                $stmt->execute();
                //If there are errors, they will be in the error property of the
                //mysqli_stmt object.
                if($stmt->error){
                    return $stmt->error;
                } else {
                    return $user->getEmail() . ' ' . $user->getUsername() . ' ' . $user->getPassword() . ' added successfully!';
                }
            }
            else {
                return 'Could not connect to Database.';
                }
            
        }

        public function changeUsername($email) {
            if(!$this->mysqli->connect_errno){
                $query = 'UPDATE users SET username = ? WHERE email = ?';
                $stmt = $this->mysqli->prepare($query);
                $stmt->bind_param('ss', $username, $email);
                $stmt->execute();
                if($stmt->error){
                    return false;
                } 
                else {
                    return $stmt->affected_rows;
                }
            } 
            else {
                return false;
            }
        }

        public function changePassword($email) {
            if(!$this->mysqli->connect_errno){
                $query = 'UPDATE users SET password = ? WHERE email = ?';
                $stmt = $this->mysqli->prepare($query);
                $stmt->bind_param('ss', $password, $email);
                $stmt->execute();
                if($stmt->error){
                    return false;
                } 
                else {
                    return $stmt->affected_rows;
                }
            } 
            else {
                return false;
            }
        }
    }

?>