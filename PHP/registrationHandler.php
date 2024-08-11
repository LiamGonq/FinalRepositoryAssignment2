<?php
include('./userDAO.php');

// Control statement for ensuring the user is accessing the site through the proper channel
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialising the variables to store the users info
    $userDAO = new userDAO();
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        // Defines the query to add a new User to the database using named parameters
        $query = "INSERT INTO users (email, username, password) 
        VALUES (:email, :username, :password);";

        // Initializing the variable to store the connection + the query
        $statement = $mysqli->prepare($query);

        // Binding the parameter names to the values entered by the user
        $statement->bindParam(":email", $email);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);

        // Executes the query
        $statement->execute();

        // Takes user back to the login page
        header("Location: ../login.html");
        // Kills the connection
        die();

    } catch(mysqli_sql_exception $e) {
        // Kills the connection with an error message
        die("Query failed: " . $e->getMessage());
    }
}
else {
    // Redirects back to the login page
    header("Location: ../login.html");
}