<?php
 error_reporting(0);
 session_start();
  include '../config/koneksi.php';

  if (isset($_POST['simpan'])){
    // ambil data file
    $namaFile = $_FILES['file']['name'];
    $namaSementara = $_FILES['file']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = "../../document/";

    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    if ($terupload) {
        echo "Upload berhasil!<br/>";
        echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
    } else {
        echo "Upload Gagal!";
    }
    
    $sql = mysqli_query($con, "INSERT INTO tb_uploudTugas VALUES ('','$_POST[mapel]','$namaFile','$_POST[deskripsi]','$_POST[tanggal_uploud]')");
      if ($sql){
        echo "<script>alert('Document berhasil disimpan'); document.location.href='?menu=nilai';</script>";
      }else{
        echo "<script>alert('Document gagal disimpan'); document.location.href='?menu=nilai';</script>"; 
      }
    }
    if(isset($_GET['lihat'])) {
    $sql = mysqli_query($con, "SELECT * FROM tb_uploudTugas WHERE id_tugas = '$_GET[id_tugas]'");
    $isi = mysqli_fetch_array($sql);
  }

  if (isset($_POST['clear'])) {
    echo "<script>alert('Data dibersihkan');document.location.href='?menu=nilai';</script>";
  }else{
    mysqli_error($con);
  }

  if (isset($_POST['update'])) {
    $sql = mysqli_query($con, "UPDATE tb_uploudTugas SET status = '$_POST[status]', tanggal_diperiksa='$_POST[tanggal_diperiksa]' WHERE id_tugas = '$_GET[id_tugas]'");
    $isi = mysqli_fetch_array($sql);
    if ($sql) {
      echo "<script>alert('Data berhasil diubah');document.location.href='?menu=nilai';</script>";
    }else{
      echo "<script>alert('Data gagal diubah');document.location.href='?menu=nilai';</script>";
    }
  }

    if(isset($_GET['hapus'])){  
    $sql = mysqli_query($con, "DELETE FROM tb_uploudTugas WHERE id_tugas = '$_GET[id_tugas]'");
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
    <div class="wrapper">
        <section>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Lihat Tugas Guru</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="?menu=dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Lihat Tugas Guru</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Form Guru -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                            <!-- general form elements -->
                        <div class="card card-primary">
                        <div class="card-header">
                        
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <label style="text-align:center;">Mata Pelajaran</label>
                    <input disabled type="text" name="mapel" class="form-control" placeholder="Mata Pelajaran"  value="<?php echo $isi['mapel'] ?>" >
                    </div>

                    <div class="col">
                    <label style="text-align:center;">File</label>
                    <input disabled type="text" name="file" class="form-control" placeholder="File"  value="<?php echo $isi['file'] ?>">
                    </div>
            </div>
          </div>
          <div class="form-group">
             <div class="row">

               <div class="col">
                    <label style="text-align:center;">Deskripsi</label>
                    <input disabled type="text" name="deskripsi" class="form-control" placeholder="Deskripsi"  value="<?php echo $isi['deskripsi'] ?>">
                    </div>

              <div class="col">
                    <label style="text-align:center;">Tanggal Upload</label>
                    <input disabled type="date" name="tanggal_uploud" class="form-control" placeholder="Tanggal Upload"  value="<?php echo $isi['tanggal_uploud'] ?>" required>
                    </div>
             </div>
             <div class="form-group">
             <div class="row">

               <div class="col">
                    <label style="text-align:center;">Status</label>
                    <select name="status" class="form-control" required >
                            <?php if ($isi['status'] === 'Diterima') { ?>
                                <option value="Diterima">Diterima</option>
                            <?php }else if ($isi['status'] === 'Ditolak') { ?>
                                <option value="Setuju">Ditolak</option>    
                            <?php }else { ?>
                                <option value="Status" disabled selected>Status</option>
                      <?php } ?>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                    </div>

                    <div class="col">
                    <label style="text-align:center;">Tanggal diperiksa</label>
                    <input type="date" name="tanggal_diperiksa" class="form-control" placeholder="Tanggal Upload"  value="<?php echo $isi['tanggal_diperiksa'] ?>">
                    </div>
             </div>
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
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Tanggal Diperiksa</th>
                            <th style="text-align:center;" colspan="2">ACTION</th>
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
                                <td><?php echo $r['tanggal_uploud']; ?></td>
                                <td><?php echo $r['status']; ?></td>
                                <td><?php echo $r['tanggal_diperiksa']; ?></td>
                                <td><a class="btn btn-danger" href="?menu=nilai&lihat&id_tugas=<?php echo $r['id_tugas'] ?>">Pilih</a></td>
                                <td><a class="btn btn-success" href="download.php?id_tugas=<?php echo $r['id_tugas'] ?>">Download</a></td>
                            
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