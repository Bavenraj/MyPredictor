<?php
include("config.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Sanitize and validate input data to prevent SQL injection and other security issues.
    $email = mysqli_real_escape_string($connection, $email);

    // Use prepared statement to prevent SQL injection
    $stmt = $connection->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, check the password

        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];

        if ($password == $storedPassword) {
            $_SESSION['email']=$email;
            if(!empty($_SESSION['price'] )) {
                echo "price";
            }else if(!empty($_SESSION["size"])) {
                echo "size";
            }else if(!empty($_SESSION["floor"])) {
                echo "floor";
            }else if(!empty($_SESSION["tenure"])) {
                echo "tenure";
            }else if(!empty($_SESSION["area"])) {
                echo "area";
            }else {echo "success";}
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
