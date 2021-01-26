<?php 
session_start();
include "config/koneksi.php";
error_reporting(0);
if (isset($_POST['daftar'])){
    // ambil data file
    $namaFile = $_FILES['file']['name'];
    $namaSementara = $_FILES['file']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = "document/fotoProfil/";

    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    if ($terupload) {
        echo "Upload berhasil!<br/>";
        echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
    } else {
        echo "Upload Gagal!";
    }
    
    $sql = mysqli_query($con, "INSERT INTO tb_user VALUES ('$_POST[id]','$_POST[nama]','$_POST[username]','$_POST[password]','$_POST[akses]','$namaFile')");
    $sqll = mysqli_query($con, "INSERT INTO tb_jadwal VALUES ('$_POST[id]','$_POST[nama]','$_POST[username]','$_POST[akses]','$namaFile','','','')");
      if ($sql){

          echo "<script>alert('Berhasil Daftar'); document.location.href='index.php';</script>";
        
      }else{
        echo "<script>alert('Gagal Daftar'); document.location.href='daftar.php';</script>"; 
      }
      if ($sqll){
          echo "<script>alert('Berhasil Daftar'); document.location.href='index.php';</script>";
        
      }else{
        echo "<script>alert('Gagal Daftar'); document.location.href='daftar.php';</script>"; 
      }
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="img/logowk.png" />
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Supervisor Wikrama Bogor</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/logowk.png" />

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">DAFTAR AKUN</h1>
                  </div>
                  <form method="post" class="user"  method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="text" name="id" class="form-control form-control-user" placeholder="NIS/NIP"required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama"required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"required>
                    </div>
                    <div class="form-group">
                    <label>Daftar Sebagai</label>
                    <select name="akses" class="form-control" required>
                      <option>--Pilih Daftar Sebagai--</option>
                      <option>Kepala Sekolah</option>
                      <option>Guru</option>
                      <option>Kurikulum</option>
                      <option>Supervisor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label style="text-align:center;">Foto Profile</label>
                    <input type="file" name="file" class="form-control" placeholder="File"  required>
                    </div>
                    <input type="submit" name="daftar" value="Daftar" class="btn btn-primary btn-user btn-block">

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
