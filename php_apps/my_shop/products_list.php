<?php
$products_sql = "select * from product";
$result = mysqli_query($conn, $products_sql);
$products_view = '';
while($product = mysqli_fetch_assoc($result)){
    $products_view .= '
        <div class="col mb-5">
            <div class="card h-100">
                <div class="card-body p-4">
                    <div class="text-center">
                        <h5 class="fw-bolder">'.$product['name'].'</h5>
                        $'.$product['price_per_unit'].' - '.$product['unit'].' units.
                    </div>
                </div>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-success mt-auto" href="add_to_cart.php?id='.$product['id'].'">Add to Cart</a></div>
                </div>
            </div>
        </div>
    ';
}




$products_container = '
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            '.$products_view.'
        </div>
    </div>
</section>
';
    ?>



