<?php
session_start();

$id = $_GET['id_menu'];
unset($_SESSION['order'][$id]);

echo "<script>alert('Menu dihapus dari keranjang');</script>";
echo "<script>location='order.php';</script>";
?>