<!DOCTYPE html>
<html>

<head>
    <title>Employee Registration Form</title>
</head>

<body>

    <?php

    // Random Username Generator
    $characters = "abcdefghijklmnopqrstuvwxyz";

    $randomUsername = "";

    // Generate 6 random characters
    for ($i = 1; $i <= 6; $i++) {
        $randomIndex = rand(0, 25);
        $randomUsername .= $characters[$randomIndex];
    }

    // Append 4 random digits
    $randomUsername .= rand(1000, 9999);

    ?>

    <center>
        <h2>Employee Registration Form</h2>

        <form method="POST" enctype="multipart/form-data">

            <table border="3" cellpadding="10" cellspacing="20">

                <tr>
                    <td><label>Employee Name</label></td>
                    <td><input type="text" name="name" required></td>
                </tr>

                <tr>
                    <td><label>Username</label></td>
                    <td>
                        <input type="text" id="username" name="username" readonly required>
                        <button type="button" onclick="generateUsername()">Generate User</button>
                    </td>
                </tr>

                <tr>
                    <td><label>Email</label></td>
                    <td><input type="email" name="email" required></td>
                </tr>

                <tr>
                    <td><label>Mobile</label></td>
                    <td><input type="text" name="mobile" required></td>
                </tr>

                <tr>
                    <td><label>Department</label></td>
                    <td>
                        <select name="department" required>
                            <option value="">Select Department</option>
                            <option>HR</option>
                            <option>Sales</option>
                            <option>Accounts</option>
                            <option>IT</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Salary</label></td>
                    <td><input type="number" name="salary" required></td>
                </tr>

                <tr>
                    <td><label>Profile Photo</label></td>
                    <td><input type="file" name="image" required></td>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <button type="submit" name="register">Register Employee</button>
                    </td>
                </tr>

            </table>

        </form>
    </center>
    <hr>

    <script>
    function generateUsername() {

        // PHP variable inside JavaScript
        let suggestedUsername = "<?php echo $randomUsername; ?>";

        let username = prompt("Edit Username if required:", suggestedUsername);

        if (username != null && username.trim() != "") {

            document.getElementById("username").value = username;

        }

    }
    </script>

    <?php

    if (isset($_POST["register"])) {

        // Get form values
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $department = $_POST["department"];
        $salary = $_POST["salary"];

        // Get uploaded file information
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $filesize = $_FILES["image"]["size"];

        // Get file extension
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Allowed file types
        $allowed = ["jpg", "jpeg", "png"];

        // Maximum file size = 2 MB
        $maxSize = 2 * 1024 * 1024;

        // Check file extension
        if (!in_array($extension, $allowed)) {

            echo "<p>Only JPG, JPEG and PNG files are allowed.</p>";
        }

        // Check file size
        elseif ($filesize > $maxSize) {

            echo "<p>Maximum File Size is 2 MB.</p>";
        } else {

            date_default_timezone_set("Asia/Kolkata");

            // Get original filename without extension
            $originalName = pathinfo($filename, PATHINFO_FILENAME);

            // Create new unique filename
            $newFilename =
                date("Y_m_d_H_i_s") . "_" .
                round(microtime(true) * 1000) . "_" .
                $originalName . "." .
                $extension;

            // Upload location
            $folder = "uploads/" . $newFilename;

            // Move uploaded file
            if (move_uploaded_file($tempname, $folder)) {

                echo "<center><h3>Employee Registered Successfully</h3>";

                echo "<hr>";

                echo "<img src='$folder' width='180' height='180'>";

                echo "<p><b>Name :</b> $name</p>";

                echo "<p><b>Username :</b> $username</p>";

                echo "<p><b>Email :</b> $email</p>";

                echo "<p><b>Mobile :</b> $mobile</p>";

                echo "<p><b>Department :</b> $department</p>";

                echo "<p><b>Salary :</b> ₹$salary</p>";

                echo "<p><b>Photo :</b> Uploaded Successfully</p></center>";
            } else {

                echo "<p>Image Upload Failed.</p>";
            }
        }
    }

    ?>

</body>

</html>