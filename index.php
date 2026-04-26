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

</main>


<?php startScript();?>
<?php closeScript(); ?>


<?php
makeFooter();
closeBody();
?>
