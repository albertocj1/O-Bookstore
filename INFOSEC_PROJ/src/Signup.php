<<?php
// Database Configuration
$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "obookstore";

try {
    // Create Database Connection
    $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";
    $pdo = new PDO($dsn, $db_user, $db_password);

    // Set PDO Error Mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle Registration Request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input
    if (!empty($email) && !empty($username) && !empty($password)) {
        try {
            // Check if the username or email already exists
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<script>alert('Username or email already exists. Please choose another.');</script>";
            } else {
                // Insert the new user into the database (without hashing the password)
                $stmt = $pdo->prepare("INSERT INTO users (email, username, password) VALUES (:email, :username, :password)");
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR); // Store plain-text password
                $stmt->execute();

                // Redirect or provide a success message
                echo "<script>alert('Registration successful!');</script>";
                header("Location: login.php");  // Redirect to login page after successful registration
                exit;
            }
        } catch (PDOException $e) {
            echo "<script>alert('Error during registration process: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields');</script>";
    }
}

// Close Connection
$pdo = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
        /* General Styling */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #e3e3e3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
        }

        .container {
            display: flex;
            background-color: #ffffff;
            width: 1200px;
            height: 720px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            overflow: hidden;
        }

        /* Left Side */
        .login-section {
            flex: 1;
            padding: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            margin-bottom: 30px;
            font-size: 36px;
            font-weight: bold;
            color: #000;
        }

        .input-field {
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
        }

        .input-field input {
            padding: 15px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            width: 100%;
            padding-right: 50px;
        }

        .eye-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
        }

        .forgot-password {
            font-size: 14px;
            color: #666;
            text-align: right;
            margin-bottom: 30px;
            cursor: pointer;
        }

        button {
    background-color: #38f8d7;
    border: none;
    padding: 15px;
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    cursor: pointer;
    border-radius: 8px;
    width: 200px; /* Set the width of the button */
    height: 50px; /* Set the height of the button */
    margin-right: 30px;
    margin-left: 150px; /* Moves the button 20px to the right */
    flex-shrink: 0;
}

        .continue {
            text-align: center;
            margin: 20px 0;
            color: #666;
            font-size: 16px;
        }

        .google-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .google-btn img {
            width: 30px;
            margin-right: 15px;
        }

        .register-link {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
            color: #666;
        }

        .register-link a {
            color: #000;
            text-decoration: none;
            font-weight: bold;
        }

        /* Right Side */
        .brand-section {
            flex: 1;
            background-color: rgb(240, 240, 240);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .brand-section img {
            width: 400px;
            height: auto;
            margin-bottom: 20px;
        }

        .brand-section h1 {
            font-size: 36px;
            color: #3a8f7b;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sign Up Section -->
        <div class="login-section">
            <h2>Create Account</h2>
            <form method="POST" action="">
                <div class="input-field">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Choose a username" required>
                </div>
                <div class="input-field">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        <span class="eye-icon" onclick="togglePassword()">&#128065;</span>
                    </div>
                </div>
                <div class="forgot-password">Forgot Password?</div>
                <button type="submit">Sign Up</button>
            </form>
            <div class="continue">&mdash;&mdash;&mdash; or continue with &mdash;&mdash;&mdash;</div>
            <div class="google-btn">
                <img src="images/google.png" alt="Google Logo">
                <span>Continue with Google</span>
            </div>
            <div class="register-link">
                Already a member? <a href="login.php">Login now</a>
            </div>
        </div>

        <!-- Brand Section -->
        <div class="brand-section">
            <img src="images/logo.png" alt="Bookstore Icon">
            <h1></h1>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const eyeIcon = document.querySelector(".eye-icon");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.innerHTML = "&#128065;"; // Eye open icon
            } else {
                passwordField.type = "password";
                eyeIcon.innerHTML = "&#128064;"; // Eye close icon
            }
        }
    </script>
</body>
</html>

