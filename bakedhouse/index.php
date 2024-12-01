<?php

session_start();
//koneksi ke database
include 'koneksi.php';

// Fungsi logout
if (isset($_POST["logout"])) {
    unset($_SESSION["id_user"]);
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Baked House</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>

<body>

    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:housebaked2@gmail.com">housebaked2@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:081381334620">081381334620</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                    <img src="assets/img/banner.png" height="70px">
                </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="donat.php">Food</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="minum.php">Drink</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="order.php">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="history.php">History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php" name="logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-4 order-lg-last">
                            <img class="img-fluid mt-3" src="./assets/img/donat-banner.jpg" alt="">
                        </div>
                        <div class="col-lg-8 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>OUR FLUFFY  </b> DONUTS</h1>
                                <h3 class="h2">Terbuat Dari Bahan Asli</h3>
                                <p>
                                    Rahasia donat kami tidak hanya terletak pada adonannya, namun juga pada bahan-bahan berkualitas terbaik yang “berbicara” dengan sendirinya. Cokelat yang kaya rasa dan hitam, almond Australia yang renyah dan renyah, keju krim lembut Selandia Baru, dan matcha Jepang premium hanyalah beberapa di antaranya. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/minum-banner.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-success"><b>Coffee </b></h1>
                                <h3 class="h2">Arabica Beans</h3>
                                <p>
                                    Kami mencari kopi yang cocok dipadukan dengan donat kami dan akhirnya kami memilih pilihan biji Arabika yang enak.
                                    Mirip dengan wine, biji kopi dipengaruhi oleh tanah, ketinggian, dan faktor iklim lainnya yang secara alami membuat beberapa pohon kopi lebih baik dari yang lain.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our New Menu</h1>
                <p>
                    
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="donat.php"><img src="./assets/img/donat17.png" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Mr. Green Tea</h5>
                <p class="text-center"><a class="btn btn-success" href="donat.php">Go Shop</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="minum.php"><img src="./assets/img/minum11.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Green Tea Latte</h2>
                <p class="text-center"><a class="btn btn-success" href="minum.php">Go Shop</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="roti.php"><img src="./assets/img/roti6.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Tuna Mayonnaise</h2>
                <p class="text-center"><a class="btn btn-success" href="roti.php">Go Shop</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Best Seller</h1>
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="donat.php">
                            <img src="./assets/img/donat6.png" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">Rp.9,000,-</li>
                            </ul>
                            <a href="donat.php" class="h2 text-decoration-none text-dark">Cheese Cakelicious</a>
                            <p class="card-text">
                                Donat diisi dengan krim keju kocok, dicelupkan ke dalam coklat putih, di atasnya diberi remahan kue.
                            </p>
                            <p class="text-muted">Reviews (24)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="minum.php">
                            <img src="./assets/img/minum1.png" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">Rp.25,000,-</li>
                            </ul>
                            <a href="minum.php" class="h2 text-decoration-none text-dark">Green Tea Frappe</a>
                            <p class="card-text">
                                Bubuk matcha dan vanila dicampur dengan es nugget, susu segar, dan di atasnya diberi krim kocok.
                            </p>
                            <p class="text-muted">Reviews (48)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="donat.php">
                            <img src="./assets/img/donat3.png" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">Rp.8,500,-</li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Black Jack</a>
                            <p class="card-text">
                                Donat terbungkus seluruhnya dalam coklat hitam.
                            </p>
                            <p class="text-muted">Reviews (74)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Baked House</h2>
                </div>
            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3"></div>
                </div>
                <div class="col-auto me-auto"> 
                </div>


                <div class="col-center">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2023 Baked House
                            | Designed by Anandina & Zahra Alisha</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>