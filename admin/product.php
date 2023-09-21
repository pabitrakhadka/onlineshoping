<?php
include './layout.php';
?>
<?php
include_once '../database.php';
?>
<div class="dashboard_top">

</div>
<div class="dashboard">
    <div class="dashboard_left">
        <?php
        require './adminnav.php';
        ?>
    </div>
    <div class="dashboard_right">
        <div class="bolgs_pages_admim">
            <h1>Add Product</h1>
            <div class="button_addblog">
                <a class="addblog" href="./addproduct.php">Add Product</a>
            </div>
            <div class="shows_products">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">category</th>
                            <th scope="col">Photo</th>
                            <th colspan="2" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = 'select * from products';
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['product_id'];
                                $name = $row['product_name'];
                                $price = $row['product_price'];
                                $category = $row['product_category'];
                                $photo = $row['product_image'];
                                echo '

                                <tr>
                                <td>' . ++$i . '</td>
    
                                <td>' . $name . '</td>
                                <td>' . $price . '</td>
                                <td>' . $category . '</td>
                                <td class="image">
                                <img src="data:image/jpeg; base64,' . base64_encode($photo) . '" alt="image">
                                </td>
                                <td><button  data-product_id="'.$id.'" class="btn bg-success text-white edit_product">Edit</button></td>
                                <td>
                <form method="post" action="">
                    <input type="hidden" name="product_id" value="' . $id . '">
                    <button type="submit" class="btn bg-danger text-white" name="delete">Delete</button>
                </form>
            </td>
             
';
                            }
                        }
                        
if (isset($_POST['delete'])) {
    $productId = $_POST['product_id'];
    $deleteSql = "DELETE FROM products WHERE product_id = $productId";
    $deleteResult = mysqli_query($conn, $deleteSql);

    if ($deleteResult) {
        echo '<script>alert("Product deleted successfully.");</script>';
        // Perform any additional actions after deletion
    } else {
        echo '<script>alert("Failed to delete product.");</script>';
    }
}
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include_once './footer.php';
?>