<?php
include_once './layout.php';
?>
 
<?php
include_once '../database.php';
?>
<div class="dashboard_top">

</div>
<div class="dashboard">
    <div class="dashboard_left">
        <?php
        require_once './adminnav.php';
        ?>
    </div>
    <div class="dashboard_right">
        <div class="bolgs_pages_admim">
            <h1>Add Product</h1>

        </div>

        <div class="addproducts_pages">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Choose Photo</label>
                    <input class="form-control" name="photo" type="file" id="formFileMultiple" multiple>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                        placeholder="name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" id="exampleFormControlInput1"
                        placeholder="Price">
                </div>
                <select class="form-select" name="category" aria-label="Default select example">
                    <option selected>Selected Category</option>
                    <option value="men">Men</option>
                    <option value="women">women</option>

                </select>
              <div class="center_div">
              <button type="submit">Add Product</button>
              </div>
            </form>
        </div>
    </div>
</div>

<?php
 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $photo = $_FILES['photo']['tmp_name'];
    $photoData = addslashes((file_get_contents($photo)));

    $sql = "insert into products(product_name,product_price,product_category,product_image)values('$name','$price','$category','$photoData')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Product Added Successfully"); window.location.href="product.php";</script>';
        exit();

    } else {
        echo " <script>alert('Error')</script>";
    }
}
?>