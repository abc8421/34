<!-- Gender Selection -->


<!DOCTYPE html>
<html>

<head>
    <title>Radio Button Example</title>
</head>

<body>

    <h2>Gender Selection</h2>

    <form method="POST">

        <input type="radio" name="gender" value="Male"> Male

        <input type="radio" name="gender" value="Female"> Female

        <input type="radio" name="gender" value="Other"> Other

        <br><br>

        <button type="submit">Submit</button>

    </form>

    <hr>

    <?php

    if (isset($_POST["gender"])) {

        $gender = $_POST["gender"];

        echo "<h3>Selected Gender</h3>";

        echo $gender;
    } else {

        echo "Please select a gender.";
    }

    ?>

</body>

</html>