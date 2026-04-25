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

$title = "Edit Profile";
$additionalcss1 = '<link rel="stylesheet" href="/TicTacToe-Hub/assets/css/edit-profile.css">';

// Fetch user data
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT firstname, lastname, username FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

makeHead($title, $additionalcss1);
startBody();
makeHeader2($_SESSION['profile_img']);
?>

<main>

    <div class="edit-profile-card">
        <h1>Edit Your Profile</h1>

        <?php if (isset($_SESSION['error'])): ?>
            <p class="error-msg"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <p class="success-msg"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>

        <form action="../inc/inc_edit-profile-handler.php" method="POST" class="edit-profile-form">

            <div>
                <img src="<?= htmlspecialchars($user['profile_img']); ?>" class="profile-img-large" alt="Profile Picture">
            </div>

            <label>First Name</label>
            <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['firstname']); ?>" required>

            <label>Last Name</label>
            <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['lastname']); ?>" required>

            <label>Username</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

            <button type="submit" class="save-btn">Save Changes</button>
        </form>
    </div>

</main>

<?php
makeFooter();
closeBody();
?>
