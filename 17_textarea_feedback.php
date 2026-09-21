<!-- 6. Textarea Processing -->


<!DOCTYPE html>
<html>

<head>
    <title>Feedback</title>
</head>

<body>

    <form method="POST">

        <textarea name="feedback" rows="5" cols="40"></textarea>

        <br><br>

        <button>Submit</button>

    </form>

    <hr>

    <?php

    if (isset($_POST["feedback"])) {

        $feedback = trim($_POST["feedback"]);

        $feedback = htmlspecialchars($feedback);

        echo "<h2>Feedback Received</h2>";

        echo nl2br($feedback);
    }

    ?>

</body>

</html>