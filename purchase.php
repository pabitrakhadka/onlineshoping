 <?php
 
include  './database.php';
include  './header.php';
$id = $_GET['id'];
$coustomer_id = $_SESSION['id'];
 ?>
 <?php

function purchase($pid, $uid)
{
    global $conn;
 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $quantity = $_POST['quantity'];
      //  echo "quantit : $quantity";
        if (isset($quantity)) {
          
            $sql = "INSERT INTO `orders`( `product_id`, `customer_id`, `quantity` ) VALUES ('$pid','$uid','$quantity')";
         
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                echo '<script> 
                alert("Product Order successfully");
                setTimeout(function() {
                    window.location.href = "index.php";
                }, 2000);
              </script>';
                exit();
            }else{
                echo '<script> alert("Product Order Error")</script>';
            }
        }
    }
}

?>

 <div class="purchase_form">
 <h1 class="purchase_page">Purchase page</h1>

 <div class="purchase_data_show">

 <div class="purchase_left">
 <?php
    $sql = "SELECT * FROM products WHERE product_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['product_name'];
            $price = $row['product_price'];
            $image = $row['product_image'];
            
            echo '
            <div class="image">
                <img src="data:image/jpeg;base64,' . base64_encode($image) . '" alt="image">
            </div>
            <div class="content">
                <p>' . $name . '</p>
                <p>' . $price . '</p>
            </div>
            ';
        }
    }
?>

 </div>
 <div class="purchase_right">
 <?php
purchase($id,$coustomer_id);
if (isset($id)) {
    echo '
    <div class="order_form_box">
    <form method="POST">
<div class ="input">
<input type="number" min="1" max="10" name="quantity" placeholder="quantity">
</div>
<button class="shop_btn" type="submit">Order</button>
    </form>
    <div>
    ';
}
?>
 
    

</div>

 

 </div>
</div>




<?php

?>