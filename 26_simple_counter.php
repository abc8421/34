<!DOCTYPE html>
<html>

<head>
    <title>Simple Counter</title>
    <style>
    body {
        font-family: Arial;
        background: #f4f6f9;
        padding: 20px;
    }

    .box {
        background: white;
        padding: 20px;
        border-radius: 8px;
        max-width: 400px;
        margin: auto;
        text-align: center;
    }

    button {
        padding: 10px 15px;
        margin: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        color: white;
    }

    .inc {
        background: #28a745;
    }

    .dec {
        background: #dc3545;
    }

    .reset {
        background: #6c757d;
    }

    .count {
        font-size: 40px;
        margin: 20px 0;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="box">
        <h1>Simple Counter</h1>

        <?php
        $fileName = "counter.txt";

        function readCount($fileName)
        {
            // If the counter file does not exist or is empty, start at 0.
            // This avoids warnings from file_get_contents and ensures a valid number.
            if (!file_exists($fileName) || filesize($fileName) === 0) {
                return 0;
            }

            // Read the file content and trim whitespace/newline characters.
            $value = trim(file_get_contents($fileName));

            // If the file contains a numeric value, convert it to an integer.
            // Otherwise, fall back to 0 to avoid invalid counter values.
            return is_numeric($value) ? (int)$value : 0;
        }

        function saveCount($fileName, $value)
        {
            // Save the current count back to the file for persistence.
            file_put_contents($fileName, $value);
        }

        // Load the existing count from the file before handling form input.
        $count = readCount($fileName);

        // Determine which button was submitted and update the counter accordingly.
        if (isset($_POST["inc"])) {
            // The Increase button was clicked.
            $count++;
            saveCount($fileName, $count);
        } elseif (isset($_POST["dec"])) {
            // The Decrease button was clicked.
            $count--;
            saveCount($fileName, $count);
        } elseif (isset($_POST["reset"])) {
            // The Reset button was clicked.
            $count = 0;
            saveCount($fileName, $count);
        }
        ?>

        <div class="count"><?php echo $count; ?></div>

        <form method="post">
            <button class="inc" name="inc">Increase</button>
            <button class="dec" name="dec">Decrease</button>
            <button class="reset" name="reset">Reset</button>
        </form>
    </div>
</body>

</html>