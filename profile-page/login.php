<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Your database connection code here
    $servername = "localhost";
    $db_username = "username";
    $db_password = "password";
    $dbname = "example";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];

        if (password_verify($password, $storedPassword)) {
            echo "<script>window.location.href = 'home-page/index.html';</script>";
            exit(); 
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login-style.css">
    <style>
    .error {
        color: red;
    }
    </style>
</head>

<body>
    <div>
        <img src="Logo3.jpg" alt="logo image" class="logo_image">
    </div>

    <form action="home-page/index.html" method="post" onsubmit="validateForm()">
        <div class="login_details_div">
            <label for="username">Enter your username</label>
            <input type="text" id="username" required>
            <span id="usernameError" class="error"></span>

            <label for="Password">Enter Password</label>
            <input type="password" id="Password" required>
            <span id="passwordError" class="error"></span>

            <button id="login_button">Login</button>

            <span>Don't have an account?
                <a href="signin.php">Sign up</a>
            </span>
        </div>
    </form>

    <img src="hello_bear.webp" alt="" id="hellobear">

    <script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("Password").value;

        document.getElementById("usernameError").innerHTML = "";
        document.getElementById("passwordError").innerHTML = "";

        if (username.trim() === "") {
            document.getElementById("usernameError").innerHTML = "Username is required";
            return false;
        } else if (password.trim() === "") {
            document.getElementById("passwordError").innerHTML = "Password is required";
            return false;
        }
        return true;
    }
    </script>
</body>

</html>