<?php

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Sanitize and validate input data to prevent SQL injection and other security issues.
    $email = mysqli_real_escape_string($connection, $email);

    // Use prepared statement to prevent SQL injection
    $stmt = $connection->prepare("SELECT * FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, check the password

        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];

        if ($password == $storedPassword) {
            echo "success";
        } else {
            echo "failurePass";
        }
    } else {
        // User not found
        echo "failure";
    }

    // Close the statement
    $stmt->close();
}
?>
