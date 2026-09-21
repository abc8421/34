<!-- 4. Select Dropdown -->


<!DOCTYPE html>
<html>

<head>
    <title>Select Example</title>
</head>

<body>

    <form method="POST">

        <select name="country">
            <option value="">Select</option>

            <option>India</option>

            <option>USA</option>

            <option>Canada</option>

            <option>Australia</option>

        </select>

        <br><br>

        <button>Submit</button>

    </form>

    <hr>

    <?php

    if (isset($_POST["country"])) {

        $country = $_POST["country"];

        if (empty($country)) {

            echo "Please Select Country.";
        } else {

            echo "Country : " . $country;
        }
    }

    ?>

</body>

</html>