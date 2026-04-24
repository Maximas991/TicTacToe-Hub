<?php
/* =========================================================
   SESSION + MODULES
   ========================================================= */
session_start(); // Required to read/write session variables
include("../inc/inc_modules.php"); // Loads your header, footer, etc.

/* =========================================================
   PAGE SETTINGS
   ========================================================= */
$title = "Login";
$additionalcss1 = '<link rel="stylesheet" href="/TicTacToe-Hub/assets/css/log-reg.css">';

/* =========================================================
   PAGE START
   ========================================================= */
makeHead($title, $additionalcss1);
startBody();
makeHeader();
?>

<main>
    <section class="login-container">
        <div class="login-card">
            <h1>Login</h1>

            <!-- =========================================================
                 SUCCESS MESSAGE (after registration)
                 ========================================================= -->
            <?php if (isset($_SESSION['register_success'])): ?>
                <div class="success-msg">
                    <?= htmlspecialchars($_SESSION['register_success']); ?>
                </div>
                <?php unset($_SESSION['register_success']); ?>
            <?php endif; ?>

            <!-- =========================================================
                 ERROR MESSAGE (wrong email or password)
                 ========================================================= -->
            <?php if (isset($_SESSION['login_error'])): ?>
                <div class="error-msg">
                    <?= htmlspecialchars($_SESSION['login_error']); ?>
                </div>
                <?php unset($_SESSION['login_error']); ?>
            <?php endif; ?>


            <!-- =========================================================
                 LOGIN FORM
                 ========================================================= -->
            <form action="/TicTacToe-Hub/inc/inc_log-reg.php" method="POST">

                <!-- Email Input -->
                <div class="input-group">
                    <label for="email">Email</label>

                    <!-- Keep previously typed email after failed login -->
                    <input type="email" id="email" name="email"
                        value="<?= isset($_SESSION['old_email']) ? htmlspecialchars($_SESSION['old_email']) : '' ?>"
                        required>

                    <?php unset($_SESSION['old_email']); ?>
                </div>

                <!-- Password Input + Eye Toggle -->
                <div class="input-group password-group">
                    <label for="password">Password</label>

                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" required>

                        <!-- Eye Open Icon -->
                        <img src="/TicTacToe-Hub/assets/img/icons/eye-open.svg"
                             id="eyeOpen"
                             class="password-toggle-icon">

                        <!-- Eye Closed Icon -->
                        <img src="/TicTacToe-Hub/assets/img/icons/eye-closed.svg"
                             id="eyeClosed"
                             class="password-toggle-icon hidden">
                    </div>
                </div>

                <!-- Forgot Password Link -->
                <p class="forgot-pass">
                    <a href="#">Forgot password?</a>
                </p>

                <!-- Submit Button -->
                <button type="submit" name="login" class="btn primary login-btn">Login</button>

                <!-- Register Link -->
                <p class="register-link">
                    Don't have an account?
                    <a href="register.php">Register here</a>
                </p>

            </form>
        </div>
    </section>
</main>

<?php
/* =========================================================
   FOOTER + END OF PAGE
   ========================================================= */
makeFooter();
?>

<script>
    /* =========================================================
       AUTO-FOCUS ON WRONG FIELD
       ========================================================= */
    <?php if (isset($_SESSION['login_error'])): ?>
        <?php if ($_SESSION['login_error'] === "Email not found!"): ?>
            document.getElementById("email").focus();
        <?php else: ?>
            document.getElementById("password").focus();
        <?php endif; ?>
    <?php endif; ?>


    /* =========================================================
       PASSWORD SHOW/HIDE TOGGLE (Eye Icons)
       ========================================================= */

    const passwordInput = document.getElementById("password");
    const eyeOpen = document.getElementById("eyeOpen");
    const eyeClosed = document.getElementById("eyeClosed");

    // Toggle password visibility + swap icons
    function togglePassword() {
        const isHidden = passwordInput.type === "password";

        // Switch input type
        passwordInput.type = isHidden ? "text" : "password";

        // Swap icons
        eyeOpen.classList.toggle("hidden");
        eyeClosed.classList.toggle("hidden");
    }

    // Add click events to both icons
    eyeOpen.addEventListener("click", togglePassword);
    eyeClosed.addEventListener("click", togglePassword);
</script>

<?php
closeBody();
?>
