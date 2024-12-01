<?php
    require "../koneksi.php";

    $ambil = $koneksi ->query("SELECT * FROM transera");
    $jumlahproduk = mysqli_num_rows($ambil);
   
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Baked House</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="apple-touch-icon" href="../assets/img/logo.ico" />
        <link rel="shortcut icon" type="/image/x-icon" href="../assets/img/logo.ico" />

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../assets/css/templatemo.css" />
        <link rel="stylesheet" href="../assets/css/custom.css" />

        <!-- Load fonts style after rendering the layout styles -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap" />
        <link rel="stylesheet" href="../assets/css/fontawesome.min.css" />
    </head>

<style>
    .no-decoration{
    text-decoration:none;
    }
    
</style>

<body>
    
    <?php require "navbar.php";?>

    <div class="container mt-5">
    <div class="mt-3">
        <center><a href="tambah-menu.php"><input type="button" value="Tambah produk" class="btn btn-success"></a>
        <div class="table-responsive mt-5"> 
            <table class="table" >
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Pembelian</th>
                        <th>Menu Beli</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Harga Total</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $number = 1;
                    while($data=mysqli_fetch_array($ambil)){
                        if($jumlahproduk==0){
                    ?>
                    <tr>
                        <td>Tidak ada produk</td>
                    </tr>

                    <?php
                    }
                    ?>
                    <tr>
                        <td><?php echo $number; ?></td>
                        <td><?php echo $data['tanggal_pembelian']; ?></td>
                        <td><?php echo $data['menu_dibeli']; ?></td>
                        <td><?php echo $data['harga']; ?></td>
                        <td><?php echo $data['jumlah']; ?></td>
                        <td><?php echo $data['harga_menu']; ?></td>
                    </tr>
                    <?php
                    $number++;}
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>