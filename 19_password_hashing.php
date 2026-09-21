<!-- 8. Password Field Processing -->

<!DOCTYPE html>
<html>

<head>
    <title>Password Hashing</title>
</head>

<body>

    <form method="POST">

        Password

        <br>

        <input type="password" name="password">

        <br><br>

        <button>Register</button>

    </form>

    <hr>

    <?php

    if (isset($_POST["password"])) {

        $password = $_POST["password"];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Bcrypt Algorithm - Blowfish cipher -  to prevent modern brute-force attacks.

        echo "<h3>Original Password</h3>";

        echo $password;

        echo "<hr>";

        echo "<h3>Hashed Password</h3>";

        echo $hashedPassword;

        echo "<hr>";

        if (password_verify($password, $hashedPassword)) {

            echo "Password Verification Successful.";
        } else {

            echo "Password Verification Failed.";
        }
    }

    ?>

</body>

</html>