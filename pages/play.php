<?php
/* =========================================================
   SESSION + MODULES
   ========================================================= */
session_start();
include("../inc/inc_modules.php");

$title = "Choose your game!";
$additionalcss1 = '<link rel="stylesheet" href="/TicTacToe-Hub/assets/css/play.css">';



makeHead($title, $additionalcss1);
startBody();

if (isset($_SESSION['user_id'])) {
    makeHeader2($_SESSION['profile_img']);
} else {
    makeHeader();
}
?>

<main>
    
</main>


<?php
makeFooter();
closeBody();
?>