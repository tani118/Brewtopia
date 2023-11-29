<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "example";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);

    // Validation
    if (empty($username)) {
        $errors["username"] = "Name is required";
    }

    if (empty($email)) {
        $errors["email"] = "Email is required";
    }

    if (empty($password)) {
        $errors["password"] = "Password is required";
    }

    if (empty($confirmPassword)) {
        $errors["confirmPassword"] = "Please confirm your password";
    }

    if ($password !== $confirmPassword) {
        $errors["confirmPassword"] = "Passwords do not match";
    }

    // If there are no validation errors, proceed with database insertion
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            echo "Record created successfully";
            echo "<script>window.location.href = 'login.php';</script>";
        } else {
            echo "<script>window.location.href = 'SignUp.php';</script>";
        }
    }
}

$conn->close();
