<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
</head>

<body>

    <h2>Login Form</h2>

    <form method="POST">

        Username

        <br>

        <input type="text" name="username">

        <br><br>

        Password

        <br>

        <input type="password" name="password">

        <br><br>

        <button type="submit">

            Login

        </button>

    </form>

    <hr>

    <?php

    if (isset($_POST["username"])) {

        $username = $_POST["username"];

        $password = $_POST["password"];

        if ($username == "admin" && $password == "1234") {
            echo "<h2>Login Successful</h2>";
        } else {
            echo "<h2>Invalid Username or Password</h2>";
        }
    }

    ?>

</body>

</html>