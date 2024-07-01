<!DOCTYPE html>
<html>
<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    // Basic input validation
    if (empty($email) || empty($password) || empty($password_confirm)) {
        echo "All fields are required.";
        exit;
    }

    if ($password !== $password_confirm) {
        echo "Password and confirm password do not match.";
        exit;
    }

    // Hash the password
    // $password = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statements to insert data securely
    $stmt = $connection->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        $registrationStatus = "success"; // Registration successful
    } else {
        $registrationStatus = "failure"; // Registration failed
        echo "Registration failed: " . $stmt->error;
    }

    $stmt->close();
}
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>User Registration - MyPredictor</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets1/img/favicon.png" rel="icon">
  <link href="assets1/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        /* Add styling for error messages */
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Sign Up</h1>
            <form method="POST" action="userRegister.php" onsubmit="return validateEmail();">
                <input type="text" name="email" placeholder="Email Address">
                <div class="error-message" id="email-error"></div>
                <input type="password" name="password" placeholder="Password">
                <div class="error-message" id="password-error"></div>
                <input type="password" name="password_confirm" placeholder="Confirm Password">
                <div class="error-message" id="password-confirm-error"></div>
                <input type="hidden" id="registration-status" value="<?php echo $registrationStatus; ?>">
                <div class="buttons">
                    <button class="register-button">Register</button>
                </div>
            </form>
            <p>Already have an account? <a href="userLogin.php">Login here</a></p>
        </div>
    </div>

    <script>
        function validateEmail() {
            var emailInput = document.querySelector('input[name="email"]');
            var emailValue = emailInput.value;
            var emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
            var emailError = document.getElementById('email-error');

            if (!emailRegex.test(emailValue)) {
                emailError.innerHTML = 'Please enter a valid email address.';
                emailInput.focus();
                return false; // Prevent form submission
            } else {
                emailError.innerHTML = ''; // Clear the error message
            }

            var passwordInput = document.querySelector('input[name="password"]');
            var passwordValue = passwordInput.value;
            var passwordError = document.getElementById('password-error');

            var passwordConfirmInput = document.querySelector('input[name="password_confirm"]');
            var passwordConfirmValue = passwordConfirmInput.value;
            var passwordConfirmError = document.getElementById('password-confirm-error');

            if (passwordValue === "") {
                passwordError.innerHTML = 'Please enter a password.';
            } else {
                passwordError.innerHTML = '';
            }

            if (passwordConfirmValue === "") {
                passwordConfirmError.innerHTML = 'Please enter a password confirmation.';
            } else {
                passwordConfirmError.innerHTML = '';
            }

            if (passwordValue === "" || passwordConfirmValue === "") {
                return false; // Prevent form submission
            }

            if (passwordValue !== passwordConfirmValue) {
                passwordConfirmError.innerHTML = 'Password and password confirmation do not match.';
                return false; // Prevent form submission
            }

            return true; // Continue with form submission
        }

        var registrationStatus = document.getElementById("registration-status").value;

        if (registrationStatus === "success") {
            alert("Registration Successful");
            window.location.href = "userLogin.php";
        } else if (registrationStatus === "failure") {
            alert("Registration Failed");
        }
    </script>
</body>
</html>
