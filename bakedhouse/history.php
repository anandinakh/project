<?php
session_start();

include 'koneksi.php'; // Sesuaikan dengan path file koneksi.php

// Pastikan pengguna sudah login dan sesi id_user telah diset

// Fungsi logout
if (isset($_POST["logout"])) {
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

    <div class="container mt-5">
            <div class="mt-3">
                <div class="table-responsive mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Pembelian</th>
                                <th>Id Pembelian</th>
                                <th>Nama Menu</th>
                                <th>Jumlah</th>
                                <th>Harga Menu</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (isset($_SESSION['id_user'])) {
                                // Mendapatkan id_user dari sesi
                                $id_user = $_SESSION['id_user'];

                                // Menyiapkan statement SQL untuk mengambil data transaksi dengan id_user yang login
                                $stmt = $koneksi->prepare("SELECT * FROM transaksi WHERE id_user = ?");
                                $stmt->bind_param("s", $id_user);
                                $stmt->execute();
                            
                                // Mendapatkan hasil dari query
                                $result = $stmt->get_result();
                                }
                                // Mengecek apakah ada data transaksi
                                if ($result !== false) {
                                    if ($result->num_rows > 0) {
                                        // Menampilkan data transaksi
                                        $number = 1; // Diinisialisasi di luar loop
                                        while ($stmt = $result->fetch_assoc()) {
                            ?>
                                        <tr>
                                            <td style="center"><?php echo $number; ?></td>
                                            <td><?php echo $stmt['tanggal_pembelian']; ?></td>
                                            <td><?php echo $stmt['id_pembelian']; ?></td>
                                            <td><?php echo $stmt['menu_dibeli']; ?></td>
                                            <td><?php echo $stmt['jumlah']; ?></td>
                                            <td>Rp.<?php echo number_format($stmt['harga']); ?>,-</td>
                                            <td>Rp.<?php echo number_format($stmt['harga_menu']); ?>,-</td>
                                        </tr>
                            <?php
                                        $number++;
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>Tidak ada data transaksi untuk id_user: $id_user</td></tr>";
                                }
                            } else {
                                // Menampilkan pesan kesalahan jika query gagal dijalankan
                                echo "<tr><td colspan='6'>Error executing query: " . $stmt->error . "</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

<!-- Close Content -->


    <!-- Start Footer -->
    
    <!-- End Footer -->

    <!-- Start Script -->
    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->

</body>

</html>
