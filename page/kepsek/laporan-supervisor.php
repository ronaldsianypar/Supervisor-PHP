<?php
 error_reporting(0);
 session_start();
  include '../config/koneksi.php';
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                            <!-- general form elements -->
                        <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">

                        </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
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
                            <th style="text-align:center;" height="" width="150">Mata Pelajaran</th>
                            <th style="text-align:center;">File</th>
                            <th style="text-align:center;">Deskripsi</th>
                            <th style="text-align:center;" height="" width="150">Tanggal Upload</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;" height="" width="180">Tanggal Diperiksa</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 0;
                                $sql = mysqli_query($con, "SELECT * FROM tb_uploudTugas");
                                while ($r = mysqli_fetch_array($sql)){
                                    $no++;
                                ?>
                                <tr>
                                <td><?php echo $no; ?></td>
                                <td style="text-align:center"><?php echo $r['mapel']; ?></td>
                                <td><?php echo $r['file']; ?></td>
                                <td><?php echo $r['deskripsi']; ?></td>
                                <td style="text-align:center;"><?php echo $r['tanggal_uploud']; ?></td>
                                <td style="text-align:center;"><?php echo $r['status']; ?></td>
                                <td style="text-align:center;"><?php echo $r['tanggal_diperiksa']; ?></td>
                            
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