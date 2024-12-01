<?php

session_start();
//koneksi ke database
include 'koneksi.php';


if(!isset($_SESSION["order"])){
  // Diarahkan ke ke index.php
  echo "<script>alert('Keranjang kosong!')</script>";
  echo "<script>location='index.html';</script>";
}

// Pastikan pengguna sudah login dan sesi id_user telah diset

// Fungsi logout
if (isset($_GET["logout"])) {
    unset($_SESSION["id_user"]);
    header("location:../index.php");
}

// ... (lanjutkan dengan bagian-bagian lain dari skrip PHP Anda)
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

    

<body style="min-height: 1000px;">
<section class="content bg-light">
  <div class="container">
        <br>
<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Sub Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php $totalbelanja = 0; ?>
                                <?php foreach ($_SESSION['order'] as $id => $jumlah) : ?>
                                    <?php
                                    $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id'");
                                    $pecah = $ambil->fetch_assoc();
                                    $subharga = $pecah['harga'] * $jumlah;
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $pecah['nama']; ?></td>
                                        <td>Rp. <?= number_format($pecah['harga']); ?>,-</td>
                                        <td><?= $jumlah; ?></td>
                                        <td>Rp. <?= number_format($subharga); ?>,-</td>
                                    </tr>
                                    <?php $totalbelanja += $subharga; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">Total Belanja</th>
                                    <th>Rp. <?= number_format($totalbelanja); ?>,-</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<br>
    <?php
        $sql = $koneksi ->query("SELECT * FROM user");
        $count = $sql -> num_rows;
        $data = mysqli_fetch_assoc($sql);
            if (isset($_POST["ini"])) {
            $id_user = $_SESSION['id_user'];
            $tanggal_pembelian = date('Y-m-d');

        // Mengambil data pelanggan dari formulir
        $pelanggan = $_POST["pembeli"];
        $no_tlp = $_POST["no_tlp"];
        // Mendapatkan id_transaksi yang baru terjadi
        $id_transaksi_barusan = $koneksi->insert_id;
            
            foreach ($_SESSION["order"] as $id => $jumlah) {
                $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id'");
                $perproduk = $ambil->fetch_assoc();
            
                $subharga = $perproduk['harga'] * $jumlah;

            // Menyimpan data ke tabel pembelian
                $koneksi->query("INSERT INTO pembelian(id_user, tanggal, harga_total) VALUES('$id_pelanggan', '$tanggal_pembelian', '$totalbelanja')");

            // Mendapatkan id_pembelian yang baru terjadi
                $id_pemebelian_barusan = $koneksi->insert_id;
            
            // Menghindari memberikan nilai ID secara manual jika ID diatur sebagai AUTO_INCREMENT
                $koneksi->query("INSERT INTO transaksi (id_transaksi, id_user, id_pembelian, pembeli, menu_dibeli, jumlah, tanggal_pembelian, harga_menu, harga_total, no_tlp ,harga)
                VALUES (NULL, '$id_user', '$id_pemebelian_barusan', '$pelanggan', '{$perproduk['nama']}', '$jumlah', '$tanggal_pembelian' ,'$subharga', '$totalbelanja', '$no_tlp', '{$perproduk['harga']}')");
            
            // Update stok
                $koneksi->query("UPDATE menu SET stok=stok - $jumlah WHERE id_menu='$id'");
                }
            
                // Mengosongkan keranjang belanja
                unset($_SESSION["order"]);
            
                // Tampilan dialihkan ke halaman nota dari pembelian barusan
                echo "<script>alert('Pembelian sukses');</script>";
                echo "<script>location='index.php?id=$id_transaksi_barusan';</script>";
            }
    ?>

            <form method="POST">
                <div class="mb-3 col-md-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" name='pembeli' class="form-control" id="exampleFormControlInput1" placeholder="ex : Lee Jeno" required>
                </div>
                <div class="mb-3 col-md-3">
                    <label for="exampleFormControlInput1" class="form-label">No.Tlp</label>
                    <input type="tel" name='no_tlp' class="form-control" id="exampleFormControlInput1" placeholder="ex : 081381334620" required>
                </div>
                <div class="mb-3 col-md-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Metode Pembayaran</label>
                    <select id="inputState" class="form-select" name="metode_pembayaran">
                        <option value="BCA">BCA</option>
                        <option value="BNI">BNI</option>
                        <option value="BRI">BRI</option>
                        <option value="QRIS">QRIS</option>
                    </select>
                </div>
                <button type="submit" name="ini" class="btn btn-success">Bayar Sekarang</button>
            </form>
            <br><br><br><br><br><br><br><br><br><br>

  </div>
</section>
      
    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
    </body>
</html>