<?php
/*
==================== PHP FUNCTIONS USED ====================
is_dir()                    // Checks whether the given folder exists.
mkdir()                     // Creates a new directory (folder).
scandir()                   // Returns all files and folders inside a directory as an array.
strtolower()                // Converts all letters in a string to lowercase.
array_push()                // Adds one or more elements to the end of an array.
count()                     // Returns the total number of elements in an array.
json_encode()               // Converts a PHP array or object into JSON format for JavaScript.

============================================================
*/
?>

<!DOCTYPE html>
<html>

<head>
    <title>Image Carousel Upload</title>
</head>

<body>

    <h2>Image Upload & Carousel</h2>

    <form method="POST" enctype="multipart/form-data">

        <input type="file" name="image" required>

        <br><br>

        <button type="submit">Upload Image</button>

    </form>

    <hr>

    <?php

    // isset() : Checks whether the variable exists and is not NULL.
    if (isset($_FILES["image"])) {

        // Gets the original uploaded file name.
        $filename = $_FILES["image"]["name"];

        // Gets the temporary file path created by PHP.
        $tempname = $_FILES["image"]["tmp_name"];

        $originalName = pathinfo($filename, PATHINFO_FILENAME);

        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        date_default_timezone_set("Asia/Kolkata");

        $newFilename = date("Y_m_d_H_i_s") . "_" . round(microtime(true) * 1000) . "_" . $originalName . "." . $extension;

        // is_dir() : Checks whether the folder exists.
        // ! (NOT) means the folder does not exist.
        if (!is_dir("carousal")) {

            // mkdir() : Creates a new folder.
            mkdir("carousal");
        }

        $folder = "carousal/" . $newFilename;

        // move_uploaded_file() : Moves uploaded file from temporary folder to destination folder.
        if (move_uploaded_file($tempname, $folder)) {

            // Executes if upload is successful.
            echo "Image Uploaded Successfully.";
        } else {

            // Executes if upload fails.
            echo "Upload Failed.";
        }
    }

    ?>

    <hr>

    <h2>Stored Images</h2>

    <?php

    // Creates an empty array to store image paths.
    $images = [];

    // is_dir() : Checks whether the carousal folder exists.
    if (is_dir("carousal")) {

        // scandir() : Returns all files and folders inside a directory in array.
        $files = scandir("carousal");

        // print_r($files);

        // foreach : Loops through every file in the folder.
        foreach ($files as $file) {

            // Ignore "." (current folder) and ".." (parent folder).
            if ($file != "." && $file != "..") {

                $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                // Checks whether the file is a supported image.
                if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif" || $extension == "webp") {

                    // Adds the image path to the array. - PHP automatically chooses the next available index. 
                    // $images[] = "carousal/" . $file;

                    // array_push() : Adds one or more elements to the end of an array.
                    array_push($images, "carousal/" . $file);
                }
            }
        }
    }

    // count() : Returns the total number of elements in an array.
    if (count($images) > 0) {
    ?>

    <!-- Displays the first image initially -->
    <img id="carouselImage" src="<?php echo $images[0]; ?>" alt="Uploaded Image" width="400">

    <br><br>

    <!-- count() : Displays total number of uploaded images -->
    Total Images :
    <b><?php echo count($images); ?></b>
    <br>

    <script>
    // json_encode() : Converts PHP array into a JavaScript array.
    let images = <?php echo json_encode($images); ?>;

    // Stores the current image index.
    let index = 0;

    // setInterval() : Executes the function repeatedly after every 2000 milliseconds (2 seconds).
    setInterval(function() {

        // Move to the next image.
        index++;

        // If last image is reached, start again from the first image.
        if (index >= images.length) {
            index = 0;
        }

        // getElementById() : Finds an HTML element using its id.
        // src : Changes the image source.
        document.getElementById("carouselImage").src = images[index];

    }, 2000);
    </script>

    <?php

    } else {

        // Executes when no images are found in the carousal folder.
        echo "No images found in carousal folder.";
    }

    ?>
</body>

</html>

<!-- // Option 2 instead of using - json_encode() (Manually create the JavaScript array)
        //     let images = [
        // <?php
            // foreach ($images as $image) {
            //     echo '"' . $image . '",';
            // }
            //    
            ?>
        //     ]; -->