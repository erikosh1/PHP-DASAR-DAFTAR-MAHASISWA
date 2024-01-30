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




?>