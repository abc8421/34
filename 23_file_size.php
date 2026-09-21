<!-- 4. File Size Validation

Many websites limit upload size.

Examples

Profile Picture - 2 MB
Assignment - 20 MB
Resume - 5 MB

Why validate file size?

1. Saves server storage.
2. Prevents users from uploading very large files.
3. Improves website performance.
4. Protects the server from unnecessary load.

$_FILES["image"]["size"]
Returns the uploaded file size in bytes.

Common Size Conversions

1 KB = 1024 Bytes
1 MB = 1024 KB = 1,048,576 Bytes

Examples

1 MB = 1048576 Bytes
2 MB = 2097152 Bytes
5 MB = 5242880 Bytes
10 MB = 10485760 Bytes

-->

<!DOCTYPE html>
<html>

<head>
    <title>File Size Validation</title>
</head>

<body>

    <!-- enctype="multipart/form-data" is required for file uploads -->

    <form method="POST" enctype="multipart/form-data">

        <input type="file" name="image">

        <br><br>

        <button>Upload</button>

    </form>

    <hr>

    <?php

    // Runs only after a file is selected and the form is submitted.
    if (isset($_FILES["image"])) {

        // Gets the uploaded file size in bytes.
        $size = $_FILES["image"]["size"];

        // Maximum allowed size (2 MB).
        // 2 × 1024 × 1024 = 2,097,152 Bytes
        $maxSize = 2 * 1024 * 1024;

        // Checks whether the uploaded file is within the allowed size.
        if ($size <= $maxSize) {

            echo "Valid Size";
        } else {

            echo "Maximum 2 MB Allowed.";
        }
    }

    ?>

</body>

</html>