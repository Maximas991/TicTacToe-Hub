<?php
/* =========================================================
   SESSION + MODULES
   ========================================================= */
session_start();
include("../inc/inc_modules.php");
require_once "../data/db_connect.php";


// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$title = "Your Profile";
$additional_css_1 = '<link rel="stylesheet" href="/TicTacToe-Hub/assets/css/avatar.css">';

// Fetch user data from database
$user_id = $_SESSION['user_id'];
$query = $conn->query("SELECT * FROM users WHERE user_id = $user_id");
$user = $query->fetch_assoc();

makeHead($title, $additional_css_1);
startBody();
makeHeader2($_SESSION['profile_img']);
?>

<main>

    

</main>

<?php
makeFooter();
closeBody();
?>
