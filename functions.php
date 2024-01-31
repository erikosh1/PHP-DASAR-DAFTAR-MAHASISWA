<?php 

$conn = mysqli_connect("localhost", "root", "", "phpdasarr");

function query($query){
    global $conn;
    $result = mysqli_query($conn , $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $umur = htmlspecialchars($data["umur"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $gaji = htmlspecialchars($data["gaji"]);


    $query = "INSERT INTO karyawan
                VALUES
                ('','$nama', '$umur', '$alamat','$gaji')    
            ";

        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
}


function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM karyawan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id = $data["id"];

    $nama = htmlspecialchars($data["nama"]);
    $umur = htmlspecialchars($data["umur"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $gaji = htmlspecialchars($data["gaji"]);

    $query = "UPDATE karyawan SET 
                nama = '$nama' ,
                 umur = $umur,
                  alamat = '$alamat',
                   gaji = '$gaji' 
                   WHERE id = $id
                   ";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM karyawan 
                WHERE
            nama LIKE '%$keyword%' OR
            umur LIKE '%$keyword%' OR
            alamat LIKE '%$keyword%' OR
            gaji LIKE '%$keyword%'
                    ";
    return query($query);
}

function registrasi($data){
    global $conn;


    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    // 
    $result = mysqli_query($conn , "SELECT username FROM userr WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script> alert('username telah terdaftar, pakai username lain bos'); </script>";
        return false;
    }





    // 

    if( $password !== $password2 ){
        echo "<script> alert ('konfirmasi password tidak sesuai'); </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO userr VALUES('' , '$username' , '$password')");

    return mysqli_affected_rows($conn);
}


?>