<?php
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $shopName = "Shop of: ".$user['name']." ".$user['surname'];
    $sign_in_out_btn = '<li class="nav-item"><a class="nav-link" href="signout.php">Sign out</a></li>';
}else{
    $shopName = "Great Shop";
    $sign_in_out_btn = '<li class="nav-item"><a class="nav-link" href="signin.php">Sign in</a></li>';
}

if(isset($_SESSION['cart'])){
    $cartProductNumber = sizeof($_SESSION['cart']);
}else{
    $cartProductNumber = 0;
}

        include "invoices_list.php";
        $invoices= $invoices_container;


        $head = '
            <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>My Shop</title>
            <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
            <!-- Bootstrap icons-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="css/styles.css" rel="stylesheet" />
            </head>';
        
        $nav = '
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="index.php">'.$shopName.'</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                            <li class="nav-item"><a class="nav-link" href="add_product.php">Add product</a></li>
                            <li class="nav-item"><a class="nav-link" href="invoices.php">Show invoice</a></li>
                            '.$sign_in_out_btn.'
                        </ul>
                        <form class="d-flex">
                            <a class="btn btn-outline-dark" href="my_cart.php">
                                <i class="bi-cart-fill me-1"></i>
                                Cart
                                <span class="badge bg-dark text-white ms-1 rounded-pill">'.$cartProductNumber.'</span>
                            </a>
                        </form>
                    </div>
                </div>
            </nav>
            ';

        $header = ' 
            <header class="bg-dark py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="text-center text-white">
                        <h1 class="display-4 fw-bolder">Hey</h1>
                        <p class="lead fw-normal text-white-50 mb-0">'.$title.'</p>
                    </div>
                </div>
            </header>
            ';



       

        
        $footer = '
            <!-- Footer-->
            <footer class="py-5 bg-dark">
                <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
            </footer>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
            ';
        include "products_list.php";
        $section = $products_container;

        

    ?>
