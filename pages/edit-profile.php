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
$additional_css_1 = '<link rel="stylesheet" href="/TicTacToe-Hub/assets/css/edit-profile.css">';

// Fetch user data
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT first_name, last_name, username, profile_img FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

makeHead($title, $additional_css_1);
startBody();
makeHeader2($_SESSION['profile_img']);
?>

<main>

    <section class="edit-profile-container">
        <div class="edit-profile-card">
            <h1>Edit Your Profile</h1>

            <!-- =========================================================
                 ERROR MESSAGE
                 ========================================================= -->
            <?php if (isset($_SESSION['error'])): ?>
                <p class="error-msg"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>

            <!-- =========================================================
                 EDIT PROFILE FORM
                 ========================================================= -->
            <form action="/TicTacToe-Hub/handlers/edit-profile_handler.php" method="POST" class="edit-profile-form">

                <div class="profile-img-wrapper">
                    <img src="<?= htmlspecialchars($_SESSION['profile_img']); ?>" class="profile-img-large" alt="Profile Picture">

                    <div class="edit-icon-overlay">
                        <img src="/TicTacToe-Hub/assets/img/icons/pencil.svg" alt="Edit" class="edit-icon">
                    </div>
                </div>

                <label>Username</label>
                <input type="text" name="username" value="<?= htmlspecialchars($user['username']); ?>" required>

                <label>First Name</label>
                <input type="text" name="first_name" value="<?= htmlspecialchars($user['first_name']); ?>" required>

                <label>Last Name</label>
                <input type="text" name="last_name" value="<?= htmlspecialchars($user['last_name']); ?>" required>

                <a id="forgot-pass" href="#">
                    <p>Forgot your password?</p>
                </a>

                <button type="submit" class="save-btn">Save Changes</button>

                <!-- Hidden input to store selected image -->
                <input type="hidden" name="profile_img" id="selectedProfileImg">
            </form>

            <!-- ============================
                PROFILE IMAGE POPUP MODAL
                ============================ -->
            <div id="profileModal" class="modal">
                <div class="modal-content">

                    <h2>Select a Profile Picture</h2>

                    <!-- Scrollable area -->
                    <div class="modal-scroll-area">
                        <div class="profile-grid">
                            <img src="/TicTacToe-Hub/assets/img/profile/avatars/1)girl.png" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/avatars/2)knight_1.png" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/avatars/3)knight_2.png" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/avatars/4)boy.png" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/Bear.jpg" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/default.jpg" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/honey_bun_baby.jpg" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/joel.jpg" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/luffy_kid.jpg" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/nathan.jpg" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/quandale_dingle_1.jpeg" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/quandale_dingle_2.jpeg" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/smiling_luffy.png" class="selectable-img">
                            <img src="/TicTacToe-Hub/assets/img/profile/thinking_monkey.jpeg" class="selectable-img">
                        </div>
                    </div>

                    <button id="closeModal" class="close-btn">Close</button>

                </div>
            </div>

        </div>
    </section>

</main>

<?php
makeFooter();
?>

<script>
// Open modal when clicking the edit icon
document.querySelector(".edit-icon-overlay").addEventListener("click", () => {
    document.getElementById("profileModal").style.display = "flex";
});

// Close modal
document.getElementById("closeModal").addEventListener("click", () => {
    document.getElementById("profileModal").style.display = "none";
});

// Select profile picture
document.querySelectorAll(".selectable-img").forEach(img => {
    img.addEventListener("click", () => {

        // Update preview image
        document.querySelector(".profile-img-large").src = img.src;

        // Save selected image path to hidden input
        document.getElementById("selectedProfileImg").value = img.src;

        // Close modal
        document.getElementById("profileModal").style.display = "none";
    });
});
</script>

<?php
closeBody();
?>
