<?php
session_start(); // Start the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect back to the same page after logout
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>
