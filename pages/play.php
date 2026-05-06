<?php
/* =========================================================
   SESSION + MODULES
   ========================================================= */
session_start();
include("../inc/inc_modules.php");

$title = "Choose your game!";
$additional_css_1 = '<link rel="stylesheet" href="/TicTacToe-Hub/assets/css/play.css">';



makeHead($title, $additional_css_1);
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