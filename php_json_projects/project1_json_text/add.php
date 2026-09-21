<!-- 
| With true                | Without true       |
| ------------------------ | ------------------ |
| json_decode($json, true) | json_decode($json) |
| Creates array            | Creates object     |
| $data["name"]            | $data->name        | -->



<?php

if (isset($_POST["add"])) {
    // Read data from data.json and convert JSON into a PHP array
    $data = json_decode(file_get_contents("data.json"), true);

    date_default_timezone_set("Asia/Kolkata");
    $data[] = [
        "name" => $_POST["name"],
        "date" => date("d-m-Y h:i A")
    ];

    // array_push($data, [
    // "name" => $_POST["name"],
    // "date" => date("d-m-Y h:i A")
    // ]);

    // Convert the PHP array back to JSON and save it inside data.json
    file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));

    header("Location: delete.php");
    exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Person</title>
</head>

<body>
    <center>
        <h2>Add Person</h2>
        <p>Press <b>Backspace</b> to return to Home</p>
        <hr>
        <form method="POST">
            <!-- <input type="text" name="fname" placeholder="Enter first name"> -->
            <input type="text" name="name" placeholder="Enter name" autofocus>
            <button type="submit" name="add">Add</button>
        </form>
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