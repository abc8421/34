<!DOCTYPE html>
<html>

<head>
    <title>Employee Registration Form</title>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        background: #f4f6f9;
        padding: 30px;
    }

    h2 {
        text-align: center;
        color: #0d6efd;
        margin-bottom: 20px;
    }

    form {
        width: 500px;
        margin: auto;
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 15px;
    }

    input[type="file"] {
        padding: 8px;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #0d6efd;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background: #0b5ed7;
    }

    .success {
        width: 500px;
        margin: 20px auto;
        background: #d1e7dd;
        color: #0f5132;
        padding: 15px;
        border: 1px solid #badbcc;
        border-radius: 5px;
        text-align: center;
        font-weight: bold;
    }

    .error {
        width: 500px;
        margin: 20px auto;
        background: #f8d7da;
        color: #842029;
        padding: 15px;
        border: 1px solid #f5c2c7;
        border-radius: 5px;
        text-align: center;
        font-weight: bold;
    }

    .employee-card {
        width: 500px;
        margin: 20px auto;
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        text-align: center;
    }

    .employee-card img {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #0d6efd;
        margin-bottom: 20px;
    }

    .employee-card p {
        margin: 10px 0;
        font-size: 17px;
    }

    @media(max-width:600px) {

        form,
        .employee-card,
        .success,
        .error {
            width: 100%;
        }
    }
    </style>

</head>

<body>

    <h2>Employee Registration Form</h2>

    <form method="POST" enctype="multipart/form-data">

        <label>Employee Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Mobile</label>
        <input type="text" name="mobile" required>

        <label>Department</label>
        <select name="department" required>
            <option value="">Select Department</option>
            <option>HR</option>
            <option>Sales</option>
            <option>Accounts</option>
            <option>IT</option>
        </select>

        <label>Salary</label>
        <input type="number" name="salary" required>

        <label>Profile Photo</label>
        <input type="file" name="image" required>

        <button type="submit" name="register">
            Register Employee
        </button>

    </form>

    <hr>

    <?php

    if (isset($_POST["register"])) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $department = $_POST["department"];
        $salary = $_POST["salary"];

        // File Information
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $filesize = $_FILES["image"]["size"];

        // File Extension
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Allowed Extensions
        $allowed = ["jpg", "jpeg", "png"];

        // Maximum Size (2 MB)
        $maxSize = 2 * 1024 * 1024;

        if (!in_array($extension, $allowed)) {
            echo "<div class='error'>Only JPG, JPEG and PNG files are allowed.</div>";
        } elseif ($filesize > $maxSize) {
            echo "<div class='error'>Maximum File Size is 2 MB.</div>";
        } else {
            // Create Unique File Name
            date_default_timezone_set("Asia/Kolkata");

            $originalName = pathinfo($filename, PATHINFO_FILENAME);

            $newFilename =
                date("Y_m_d_H_i_s") . "_" .
                round(microtime(true) * 1000) . "_" .
                $originalName . "." . $extension;

            $folder = "uploads/" . $newFilename;

            if (move_uploaded_file($tempname, $folder)) {

                echo "<div class='success'>Employee Registered Successfully</div>";

                echo "<div class='employee-card'>";

                echo "<img src='$folder'>";

                echo "<p><b>Name :</b> $name</p>";

                echo "<p><b>Email :</b> $email</p>";

                echo "<p><b>Mobile :</b> $mobile</p>";

                echo "<p><b>Department :</b> $department</p>";

                echo "<p><b>Salary :</b> ₹$salary</p>";

                echo "<p><b>Photo :</b> Uploaded Successfully</p>";

                echo "</div>";
            } else {
                echo "<div class='error'>Image Upload Failed.</div>";
            }
        }
    }

    ?>

</body>

</html>