<!-- 2. move_uploaded_file() -->

<!DOCTYPE html>
<html>

<head>
    <title>Upload Image</title>
</head>

<body>

    <!-- Encoding Type -->

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <br><br>
        <button type="submit">Upload</button>
    </form>

    <hr>

    <?php
    if (isset($_FILES["image"])) {

        $filename = $_FILES["image"]["name"]; // Gets the original name of the uploaded file.
        $tempname = $_FILES["image"]["tmp_name"]; // Gets the temporary location where PHP stores the uploaded file before we save it. C:\xampp\tmp\php1234.tmp

        // Gets the file name without extension
        $originalName = pathinfo($filename, PATHINFO_FILENAME);

        // Gets the file extension (jpg, png, jpeg, etc.)
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // Creates a unique file name using Year_Month_Date_Hour_Minute_Second_Millisecond_OriginalName
        date_default_timezone_set("Asia/Kolkata");
        $newFilename = date("Y_m_d_H_i_s") . "_" . round(microtime(true) * 1000) . "_" . $originalName . "." . $extension;

        $folder = "uploads/" . $newFilename;

        if (move_uploaded_file($tempname, $folder)) { // move_uploaded_file() → Moves the file from the temporary location to your uploads folder

            // Display the uploaded image
            echo "<img src='$folder' alt='Uploaded Image' width='300'><br><br>";
            echo "Image Uploaded Successfully.";
        } else {
            echo "Upload Failed.";
        }
    }
    ?>

</body>

</html>