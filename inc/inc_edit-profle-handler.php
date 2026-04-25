<?php
session_start();
require_once "../data/db_connect.php";

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get POST data
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$username = trim($_POST['username']);

// Basic validation
if (empty($first_name) || empty($last_name) || empty($username)) {
    $_SESSION['error'] = "All fields are required.";
    header("Location: ../pages/edit-profile.php");
    exit();
}

// Check if username is taken (except by the current user)
$stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ? AND user_id != ?");
$stmt->bind_param("si", $username, $user_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['error'] = "The username is already taken.";
    header("Location: ../pages/edit-profile.php");
    exit();
}

// Update user data
$stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, username = ? WHERE user_id = ?");
$stmt->bind_param("sssi", $first_name, $last_name, $username, $user_id);

if ($stmt->execute()) {

    // Update session values
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['username'] = $username;

    $_SESSION['success'] = "Profile updated successfully.";
    header("Location: ../pages/edit-profile.php");
    exit();

} else {
    $_SESSION['error'] = "Something went wrong. Please try again.";
    header("Location: ../pages/edit-profile.php");
    exit();
}
