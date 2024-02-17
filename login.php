<?php
include "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["admin_id"] = $row["id_admin"];
        header("Location: admin.php");
        exit();
    } else {
        $loginError = "Login failed. Invalid email or password.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #dddddd;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        p.error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 35%;
            transform: translateY(-50%);
            cursor: pointer;
            right: 5px;
        }

        #password {
            padding-right: 30px; 
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Login Admin</h2>
        
        <?php
        if (isset($loginError)) {
            echo "<p class='error-message'>$loginError</p>";
        }
        ?>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <div class="password-container">
            <input type="password" id="password" name="password" required>
            <span class="toggle-password" onclick="togglePasswordVisibility()">
                👁️
            </span>
        </div>

        <button type="submit">Login</button>
    </form>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.querySelector(".toggle-password");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.textContent = "👁️";
            } else {
                passwordField.type = "password";
                toggleIcon.textContent = "👁️";
            }
        }
    </script>
</body>
</html>

