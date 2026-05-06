<?php
/************************************************************
 *  DECLARATION, CONFIGURATION & MODULES
 ************************************************************/
session_start();
include("../../inc/inc_modules.php");
include("../../inc/inc_scripts.php");


$additional_css_1 = '<link rel="stylesheet" href="/TicTacToe-Hub/assets/css/calculator.css">';

$title = "Calculator - TicTacToe-Hub";
/*-------------------------------------------------------------------------------*/


/************************************************************
 *  OUTPUT (HEAD, HEADER, MAIN & FOOTER)
 ************************************************************/
makeHead($title, $additional_css_1); // Include the welcome CSS

startBody(); // Start the body tag

// checks if user is logged in to display appropriate header
if (isset($_SESSION['user_id'])) {
    makeHeader2($_SESSION['profile_img']);   // Header with profile image, logout button
} else {
    makeHeader();                            // Default header
}
// processing
if (isset($_POST['number1']) && isset($_POST['number2']) && isset($_POST['operation'])) {
    $num1 = floatval($_POST['number1']);
    $num2 = floatval($_POST['number2']);
    $operation = $_POST['operation'];
    $result = 0;

    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Error: Division by zero";
            }
            break;
        default:
            $result = "Invalid operation";
    }
}
?>

<main>
    <section class="calculator-container">
        <div class="calculator-card">
            <h1>Calculator</h1>
            <form action="calculator.php" method="POST" onsubmit="return false;">
                <div class="input-group">
                    <input type="number" id="number1" name="number1" placeholder="Enter a number" value="<?= isset($_POST['number1']) ? htmlspecialchars($_POST['number1']) : '' ?>">
                    <select id="operation" name="operation">
                        <option value="add"<?= (isset($_POST['operation']) && $_POST['operation'] === 'add') ? ' selected' : '' ?>>+</option>
                        <option value="subtract"<?= (isset($_POST['operation']) && $_POST['operation'] === 'subtract') ? ' selected' : '' ?>>-</option>
                        <option value="multiply"<?= (isset($_POST['operation']) && $_POST['operation'] === 'multiply') ? ' selected' : '' ?>>*</option>
                        <option value="divide"<?= (isset($_POST['operation']) && $_POST['operation'] === 'divide') ? ' selected' : '' ?>>/</option>
                    </select>
                    <input type="number" id="number2" name="number2" placeholder="Enter another number" value="<?= isset($_POST['number2']) ? htmlspecialchars($_POST['number2']) : '' ?>">
                </div>
                <button type="button" onclick="calculate()">Calculate</button>
                <div id="result">
                    <?php if (isset($result)) { echo $result; } else { echo "Result"; } ?>
                </div>
            </form>
        </div>
    </section>
</main>


<?php startScript();?>
function calculate() {
    var number1 = document.getElementById('number1').value;
    var number2 = document.getElementById('number2').value;
    var operation = document.getElementById('operation').value;
    var resultElement = document.getElementById('result');

    if (number1 === '' || number2 === '') {
        resultElement.textContent = 'Enter both numbers';
        return;
    }

    var a = parseFloat(number1);
    var b = parseFloat(number2);
    var result;

    switch (operation) {
        case 'add':
            result = a + b;
            break;
        case 'subtract':
            result = a - b;
            break;
        case 'multiply':
            result = a * b;
            break;
        case 'divide':
            if (b === 0) {
                result = 'Error: Division by zero';
            } else {
                result = a / b;
            }
            break;
        default:
            result = 'Invalid operation';
    }

    resultElement.textContent = result;
}
<?php closeScript(); ?>


<?php
makeFooter();
closeBody();
?>
