<?php
// configuration
include('../connect.php');

// new data
$id_periksa = $_POST['id_periksa'];
$id_anak = $_POST['id_anak'];
$id_kategori = $_POST['id_kategori'];
$jumlah_ya = 0;
$jumlah_tidak = 0;
$tgl_periksa = $_POST['tgl_periksa'];
$p = $_POST['p'];

for($i = 1; $i <= count($p); ++$i) {
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

$sql = "UPDATE hasil_periksa 
        SET id_anak=?, p1=?, p2=?, p3=?, p4=?, p5=?, p6=?, p7=?, p8=?, p9=?, p10=?, tgl_periksa=?, jumlah_ya=?, status_perkembangan=?
		    WHERE id_periksa=?";
$q = $db->prepare($sql);
$q->execute(array($id_anak,$p[1],$p[2],$p[3],$p[4],$p[5],$p[6],$p[7],$p[8],$p[9],$p[10],$tgl_periksa,$jumlah_ya,$status_perkembangan,$id_periksa));

if($id_kategori == 'k3'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p13'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p23'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p33'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p43'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p53'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p63'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p73'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p83'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p93'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p103'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}


else if($id_kategori == 'k6'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p16'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p26'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p36'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p46'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p56'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p66'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p76'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p86'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p96'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p106'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}


else if($id_kategori == 'k9'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p19'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p29'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p39'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p49'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p59'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p69'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p79'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p89'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p99'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p109'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}


else if($id_kategori == 'k12'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p112'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p212'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p312'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p412'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p512'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p612'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p712'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p812'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p912'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p1012'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}


else if($id_kategori == 'k15'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p115'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p215'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p315'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p415'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p515'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p615'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p715'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p815'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p915'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p1015'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}


else if($id_kategori == 'k18'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p118'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p218'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p318'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p418'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p518'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p618'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p718'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p818'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p918'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p1018'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}


else if($id_kategori == 'k21'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p121'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p221'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p321'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p421'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p521'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p621'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p721'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p821'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p921'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p1021'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}


else if($id_kategori == 'k24'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p124'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p224'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p324'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p424'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p524'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p624'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p724'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p824'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p924'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p1024'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}


else if($id_kategori == 'k30'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p130'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p230'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p330'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p430'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p530'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p630'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p730'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p830'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p930'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p1030'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}


else if($id_kategori == 'k36'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p136'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p236'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p336'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p436'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p536'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p636'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p736'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p836'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p936'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p1036'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}


else if($id_kategori == 'k42'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p142'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p242'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p342'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p442'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p542'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p642'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p742'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p842'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p942'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p1042'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}


else if($id_kategori == 'k48'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p148'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p248'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p348'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p448'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p548'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p648'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p748'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p848'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p948'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p1048'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}


else if($id_kategori == 'k54'){
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p154'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[1],$id_periksa));
  
  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p254'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[2],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p354'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[3],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p454'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[4],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p554'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[5],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p654'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[6],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p754'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[7],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p854'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[8],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p954'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[9],$id_periksa));

  $sql = "UPDATE hasil_periksa2 SET id_anak=?, jawaban=? WHERE id_periksa=? AND id_pertanyaan='p1054'";
  $q = $db->prepare($sql);
  $q->execute(array($id_anak,$p[10],$id_periksa));
}

header("location: lihatriwayatpemeriksaan.php?id={$id_periksa}");

?>