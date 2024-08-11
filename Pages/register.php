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
        <script src="../JS/clientValidation.js" defer></script>
    </head>
    <body>
        <?php
            $userDAO = new userDAO();
    
            

            if(isset($_POST['userID']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) { 
                    $user_id = $_POST['userID'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];        
                // echo working;
                        $user = new User($user_id, $email, $username, $password);
                        $addSuccess = $userDAO->addUser($user);
                        // echo '<h3>' . $addSuccess . '</h3>';
                        // Redirects the user back to the login page
                        header("Location: index.php");
                    }
            
        ?>
        <div id="formContainer">
            <h1>Join The Family</h1>
            <form action="register.php" method="post" onsubmit="return validate()">
                    <div id="idContainer" class="textfield">
                        <label for="userID">User ID</label>
                        <input type="text" id="userID" name="userID" value="<?php echo @$_POST['userID']; ?>">
                        <div class="formControl">
                        </div>
                    </div>
                    <div id="emailContainer" class="textfield">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" value="<?php echo @$_POST['email']; ?>">
                        <div class="formControl"></div>
                    </div>
                    <div id="usernameContainer" class="textfield">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="<?php echo @$_POST['username']; ?>">
                        <div class="formControl"></div>
                    </div>
                    <div id="passwordContainer" class="textfield">
                        <label for="password">Password</label>
                        <input type="text" id="password" name="password" value="<?php echo @$_POST['password']; ?>">
                        <div class="formControl"></div>                   
                    </div>
                    <div id="confirmContainer" class="textfield">                 
                        <label for="passConfirm">Re-type Password</label>
                        <input type="text" id="passConfirm" name="passConfirm">
                        <div class="formControl"></div>
                    </div>
                    <div id="termsContainer" class="checkbox">
                        <input type="checkbox" id="terms" name="terms">
                        <label for="terms">I Agree to the Terms & Conditions</label>
                        <div class="formControl"></div>
                    </div>
                <div id="buttonContainer" class="buttonContainer">
                    <button type="submit" id="register" name="submit" class="buttons">Register</button>
                    <button type="reset" id="reset" name="reset" class="buttons">Reset</button>
                </div>
            </form>
        </div>

        <footer>

        </footer>
    </body>
</html>