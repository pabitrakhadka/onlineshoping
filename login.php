 <?php
    include_once './header.php';
    ?>

 <?php
    include './database.php';
   
    ?>
 <?php
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT customer_id FROM customer_data WHERE customer_email='$email' AND customer_password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
   if( $_SESSION['id'] = $row['customer_id'])
   {
    echo'
<script>alert("Login Successful"); window.location.href = "index.php";</script>'
;
   }


    } else {
        echo'
        <script>alert("Invalid Email or Password")</script>
        ';   
   
    }
} 

    ?>
 <div class="login_page">
     <div class="innner_lghin_box">
         <h3>Login</h3>
         <form method="post">
             <div class="input">
             <label for="email">Email:</label>
             <input type="email" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
 
             </div>
             <div class="input">
             <label for="password">Password:</label>
  <input type="password" id="password" name="password" pattern=".{2,}" required>
  
             </div>
             <div class="buton_form">
                 <button type="submit">Login</button>
             </div>
             <p>Not Have Account ? <a href="./Register.php">Register</a></p>
         </form>
         
     </div>
 </div>
 <?php
 include_once './footer.php';
 ?>