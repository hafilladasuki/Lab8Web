<?php
include_once 'koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM data_barang WHERE id_barag = '{$id}'";
$result = mysqli_query($conn, $sql);
header('location: index.php');
?>