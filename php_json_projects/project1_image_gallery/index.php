<!DOCTYPE html>
<html>

<head>
    <title>PHP Image Gallery</title>
</head>

<body>
    <center>
        <h1>PHP Image Gallery</h1>
        <h2>Navigation</h2>
        <p>Press <b>1</b> to Upload Image</p>
        <p>Press <b>2</b> to Delete Image</p>
        <hr>
        <a href="upload.php">1. Upload Image</a>
        <br><br>
        <a href="delete.php">2. Delete Image</a>
    </center>

    <script>
    document.addEventListener("keydown", function(event) {
        if (event.key === "1") {
            window.location.href = "upload.php";
        }
        if (event.key === "2") {
            window.location.href = "delete.php";
        }
    });
    </script>
</body>

</html>