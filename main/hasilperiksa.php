<html>
<head>
<title>
Hasil Periksa - SMARTEN
</title>

<?php 
require_once('auth.php');
?>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>

<?php
	function formatTanggal($date){
		$datetime = DateTime::createFromFormat('Y-m-d', $date);
 		return $datetime->format('j M Y');
	}
?>


<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
				<li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
				<li><a href="dataanak.php"><i class="icon-group icon-2x"></i>Data Anak</a>       </li>
				<li class="active"><a href="kpsp.php"><i class="icon-list-alt icon-2x"></i>KPSP</a>         </li>
				<li><a href="riwayatpemeriksaan.php"><i class="icon-list icon-2x"></i>Riwayat Pemeriksaan </a>         </li>
				<li><a href="sdidtk.php"><i class="icon-book icon-2x"></i>Pengetahuan SDIDTK</a>         </li>
			</ul>             
        </div><!--/.well -->
    </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-list-alt"></i> KPSP
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li><a href="kpsp.php">KPSP</a></li> /
			<li class="active">Hasil</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a href="kpsp.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali </button></a>

<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT hasil_periksa.*, kategori_kpsp.nama_kategori, data_anak.* FROM hasil_periksa JOIN kategori_kpsp ON hasil_periksa.id_kategori = kategori_kpsp.id_kategori JOIN data_anak ON hasil_periksa.id_anak = data_anak.id_anak WHERE id_periksa= :id_periksa");
	$result->bindParam(':id_periksa', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<center><h4><i class="icon-edit icon-large"></i> Hasil Pemeriksaan </h4></center> 
<span style="float:right;"> Tanggal Periksa : <?php echo formatTanggal($row['tgl_periksa']) ?> </span>
<hr>

<center>
<span style="font-weight:bold;
<?php 
    if($row['status_perkembangan'] == "Penyimpangan"){
?>      color: red;
<?php
    }else if($row['status_perkembangan'] == "Meragukan"){
?>      color: orange;
<?php
    }else if($row['status_perkembangan'] == "Sesuai"){
?>      color: green;
<?php 
    }
?>
">
    <?php 
        echo "Status Perkembangan : " . $row['status_perkembangan'];
    ?>
</span>

<table style="margin-top:20px; border: solid 2px black; width: 30%">
<tr style="text-align:center">
<td> Nama Anak :  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				color: #000000;"> <?php echo $row['nama_anak']; ?> </td>
</tr>

<tr style="text-align:center">
<!-- <td> Usia : </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #000000;"> -->
				<?php 
					if($row['prematur'] == 'Ya'){
						$tgllahir = new DateTime($row['tanggal_lahir']);
						$sekarang = new DateTime($row['tgl_periksa']);
						 
						$bulan = "0";
						$hari = "0";
						$usiakoreksihari = "0";
						
						//Hitung Usia Bulan
						$bulan = ($sekarang->diff($tgllahir)->y * 12) + $sekarang->diff($tgllahir)->m;
						$minggu = ($sekarang->diff($tgllahir)->y * 12 + $sekarang->diff($tgllahir)->m) * 4.34524;
						$usiakoreksiminggu = $minggu - (40 - $row['usia_prematur']);
						$usiakoreksibulan = $usiakoreksiminggu / 4.34524;

						//Hitung Usia Hari
						$tgl_lahir = $row['tanggal_lahir'];
						$minggukurangusia = 40 - $row['usia_prematur'];
						$tglkurangusia = date('Y-m-d', strtotime('-$minggukurangusia week', strtotime($tgl_lahir)));
						$tglkurang = new DateTime("$tglkurangusia");
						$usiakoreksihari = $sekarang->diff($tglkurang)->d;						
					
						if($bulan > 23){
							$hari = $sekarang->diff($tgllahir)->d;
				?>
							<td> Usia : </td>
							<td style="padding: 10px;
										border-top: 1px solid #fafafa;
										background-color: #f4f4f4;
										text-align: center;
										color: #000000;">
					<?php
							echo $bulan." bulan ".$hari." hari";
						}else{
					?>
							<td> Usia Koreksi : </td>
							<td style="padding: 10px;
										border-top: 1px solid #fafafa;
										background-color: #f4f4f4;
										color: #000000;">
					<?php
							echo floor($usiakoreksibulan). " bulan ";
							echo $usiakoreksihari. " hari";
						}
						
					}else{
						$tgllahir = new DateTime($row['tanggal_lahir']);
						$sekarang = new DateTime($row['tgl_periksa']);
						 
						$bulan = "0";
						$hari = "0";
						
						$bulan = ($sekarang->diff($tgllahir)->y * 12) + $sekarang->diff($tgllahir)->m;
						$hari = $sekarang->diff($tgllahir)->d;
					?>
							<td> Usia : </td>
							<td style="padding: 10px;
										border-top: 1px solid #fafafa;
										background-color: #f4f4f4;
										color: #000000;">
					<?php
						echo $bulan." bulan ".$hari." hari";
					}
					?>
				</td>
</tr>
<tr style="text-align:center">
<td> Kategori :  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				color: #000000;"> <?php echo $row['nama_kategori']; ?> </td>
</tr>

<tr style="text-align:center">
<td> Jumlah Ya :  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				color: #000000;"> <?php echo $row['jumlah_ya']; ?> </td>
</tr>
</table>

<hr>
<?php 
if($row['id_kategori'] == 'k42' || $row['id_kategori'] == 'k48' || $row['id_kategori'] == 'k54'){
	if($row['jumlah_ya'] != 9){
?>
		<span style="font-weight: bold">Solusi : </span><br><br>
<?php
	}
}else{
	if($row['jumlah_ya'] != 10){
?>
		<span style="font-weight: bold">Solusi : </span><br><br>
<?php
	}
}
?>
</center>

<?php 
include('../connect.php');
$id=$_GET['id'];
$hasil = $db->prepare("SELECT * FROM hasil_periksa2 
						JOIN kpsp ON hasil_periksa2.id_pertanyaan = kpsp.id_pertanyaan 
						JOIN solusi ON kpsp.id_solusi = solusi.id_solusi 
						WHERE hasil_periksa2.jawaban = 'Tidak' AND hasil_periksa2.id_periksa= :id_periksa");
$hasil->bindParam(':id_periksa', $id);
$hasil->execute();
for($j=0; $baris = $hasil->fetch(); $j++){
	if($baris['id_kategori'] == 'k3' || $baris['id_kategori'] == 'k6' || $baris['id_kategori'] == 'k9'){
		echo "<center><strong> Untuk pertanyaan no " . substr($baris['id_pertanyaan'],1,-1) . ".</strong><br>" ;
	}else{
		echo "<center><strong> Untuk pertanyaan no " . substr($baris['id_pertanyaan'],1,-2) . ".</strong><br>" ;
	}
	echo $baris['pertanyaan'] . "</center> <br>";
	echo "<strong> Aspek : </strong>". $baris['aspek'] . "<br><br>";
	echo "<strong> Perkembangan : </strong>". $baris['perkembangan'] . "<br><br>";
	echo "<strong> Stimulasi : </strong>" . "<br>";
	if($baris['stimulasi'] != null){
		echo $baris['stimulasi']. "<br>";
	}
	if($baris['cara_stimulasi'] != null){
		echo "<p> • ".$baris['cara_stimulasi']. "</p>";
	}

	if($baris['stimulasi2'] != null){
		echo $baris['stimulasi2']. "<br>";
	}
	if($baris['cara_stimulasi2'] != null){
		echo "<p> • ".$baris['cara_stimulasi2']. "</p>";
	}

	if($baris['stimulasi3'] != null){
		echo $baris['stimulasi3']. "<br>";
	}
	if($baris['cara_stimulasi3'] != null){
		echo "<p> • ".$baris['cara_stimulasi3']. "</p>";
	}

	if($baris['stimulasi4'] != null){
		echo $baris['stimulasi4']. "<br>";
	}
	if($baris['cara_stimulasi4'] != null){
		echo "<p> • ".$baris['cara_stimulasi4']. "</p>";
	}

	if($baris['stimulasi5'] != null){
		echo $baris['stimulasi5']. "<br>";
	}
	if($baris['cara_stimulasi5'] != null){
		echo "<p> • ".$baris['cara_stimulasi5']. "</p>";
	}

	if($baris['stimulasi6'] != null){
		echo $baris['stimulasi6']. "<br>";
	}
	if($baris['cara_stimulasi6'] != null){
		echo "<p> • ".$baris['cara_stimulasi6']. "</p>";
	}

	if($baris['stimulasi7'] != null){
		echo $baris['stimulasi7']. "<br>";
	}
	if($baris['cara_stimulasi7'] != null){
		echo "<p> • ".$baris['cara_stimulasi7']. "</p>";
	}

	if($baris['stimulasi8'] != null){
		echo $baris['stimulasi8']. "<br>";
	}
	if($baris['cara_stimulasi8'] != null){
		echo "<p> • ".$baris['cara_stimulasi8']. "</p>";
	}

	if($baris['stimulasi9'] != null){
		echo $baris['stimulasi9']. "<br>";
	}
	if($baris['cara_stimulasi9'] != null){
		echo "<p> • ".$baris['cara_stimulasi9']. "</p>";
	}

	if($baris['stimulasi10'] != null){
		echo $baris['stimulasi10']. "<br>";
	}
	if($baris['cara_stimulasi10'] != null){
		echo "<p> • ".$baris['cara_stimulasi10']. "</p>";
	}

	echo "<hr>";
}

?>

</div>
<?php
}
?>


</body>
<?php include('footer.php');?>

</html>