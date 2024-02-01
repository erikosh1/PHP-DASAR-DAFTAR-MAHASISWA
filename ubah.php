<?php 



    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }


require 'functions.php';


// ambil data di url
$id = $_GET["id"];


$krywn = query("SELECT * FROM karyawan WHERE id = $id")[0];




if (isset($_POST["submit"]) ) {

    if( ubah ($_POST)> 0) {
        echo "<script> 
        alert('data berhasil diubah!');
        document.location.href = 'index.php';
         </script>";
    } else {
        echo "<script> 
        alert('data gagal diubah!');
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
    <title>Ubah Data</title>
</head>
<body>
<h1>Ubah data karyawan</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $krywn["id"]?>">
    <ul>
        <li>
            <label for="nama">nama</label>
            <input type="text" id="nama" name="nama"required value="<?= $krywn["nama"]?>">
        </li>
        <li>
            <label for="umur">umur</label>
            <input type="text" id="umur" name="umur" required value="<?= $krywn["umur"]?>">
        </li>
        <li>
            <label for="alamat">alamat</label>
            <input type="text" id="alamat" name="alamat" required value="<?= $krywn["alamat"]?>">
        </li>
        <li>
            <label for="gaji">gaji</label>
            <input type="text" id="gaji" name="gaji" required value="<?= $krywn["gaji"]?>">
        </li>
        <li>
            <button type="submit" name="submit">Ubah Data!</button>
        </li>
    </ul>

    </form>



</body>
</html>