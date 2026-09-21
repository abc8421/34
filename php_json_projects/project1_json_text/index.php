<!DOCTYPE html>
<html>

<head>
    <title>JSON Database</title>
</head>

<body>
    <center>
        <h1>JSON Database</h1>
        <h2>Navigation</h2>
        <p>Press <b>1</b> to Add Person</p>
        <p>Press <b>2</b> to Delete Person</p>
        <hr>
        <a href="add.php">1. Add Person</a>
        <br><br>
        <a href="delete.php">2. Delete Person</a>
    </center>

    <script>
    document.addEventListener("keydown", function(event) {
        if (event.key === "1") {
            window.location.href = "add.php";
        }
        if (event.key === "2") {
            window.location.href = "delete.php";
        }
    });
    </script>
</body>

</html>