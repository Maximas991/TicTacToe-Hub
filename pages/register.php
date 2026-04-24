<?php
/* =========================================================
   SESSION + MODULES
   ========================================================= */
session_start(); // Required to read/write session variables
include("../inc/inc_modules.php"); // Loads your header, footer, etc.

/* =========================================================
   PAGE SETTINGS
   ========================================================= */
$title = "Register";
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
            <h1>Register</h1>

            <!-- =========================================================
                 ERROR MESSAGE (email or username is already taken)
                 ========================================================= -->
            <?php if (isset($_SESSION['register_error'])): ?>
                <div class="error-msg">
                    <?= htmlspecialchars($_SESSION['register_error']); ?>
                </div>
                <?php unset($_SESSION['register_error']); ?>
            <?php endif; ?>

            <!-- =========================================================
                 REGISTER FORM
                 ========================================================= -->
            <form action="/TicTacToe-Hub/inc/inc_log-reg.php" method="POST">

                <div class="input-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>

                <div class="input-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>

                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
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


                <button type="submit"  name="register" class="btn primary login-btn">Register</button>

                <p class="register-link">
                    Already have an account?
                    <a href="login.php">Login here</a>
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