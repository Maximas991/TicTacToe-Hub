<?php
include("../inc/inc_modules.php");

$title = "Login";
$additionalcss1 = '<link rel="stylesheet" href="/TicTacToe-Hub/assets/css/log-reg.css">';


makeHead($title, $additionalcss1);
startBody();
makeHeader();
?>

<main>
    <section class="login-container">
        <div class="login-card">
            <h1>Login</h1>

            <form action="/TicTacToe-Hub/pages/login_register.php" method="POST">

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" name="login" class="btn primary login-btn">Login</button>

                <p class="register-link">
                    Don't have an account?
                    <a href="register.php">Register here</a>
                </p>

            </form>
        </div>
    </section>
</main>


<?php
makeFooter();
closeBody();
?>