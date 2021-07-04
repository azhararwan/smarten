<?php
session_start();
include('../connect.php');
$id_anak = $_POST['id_anak'];
$nama_anak = $_POST['nama_anak'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$prematur = $_POST['prematur'];
$usia_prematur = $_POST['usia_prematur'];
$nama_ortu = $_POST['nama_ortu'];
// query

  //do your write to the database filename and other details   
$sql = "INSERT INTO data_anak (id_anak,nama_anak,jenis_kelamin,tanggal_lahir,prematur,usia_prematur,nama_ortu) VALUES (:id_anak,:nama_anak,:jenis_kelamin,:tanggal_lahir,:prematur,:usia_prematur,:nama_ortu)";
$q = $db->prepare($sql);
$q->execute(array(':id_anak'=>$id_anak,':nama_anak'=>$nama_anak,':jenis_kelamin'=>$jenis_kelamin,':tanggal_lahir'=>$tanggal_lahir,':prematur'=>$prematur,':usia_prematur'=>$usia_prematur,':nama_ortu'=>$nama_ortu));
header("location: dataanak.php");
?>