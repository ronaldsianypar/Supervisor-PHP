<?php
 error_reporting(0);
 session_start();
  include '../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <!-- Data Guru -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Diri</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
        
                        </thead>
                        <tbody>
                            <?php 
                                $idUser = $_SESSION['idUser'];
                                $query = "SELECT * FROM tb_user WHERE id=".$idUser;
                                $sql = mysqli_query($con, $query);
                                while ($r = mysqli_fetch_array($sql)){
                                    $no++;
                                ?>
                        <table >
                          <tr>
        <td></td>
        <td style="text-align:center;"><img border="5" height="175" width="155" src= "../../document/fotoProfil/<?php echo $r['file'] ?>"></td>
        <td></td>
    </tr>
</table>
<table>
    <tr>
        <td><strong><i>Nama</i></strong></td>
        <td>:</td>
        <td><?php echo $r['nama'] ?></td>
    </tr>
    <tr>
        <td><strong><i>Username</i></strong></td>
        <td>:</td>
        <td><?php echo $r['username']; ?></td>
    </tr>
    <tr>
        <td><strong><i>Password</i></strong></td>
        <td>:</td>
        <td><input type="password"  value="<?php echo $r['password'] ?>" disabled></td></td>
    </tr>
    <tr>
        <td><strong><i>Akses</i></strong></td>
        <td>:</td>
        <td><?php echo $r['akses']; ?></td>
    </tr>

</table>
                            <?php  } ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>