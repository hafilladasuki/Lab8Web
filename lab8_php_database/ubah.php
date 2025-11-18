<?php
include("koneksi.php");

$id = $_GET['id'];

$sql = "SELECT * FROM data_barang WHERE id_barag = '$id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $nama       = $_POST['nama'];
    $kategori   = $_POST['kategori'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok       = $_POST['stok'];

    $gambar_baru = $_FILES['gambar']['name'];
    $tmp_file    = $_FILES['gambar']['tmp_name'];

    if (!empty($gambar_baru)) {
        move_uploaded_file($tmp_file, "gambar/" . $gambar_baru);
    } else {
        $gambar_baru = $data['gambar'];
    }

    $sql_update = "UPDATE data_barang SET
        nama='$nama',
        kategori='$kategori',
        harga_beli='$harga_beli',
        harga_jual='$harga_jual',
        stok='$stok',
        gambar='$gambar_baru'
        WHERE id_barag='$id'";

    mysqli_query($conn, $sql_update);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ubah Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h1>Ubah Barang</h1>

    <form method="post" enctype="multipart/form-data">

        <label>Nama Barang</label>
        <input type="text" name="nama" value="<?= $data['nama']; ?>">

        <label>Kategori</label>
        <input type="text" name="kategori" value="<?= $data['kategori']; ?>">

        <label>Harga Beli</label>
        <input type="number" name="harga_beli" value="<?= $data['harga_beli']; ?>">

        <label>Harga Jual</label>
        <input type="number" name="harga_jual" value="<?= $data['harga_jual']; ?>">

        <label>Stok</label>
        <input type="number" name="stok" value="<?= $data['stok']; ?>">

        <label>Gambar Baru</label>
        <input type="file" name="gambar">

        <div class="preview-img">
            <img src="gambar/<?= $data['gambar']; ?>" alt="" width="150">
        </div>

        <button class="btn-submit" type="submit" name="submit">Update</button>
    </form>

</div>

</body>
</html>
