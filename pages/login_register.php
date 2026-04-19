<?php
session_start();
require_once '../inc/inc_config.php';

/* =========================================================
   REGISTER USER
   ========================================================= */
if (isset($_POST['register'])) {

    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname  = $conn->real_escape_string($_POST['lastname']);
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
    } else {

        $conn->query("
            INSERT INTO users (firstname, lastname, username, email, password_hash)
            VALUES ('$firstname', '$lastname', '$username', '$email', '$password')
        ");

        $_SESSION['register_success'] = 'Account created successfully!';
    }

    header("Location: login.php");
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


    header("Location: login.php");
    exit();
}
