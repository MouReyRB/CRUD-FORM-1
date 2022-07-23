<?php
    // Digunakan untuk mengabungkan atau mengoneksikan file php lain
    // yaitu koneksi.php 
    include "koneksi.php";

    // Digunakan untuk menjalan query MySQL SELECT
    $kelas = ['SE-02-A', 'SE-02-B', 'SE-02-C'];
    $sql = "SELECT * From data";
    $data = $conn->query($sql);

    // Digunakan untuk melakukan select pada data yang membuat data dapat ditampilkan
    $sql_mahasiswa = "SELECT * FROM data WHERE id=".$_GET['mahasiswa_id'];
    $data_mahasiswa = $conn->query($sql_mahasiswa);
    $view = $data_mahasiswa->fetch_array();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>CRUD PHP</title>
  </head>
  <body>
   

    <div class="container">
        <h1 class="text-center mt-5 mb-5">Form Mahasiswa</h1>
        <div class="row">
            <div class="col-lg-6 mb-5">
                <h4>Input Data</h4>
                <!-- // Digunakan untuk memasukkan data pada tag form dan menampilkan
                        daftar kelas
                -->
                <form action="simpan.php" method="post">
                    <!-- digunakan untuk menampung data yang sudah ada atua data yang akan diedit -->
                    <input type="hidden" name="mahasiswa_id" value="<?= $view['id']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <!-- digunakan untuk menampung dan menampilkan data dari database nama -->
                        <input type="text" name="nama" placeholder="Nama" class="form-control" value="<?= $view['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" class="form-control" required>
                            <option value="">Pilih</option>
                            <!-- digunakan untuk menampung dan menampilkan data dari kelas yang sebelumnya sudah dipilih -->
                            <?php foreach($kelas as $kl) : ?>
                                <option value="<?= $kl; ?>" <?= ($kl == $view['kelas']) ? 'selected' : ''; ?>><?= $kl; ?></option>
                            <?php endforeach; ?>    
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- digunakan untuk menampung dan menampilkan data dari database alamat -->
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" placeholder="Alamat" class="form-control" value="<?= $view['alamat'] ?>" required>
                    </div>
                    
                    <!-- sebagai tombol ketika data sudah setelah diedit -->
                    <button type="submit" class="btn btn-success btn-block">Edit</button>
                    <!-- sebagai tombol untuk kembali ketampilan awal -->
                    <a href="index.php" class="btn btn-warning btn-block">Kembali</a>
                </form>
            </div>
            <div class="col-lg-6">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Data Mahasiswa</span>
                    <?php
                        // menghitung data barang
                        $jumlah_data = mysqli_num_rows($data);
                    ?>
                    <!-- Untuk mencetak jumlah data -->
                    <p>Jumlah data barang : <b><?php echo $jumlah_data; ?></b></p>
                </h4>
                
                <!-- Digunakan untuk melakukan perulangan dan menampilkan data
                yang sudah diinput melalui form
                -->
                <?php foreach($data as $dt) : ?>                
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?= $dt['nama']; ?></h4>
                            </div>
                            <div class="col-md-6">
                                <!-- digunakan sebagai tombol delete -->
                                <a class="float-right ml-3 text-danger" href="hapus_data.php?mahasiswa_id=<?php echo $dt['id']?>" type="button" class = "close">
                                <span class="fa fa-trash"></span>
                                </a>
                                <!-- digunakan sebagai tombol edit -->
                                <a class="float-right ml-3 text-danger" href="update_form.php?mahasiswa_id=<?php echo $dt['id']?>" type="button" class = "close">
                                <span class="fa fa-edit"></span>
                                </a>
                                <p class="text-right"><?= $dt['kelas'] ; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?= $dt['alamat']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  </body>
</html>