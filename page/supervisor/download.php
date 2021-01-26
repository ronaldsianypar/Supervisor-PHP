<?php
include '../../config/koneksi.php';
// Downloads files
// Tentukan folder file yang boleh di download
$folder = "../../document/";
$id = $_GET['id_tugas'];
$sql = mysqli_query($con, "SELECT * FROM tb_uploudtugas WHERE id_tugas = '$id'");
$isi = mysqli_fetch_array($sql);
$filename = $isi['file'];
 
 //header("Cache-Control: public");
 //header("Content-Description: File Transfer");
 header("Content-Disposition: attachment; filename=".basename($filename));
 header("Content-Type: application/octet-stream;");
 //header("Content-Transfer-Encoding: binary");
 readfile("files/".$filename);
?>