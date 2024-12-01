<?php
    session_start();
    require "../koneksi.php";
    $queryKategori = mysqli_query($koneksi, "SELECT * FROM minum");
    $jumlahKategori = mysqli_num_rows($queryKategori);

    if(isset($_POST['tambah'])){
        $nama_file = $_FILES['gambar']['name'];
        $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
        $random = crypt($nama_file, time());
        $ukuran_file = $_FILES['gambar']['size'];
        $tipe_file = $_FILES['gambar']['type'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $path = "../assets/img/minum/".$nama_file;
        $pathdb = "".$nama_file;

        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];

        if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
          if($ukuran_file <= 5000000){ 
            if(move_uploaded_file($tmp_file, $path)){ 
              $sql = $koneksi ->query("insert into minum (gambar, nama, harga, deskripsi)
              values('$pathdb','$nama','$harga', '$deskripsi')");

            header("location:admin-minum.php");
            }else{

      }
    }else{
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">

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
            <form method="POST" enctype="multipart/form-data">
            <table class="table" width=50% border=0>
                    <tr>
                        <td> Foto </td>
                        <td> : </td>
                        <td> <input type="file" required name="gambar" class="form-control"> </td>
                    </tr> 
                    <tr>
                        <td> Nama </td>
                        <td> : </td>
                        <td> <input type="text" required name="nama" class="form-control"> </td>
                    </tr> 
                    <tr>
                        <td> Deskripsi </td>
                        <td> : </td>
                        <td> <input type="text" required name="deskripsi" class="form-control"> </td>
                    </tr> 
                    <tr>
                        <td> Harga </td>
                        <td> : </td>
                        <td> <input type="text" required name="harga" class="form-control"> </td>
                    </tr> 
                    
                    <tr>
                        <td colspan=3> <center> <input type="submit" name="tambah" value="Tambah" class="btn btn-success form-control" >  </td>
                    </tr> 
            </table>
</form>
        </div>
    </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>