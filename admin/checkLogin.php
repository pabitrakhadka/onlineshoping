<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    echo '<script>alert("Please Login"); window.location.href="adminLogin.php";</script>';
    exit();
}
?>