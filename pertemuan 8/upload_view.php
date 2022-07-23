<!DOCTYPE html>
<html>
<body>
    <!-- digunakan sebagai form input data yang akan dikirim ke
        session_process.php-->
    <form action="upload_process.php" method="post" enctype="multipart/form-data">
        Pilih Gambar:
        <!-- format input data yang digunakan adalah file untuk
             mengunggah data berubah gambar
        -->
        <input type="file" name="gambar_contoh" id="gambar_contoh">
        <input type="submit" name="submit">
    </form>
</body>
</html>
