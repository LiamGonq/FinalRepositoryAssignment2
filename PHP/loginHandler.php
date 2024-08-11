<?php
//Author: Tyus Irvine
// Control statement for ensuring the user is accessing the site through the proper channel
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialising variables to store the values enterd by the user
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        // Includes the datatbase connection script
        require_once("userDAO.php");

        // Queries to verify tht the username and password entered, matches a record on the users table
        $query1 = "SELECT password FROM users WHERE username = $username;";
        $query2 = "SELECT username FROM users WHERE password = $password;";
        
        // Initialising variables to store the results returned by the query
        $resultUser = $mysqli->execute($query1);
        $resultPass = $mysqli->execute($query2);

        // Checks if the results returned match the info given
        if(resultUser == $username && resultPass == $password) {
            // Frees up the momerory taken up by  the connection as soon as it isnt needed
            $mysqli = null;
            // Takes user to the homepage page
            header("Location: /homepage.php");
            // Kills the connection
            die();
        }
        else {
            
        }

    } catch(mysqli_sql_exception $e) {
        // Kills the connection with an error message
        die("Query failed: " . $e->getMessage());
    }
}
else{
    // Redirects the user back to the login page
    header("Location: login.html");
}
?>
<!-- <!DOCTYPE html>
<html lang="en">
<body>
    <script>
        
    </script>
</body> -->
