<!-- 5. Multiple Select Dropdown -->


<!DOCTYPE html>
<html>

<head>
    <title>Multiple Select</title>
</head>

<body>

    <form method="POST">

        <select name="courses[]" multiple>

            <option>PHP</option>

            <option>Java</option>

            <option>Python</option>

            <option>Laravel</option>

            <option>React</option>

        </select>

        <br><br>

        <button>Save</button>

    </form>

    <hr>

    <?php

    if (isset($_POST["courses"])) {

        $courses = $_POST["courses"];

        echo "<h2>Selected Courses</h2>";

        foreach ($courses as $course) {

            echo $course;

            echo "<br>";
        }
    }

    ?>

</body>

</html>