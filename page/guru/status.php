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
                        <h3 class="card-title">Document</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th style="text-align:center;">Mata Pelajaran</th>
                            <th style="text-align:center;">File</th>
                            <th style="text-align:center;">Deskripsi</th>
                            <th style="text-align:center;">Tanggal Upload</th>
                            <th style="text-align:center;">Tanggal Diperiksa</th>
                            <th style="text-align:center;" bgcolor="yellow">Status</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 0;
                                $idUser = $_SESSION['idUser'];
                                $query = "SELECT * FROM tb_uploudTugas WHERE id_user=".$idUser;
                                $sql = mysqli_query($con, $query);
                                while ($r = mysqli_fetch_array($sql)){
                                    $no++;
                                ?>
                                <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r['mapel']; ?></td>
                                <td><?php echo $r['file']; ?></td>
                                <td><?php echo $r['deskripsi']; ?></td>
                                <td><?php echo $r['tanggal_uploud']; ?></td>
                                <td><?php echo $r['tanggal_diperiksa']; ?></td>
                                <td bgcolor="yellow"><?php echo $r['status']; ?></td>
                               
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