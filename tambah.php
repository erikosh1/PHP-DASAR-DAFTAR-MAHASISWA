<?php 


require 'functions.php';

if (isset($_POST["submit"]) ) {


    if( tambah ($_POST)> 0) {
        echo "<script> 
        alert('data berhasil ditambahkan!');
        document.location.href = 'index.php';
         </script>";
    } else {
        echo "<script> 
        alert('data gagal ditambahkan!');
        document.location.href = 'index.php';
         </script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Tambah data karyawan</h1>
    <form action="" method="post">
    <ul>
        <li>
            <label for="nama">nama</label>
            <input type="text" id="nama" name="nama"required autocomplete="off">
        </li>
        <li>
            <label for="umur">umur</label>
            <input type="text" id="umur" name="umur" required autocomplete="off">
        </li>
        <li>
            <label for="alamat">alamat</label>
            <input type="text" id="alamat" name="alamat" required autocomplete="off">
        </li>
        <li>
            <label for="gaji">gaji</label>
            <input type="text" id="gaji" name="gaji" required autocomplete="off">
        </li>
        <li>
            <button type="submit" name="submit">Tambah Data!</button>
        </li>
    </ul>

    </form>



</body>
</html>