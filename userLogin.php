<!DOCTYPE html>
<html>
<?php
include("config.php");
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>User Login - MyPredictor</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets1/img/favicon.png" rel="icon">
  <link href="assets1/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function validateLogin() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var emailError = document.getElementById("email-error");
            var passwordError = document.getElementById("password-error");

            // Reset error messages
            emailError.innerHTML = "";
            passwordError.innerHTML = "";

            // Validate email
            if (email === "") {
                emailError.innerHTML = "Email is required";
                return false;
            }

            // Validate password
            if (password === "") {
                passwordError.innerHTML = "Password is required";
                return false;
            }

            // Perform AJAX request to validate login
            $.ajax({
                type: "POST",
                url: "userValidate.php", // replace with the actual PHP file for validation
                data: {
                    email: email,
                    password: password
                },
                success: function (response) {
                    console.log(response); // Log the response to the console

                    if (response === "success") {
                        window.location.href = "index.php";
                    }else if (response === "price"){
                        window.location.href = "predictprice5.php";
                    }else if (response === "size"){
                        window.location.href = "predictprice4.php";
                    }else if (response === "tenure"){
                        window.location.href = "predictprice3.php";
                    }else if (response === "buildingType"){
                        window.location.href = "predictprice2.php";
                    }else if (response === "area"){
                        window.location.href = "predictprice1.php";
                    } else {
                        // Invalid credentials, show a pop-up or alert
                        alert("Invalid email or password. Please try again.");
                    }
                }
            });

            // Prevent form submission
            return false;
        }
    </script>
</head>


<body>
<div class="container">
    <div class="card">
        <h1>User Login</h1>
        <form onsubmit="return validateLogin();">
            <input type="text" id="email" placeholder="Email Address">
            <div class="error-message" id="email-error"></div>
            <input type="password" id="password" placeholder="Password">
            <div class="error-message" id="password-error"></div>
            <div class="buttons">
                <button class="login-button">Login</button>
            </div>
        </form>
        <p>Haven't registered an account? <a href="userRegister.php">Register here</a></p>
    </div>
</div>
</body>
</html>
