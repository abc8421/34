<!-- Practical 4 - htmlspecialchars() Example -->


<!-- Example input : <h1>Welcome</h1> -->
<!-- Example input : <b>Welcome</b> -->
<!-- Example input : <script>alert("Hello")</script> -->


<!-- 
6. htmlspecialchars()

This function converts special HTML characters into HTML entities.
It helps prevent Cross-Site Scripting (XSS) attacks.

<script>alert("Hack")</script>

Without htmlspecialchars(), the browser may execute the script.
With htmlspecialchars(), it is displayed safely as plain text.

Example input : <script>alert("Hello")</script> -->



<!DOCTYPE html>
<html>

<head>
    <title>htmlspecialchars() Example</title>
</head>

<body>

    <h2>htmlspecialchars() Example</h2>

    <form method="POST">

        Message

        <br>

        <textarea name="message" rows="5" cols="40"></textarea>

        <br><br>

        <button type="submit">
            Submit
        </button>

    </form>

    <hr>

    <?php

    if (isset($_POST["message"])) {

        $message = $_POST["message"];

        echo "<h3>Original Input</h3>";

        echo $message;

        echo "<hr>";

        echo "<h3>Safe Output (Using htmlspecialchars())</h3>";

        echo htmlspecialchars($message);
    }

    ?>

</body>

</html>