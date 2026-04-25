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
$additionalcss1 = '<link rel="stylesheet" href="/TicTacToe-Hub/assets/css/profile.css">';

// Fetch user data from database
$user_id = $_SESSION['user_id'];
$query = $conn->query("SELECT * FROM users WHERE user_id = $user_id");
$user = $query->fetch_assoc();

makeHead($title, $additionalcss1);
startBody();
makeHeader2($_SESSION['profile_img']);
?>

<main>

    <div class="profile-card">

        <div class="profile-img-wrapper">
            <img src="<?= htmlspecialchars($user['profile_img']); ?>" class="profile-img-large" alt="Profile Picture">
        </div>

        <h1><?= htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']); ?></h1>
        <p class="username">@<?= htmlspecialchars($user['username']); ?></p>

        <div class="profile-info">
            <p><strong>First Name:</strong> <?= htmlspecialchars($user['firstname']); ?></p>
            <p><strong>Last Name:</strong> <?= htmlspecialchars($user['lastname']); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
            <p><strong>Member Since:</strong> <?= htmlspecialchars($user['created_at']); ?></p>
        </div>

        <a href="./edit-profile.php" class="btn primary">Edit Profile</a>

    </div>

</main>

<?php
makeFooter();
closeBody();
?>
