<!-- Simple POST Form 

Theory
This example demonstrates how the POST method sends form data in the request body instead of the URL, making it suitable for login forms and other sensitive data. 

-->


<!DOCTYPE html>
<html>

<head>
    <title>POST Form Example</title>
</head>

<body>

    <h2>POST Form Example</h2>

    <form method="POST">
        Name :
        <input type="text" name="name">
        <br><br>
        <button type="submit">
            Submit
        </button>
    </form>
    <hr>

    <?php

    if (isset($_POST["name"])) {
        echo "<h3>Welcome " . $_POST["name"] . "</h3>";
    }

    ?>

</body>

</html>