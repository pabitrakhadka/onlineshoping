<?php

include_once './header.php';

?>
<?php

include_once './database.php';
?>

<?php
//save register data in databse
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "insert into customer_data (customer_name,customer_address,customer_email,customer_password) values('$name','$address','$email','$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('User Register Successfully')</script>";
    } else {


        echo "<script>alert('Error Register ')</script>";
    }
}
?>
<div class="register_page">
    <div class="margin_div">

    </div>
    <div class="inner_register">
        <h2>Register</h2>
        <form method="post">
            <div class="input">
                <input type="text" name="name" placeholder="Enter Name">
            </div>
            <div class="input">
                <input type="text" name="address" placeholder="Enter address">
            </div>
            <div class="input">
                <input type="email" name="email" placeholder="Enter Email">
            </div>
            <div class="input">
                <input type="password" name="password" placeholder="Enter Password">
            </div>
            <div class="button_register">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
</body>

</html>