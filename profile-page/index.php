<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "example";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

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
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
