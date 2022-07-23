<?php
    // inisiasi seesion
    session_start();
    if(isset($_GET['process'])){
        // jika melakukan proses hapus semua session
        if($_GET['process']=='hapus_semua_session'){
        session_start();
        // maka session akan dihilangkan
        session_destroy();
        // mengirim hasil ke session_read.php
        header("location:session_read.php");
        }
        // jika melakukan proses hapus session 1
        elseif($_GET['process']=='hapus_session1'){
        session_start();
        // maka session 1 akan dihapus atau di set ulang
        unset($_SESSION['session_tersimpan1']);
        // mengirim hasil ke session_read.php
        header("location:session_read.php");
        }
        // jika melakukan proses hapus session 2
        elseif($_GET['process']=='hapus_session2'){
        session_start();
        // maka session 2 akan dihapus atau di set ulang
        unset($_SESSION['session_tersimpan2']);
        // mengirim hasil ke session_read.php
        header("location:session_read.php");
        }
    } elseif(isset($_POST)){

        //digunakan sebagai tempat menyimpan data yagn diinput dan mennyimpan 
        //ke variabel $_SESSION
        session_start();
        $_SESSION['session_tersimpan1'] = $_POST['kolom_input_session1'];
        $_SESSION['session_tersimpan2'] = $_POST['kolom_input_session2'];
        header("location:session_read.php");
    }
?>