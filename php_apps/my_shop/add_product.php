<?php
$title = "Add new Product!";
require "conf.php";
include "template.php";
?>

<!DOCTYPE html>
<html lang="en">
    <?php echo $head; ?>
<body>
<?php 
echo $nav;
// echo $header; 
$formValues = [];

if(isset($_POST['add_product'])){
    $sql = "INSERT into product 
    (name, unit, price_per_unit)
    VALUES ('".$_POST['name']."', ".$_POST['unit'].", ".$_POST['price'].")
    ";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "An error occurred: ".mysqli_error();
    }else{
        echo "".$_POST['name']." added successfully!";
    }
}



?>


<div class="m-5 row">
    <div class="col-md-3"></div>
    <form method="POST" class="col-md-6">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label for="unit">Unit</label>
        <input type="text" class="form-control" name="unit">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price">
    </div>
    
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary px-4" name="add_product">Submit</button>
    </div>
    </form>
</div>
    





</body>
</html>