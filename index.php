<?php
include_once './header.php';
?>
<?php
include_once './database.php';
?>
<div class="all_products">
<div class="one productimg">
    <div class="image">
        <img src="https://cdn.cbeditz.com/cbeditz/large/11644307566k76kcvepfc0boqlyz0p4bpjtr2l0g83e5va94hpi0x2emckuqw9meqflfgt3uywgoticf0i5benqieopseobv9b8yurls01wktwv.png" alt="">
    </div>
</div>
<div class="two">
    <h2>All Product</h2>
</div>

<div class="three productimg">
<div class="image productimg">
        <img src="https://www.pngall.com/wp-content/uploads/5/Cool-Model-Man-PNG-Images.png" alt="">
    </div>
</div>

</div>
<div class="home_first_row">
    <div class="home_left">
        <div class="row">
            <div class="col">
                <h1>Women’s fashion</h1>
                <button class="shop_btn">Shop</button>
            </div>
            <div class="col">
                <div class="image">
                    <img src="https://images.unsplash.com/photo-1506795660198-e95c77602129?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YmVhdXRpZnVsJTIwd29tYW58ZW58MHx8MHx8fDA%3D&w=1000&q=80"
                        alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="home_right">
        <div class="row">

        <?php
$queryMen = "SELECT product_id, product_name, product_price, product_image FROM products WHERE product_category = 'men' LIMIT 2";
$queryWomen = "SELECT product_id, product_name, product_price, product_image FROM products WHERE product_category = 'women' LIMIT 2";
$query = $queryMen . " UNION " . $queryWomen;

$result = mysqli_query($conn, $queryMen);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['product_id'];
        $name = $row['product_name'];
        $price = $row['product_price'];
        $image = $row['product_image'];

        echo '
        <div class="col men_cate">
            <div class="image">
                <img src="data:image;base64,' . base64_encode($image) . '" alt="">
            </div>
            <div class="col_cate_content">
                <p>' . $name . '</p>
                <p>' . $price. '</p>
                <button data-id="' . $id . '" class="shop_btn">Shop</button>
            </div>
        </div>
        ';
    }
} else {
    echo "Error executing query: " . mysqli_error($conn);
}
?>

             
            
            
                
            </div>
        </div>
    </div>
</div>

<div class="product_container">
    <div class="prouct_top">
        <div class="product_left">
            <h3>New Product</h3>
        </div>
        <div class="product_right">
            <ul>

                <li> <a href=''>All</a> </li>
                <li> <a href=''>Women's</a> </li>
                <li> <a href=''>Men's</a> </li>


            </ul>
        </div>
    </div>

    <div class="product_category_boxes">

        <?php
        $sql = 'select * from products';
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['product_id'];
                $name = $row['product_name'];
                $price = $row['product_price'];
                $category = $row['product_category'];
                $photo = $row['product_image'];
                echo '
            
                <div class="product_cols">
                    <div class="image">
                        <img src="data:image/jpeg; base64,' . base64_encode($photo) . '"
                            alt="">
                    </div>
                    <div class="product_category_center">
                        <p>'.$name.'</p>
                        <p>*****</p>
                        <p>'.$price.'</p>
                        <button data-id="' . $id . '" class="shop_btn">Shop</button>
                    </div>
                </div>
        
';

            }
        }
        ?>



    </div>


</div>

<?php
include_once './footer.php';
?>