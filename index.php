<?php 
// koneksi ke database
require 'functions.php';
$karyawan = query("SELECT * FROM karyawan");
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

<h1>Daftar Karyawan</h1>
<p style="color:red; position:absolute; top:0; right:0; "><?= date("l d M Y")?></p>
<a href="tambah.php">Tambah data karyawan</a>

<table border="1" cellpadding="10" cellspacing="0">


<tr>
    <th>No</th>
    <th>Aksi</th>
    <!-- <th>Gambar</th> -->
    <th>Nama</th>
    <th>Umur</th>
    <th>Alamat</th>
    <th>Gaji</th>
</tr>
<?php $i = 1; ?>
<?php foreach($karyawan as $k): ?>
<tr>
    <td><?= $i; ?></td>
    <td>
        <a href="ubah.php?id=<?= $k["id"]?>">Ubah</a> |
        <a href="hapus.php?id=<?= $k["id"]?>" onclick=" return confirm('Yakin gak dek mau hapus datanuya?')">Hapus</a>
    </td>
    <!-- <td> <img src="img/1.jpg"></td> -->
    <td><?= $k["nama"]?></td>
    <td><?= $k["umur"] ?></td>
    <td><?= $k["alamat"]?></td>
    <td><?= $k["gaji"]?></td>
</tr>
<?php $i++;?>
<?php endforeach; ?>


</table>


</body>
</html>