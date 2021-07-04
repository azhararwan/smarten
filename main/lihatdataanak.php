<html>
<head>
<title>
Data Anak - SMARTEN
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
				<li class="active"><a href="dataanak.php"><i class="icon-group icon-2x"></i>Data Anak</a>       </li>
				<li><a href="kpsp.php"><i class="icon-list-alt icon-2x"></i>KPSP</a>         </li>
				<li><a href="riwayatpemeriksaan.php"><i class="icon-list icon-2x"></i>Riwayat Pemeriksaan </a>         </li>
				<li><a href="sdidtk.php"><i class="icon-book icon-2x"></i>Pengetahuan SDIDTK</a>         </li>
			</ul>             
        </div><!--/.well -->
    </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-group"></i> Data Anak
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li><a href="dataanak.php">Data Anak</a></li> /
			<li class="active">Lihat Data Anak</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a href="dataanak.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali </button></a>

<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM data_anak WHERE id_anak= :id_anak");
	$result->bindParam(':id_anak', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<center><h4><i class="icon-edit icon-large"></i> Data Detail Anak </h4></center>
<hr>
<center><img src="../profil/
<?php 
	if($row['jenis_kelamin'] == "Laki-laki"){
		echo 'laki-laki.png';
	}else{
	echo 'perempuan.png';
	}
?>" class="roundimage2"  alt=""/>
<br><br>

<table>
<tr>
<td> Nama Anak :  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #000000;"> <?php echo $row['nama_anak']; ?> </td>
</tr>
<tr>
<td> Jenis Kelamin :  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #000000;"> <?php echo $row['jenis_kelamin']; ?></td>
</tr>
<tr>
<td> Tanggal Lahir :  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #000000;"> <?php echo formatTanggal($row['tanggal_lahir']); ?></td>
</tr>
<tr>
<td> Prematur :  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #000000;"> <?php echo $row['prematur']; ?></td>
				<?php 
					if($row['prematur'] == 'Ya'){
				?>
					<tr>
					<td> Usia Kelahiran : </td>
					<td style="padding: 10px;
								border-top: 1px solid #fafafa;
								background-color: #f4f4f4;
								text-align: center;
								color: #000000;">
				<?php 
						echo $row['usia_prematur'] . " minggu";
				?>
				<?php 
						
				?>
					</td>
					</tr>
				<?php
					}
				?>
</tr>
<tr>
<!-- <td> Usia : </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #000000;"> -->
				<?php 
					if($row['prematur'] == 'Ya'){
						$tgllahir = new DateTime($row['tanggal_lahir']);
						$sekarang = new DateTime("today");
						 
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
										text-align: center;
										color: #000000;">
					<?php
							echo floor($usiakoreksibulan). " bulan ";
							echo $usiakoreksihari. " hari";
						}
						
					}else{
						$tgllahir = new DateTime($row['tanggal_lahir']);
						$sekarang = new DateTime("today");
						 
						$bulan = "0";
						$hari = "0";
						
						$bulan = ($sekarang->diff($tgllahir)->y * 12) + $sekarang->diff($tgllahir)->m;
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
					}
					?>
				</td>
</tr>
<tr>
<td> Nama Orangtua :  </td>
<td style="padding: 10px;
				border-top: 1px solid #fafafa;
				background-color: #f4f4f4;
				text-align: center;
				color: #000000;"> <?php echo $row['nama_ortu']; ?></td>
</tr>
<tr>


</table>
<br>
			
</center>

</div>
<?php
}
?>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id_anak=' + del_id;
 if(confirm("Apakah anda yakin ingin menghapus data ?"))
		  {

 $.ajax({
   type: "GET",
   url: "hapusdataanak.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
<?php include('footer.php');?>

</html>