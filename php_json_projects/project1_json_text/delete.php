<?php

// Check whether a delete value is present in the URL
if (isset($_GET["delete"])) {

    // Read data.json and convert the JSON data into a PHP array
    $data = json_decode(file_get_contents("data.json"), true);

    // Delete the item at the index received from the URL
    unset($data[$_GET["delete"]]);

    // Re-index the array and convert it back to JSON
    // Then save the updated data into data.json
    file_put_contents("data.json", json_encode(array_values($data), JSON_PRETTY_PRINT));

    header("Location: delete.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Delete Person</title>
</head>

<body>
    <center>
        <h2>Delete Person</h2>
        <p>Press <b>Backspace</b> to return to Home</p>
        <hr>

        <?php
        $data = json_decode(file_get_contents("data.json"), true);

        echo "<table border='3' cellpadding='10' cellspacing='10'>";
        echo "<tr><th>Sr no</th><th>Name</th><th>Date</th><th>Action</th></tr>";

        foreach ($data as $index => $person) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . $person["name"] . "</td>";
            echo "<td>" . $person["date"] . "</td>";
            echo "<td><a href='delete.php?delete=" . $index . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </center>

    <script>
        document.addEventListener("keydown", function (event) {
            if (event.key === "Backspace") {
                window.location.href = "index.php";
            }
        });
    </script>
</body>

</html>