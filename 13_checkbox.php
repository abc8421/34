<!DOCTYPE html>
<html>

<head>
    <title>Checkbox Example</title>
</head>

<body>

    <h2>Accept Terms</h2>

    <form method="POST">

        <input type="checkbox" name="terms">

        I Agree

        <br><br>

        <button>Register</button>

    </form>

    <hr>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["terms"])) {

            echo "Registration Successful.";
        } else {

            echo "Please accept Terms & Conditions.";
        }
    }

    ?>

</body>

</html>