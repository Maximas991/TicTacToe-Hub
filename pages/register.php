<?php
include("../inc/inc_modules.php");

$title = "Register";
$additionalcss1 = '<link rel="stylesheet" href="/TicTacToe-Hub/assets/css/log-reg.css">';


makeHead($title, $additionalcss1);
startBody();
makeHeader();
?>

<main>
    <section class="login-container">
        <div class="login-card">
            <h1>Register</h1>

            <form action="/TicTacToe-Hub/pages/login_register.php" method="POST">

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

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
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
makeFooter();
closeBody();
?>