<?php
session_start();
require_once "../data/db_connect.php";

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

$profile_img = !empty($_POST['profile_img'])
    ? $_POST['profile_img']
    : $_SESSION['profile_img'];


$user_id = $_SESSION['user_id'];

// Get POST data
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$username = trim($_POST['username']);

// Basic validation
if (empty($first_name) || empty($last_name) || empty($username)) {
    $_SESSION['error'] = "All fields are required.";
    header("Location: /TicTacToe-Hub/pages/edit-profile.php");
    exit();
}

// Check if username is taken (except by the current user)
$stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ? AND user_id != ?");
$stmt->bind_param("si", $username, $user_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['error'] = "The username is already taken.";
    header("Location: /TicTacToe-Hub/pages/edit-profile.php");
    exit();
}

// Update user data
$stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, username=?, profile_img=? WHERE user_id=?");
$stmt->bind_param("ssssi", $first_name, $last_name, $username, $profile_img, $user_id);


if ($stmt->execute()) {

    // Update session values
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['username'] = $username;
    $_SESSION['profile_img'] = $profile_img;


    $_SESSION['success'] = "Profile updated successfully.";
    header("Location: /TicTacToe-Hub/pages/view-profile.php");
    exit();

} else {
    $_SESSION['error'] = "Something went wrong. Please try again.";
    header("Location: /TicTacToe-Hub/pages/edit-profile.php");
    exit();
}
