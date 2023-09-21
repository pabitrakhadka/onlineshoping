<?php
include_once './header.php';
?>

<?php
include_once './database.php';
?>
<div class="women_page view">
  <h2>Women page</h2>

  <div class="women_categories ">
    <div class="row">
      <?php
      $sql = "SELECT * FROM products WHERE product_category='women'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $product_id = $row['product_id'];
          $name = $row['product_name'];
          $price = $row['product_price'];
          $category = $row['product_category'];
          $photo = $row['product_image'];

          echo '
           <div class="women_col col">
           <div class="image">
             <img
               src="data:image/jpeg;base64,' . base64_encode($photo) . '"
               alt="image"
               >
           </div>
           <div class="women_content">
             <p>' . $name . '</p>
             <p>' . $price . '</p>
             <button data-id="' . $product_id . '" class="shop_btn">Shop</button>
           </div>
         </div>
           ';
        }
      }
      ?>


    </div>
  </div>
</div>
</div>
<?php

include_once './footer.php';
?>