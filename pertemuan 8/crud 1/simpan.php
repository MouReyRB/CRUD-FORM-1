<?php
    // menghubungakan file simpan.php dengan koneksi.php
    include "koneksi.php";
    // menghubungakan file simpan.php dengan create_message.php
    include "create_message.php";

    // variabel
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    // melakukan pengecekkan apakah data yang dipanggil memiliki mahasiswa_id atau tidak
    if(isset($_POST['mahasiswa_id'])) {
        // memiliki mahasiswa_id maka akan menjalankan proses edit
        $sql = "UPDATE data
            SET nama='$nama', kelas='$kelas', alamat='$alamat'
            WHERE id=".$_POST['mahasiswa_id'];
        $edit = $conn->query($sql);
        
        // jika data berhasil diedit makan akan mencetak pesan berhasil
        if($edit) {
            $conn->close();
            create_message('Ubah data berhasil','success','check');
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
            // jika data tidak mberhasil diedit makan akan mencetak pesan gagal atau error
        } else {
            $conn->close();
            create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        // tidak memiliki mahasiswa_id maka akan menjalankan proses insert
        $sql = "INSERT into data(nama, kelas, alamat)
            VALUES('$nama','$kelas','$alamat')";
        // memasukkan data ke query
        $add = $conn->query($sql);

        // jika data berhasil diedit makan akan mencetak pesan berhasil
        if($add) {
            $conn->close();
            create_message('Simpan data berhasil','success','check');
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        
        // jika data tidak berhasil diedit makan akan mencetak pesan gagal atau error
        } else {
            $conn->close();
            create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
            header("location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }
?>