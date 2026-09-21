<!-- ------------php start----------------- -->
<?php

// Function to display one quiz question with its options.
function displayQuestion($number, $name, $question, $options)
{
    ?>
<!-- ------------php end----------------- -->

<!-- ------------html start----------------- -->
<tr>

    <td>

        <!--PHP displays the question number and question text inside HTML.-->
        <b><?php echo $number . ". " . $question; ?></b>

        <br><br>
        <!-- ------------html end----------------- -->

        <!-- ------------php start----------------- -->
        <?php

            // Loop through all answer options.
            foreach ($options as $option) {

                ?>
        <!-- ------------php end----------------- -->

        <!-- ------------html start----------------- -->
        <input type="radio" name="<?php echo $name; ?>" value="<?php echo $option; ?>">

        <?php echo $option; ?>

        <br>
        <!-- ------------html end----------------- -->

        <!-- ------------php start----------------- -->
        <?php

                // End the foreach loop.
            }

            ?>
        <!-- ------------php end----------------- -->

        <!-- ------------html start----------------- -->
    </td>

</tr>
<!-- ------------html end----------------- -->

<!-- ------------php start----------------- -->
<?php
}
?>
<!-- ------------php end----------------- -->

<!-- ------------html start----------------- -->
<form method="POST">

    <center>

        <h2>PHP Quiz</h2>

        <table border="3" cellpadding="10" cellspacing="10">
            <!-- ------------html end----------------- -->

            <!-- ------------php start----------------- -->
            <?php

            // Call the function for each question.
            displayQuestion(1, "q1", "Which programming language is mainly used for server-side web development?", ["HTML", "PHP", "CSS", "MS Word"]);

            displayQuestion(2, "q2", "PHP stands for?", ["Personal Home Page", "Hyper Text Preprocessor", "Programming Home Page", "Private Home Processor"]);

            displayQuestion(3, "q3", "Which PHP statement is used to display output?", ["echo", "printline", "show", "display"]);

            displayQuestion(4, "q4", "Which language is used to create web pages?", ["Java", "Python", "HTML", "C++"]);

            displayQuestion(5, "q5", "What is the default server name used in XAMPP?", ["google.com", "localhost", "php.net", "server"]);
            ?>
            <!-- ------------php end----------------- -->

            <!-- ------------html start----------------- -->
            <tr>
                <td align="center">

                    <!-- Button to submit the quiz -->
                    <button type="submit" name="submitQuiz">Submit Quiz</button>

                </td>
            </tr>

        </table>

    </center>

</form>
<!-- ------------html end----------------- -->

<!-- ------------php start----------------- -->
<?php

// Store all correct answers using an associative array.
$correctAnswers = [
    "q1" => "PHP",
    "q2" => "Hyper Text Preprocessor",
    "q3" => "echo",
    "q4" => "HTML",
    "q5" => "localhost"
];

// Run the following code only after the form is submitted.
if (isset($_POST["submitQuiz"])) {

    // Variable to store the student's score.
    $score = 0;

    // Count the total number of questions.
    $totalQuestions = count($correctAnswers);

    // echo "<pre>";
    // print_r($_POST); // Debugging line to print the submitted answers.
    // echo "</pre>";

    // Check every submitted answer.
    foreach ($correctAnswers as $question => $answer) {

        // Compare the user's answer with the correct answer.
        // if ( $_POST[$question] == $answer) {
        if (isset($_POST[$question]) && $_POST[$question] == $answer) {
            $score++;
        }
    }

    // Display the quiz result.
    echo "<hr>";
    echo "<center>";

    echo "<h2>Quiz Result</h2>";
    echo "<h3>Your Score: $score / $totalQuestions</h3>";

    echo "</center>";
}
?>
<!-- ------------php end----------------- -->


<!-- =========== To show results in detailed view =============== -->
<!-- <?php

$correctAnswers = [
    "q1" => "PHP",
    "q2" => "Hyper Text Preprocessor",
    "q3" => "echo",
    "q4" => "HTML",
    "q5" => "localhost"
];

if (isset($_POST["submitQuiz"])) {

    $score = 0;
    $totalQuestions = count($correctAnswers);

    foreach ($correctAnswers as $question => $answer) {
        if (isset($_POST[$question]) && $_POST[$question] == $answer) {
            $score++;
        }
    }

    echo "<hr>";
    echo "<center>";

    echo "<h2>Quiz Result</h2>";

    echo "<p><b>Total Questions :</b> $totalQuestions</p>";
    echo "<p><b>Correct Answers :</b> $score</p>";
    echo "<p><b>Wrong Answers :</b> " . ($totalQuestions - $score) . "</p>";
    echo "<p><b>Percentage :</b> " . (($score / $totalQuestions) * 100) . "%</p>";

    if ($score == $totalQuestions) {
        echo "<h3 style='color:green;'>Excellent!</h3>";
    } elseif ($score >= 3) {
        echo "<h3 style='color:blue;'>Good Job!</h3>";
    } else {
        echo "<h3 style='color:red;'>Keep Practicing!</h3>";
    }

    echo "<hr>";
    echo "<h3>Answer Review</h3>";

    foreach ($correctAnswers as $question => $answer) {

        $userAnswer = isset($_POST[$question]) ? $_POST[$question] : "Not Answered";

        echo "<p>";
        echo "<b>$question</b><br>";
        echo "Your Answer : $userAnswer<br>";
        echo "Correct Answer : $answer<br>";

        if ($userAnswer == $answer) {
            echo "<span style='color:green;'>✔ Correct</span>";
        } else {
            echo "<span style='color:red;'>✘ Wrong</span>";
        }

        echo "</p><hr>";
    }

    echo "</center>";
}
?> -->