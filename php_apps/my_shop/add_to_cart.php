<?php
$title = "Welcome to My Shop";
require "conf.php";
include "template.php";
?>

<!DOCTYPE html>
<html lang="en">
    <?php echo $head; ?>
<body>
<?php echo $nav; 
if(isset($_POST['add_product_to_cart'])){
    // $cart = $_SESSION['cart'];
    if(!$_SESSION['cart']){
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart']['product_'.$_POST['product_id']] = $_POST['unit_selected'];
    // $_SESSION['cart'] = $cart;
    header("Location: index.php");
}


if(isset($_GET['id'])){
    $sql = "select * from product where id = ".(int)$_GET['id'];
    $result = mysqli_query($conn, $sql);
    if($product = mysqli_fetch_assoc($result)){
        $isProductInCart = isset($_SESSION['cart']['product_'.$_GET['id']]);
        if($isProductInCart){
            echo "Product already in your cart";
        }else{
        

        ?>

<div class="m-5 row">
    <div class="col-md-3"></div>
    <form method="POST" class="col-md-6">
    <div class="form-group">
        <label for="prod">Product name</label>
        <span class="form-control" name="prod"><?php echo $product['name']; ?></span>
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <span class="form-control" name="price"><?php echo $product['price_per_unit']; ?></span>
    </div>
    <div class="form-group">
        <label for="unit_selected">How much you want? (out of <?php echo $product['unit']; ?>)</label>
        <input class="form-control" type="number" name="unit_selected" min="1" max="<?php echo $product['unit']; ?>">    </div>
    
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary px-4" name="add_product_to_cart">Submit</button>
    </div>
    </form>
</div>

<?php
            
        }

    }
}

?>




//test code


</body>
</html>