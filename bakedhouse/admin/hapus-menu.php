<?php
    require "../koneksi.php";
    $id = $_GET['id_menu'];
    $sql1 = $koneksi ->query("delete from menu where id_menu ='$id'");
    header("location:admin-donat.php");
?>