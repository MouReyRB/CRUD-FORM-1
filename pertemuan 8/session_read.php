<!DOCTYPE html>
<html>
<head>
    <title>Session</title>
</head>
<body>
    <!-- digunakan sebagai form input data yang akan dikirim ke
        session_process.php
    -->
    <form action="session_process.php" method="post">
        <input type="text" name="kolom_input_session1" required /></br>
        <input type="text" name="kolom_input_session2" required /></br>
        <button type="submit">Simpan</button>
    </form>

    <!-- Digunakan untuk menambahkan 3 tombol yaitu hapus session1, hapus session2 dan
         hapus session semua.
    -->
    <a href="session_process.php?process=hapus_session1"><button>Hapus Session 1</button></a><br>
    <a href="session_process.php?process=hapus_session2"><button>Hapus Session 2</button></a><br>
    <a href="session_process.php?process=hapus_semua_session"><button>Hapus Session Semua</button></a><br>

    <!-- Digunakan untuk menampilkan session yang tersimpan -->
    <?php session_start() ?>
    Session yang tersimpan 1: 
    <?php echo isset($_SESSION['session_tersimpan1'])?$_SESSION['session_tersimpan1']:'Session 1 Kosong' ?><br>
    Session yang tersimpan 2: 
    <?php echo isset($_SESSION['session_tersimpan2'])?$_SESSION['session_tersimpan2']:'Session 2 Kosong' ?><br>

</body>
</html>