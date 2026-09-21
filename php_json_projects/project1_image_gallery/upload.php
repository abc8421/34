<?php
if (isset($_POST["upload"])) {
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $filesize = $_FILES["image"]["size"];

    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allowed = ["jpg", "jpeg", "png", "gif"];
    $maxSize = 2 * 1024 * 1024;

    if (!in_array($extension, $allowed)) {
        echo "<center><p>Only JPG, JPEG, PNG and GIF files are allowed.</p></center>";
    } elseif ($filesize > $maxSize) {
        echo "<center><p>Maximum file size is 2 MB.</p></center>";
    } else {
        $originalName = pathinfo($filename, PATHINFO_FILENAME);
        date_default_timezone_set("Asia/Kolkata");
        $newFilename = date("Y_m_d_H_i_s") . "_" . round(microtime(true) * 1000) . "_" . $originalName . "." . $extension;
        $folder = "uploads/" . $newFilename;

        if (move_uploaded_file($tempname, $folder)) {
            echo "<center><p>Image Uploaded Successfully.</p></center>";
        } else {
            echo "<center><p>Image Upload Failed.</p></center>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
</head>
<body>
<center>
    <h2>Upload Image</h2>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <br><br>
        <button type="submit" name="upload">Upload Image</button>
    </form>

    <br>
    <p>Press <b>Backspace</b> to return to Home</p>
</center>

<script>
document.addEventListener("keydown", function(event) {
    if (event.key === "Backspace") {
        event.preventDefault();
        window.location.href = "index.php";
    }
});
</script>
</body>
</html>
