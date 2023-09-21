<?php
session_start();
include '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id FROM admin_data WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $row['id'];
        echo '<script>alert("Login Successful"); window.location.href = "adminDash.php";</script>';
        exit();
    } else {
        echo '<script>alert("Invalid Email or Password");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Webpage</title>
    <link rel="stylesheet" href="../index.css"> <!-- Optional: External CSS file -->
</head>
<body>
    <div class="login_page">
        <div class="innner_lghin_box ">
            <h3>Admin Login</h3>
            <form method="post">
                <div class="input">
                    <input type="email" required placeholder="Enter Email" name="email">
                </div>
                <div class="input">
                    <input type="password" required placeholder="Enter Password" name="password">
                </div>
                <div class="buton_form">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
