
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
          <h2>Edit Product</h2>
          <?php
          $id = $_GET['id'];

          $sql="SELECT * FROM products WHERE product_id = '$id'";
          $result=mysqli_query($conn,$sql);
         if($result)
         {
            while ($row=mysqli_fetch_assoc($result)) {
                 $name=$row['product_name'];
                 $price=$row['product_price'];
                 $category=$row['product_category'];
                 $image=$row['product_image'];
echo '

<div class="addproducts_pages">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Choose Photo</label>
                    <input required class="form-control"  name="photo" type="file" id="formFileMultiple" multiple>
                </div>
               
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" required value="'.$name.'" class="form-control" name="name" id="exampleFormControlInput1"
                        placeholder="name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" required value="'.$price.'" name="price" class="form-control" id="exampleFormControlInput1"
                        placeholder="Price">
                </div>
                <select class="form-select" required value="'.$category.'" name="category" aria-label="Default select example">
                     
                    <option value="men">Men</option>
                    <option value="women">women</option>

                </select>
              <div class="center_div">
              <button type="submit" class="btn bg-success">Update Product</button>
              </div>
            </form>
        </div>
';
            }
         }
          
        ?>
        </div>
    </div>
</div>

<?php
if($_SERVER['REQUEST_METHOD']==='POST')
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $photo = $_FILES['photo']['tmp_name'];
    $photoData = addslashes((file_get_contents($photo)));
    $sql = "UPDATE products SET product_name = '$name', product_price = '$price', product_category = '$category', product_image = '$photoData' WHERE product_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Product Added Successfully"); window.location.href="product.php";</script>';
        exit();

    } else {
        echo " <script>alert('Error')</script>";
    }
}
?>