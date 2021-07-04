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
				<li><a href="dataanak.php"><i class="icon-group icon-2x"></i>Data Anak</a>       </li>
				<li><a href="kpsp.php"><i class="icon-list-alt icon-2x"></i>KPSP</a>         </li>
				<li class="active"><a href="riwayatpemeriksaan.php"><i class="icon-list icon-2x"></i>Riwayat Pemeriksaan </a>         </li>
				<li><a href="sdidtk.php"><i class="icon-book icon-2x"></i>Pengetahuan SDIDTK</a>         </li>
			</ul>             
        </div><!--/.well -->
    </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-list"></i> Riwayat Pemeriksaan
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active"> Riwayat Pemeriksaan</li>
			</ul>

			<div style="margin-top: -19px; margin-bottom: 21px;">
				<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali</button></a>
							<?php 
							include('../connect.php');
								$result = $db->prepare("SELECT * FROM hasil_periksa");
								$result->execute();
								$rowcount = $result->rowcount();
							?>
							
						
								<div style="text-align:center;">
							Jumlah Pemeriksaan :  <font color="green" style="font:bold 22px 'Aleo';"> <?php echo $rowcount;?> </font>
				</div>				
			</div>


			<input type="text" style="height:35px; color:#222;" name="filter" value="" id="filter" placeholder="Cari Anak..." autocomplete="off" />
			<a href="kpsp.php"><Button type="submit" class="btn btn-success" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Tambah Pemeriksaan </button></a><br><br>
			<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
				<thead>
					<tr>
						<th style="text-align:center" width="1%"> No</th>
						<th style="text-align:center" width="25%"> Nama Anak</th>
						<th style="text-align:center" width="12%"> Tanggal Lahir </th>
						<th style="text-align:center" width="15%"> KPSP </th>
						<th style="text-align:center" width="15%"> Status Perkembangan </th>
						<th style="text-align:center" width="12%"> Tanggal Periksa </th>
						<th style="text-align:center" width="20%"> Aksi </th>
					</tr>
				</thead>
				
				<tbody>	
					<?php			
						include('../connect.php');
						$result = $db->prepare("SELECT hasil_periksa.*, data_anak.*, kategori_kpsp.nama_kategori
												FROM hasil_periksa
												LEFT JOIN data_anak ON hasil_periksa.id_anak = data_anak.id_anak
												LEFT JOIN kategori_kpsp ON hasil_periksa.id_kategori = kategori_kpsp.id_kategori
												ORDER BY hasil_periksa.tgl_periksa DESC");
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){
					?>
					<tr>
						<td><?php echo $i+1 . ".";?>
						</td>
						<td><?php echo $row['nama_anak']; ?></td>
						<td><?php echo formatTanggal($row['tanggal_lahir']); ?></td>
						<td><?php echo $row['nama_kategori']; ?></td>
						<td><?php echo $row['status_perkembangan']; ?></td>
						<td><?php echo formatTanggal($row['tgl_periksa']); ?></td>
						<td style="text-align:center"><a title="Klik untuk melihat detail pemeriksaan" href="lihatriwayatpemeriksaan.php?id=<?php echo $row['id_periksa']; ?>"><button class="btn btn-success btn-mini"><i class="icon-search"></i> Lihat </button> </a>
						<a  title="Klik untuk mengubah hasil pemeriksaan" href="ubahriwayatpemeriksaan.php?id=<?php echo $row['id_periksa']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Ubah </button> </a>
						<a  href="#" id="<?php echo $row['id_periksa']; ?>" class="delbutton" title="Klik untuk menghapus riwayat pemeriksaan"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Hapus </button></a></td>
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
			if(confirm("Apakah anda yakin ingin menghapus riwayat pemeriksaan ini ?")){
				$.ajax({
					type: "GET",
					url: "hapusriwayatpemeriksaan.php",
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