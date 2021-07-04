<html>
<head>
	<title>
	User - SMARTEN
	</title>

	<?php 
	require_once('../auth.php');
	?>
	
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/DT_bootstrap.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
		<style type="text/css">
		body {
			padding-top: 60px;
			padding-bottom: 40px;
		}
		.sidebar-nav {
			padding: 9px 0;
		}
		</style>
	<link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../../style.css" media="screen" rel="stylesheet" type="text/css" />
	<!--sa poip up-->
	<script src="../jeffartagame.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/application.js" type="text/javascript" charset="utf-8"></script>
	<link href="../src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="../lib/jquery.js" type="text/javascript"></script>
	<script src="../src/facebox.js" type="text/javascript"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('a[rel*=facebox]').facebox({
		loadingImage : '../src/loading.gif',
		closeImage   : '../src/closelabel.png'
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
						<li class="active"><a href="user.php"><i class="icon-group icon-2x"></i>User</a>       </li>
						<li><a href="kpsp.php"><i class="icon-list-alt icon-2x"></i>KPSP</a>         </li>
						<li><a href="riwayatpemeriksaan.php"><i class="icon-list icon-2x"></i>Riwayat Pemeriksaan </a>         </li>
						<li><a href="sdidtk.php"><i class="icon-book icon-2x"></i>Pengetahuan SDIDTK</a>         </li>
					</ul>             
				</div><!--/.well -->
			</div><!--/span-->
			<div class="span10">
				<div class="contentheader">
					<i class="icon-group"></i> User
				</div>
				<ul class="breadcrumb">
					<li><a href="index.php">Dashboard</a></li> /
					<li class="active">User</li>
				</ul>

				<div style="margin-top: -19px; margin-bottom: 21px;">
				<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali</button></a>
							<?php 
							include('../../connect.php');
								$result = $db->prepare("SELECT * FROM users");
								$result->execute();
								$rowcount = $result->rowcount();
							?>
							
						
								<div style="text-align:center;">
							Jumlah User :  <font color="green" style="font:bold 22px 'Aleo';"> <?php echo $rowcount;?> </font>
				</div>				
			</div>


			<input type="text" style="height:35px; color:#222;" name="filter" value="" id="filter" placeholder="Cari User..." autocomplete="off" />
			<a href="tambahuser.php"><Button type="submit" class="btn btn-success" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Tambah User </button></a><br><br>
			<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
				<thead>
					<tr>
						<th style="text-align:center" width="1%"> No</th>
						<th style="text-align:center" width="15%"> Nama</th>
						<th style="text-align:center" width="10%"> Hak Akses </th>
						<th style="text-align:center" width="15%"> Username </th>
						<th style="text-align:center" width="15%"> Password </th>
						<th style="text-align:center" width="10%"> Aksi </th>
					</tr>
				</thead>
				
				<tbody>	
					<?php			
						include('../../connect.php');
						$result = $db->prepare("SELECT * FROM users ORDER BY hak_akses ASC");
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){
					?>
					<tr>
						<td><?php echo $i+1 . ".";?>
						</td>
						<td><?php echo $row['nama']; ?></td>
						<td><?php echo $row['hak_akses']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['password']; ?></td>

						<td style="text-align:center">
						<!-- <a title="Klik untuk melihat data detail user" href="lihatuser.php?id=<?php // echo $row['id_user']; ?>"><button class="btn btn-success btn-mini"><i class="icon-search"></i> Lihat</button> </a> -->
						<a  title="Klik untuk mengubah data user" href="ubahuser.php?id=<?php echo $row['id_user']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Ubah </button> </a>
						<a  href="#" id="<?php echo $row['id_user']; ?>" class="delbutton" title="Klik untuk menghapus user"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Hapus </button></a></td>
					</tr>
					<?php
						}
					?>				
				</tbody>
			</table>
			<div class="clearfix"></div>
		</div>
	</div>

	<script src="../js/jquery.js"></script>
	<script type="text/javascript">
	$(function() {
		$(".delbutton").click(function(){

			//Save the link in a variable called element
			var element = $(this);

			//Find the id of the link that was clicked
			var del_id = element.attr("id");

			//Built a url to send
			var info = 'id=' + del_id;
			if(confirm("Apakah anda yakin ingin menghapus user ?")){
				$.ajax({
					type: "GET",
					url: "hapususer.php",
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

<?php include('../footer.php');?>

</html>