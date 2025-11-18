<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    $nama       = $_POST['nama'];
    $kategori   = $_POST['kategori'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok       = $_POST['stok'];

    $gambar     = $_FILES['gambar']['name'];
    $tmp_file   = $_FILES['gambar']['tmp_name'];

    if (!empty($gambar)) {
        move_uploaded_file($tmp_file, "gambar/" . $gambar);
    }

    $sql = "INSERT INTO data_barang (nama, kategori, harga_beli, harga_jual, stok, gambar)
            VALUES ('$nama','$kategori','$harga_beli','$harga_jual','$stok','$gambar')";

    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h1>Tambah Barang</h1>

    <form method="post" enctype="multipart/form-data">
        <label>Nama Barang</label>
        <input type="text" name="nama">

        <label>Kategori</label>
        <input type="text" name="kategori">

        <label>Harga Beli</label>
        <input type="number" name="harga_beli">

        <label>Harga Jual</label>
        <input type="number" name="harga_jual">

        <label>Stok</label>
        <input type="number" name="stok">

        <label>Gambar</label>
        <input type="file" name="gambar">

        <button class="btn-submit" type="submit" name="submit">Simpan</button>
    </form>
</div>

</body>
</html>
