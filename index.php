<?php 
session_start();
include "config/koneksi.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = mysqli_query($con, "SELECT * FROM tb_user WHERE username= '$username' and password='$password'");
    $cek = mysqli_num_rows($sql);
    if($cek>0){
      $data = mysqli_fetch_assoc($sql);
      $_SESSION['level'] = $data['akses'];
      $_SESSION['idUser'] = $data['id'];
      if ($data['akses'] == "Guru") {
        $_SESSION['username'] = $username;
        $_SESSION['akses'] = "Guru";
        echo "<script>alert('Selamat datang');document.location.href='page/guru/halaman-guru.php?menu=dashboard'</script>";
      }else if ($data['akses'] == "Supervisor"){
        $_SESSION['username'] = $username;
        $_SESSION['idUser'] = $data['id'];
        $_SESSION['akses'] == "Supervisor";
        echo "<script>alert('Selamat datang $namaUser');document.location.href='page/supervisor/halaman-supervisor.php?menu=dashboard'</script>";
      }else if ($data['akses'] == "Kurikulum"){
        $_SESSION['username'] = $username;
        $_SESSION['idUser'] = $data['id'];
        $_SESSION['akses'] == "Kurikulum";
        echo "<script>alert('Selamat datang');document.location.href='page/kurikulum/halaman-kurikulum.php?menu=dashboard'</script>";
      }else if ($data['akses'] == "Kepala Sekolah"){
        $_SESSION['username'] = $username;
        $_SESSION['idUser'] = $data['id'];
        $_SESSION['akses'] == "Kepala Sekolah";
        echo "<script>alert('Selamat datang');document.location.href='page/kepsek/halaman-kepsek.php?menu=dashboard'</script>";
      }else{
        echo "<script>alert('Login gagal');document.location.href='index.php'</script>";
      }
    }else{
      echo "<script>alert('Gagal cek username & password !');document.location.href='index.php'</script>";
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en">

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

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <img src="img/logowk.png" class="img-responsive" width="500" height="422" style="background-position: center; background-size: cover;">                
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">SUPERVISOR WIKRAMA BOGOR</h1>
                  </div>
                  <form method="post" class="user">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block"required>
                  </form>
                  <div> 
                  <h7>Belum punya akun ? <a href="daftar.php">Buatlah akun !</a></h7>
                </div>
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
