<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signin-style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Geo" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Philosopher" />
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>
        Welcome to BREWTOPIA!
        <br>
        Sign-in
    </h1>

    <div class="details">

        <img src="bear_blanket.webp" alt="" id="beargif">

        <form action="insert.php" method="post" onsubmit="return validateForm()">
            <!-- name -->
            <label for="Name">Name</label>
            <input type="text" name="username" placeholder="Enter your name" id="Name" required>
            <span class="error"><?php echo $errors["username"] ?? ""; ?></span>

            <!-- email -->
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter your email" id="email" required>
            <span class="error"><?php echo $errors["email"] ?? ""; ?></span>

            <!-- password -->
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Create a strong password" id="password" required>
            <span class="error"><?php echo $errors["password"] ?? ""; ?></span>

            <!-- confirm password -->
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name="confirmPassword" placeholder="Confirm your password" id="confirmPassword" required>
            <span class="error"><?php echo $errors["confirmPassword"] ?? ""; ?></span>

            <!-- sign-in button -->
            <button type="submit" id="signin_button">Sign-in</button>

        </form>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById("Name").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            document.getElementById("nameError").innerHTML = "";
            document.getElementById("emailError").innerHTML = "";
            document.getElementById("passwordError").innerHTML = "";
            document.getElementById("confirmPasswordError").innerHTML = "";

            if (name === "") {
                document.getElementById("nameError").innerHTML = "Name is required";
                return false;
            }

            if (email === "") {
                document.getElementById("emailError").innerHTML = "Email is required";
                return false;
            }

            if (password === "") {
                document.getElementById("passwordError").innerHTML = "Password is required";
                return false;
            }

            if (confirmPassword === "") {
                document.getElementById("confirmPasswordError").innerHTML = "Please confirm your password";
                return false;
            }

            if (password !== confirmPassword) {
                document.getElementById("confirmPasswordError").innerHTML = "Passwords do not match";
                return false;
            }

            // Additional validation logic can be added here

            return true;
        }
    </script>

</body>

</html>