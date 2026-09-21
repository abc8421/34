<!DOCTYPE html>
<html>

<head>
    <title>PHP Mini Notes Website</title>
</head>

<body>
    <center>
        <h1>PHP Mini Notes</h1>
        <h2>Navigation</h2>
        <p>Press <b>1</b> to Add Note</p>
        <p>Press <b>2</b> to Delete Note</p>
        <hr>
        <a href="add.php">1. Add Note</a>
        <br><br>
        <a href="delete.php">2. Delete Note</a>
    </center>

    <script>
        document.addEventListener("keydown", function (event) {
            if (event.key === "1") window.location.href = "add.php";
            if (event.key === "2") window.location.href = "delete.php";
        });
    </script>
</body>

</html>