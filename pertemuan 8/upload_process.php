<?php
    // target penyimpanan gambar
    $target_dir = "uploads/";
    // alamat ketika file sudah berhasil disimpan
    $target_file = $target_dir . basename($_FILES["gambar_contoh"]["name"]);
    // variabel yang digunakan untuk menentukan sebuah file dapat diunggah atau tidak
    $error = false;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // melakukan pengecekkan apakah variabel %_POST ada atau tidak
    if(isset($_POST["submit"])) {
        // melakukan pengecekkan apakah file sudah ada di penyimpanan sementara atau tidak
        $check = getimagesize($_FILES["gambar_contoh"]["tmp_name"]);
        // jika iya maka file sudah tersimpan
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $error = false;
        // jika tidak maka akan muncul pesan error
        } else {
            echo "File is not an image.";
            $error = false;
        }
    }
        // melakukan pengecekkan apakah sudah ada file yang meminili nama yang sama atau tidak
    if (file_exists($target_file)) {
        // jika sudah ada maka akan muncul pesan error dan data tidak dapat disimpan
        echo "Sorry, file already exists.";
        $error = true;
    }
        // melakukan pengecekkan apakah data memiliki ukuran diatas 500kb atau tidak
    if ($_FILES["gambar_contoh"]["size"] > 500000) {
        // jika iya maka akan muncul pesan error dan data tidak dapat disimpan
        echo "Sorry, your file is too large.";
        $error = true;
    }
        
        // melakukan pengecekkan apakah format file sudah sesuai dengan ketentuan atau belum
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        // jika belum maka akan muncul pesan error dan data tidak dapat disimpan
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $error = true;
    }
        // melakukan pengecekkan file masih memiliki error atau tidak, false/true
    if ($error == true) {
        // Jika data masih memiliki error atau error==true maka akan mencetak pesan error data tidak dapat diunggah
        echo "Sorry, your file was not uploaded.";
        } else {
        // Jika data tidak memiliki error atau error==false maka akan disimpan pada direktori
        if (move_uploaded_file($_FILES["gambar_contoh"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["gambar_contoh"]["name"]). " has been uploaded.";
        } else {
            // jika terdapat error maka akan mencetak pesan error
            echo "Sorry, there was an error uploading your file.";
         }
        }
?>