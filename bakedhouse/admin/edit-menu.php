<?php
include '../koneksi.php';

$id = $_GET['id_menu'];
$sql1 = $koneksi->query("SELECT * FROM menu WHERE id_menu = '$id'");
$data = mysqli_fetch_assoc($sql1);

if (isset($_POST['edit'])) {
    $foto = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../assets/img/" . $foto;
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $stock = $_POST['stok'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    

   
    // Gunakan prepared statement untuk menghindari SQL injection
    if (!empty($_FILES['gambar']['name'])) {
        $stmt = $koneksi->prepare("UPDATE menu SET kategori = ?, nama = ?, harga = ?, stok = ?, gambar = ?, deskripsi = ? WHERE id_menu = ?");
        $stmt->bind_param("ssssssi", $kategori, $nama, $harga, $stock, $foto, $deskripsi, $id);
    } else {
        $stmt = $koneksi->prepare("UPDATE menu SET kategori = ?, nama = ?, harga = ?, stok = ?, deskripsi = ? WHERE id_menu = ?");
        $stmt->bind_param("sssssi", $kategori, $nama, $harga, $stock, $deskripsi, $id);
    }

    if ($stmt->execute()) {
        header("location:admin-donat.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
    
}

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
    td{
        border:none;
    }
    
</style>
<body>
    <?php require "navbar.php";?>

    <div class="container mt-5">

    <div class="mt-3">

        <div class="table-responsive mt-5"> 
            <form method="post" enctype="multipart/form-data">
            <table class="table" width=50% border=0>
                <tr>
                    <td> ID </td>
                    <td> : </td>
                    <td> <?php echo $data['id_menu']; ?> </td>
                </tr>
                <tr>
                        <td> Foto Lama </td>
                        <td> : </td>
                        <td> <img src="../assets/img/<?php echo $data['gambar']; ?>" width=500> </td>
                    </tr> 
                <tr>
                        <td> Foto Baru </td>
                        <td> : </td>
                        <td> <input type="file" name="gambar" class="form-control"> </td>
                    </tr>
                    <tr>
                        <td> Nama </td>
                        <td> : </td>
                        <td> <input type="text" value="<?php echo $data['nama']; ?>" name="nama" class="form-control"> </td>
                    </tr>
                    <tr>
                        <td> Kategori </td>
                        <td> : </td>
                        <td> 
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='kategori'>
                            <option selected value="Donat">Donat</option>
                            <option value="Roti">Roti</option>
                            <option value="Minum">Minum</option>
                        </select>    
                    </tr> 
                    <tr>
                        <td> Deskripsi </td>
                        <td> : </td>
                        <td> <input type="text" value="<?php echo $data['deskripsi']; ?>" name="deskripsi" class="form-control"> </td>
                    </tr> 
                    <tr>
                        <td> Harga </td>
                        <td> : </td>
                        <td> <input type="text" value="<?php echo $data['harga']; ?>" name="harga" class="form-control"> </td>
                    </tr>
                    <tr>
                        <td> Stock </td>
                        <td> : </td>
                        <td> <input type="text" value="<?php echo $data['stok']; ?>" name="stok" class="form-control"> </td>
                    </tr> 
                    <tr>
                        <td colspan=3> <center> <input type="submit" name="edit" value="Edit" class="btn btn-warning form-control" >  </td>
                    </tr> 
            </table>
</form>
        </div>
    </div>
    </div>
</body>
</html>