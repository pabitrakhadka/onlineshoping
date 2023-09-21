<?php
include_once './layout.php';
?>
<?php
include_once '../database.php';
?>
<div class="dashboard_pages">
    <div class="dashboard_top">

    </div>
    <div class="dashboard">
        <div class="dashboard_left">
            <?php
            require './adminnav.php';
            ?>
        </div>
        <div class="dashboard_right">
          <div class="user_data_show">
          <h2>Users </h2>
          <table class="table">
  <thead>
    <tr>
       
      <th scope="col">Order_id</th>
      <th scope="col">Product_id</th>
      <th scope="col">Customer_id</th>
      <th scope="col">Order_Date</th>
    </tr>
  </thead>
  <tbody>
     <?php
     $sql='select * from orders';
     $result=mysqli_query($conn,$sql);
     if($result)
     {
        while ($row=mysqli_fetch_array($result)) {
          $id=$row['order_id'];
          $product_id=$row['product_id'];
          $customer_id=$row['customer_id'];
          $quantity=$row['quantity'];
          $date=$row['order_date'];
          echo
          '
          <tr>
          <td>'.$id.'</td>
          <td>'.$product_id.'</td>
          <td>'.$customer_id.'</td>
          <td>'.$quantity.'</td>
          <td>'.$date.'</td>
          ';

        }
     }
     ?>
  </tbody>
</table>
          </div>
        </div>
    </div>
</div>
