<!--
| Variable    | Purpose                              |
| ----------- | ------------------------------------ |
|  $_GET      | Receives data from URL               |
|  $_POST     | Receives hidden form data            |
|  $_REQUEST  | Receives GET and POST                |
|  $_SERVER   | Information about server and request | 


Simple GET Form

Theory
This program demonstrates how the GET method sends form data through the URL and how PHP reads it using the $_GET superglobal.


-->

<!DOCTYPE html>
<html>

<head>
    <title>GET Form Example</title>
</head>

<body>

    <h2>GET Form Example</h2>

    <form method="GET">
        Name :
        <input type="text" name="name">

        <br><br>

        <button type="submit">Submit</button>

    </form>

    <hr>

    <?php
    if (isset($_GET["name"])) {
        echo "<h3>Hello " . $_GET["name"] . "</h3>";
    }
    ?>

</body>

</html>