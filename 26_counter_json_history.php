<?php

date_default_timezone_set("Asia/Kolkata");

$counterFile = "counter.txt";
$historyFile = "history.json";

// Read counter
if (file_exists($counterFile)) {
    $count = (int) file_get_contents($counterFile);
} else {
    $count = 0;
}

// Increase
if (isset($_POST["inc"])) {
    $count++;
    file_put_contents($counterFile, $count);

    $history = file_exists($historyFile) ? json_decode(file_get_contents($historyFile), true) : [];

    $history[] = [
        "date" => date("d-M-Y h:i:s A"),
        "action" => "Increased",
        "count" => $count
    ];

    file_put_contents($historyFile, json_encode($history, JSON_PRETTY_PRINT));
}

// Decrease
if (isset($_POST["dec"])) {
    $count--;
    file_put_contents($counterFile, $count);

    $history = file_exists($historyFile) ? json_decode(file_get_contents($historyFile), true) : [];

    $history[] = [
        "date" => date("d-M-Y h:i:s A"),
        "action" => "Decreased",
        "count" => $count
    ];

    file_put_contents($historyFile, json_encode($history, JSON_PRETTY_PRINT));
}

// Reset counter
if (isset($_POST["reset"])) {
    $count = 0;
    file_put_contents($counterFile, $count);

    $history = file_exists($historyFile) ? json_decode(file_get_contents($historyFile), true) : [];

    $history[] = [
        "date" => date("d-M-Y h:i:s A"),
        "action" => "Reset",
        "count" => $count
    ];

    file_put_contents($historyFile, json_encode($history, JSON_PRETTY_PRINT));
}

// Clear history
if (isset($_POST["clear"])) {
    file_put_contents($historyFile, "[]");
}

// Read history
$history = file_exists($historyFile) ? json_decode(file_get_contents($historyFile), true) : [];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Counter with History</title>
</head>

<body>

    <div align="center">

        <h1>Counter with History</h1>

        <h2>Current Count: <?php echo $count; ?></h2>

        <form method="post">
            <button name="inc">Increase</button>
            <button name="dec">Decrease</button>
            <button name="reset">Reset</button>
            <button name="clear">Clear History</button>
        </form>

        <br><br>

        <h2>History Log</h2>

        <table border="1" cellpadding="10" cellspacing="0">


            <?php

            if (!empty($history)) {

                echo "<tr>
                <th>Date & Time</th>
                <th>Action</th>
                <th>Counter</th>
                    </tr>";
                foreach ($history as $row) {


                    echo "<tr>";

                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["action"] . "</td>";
                    echo "<td>" . $row["count"] . "</td>";

                    echo "</tr>";
                }

            } else {

                echo "<tr>";
                echo "<td colspan='3'>No History Available</td>";
                echo "</tr>";

            }

            ?>

        </table>

    </div>

</body>

</html>