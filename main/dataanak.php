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

<?php
	function formatTanggal($date){
		$datetime = DateTime::createFromFormat('Y-m-d', $date);
 		return $datetime->format('j M Y');
	}
?>
</head>

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
					<li class="active">Data Anak</li>
				</ul>

				<div style="margin-top: -19px; margin-bottom: 21px;">
				<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali</button></a>
							<?php 
							include('../connect.php');
								$result = $db->prepare("SELECT * FROM data_anak ORDER BY id_anak DESC");
								$result->execute();
								$rowcount = $result->rowcount();
							?>
							
						
								<div style="text-align:center;">
							Jumlah Data Anak :  <font color="green" style="font:bold 22px 'Aleo';"> <?php echo $rowcount;?> </font>
				</div>				
			</div>


			<input type="text" style="height:35px; color:#222;" name="filter" value="" id="filter" placeholder="Cari Anak..." autocomplete="off" />
			<a href="tambahdataanak.php"><Button type="submit" class="btn btn-success" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Tambah Data Anak </button></a><br><br>
			<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
				<thead>
					<tr>
						<th style="text-align:center" width="1%"> No</th>
						<th style="text-align:center" width="20%"> Nama Anak</th>
						<th style="text-align:center" width="10%"> Jenis Kelamin </th>
						<th style="text-align:center" width="10%"> Tanggal Lahir </th>
						<th style="text-align:center" width="10%"> Usia </th>
						<!-- <th style="text-align:center" width="15%"> Rekomendasi KPSP </th> -->
						<th style="text-align:center" width="15%"> Aksi </th>
					</tr>
				</thead>
				
				<tbody>	
					<?php			
						include('../connect.php');
						$result = $db->prepare("SELECT * FROM data_anak ORDER BY nama_anak ASC");
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){
					?>
					<tr>
						<td><?php echo $i+1 . ".";?>
						</td>
						<td><?php echo $row['nama_anak']; ?></td>
						<td><?php echo $row['jenis_kelamin']; ?></td>
						<td><?php echo formatTanggal($row['tanggal_lahir']); ?></td>
						<td>
							<?php 
								if($row['prematur'] == 'Ya'){

									$tgllahir = new DateTime($row['tanggal_lahir']);
									$sekarang = new DateTime("today");
									
									$bulan = "0";
									$hari = "0";

									$bulan = ($sekarang->diff($tgllahir)->y * 12) + $sekarang->diff($tgllahir)->m;
									$hari = $sekarang->diff($tgllahir)->d;
									
									if($bulan > 23){
										//usia normal
										if($hari > 15){
											$hari = 0;
											$bulan++;
										}
										echo $bulan." bulan "; //.$hari." hari";
									}else{
										//usia koreksi
										$tgl_lahir = $row['tanggal_lahir'];
										$minggukurangusia = 40 - $row['usia_prematur'];
										$tglkurangusia = date('Y-m-d', strtotime('-$minggukurangusia week', strtotime($tgl_lahir)));
										$tglkurang = new DateTime("$tglkurangusia");

										$minggu = ($sekarang->diff($tgllahir)->y * 12 + $sekarang->diff($tgllahir)->m) * 4.34524;
										$usiakoreksiminggu = $minggu - (40 - $row['usia_prematur']);
										$usiakoreksibulan = $usiakoreksiminggu / 4.34524;
										$usiakoreksihari = 0;
										$usiakoreksihari = $sekarang->diff($tglkurang)->d;
										if($usiakoreksihari > 15){
											$usiakoreksihari = 0;
											$usiakoreksibulan++;
										}
										$bulan = $usiakoreksibulan;
										$hari = $usiakoreksihari;
										echo "Usia koreksi : <br> " . floor($bulan). " bulan ";
										//echo $hari. " hari";
									}
									
								}else{
									//usia normal
									$tgllahir = new DateTime($row['tanggal_lahir']);
									$sekarang = new DateTime("today");
									 
									$bulan = "0";
									$hari = "0";
									
									$bulan = ($sekarang->diff($tgllahir)->y * 12) + $sekarang->diff($tgllahir)->m;
									$hari = $sekarang->diff($tgllahir)->d;

									if($hari > 15){
										$hari = 0;
										$bulan++;
									}
									echo $bulan." bulan ";//.$hari." hari";

								}
							?>
						</td>
						<!-- <td>
							<?php 
								/*
								if($bulan >= 3 && $bulan < 6 ){
									echo "KPSP 3 Bulan";
								}else if($bulan >= 6 && $bulan < 9 ){
									echo "KPSP 6 Bulan";
								}else if($bulan >= 9 && $bulan < 12 ){
									echo "KPSP 9 Bulan";
								}else if($bulan >= 12 && $bulan < 15 ){
									echo "KPSP 12 Bulan";
								}else if($bulan >= 15 && $bulan < 18 ){
									echo "KPSP 15 Bulan";
								}else if($bulan >= 18 && $bulan < 21 ){
									echo "KPSP 18 Bulan";
								}else if($bulan >= 21 && $bulan < 24 ){
									echo "KPSP 21 Bulan";
								}else if($bulan >= 24 && $bulan < 30 ){
									echo "KPSP 24 Bulan";
								}else if($bulan >= 30 && $bulan < 36 ){
									echo "KPSP 30 Bulan";
								}else if($bulan >= 36 && $bulan < 42 ){
									echo "KPSP 36 Bulan";
								}else if($bulan >= 42 && $bulan < 48 ){
									echo "KPSP 42 Bulan";
								}else if($bulan >= 48 && $bulan < 54 ){
									echo "KPSP 48 Bulan";
								}else if($bulan >= 54 && $bulan < 60 ){
									echo "KPSP 54 Bulan";
								} */
							?>
						</td> -->
						<td style="text-align:center"><a title="Klik untuk melihat data detail anak" href="lihatdataanak.php?id=<?php echo $row['id_anak']; ?>"><button class="btn btn-success btn-mini"><i class="icon-search"></i> Lihat</button> </a>
						<a  title="Klik untuk mengubah data anak" href="ubahdataanak.php?id=<?php echo $row['id_anak']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Ubah </button> </a>
						<a  href="#" id="<?php echo $row['id_anak']; ?>" class="delbutton" title="Klik untuk menghapus data anak"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Hapus </button></a></td>
					</tr>
					<?php
						}
					?>				
				</tbody>
			</table>
			<div class="clearfix"></div>
		</div>
	</div>

	<script src="js/jquery.js"></script>
	<script type="text/javascript">
	$(function() {
		$(".delbutton").click(function(){

			//Save the link in a variable called element
			var element = $(this);

			//Find the id of the link that was clicked
			var del_id = element.attr("id");

			//Built a url to send
			var info = 'id=' + del_id;
			if(confirm("Apakah anda yakin ingin menghapus data ?")){
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