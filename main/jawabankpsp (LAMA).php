<?php
session_start();
include('../connect.php');
$id_periksa = $_POST['id_periksa'];
$id_anak = $_POST['id_anak'];
$id_kategori = $_POST['id_kategori'];
$jumlah_ya = 0;
$jumlah_tidak = 0;
$tgl_periksa = $_POST['tgl_periksa'];
// query

for($i = 0; $i < count($_POST['p']); ++$i) {
  $p[$i] = $_POST['p'][$i];
	if($p[$i] == 'Ya') { 
    ++$jumlah_ya;
	}else{
    ++$jumlah_tidak;
  }
}

if($jumlah_ya >= 9){
  $status_perkembangan = "Sesuai";
}else if($jumlah_ya > 6 && $jumlah_ya < 9){
  $status_perkembangan = "Meragukan";
}else if($jumlah_ya <= 6){
  $status_perkembangan = "Penyimpangan";
}else{
  $status_perkembangan = "Tidak valid";
}


  //do your write to the database filename and other details   
$sql = "INSERT INTO hasil_periksa (id_periksa,id_anak,id_kategori,tgl_periksa,jumlah_ya,status_perkembangan) VALUES (:id_periksa,:id_anak,:id_kategori,:tgl_periksa,:jumlah_ya,:status_perkembangan)";
$q = $db->prepare($sql);
$q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':tgl_periksa'=>$tgl_periksa,':jumlah_ya'=>$jumlah_ya, ':status_perkembangan'=>$status_perkembangan));
header("location: hasilperiksa.php?id={$id_periksa}");
?>

<html>
  
</html>
