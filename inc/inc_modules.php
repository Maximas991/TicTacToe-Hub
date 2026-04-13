<?php

function makeHead($cssFile) {
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TicTacToe Hub</title>
        <link rel="stylesheet" href="'.$cssFile.'">
        <link rel="icon" type="image/png" href="assets/img/icons/icons8-tic-tac-toe-67.png">
    </head>
    <body>
    ';
}

function makeHeader() {
    echo '
    <header class="floating-header">
        <div class="header-content">
            <div class="logo">TicTacToe Hub</div>

            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="pages/game/tictactoe.php">Play</a></li>
                    <li><a href="pages/leaderboard.php">Leaderboard</a></li>
                    <li><a href="pages/login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    ';
}

function makeFooter() {
    echo '
    <footer>
        <section class="footer_section">

            <div class="footer_top">

                <div class="footer_about">
                    <div class="footer_logo">
                        <img src="assets/img/icons/icons8-tic-tac-toe-67.png" alt="Logo">
                        <h1>TicTacToe Hub</h1>
                    </div>

                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Vitae dolores ipsam reprehenderit nesciunt asperiores harum
                        distinctio iusto quod doloremque voluptas.
                    </p>

                    <div class="footer_socials">
                        <img src="assets/img/icons/footer_ico/facebook_logo_icon_147291.svg">
                        <img src="assets/img/icons/footer_ico/ig_instagram_media_social_icon_124260.svg">
                        <img src="assets/img/icons/footer_ico/tiktok_logo_icon_189233.svg">
                        <img src="assets/img/icons/footer_ico/268058_x-logo-icon.svg">
                        <img src="assets/img/icons/footer_ico/Youtube_icon-icons.com_66802.svg">
                    </div>
                </div>

                <div class="footer_col">
                    <h1>Company</h1>
                    <p>About us</p>
                    <p>Services</p>
                </div>

                <div class="footer_col">
                    <h1>Developers</h1>
                    <p>Web Technologies</p>
                    <p>Learn Web Development</p>
                    <p>TT Plus</p>
                    <p>Hacks Blog</p>
                </div>

                <div class="footer_col">
                    <h1>Communities</h1>
                    <p>TT Forum</p>
                    <p>TT Chat</p>
                </div>

                <div class="footer_col">
                    <h1>Contact</h1>
                    <p>📞 +123 456 7890</p>
                    <p>📧 support@tt.com</p>
                </div>

            </div>

            <div class="footer_bottom">
                <p>© 2026 TicTacToe Hub. All rights reserved.</p>

                <ul>
                    <li>Privacy Policy</li>
                    <li>Terms of Use</li>
                    <li>Legal</li>
                    <li>Site Map</li>
                </ul>
            </div>

        </section>
    </footer>
    ';
}

function closeBody() {
    echo '
    </body>
    </html>
    ';
}

?>
