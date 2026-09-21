<!-- 
| Variable          | Purpose           |
| ----------------- | ----------------- |
| REQUEST_METHOD    | GET or POST       |
| PHP_SELF          | Current file      |
| SERVER_NAME       | Server name       |
| HTTP_USER_AGENT   | Browser details   |
| REMOTE_ADDR       | Client IP address | 

-->


<!DOCTYPE html>
<html>

<head>
    <title>SERVER Variables</title>
</head>

<body>

    <?php

    echo "<h2>PHP Server Information</h2>";

    echo "Request Method : " . $_SERVER["REQUEST_METHOD"] . "<br><br>";

    echo "Current File : " . $_SERVER["PHP_SELF"] . "<br><br>";

    echo "Server Name : " . $_SERVER["SERVER_NAME"] . "<br><br>";

    echo "Client IP : " . $_SERVER["REMOTE_ADDR"] . "<br><br>";

    echo "Browser : " . $_SERVER["HTTP_USER_AGENT"];

    ?>

</body>

</html>