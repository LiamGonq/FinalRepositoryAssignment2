<?php 
require_once('../PHP/userDAO.php'); 
require_once('../PHP/user.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta name="author" content="Tyus Irvine">
        <meta name="description" content="An online application for searching songs and creating a liked playlist">
        <meta name="keywords" content="HTML, CSS, JavaScript, PHP, GitHub, Music, Songs, a liked Playlist">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/style.css">
        <script src="../JS/buttonLogic.js" defer></script>
    </head>
    <body>
        <?php 
        
        $userDAO = new userDAO();
        //Tracks errors with the form fields
        $hasError = false;
        //Array for our error messages
        $errorMessages = Array();


        
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $resultUser = $userDAO->getUser_Username($password);
            $resultPass = $userDAO->getUser_Password($username);
    
            if( $resultUser->getUsername() == $username && $resultPass->getPassword() == $password) {
                $hasError = false;
                // Frees up the momerory taken up by  the connection as soon as it isnt needed
                $userDAO = null;
                // Takes user to the homepage page
                header("Location: homepage.php");
                kill();
            }

            else {
                $hasError = true;
                $errorMessages['loginError'] = 'x Username or Password is incorrect';
            }
        }
        ?>
        <div id="formContainer">
            <h1>Welcome to Elevated!</h1>
            <img src="../Images/logo.jpg">
            <div id="toBeHidden" class="buttonContainer">
                <button type="button" id="registration" name="" onclick="registerRedirect()" class="buttons">Register</button>
                <button type="button" id="loginDisplay" name="" onclick="displayLogin()" class="buttons">Login</button>
            </div>
            <!-- Data must be sent to the database and verified through php -->
            <form id="loginForm" action="index.php" method="post" class="hidden">
                <div>
                    <div class="loginField">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="<?php echo @$_POST['username'] ?>">
                    </div>
                    <div class="loginField">
                        <label for="password">Password</label>
                        <input type="text" id="password" name="password" value="<?php echo @$_POST['password']?>">
                    </div>
                    <div class="formControl">
                        <?php 
                        if(isset($errorMessages['loginError'])) {
                            echo '<span style=\'color:red\'>' . $errorMessages['loginError'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="buttonContainer">
                        <button type="submit" id="login" name="submit" class="buttons">Login</button>
                    </div>
                    <div class="extraContainer">
                        <a href="" id="usernameRestore">Forgot Username</a>
                        <a href="" id="passwordRestore">Forgot Password</a>
                    </div>
                </div>
            </form>
        </div>

        <footer>

        </footer>
    </body>