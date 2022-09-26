<?php
$invoices_sql = "select * from invoice";
$result = mysqli_query($conn, $invoices_sql);
$invoices_view = '';
while($invoice = mysqli_fetch_assoc($result)){
    $invoices_view .= '
        <div class="col mb-5">
            <div class="card h-100">
                <div class="card-body p-4">
                    <div class="text-center">
                        <h5 class="fw-bolder">'.$invoice['customer'].'</h5>
                        <p class="fw-bolder">Total Price: $'.$invoice['total'].'</p>
                        <p class="fw-bolder">Date: '.$invoice['date'].'</p>
                        <p class="fw-bolder">Status: '.$invoice['status'].'</p>
                    </div>
                </div>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="invoice.php?id='.$invoice['id'].'">More Info</a></div>
                </div>
            </div>
        </div>
    ';
}




$invoices_container = '
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            '.$invoices_view.'
        </div>
    </div>
</section>
';
    ?>