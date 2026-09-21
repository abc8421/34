<!DOCTYPE html>
<html>

<head>
    <title>PHP Image Gallery</title>
</head>

<body>

    <center>
        <h2>PHP Image Gallery</h2>
        <!-- Upload Form -->

        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="image" required>

            <button type="submit" name="upload">Upload Image</button>
        </form>
    </center>

    <hr>

    <?php

    // ---------------- UPLOAD IMAGE ----------------
    if (isset($_POST["upload"])) {
        // Get image information
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $filesize = $_FILES["image"]["size"];
        // Get extension
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        // Allowed extensions
        $allowed = ["jpg", "jpeg", "png", "gif"];
        // Maximum size = 2 MB
        $maxSize = 2 * 1024 * 1024;
        // Check extension
        if (!in_array($extension, $allowed)) {
            echo "<center>";
            echo "<p>Only JPG, JPEG, PNG and GIF files are allowed.</p>";
            echo "</center>";
        }
        // Check size
        elseif ($filesize > $maxSize) {
            echo "<center>";
            echo "<p>Maximum file size is 2 MB.</p>";
            echo "</center>";
        } else {
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $originalName = pathinfo($filename, PATHINFO_FILENAME);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            date_default_timezone_set("Asia/Kolkata");
            $newFilename = date("Y_m_d_H_i_s") . "_" . round(microtime(true) * 1000) . "_" . $originalName . "." . $extension;
            $folder = "uploads/" . $newFilename;
            if (move_uploaded_file($tempname, $folder)) {
                echo "<center>";
                echo "<p>Image Uploaded Successfully.</p>";
                echo "</center>";
            } else {
                echo "<center>";
                echo "<p>Image Upload Failed.</p>";
                echo "</center>";

            }
        }
    }


    // ---------------- DELETE IMAGE ----------------
    
    if (isset($_GET["delete"])) {

        $image = $_GET["delete"];
        $file = "uploads/" . $image;

        if (file_exists($file)) {

            // Deletes a file
            unlink($file);
            echo "<center><p>Image Deleted Successfully.</p></center>";
        }
        header("Location: 33_image_gallary.php");
        exit();
    }

    ?>

    <hr>

    <center>
        <h2>My Image Gallery</h2>

        <?php
        // Get images from uploads folder
        $images = scandir("uploads/");
        echo "<table border='3' cellpadding='10' cellspacing='10'>";

        $count = 0;

        foreach ($images as $image) {
            if ($image == "." || $image == "..") {
                continue;
            }
            $extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif" || $extension == "webp") {

                if ($count % 3 == 0) {
                    echo "<tr>";
                }

                echo "<td align='center'>";
                echo "<img src='uploads/$image' width='180' height='150'>";
                echo "<br><br>";
                echo "<b>Name: $image</b>";
                echo "<br><br>";
                echo "<a href='33_image_gallary.php?delete=$image'>Delete</a>";
                echo "</td>";

                $count++;

                if ($count % 3 == 0) {
                    echo "</tr>";
                }
            }
        }

        if ($count % 3 != 0) {
            echo "</tr>";
        }

        echo "</table>";

        ?>

    </center>

</body>

</html>