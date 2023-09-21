<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    // Clear all session variables
    session_unset();
    // Destroy the session
    session_destroy();
    echo '<script>alert("Logout Successfully"); window.location.href="adminLogin.php";</script>';
    exit();
}
 
?>
