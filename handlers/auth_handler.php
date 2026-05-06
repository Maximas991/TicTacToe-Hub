<?php
session_start();
require_once '../data/db_connect.php';

/* =========================================================
   REGISTER USER
   ========================================================= */

// List of available profile images
$profileImages = [
    '/TicTacToe-Hub/assets/img/profile/avatars/1)girl.png',
    '/TicTacToe-Hub/assets/img/profile/avatars/2)knight_1.png',
    '/TicTacToe-Hub/assets/img/profile/avatars/3)knight_2.png',
    '/TicTacToe-Hub/assets/img/profile/avatars/4)boy.png',
];

// Pick a random one
$randomProfileImg = $profileImages[array_rand($profileImages)];

if (isset($_POST['register'])) {

    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name  = $conn->real_escape_string($_POST['last_name']);
    $username  = $conn->real_escape_string($_POST['username']);
    $email     = $conn->real_escape_string($_POST['email']);
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");

    // Check if username already exists
    $checkUsername = $conn->query("SELECT username FROM users WHERE username = '$username'");

    if ($checkEmail->num_rows > 0 || $checkUsername->num_rows > 0) {

        if ($checkEmail->num_rows > 0 && $checkUsername->num_rows > 0) {
            $_SESSION['register_error'] = 'Email and Username are already taken!';
        } elseif ($checkEmail->num_rows > 0) {
            $_SESSION['register_error'] = 'Email is already registered!';
        } elseif ($checkUsername->num_rows > 0) {
            $_SESSION['register_error'] = 'Username is already taken!';
        }

        $_SESSION['active_form'] = 'register';

        header("Location: /TicTacToe-Hub/pages/register.php");
        exit();
    } else {

        $conn->query("
            INSERT INTO users (first_name, last_name, username, email, password_hash, profile_img)
            VALUES ('$first_name', '$last_name', '$username', '$email', '$password', '$randomProfileImg')
        ");

        $_SESSION['register_success'] = 'Account created successfully!';
    }

    header("Location: /TicTacToe-Hub/pages/login.php");
    exit();
}



/* =========================================================
   LOGIN USER
   ========================================================= */
if (isset($_POST['login'])) {

    $email    = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password_hash'])) {

            $_SESSION['username'] = $user['username'];
            $_SESSION['email']    = $user['email'];
            $_SESSION['user_id']  = $user['user_id'];
            $_SESSION['profile_img'] = $user['profile_img'] ?? '/TicTacToe-Hub/assets/img/profile/default.jpg';

            header("Location: /TicTacToe-Hub/index.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Incorrect password!";
            $_SESSION['old_email'] = $email;
        }
    } else {
        $_SESSION['login_error'] = "Email not found!";
        $_SESSION['old_email'] = $email;
    }


    header("Location: /TicTacToe-Hub/pages/login.php");
    exit();
}
