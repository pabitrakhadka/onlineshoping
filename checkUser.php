<?php
session_start();
if (isset($_SESSION['id'])) {
    $id = $_GET['id'];
    header("location:purchase.php?id=" . $id);
    exit();
} else {
    header("location:login.php");
    exit();
}
?>