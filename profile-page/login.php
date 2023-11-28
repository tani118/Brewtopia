<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <div class="login_details_div">
        <label for="username">Enter your username</label>
        <input type="text" id="username">
        <span id="usernameError" class="error"></span>

        <label for="Password">Enter Password</label>
        <input type="password" id="Password">
        <span id="passwordError" class="error"></span>

        <button onclick="validateForm()">Login</button>
        
        <span>Don't have an account?
            <a href="signin.html">Sign up</a>
        </span>
    </div>

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
            }

            if (password.trim() === "") {
                document.getElementById("passwordError").innerHTML = "Password is required";
                return false;
            }

            // Additional validation logic can be added here

            // If all validations pass, you can submit the form or perform other actions
            alert("Form submitted successfully!");

            return true;
        }
    </script>
</body>

</html>
