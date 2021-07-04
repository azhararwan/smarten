<?php
session_start();
include('../connect.php');
$id_periksa = $_POST['id_periksa'];
$id_anak = $_POST['id_anak'];
$id_kategori = $_POST['id_kategori'];
$id_pertanyaan = $_POST['id_pertanyaan'];
$jumlah_ya = 0;
$jumlah_tidak = 0;
$tgl_periksa = $_POST['tgl_periksa'];
$p = $_POST['p'];
// query

for($i = 0; $i < count($p); ++$i) {
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
$sql = "INSERT INTO hasil_periksa (id_periksa,id_anak,id_kategori,tgl_periksa,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,jumlah_ya,status_perkembangan) VALUES (:id_periksa,:id_anak,:id_kategori,:tgl_periksa,:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:jumlah_ya,:status_perkembangan)";
$q = $db->prepare($sql);
$q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':tgl_periksa'=>$tgl_periksa,':p1'=>$p[0],':p2'=>$p[1],':p3'=>$p[2],':p4'=>$p[3],':p5'=>$p[4],':p6'=>$p[5],':p7'=>$p[6],':p8'=>$p[7],':p9'=>$p[8],':p10'=>$p[9], ':jumlah_ya'=>$jumlah_ya, ':status_perkembangan'=>$status_perkembangan));

if($id_kategori == 'k3'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p13",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p23",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p33",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p43",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p53",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p63",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p73",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p83",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p93",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p103",':p10'=>$p[9]));
}

else if($id_kategori == 'k6'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p16",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p26",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p36",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p46",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p56",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p66",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p76",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p86",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p96",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p106",':p10'=>$p[9]));
}


else if($id_kategori == 'k9'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p19",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p29",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p39",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p49",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p59",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p69",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p79",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p89",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p99",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p109",':p10'=>$p[9]));
}


else if($id_kategori == 'k12'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p112",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p212",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p312",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p412",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p512",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p612",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p712",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p812",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p912",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p1012",':p10'=>$p[9]));
}


else if($id_kategori == 'k15'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p115",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p215",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p315",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p415",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p515",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p615",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p715",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p815",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p915",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p1015",':p10'=>$p[9]));
}


else if($id_kategori == 'k18'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p118",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p218",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p318",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p418",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p518",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p618",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p718",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p818",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p918",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p1018",':p10'=>$p[9]));
}


else if($id_kategori == 'k21'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p121",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p221",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p321",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p421",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p521",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p621",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p721",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p821",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p921",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p1021",':p10'=>$p[9]));
}


else if($id_kategori == 'k24'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p124",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p224",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p324",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p424",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p524",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p624",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p724",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p824",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p924",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p1024",':p10'=>$p[9]));
}


else if($id_kategori == 'k30'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p130",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p230",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p330",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p430",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p530",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p630",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p730",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p830",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p930",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p1030",':p10'=>$p[9]));
}


else if($id_kategori == 'k36'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p136",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p236",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p336",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p436",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p536",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p636",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p736",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p836",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p936",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p1036",':p10'=>$p[9]));
}


else if($id_kategori == 'k42'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p142",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p242",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p342",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p442",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p542",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p642",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p742",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p842",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p942",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p1042",':p10'=>$p[9]));
}


else if($id_kategori == 'k48'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p148",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p248",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p348",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p448",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p548",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p648",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p748",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p848",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p948",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p1048",':p10'=>$p[9]));
}


else if($id_kategori == 'k54'){
  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p1)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p154",':p1'=>$p[0]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p2)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p254",':p2'=>$p[1]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p3)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p354",':p3'=>$p[2]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p4)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p454",':p4'=>$p[3]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p5)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p554",':p5'=>$p[4]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p6)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p654",':p6'=>$p[5]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p7)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p754",':p7'=>$p[6]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p8)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p854",':p8'=>$p[7]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p9)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p954",':p9'=>$p[8]));

  $sql = "INSERT INTO hasil_periksa2 (id_periksa,id_anak,id_kategori,id_pertanyaan,jawaban) VALUES (:id_periksa,:id_anak,:id_kategori,:id_pertanyaan,:p10)";
  $q = $db->prepare($sql);
  $q->execute(array(':id_periksa'=>$id_periksa,':id_anak'=>$id_anak,':id_kategori'=>$id_kategori,':id_pertanyaan'=>"p1054",':p10'=>$p[9]));
}

header("location: hasilperiksa.php?id={$id_periksa}");
?>

<html>
  
</html>
