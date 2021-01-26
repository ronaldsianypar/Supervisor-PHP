<?php
 error_reporting(0);
 session_start();
  include '../config/koneksi.php';

    if(isset($_GET['lihat'])) {
    $sql = mysqli_query($con, "SELECT * FROM tb_jadwal WHERE id = '$_GET[id]'");
    $isi = mysqli_fetch_array($sql);
  }

  if (isset($_POST['clear'])) {
    echo "<script>alert('Data dibersihkan');document.location.href='?menu=nilai';</script>";
  }else{
    mysqli_error($con);
  }

  if (isset($_POST['update'])) {
    $sql = mysqli_query($con, "UPDATE tb_jadwal SET darihari = '$_POST[darihari]', sampaihari='$_POST[sampaihari]', tanggal_menjadwalkan='$_POST[tanggal_menjadwalkan]' WHERE id= '$_GET[id]'");
    
    $isi = mysqli_fetch_array($sql);
        if ($sql) {
            echo "<script>alert('Data berhasil diubah');document.location.href='?menu=nilai';</script>";
        
    }else{
      echo "<script>alert('Data gagal diubah');document.location.href='?menu=nilai';</script>";
    }
  }

    if(isset($_GET['hapus'])){  
    $sql = mysqli_query($con, "DELETE FROM tb_jadwal WHERE id = '$_GET[id]'");
    if($sql){
      echo "<script>alert('Data berhasil dihapus');
      document.location.href='?menu=nilai'</script>";
    }else{
      echo "<script>alert('Data gagal dihapus');
      document.location.href='?menu=nilai'</script>";
    }
  } 

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
        <!-- Form Guru -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <form role="form" method="post" enctype="multipart/form-data">
                          
             
                            <!-- /.card-body -->
            <br>
                
            <?php if (isset($_GET['lihat'])) {?>
                <td><input class="btn btn-secondary" type="submit" name="update" value="UPDATE"></td>
              <?php } ?>
                        </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Data Supervisor -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Kurikulum</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th style="text-align:center;">Foto Profil</th>
                            <th style="text-align:center;">Nama</th>
                            <th style="text-align:center;">Username</th>
                            <th style="text-align:center;">Akses</th>
                            <th style="text-align:center;">Dari Tanggal</th>
                            <th style="text-align:center;">Sampai Tanggal</th>
                            <th style="text-align:center;">Tanggal Menjadwal</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 0;
                                $sql = mysqli_query($con, "SELECT * FROM tb_jadwal WHERE akses='Supervisor'  ORDER BY tanggal_menjadwalkan DESC");
                                while ($r = mysqli_fetch_array($sql)){
                                    $no++;
                                ?>
                                <tr>
                                <td><?php echo $no; ?></td>
                                <td style="text-align:center;"><img border="5" height="175" width="155" src= "../../document/fotoProfil/<?php echo $r['file'] ?>"></td>
                                <td style="text-align:center"><?php echo $r['nama']; ?></td>
                                <td style="text-align:center;"><?php echo $r['username']; ?></td>
                                <td style="text-align:center;"><?php echo $r['akses']; ?></td>
                                <td style="text-align:center;"><?php echo $r['darihari']; ?></td>
                                <td style="text-align:center;"><?php echo $r['sampaihari']; ?></td>
                                <td style="text-align:center;"><?php echo $r['tanggal_menjadwalkan']; ?></td>
                            </tr>
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