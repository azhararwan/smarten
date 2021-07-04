<?php
// configuration
include('../connect.php');

// new data
$id_anak = $_POST['id_anak'];
$nama_anak = $_POST['nama_anak'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$prematur = $_POST['prematur'];
$usia_prematur = $_POST['usia_prematur'];
$nama_ortu = $_POST['nama_ortu'];
// query

$sql = "UPDATE data_anak 
        SET nama_anak=?,jenis_kelamin=?, tanggal_lahir=?, prematur=?, usia_prematur=?, nama_ortu=?
		WHERE id_anak=?";
$q = $db->prepare($sql);
$q->execute(array($nama_anak,$jenis_kelamin,$tanggal_lahir,$prematur,$usia_prematur,$nama_ortu,$id_anak));
header("location: dataanak.php");

?>