<?php
session_start();

if (isset($_SESSION['id'])) {
    // Clear all session variables
    session_unset();
    // Destroy the session
    session_destroy();
    echo '<script>alert("Logout Successfully"); window.location.href="login.php";</script>';
    exit();
}
 
?>
