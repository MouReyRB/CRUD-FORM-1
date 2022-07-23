<?php
    // menghubungakan file hapus_data.php dengan koneksi.php
    include "koneksi.php";
    // menghubungakan file create_message.php dengan koneksi.php
    include "create_message.php";

    // menghapus data dari data dengan acuan mahasiswa_id
    $sql = "DELETE from data where id=".$_GET['mahasiswa_id'];
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        // jika data berhasil dihapus akan mencetak output bahwa data berhasil dihapus
        create_message('Hapus data berhasil','success','check');
        // mengirim hasil ke session_read.php
        header("location:index.php");
        exit();
    } else {
        $conn->close();
        // jika data berhasil dihapus akan mencetak output bahwa data gagal dihapus
        create_message("Error: " . $sql . "<br>" . $conn->error,"danger","warning");
        // mengirim hasil ke session_read.php
        header("location:index.php");
        exit();
    }
?>
