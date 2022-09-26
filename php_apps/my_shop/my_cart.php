<?php
$title = "My Cart";
require "conf.php";
include "template.php";
?>

<!DOCTYPE html>
<html lang="en">
    <?php echo $head; ?>
<body>
<?php echo $nav; 

$myProducts = $_SESSION['cart'];

if(isset($_POST['checkout'])){
    $today = date("Y-m-d H:i:s");
    $customer = $_POST['name_surname'];
    $insertInvoice = "
    INSERT into invoice (customer, total, status, date) 
    VALUES('$customer', 0, 'pending', '$today')
    ";
    $result = mysqli_query($conn, $insertInvoice);
    $invoiceID = mysqli_insert_id($conn);
    $total = 0;
    foreach ($myProducts as $key=>$units){ //foreach cart item;
        if(isset($_POST[$key])){
            $productID = (int)substr($key, 8, null);
            $sql = "select * from product where id = ".$productID;
            $result = mysqli_query($conn, $sql);
            $product = mysqli_fetch_assoc($result);
            $price = $product['price_per_unit'];
            $subTotal = $price*$units;
            $total += $subTotal;
            $invoiceDetail = "
            INSERT into invoice_details (invoice_id, product_id, quantity, price_per_unit)
            VALUES ($invoiceID, $productID, $units, $price)
            ";
            $result = mysqli_query($conn, $invoiceDetail);
            unset($_SESSION['cart'][$key]);
        }
    }
    $updateInvoiceTotal = "
    Update invoice set
    total = $total, paid = $total 
    where id = $invoiceID
    ";
    mysqli_query($conn, $updateInvoiceTotal);
    header("Location: my_cart.php");
}

?>
<div class="m-5 row">
    <div class="col-md-3"></div>
    <form method="POST" class="col-md-6">
<?php
foreach ($myProducts as $key=>$units){
    $productID = (int)substr($key, 8, null);
    $sql = "select * from product where id = ".$productID;
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
    $itemTotal = $product['price_per_unit'] * $units;
    $cartItem = "".$product['name'].", ".$units."x".$product['price_per_unit']." = ".$itemTotal;
?>
    <div class="form-group">
        <input class="form-check-input" type="checkbox" name="<?php echo $key; ?>"> 
        <label for="<?php echo $key; ?>"><?php echo $cartItem; ?></label>   
    </div>


<?php
}
?>
    <div class="col-md-12 text-center">
        <span class="btn btn-primary px-4" name="proceed" id="proceed">Proceed to checkout!</button>
    </div>
    <div id="proceed_to_checkout_div" style="display:none">
        <div class="form-group">
            <label for="name_surname">Name Surname</label>   
            <input class="form-control" type="text" name="name_surname" require='true'> 
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary px-4" name="checkout" id="checkout">Buy</button>
        </div>
    </div>
</form>
</div>



</body>

<script>
    var proceedBtn = document.getElementById("proceed");
    proceedBtn.addEventListener("click", function(){
        var proceedDiv = document.getElementById("proceed_to_checkout_div");
        proceedDiv.style.display = "block";
        proceedBtn.style.display = "none";
    });
</script>
</html>