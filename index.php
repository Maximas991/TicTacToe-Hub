<?php
/************************************************************
 *  DECLARATION, CONFIGURATION & MODULES
 ************************************************************/
session_start();
include("./inc/inc_modules.php");
include("./inc/inc_scripts.php");

$additional_css_1 = '<link rel="stylesheet" href="assets/css/welcome.css">';

// checks if user is logged in to set personalized title
if (isset($_SESSION['user_id'])) {
    $title = "Welcome back, " . htmlspecialchars($_SESSION['username']) . "!";
} else {
    $title = "Welcome to TicTacToe-Hub";
}
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
?>

<main>
    <!-- Personalized welcome message and action buttons based on login status -->
    <?php if (isset($_SESSION['user_id'])): ?>

        <section class="welcome">
            <h1>Welcome back, <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p>Ready for another round of TicTacToe?</p>

            <div class="welcome-buttons">
                <div class="btn primary"><a href="pages/game/tictactoe.php">Continue Playing</a>
            </div>

            <div class="btn secondary">
                    <a href="pages/view-profile.php" >Your Profile</a>
            </div>

            <div class="btn secondary">
                <a href="pages/leaderboard.php" >Leaderboard</a></div>
            </div>
        </section>

    <?php else: ?>

        <section class="welcome">
            <h1>Welcome to TicTacToe-Hub</h1>
            <p>Play, compete, and track your stats in the ultimate TicTacToe community.</p>
            <p>Love playing with toes?</p>

            <div class="welcome-buttons">
                <div><a href="pages/game/tictactoe.php" class="btn primary">Play Now</a></div>
                <div><a href="pages/register.php" class="btn secondary">Register</a></div>
            </div>
        </section>

    <?php endif; ?>

    <div class="game-card">
        <h1>Games</h1>

        <div class="game-scroll">
            <div class="game-card-item">
                <img src="assets/img/game-card/tictactoe2.png" alt="TicTacToe Icon">
                <h2>TicTacToe</h2>
                <p>Classic 3x3 grid game. Challenge friends or AI opponents.</p>
                <a href="pages/game/tictactoe.php" class="btn primary">Play Now</a>
            </div>

            <div class="game-card-item">
                <img src="assets/img/game-card/memory2.png" alt="Memory Game Icon">
                <h2>Memory Game</h2>
                <p>Test and improve your memory with this classic card matching game.</p>
                <a href="pages/game/memory.php" class="btn primary">Play Memory</a>
            </div>

            <div class="game-card-item">
                <img src="assets/img/game-card/snake2.png" alt="Snake Game Icon">
                <h2>Snake Game</h2>
                <p>Guide the snake to eat food and grow longer without hitting walls.</p>
                <a href="pages/game/snake.php" class="btn primary">Play Snake</a>
            </div>

            <div class="game-card-item">
                <img src="assets/img/game-card/tictactoe.png" alt="All Games Icon">
                <h2>All Games</h2>
                <p>Explore our complete collection of fun and challenging games.</p>
                <a href="pages/games.php" class="btn secondary">View All Games</a>
            </div>
        </div>
    </div>

        <div class="game-card">
        <h1>Tools</h1>

        <div class="game-scroll">
            <div class="game-card-item">
                <img src="assets/img/game-card/tictactoe2.png" alt="TicTacToe Icon">
                <h2>Calculator</h2>
                <p>Perform quick calculations with our easy-to-use calculator.</p>
                <a href="pages/tool/calculator.php" class="btn primary">Calcu-now!</a>
            </div>

            <div class="game-card-item">
                <img src="assets/img/game-card/memory2.png" alt="Memory Game Icon">
                <h2>GPA Calculator</h2>
                <p>Calculate your grade point average with our easy-to-use calculator.</p>
                <a href="pages/game/grade-point-calculator.php" class="btn primary">Use GPA Calculator</a>
            </div>

            <div class="game-card-item">
                <img src="assets/img/game-card/snake2.png" alt="Snake Game Icon">
                <h2>Snake Game</h2>
                <p>Guide the snake to eat food and grow longer without hitting walls.</p>
                <a href="pages/game/snake.php" class="btn primary">Play Snake</a>
            </div>

            <div class="game-card-item">
                <img src="assets/img/game-card/tictactoe.png" alt="All Tools Icon">
                <h2>All Tools</h2>
                <p>Explore our complete collection of fun and challenging tools.</p>
                <a href="pages/tools.php" class="btn secondary">View All Tools</a>
            </div>
        </div>
    </div>



</main>


<?php startScript();?>
<?php closeScript(); ?>


<?php
makeFooter();
closeBody();
?>
