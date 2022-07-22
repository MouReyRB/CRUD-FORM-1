<?php
    // Digunakan untuk mengabungkan atau mengoneksikan file php lain
    // yaitu koneksi.php
    include "koneksi.php";

    // Variabel dan method POST digunakan untuk memanggil data yang sudah
    // diinput melalui form/web
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    // Digunakan untuk memasukkan data kedalam tabel
    $sql = "INSERT into data(nama, kelas, alamat) VALUES ('$nama', '$kelas', '$alamat')";
    $add = $conn->query($sql);
    
    // Jika input data berhasil, maka data akan tampil dan akan dialihkan ke
    // tampilan index.php
    if($add){
        $conn->close();
        header("location:index.php");
        exit;
    // Jika input data tidak berhasil, maka data tidak akan tampil dan tidak akan
    // dialihkan
    } else {
        echo "Error : ".$conn->error;
        $conn->close;
        exit();
    }
?>