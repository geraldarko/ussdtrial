<?php
session_start();
include_once '../controllers/IOT.php';

// Check if user is logged in
if (!isset($_SESSION['customer_id'])) {
  header("Location: login.php");
  exit();
}

// Get user ID from session
$user_id = $_SESSION['customer_id'];

// Define error messages array
$errors = array();


if (isset($_POST['submit'])) {
    // Get the current password, new password and confirm password from form
    $current_password = $_POST['customer_pass'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
  
    // Validate form fields
    if (empty($current_password)) {
      array_push($errors, "Please enter your current password.");
    }
    if (empty($new_password)) {
      array_push($errors, "Please enter a new password.");
    } elseif (strlen($new_password) < 8) {
      array_push($errors, "New password must be at least 8 characters long.");
    }
    if (empty($confirm_password)) {
      array_push($errors, "Please confirm your new password.");
    } elseif ($new_password !== $confirm_password) {
      array_push($errors, "New password and confirm password do not match.");
    }
  
    // Check if current password matches the one in the database
    $query = "SELECT password FROM users WHERE id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if (!$result || !password_verify($current_password, $result['password'])) {
      array_push($errors, "Incorrect current password.");
    }
  
    // If there are no errors, update the password
    if (empty($errors)) {
      $query = "UPDATE users SET password = :password WHERE id = :user_id";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(':password', password_hash($new_password, PASSWORD_DEFAULT));
      $stmt->bindParam(':user_id', $user_id);
  
      if ($stmt->execute()) {
        // Redirect to profile page with success message
        header("Location: profile.php?success=1");
        exit();
      } else {
        array_push($errors, "Error updating password. Please try again.");
      }
    }
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Change Password</title>
    </head>
    <body>
        <h2>Change Password</h2>
        <form action="changepassword.php" method="post">
            <label for="oldpassword">Old Password:</label>
            <input type="password" id="oldpassword" name="oldpassword" required><br>

            <label for="newpassword">New Password:</label>
            <input type="password" id="newpassword" name="newpassword" required><br>

            <label for="confirmpassword">Confirm New Password:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" required><br>

            <input type="submit" value="Change Password">
        </form>
    </body>
</html>