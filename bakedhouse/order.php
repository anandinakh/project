<?php
session_start();

//koneksi ke database
include 'koneksi.php';

        $ambil = $koneksi ->query("SELECT * FROM menu");
        while($produk = $ambil -> fetch_assoc());

if(empty($_SESSION["order"]) OR !isset($_SESSION["order"])){
  echo "<script>alert('Keranjang kosong, silahkan pilih produk!');</script>";
  echo "<script>location='donat.php';</script>";
}

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

    <br><br><br>

    <section class="content">
  <div class="container">
    <h1></h1>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Sub harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; ?>
          <?php foreach($_SESSION['order'] as $id => $jumlah): ?>
            <!-- Menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
            <?php
            $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id'");
            $pecah = $ambil->fetch_assoc();
            $harga = $pecah['harga'];
            $subharga = (int)$harga * (int)$jumlah;
            ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $pecah['nama']; ?></td>
              <td>Rp. <?= number_format($pecah['harga']); ?>,-</td>
              <td><?= $jumlah; ?></td>
              <td>Rp. <?= number_format($subharga); ?>,-</td>
              <td>
                <a href="hapus-keranjang.php?id_menu=<?= $id; ?>" class="btn btn-danger btn-xs">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <br>
    <center>
      <a href="checkout.php"><input type="button" value="Checkout" class="btn btn-success"></a>
    </center>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<br><br>

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>
