<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online </title>

    <link rel="stylesheet" href="./index.css">
</head>
<body>
<header>
    <!-- Nav Menu bar -->
    <nav>
        <div class="logo">
<div class="image">
    <img src="https://t4.ftcdn.net/jpg/03/74/02/61/360_F_374026103_LoLZY8uNJM4YAC8oVK8Pr42ftlKidmOo.jpg" alt="">
</div>
        </div>
        <div class="menu">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./women.php">Women</a></li>
                <li><a href="./men.php">Men</a></li>
                
                <li><a href="./about.php">About</a></li>
                <li><a href="./contact.php">Contact</a></li>
               
                <?php
                if(isset($_SESSION['id']))
                {
                    echo '<li><a href="./logout.php">LogOut</a></li>';
                }else{
echo ' <li><a href="./login.php">Login</a></li>';
                }
                ?>
                
            </ul>
        </div>
    </nav>
</header>