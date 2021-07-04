<html>
<head>
	<title>
	Riwayat Pemeriksaan - SMARTEN
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
	<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
	<!-- <script src="js/application.js" type="text/javascript" charset="utf-8"></script> -->
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

<body>
	<?php include('navfixed.php');?>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span2">
				<div class="well sidebar-nav">
					<ul class="nav nav-list">
						<li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
						<li><a href="dataanak.php"><i class="icon-group icon-2x"></i>Data Anak</a>       </li>
						<li> <a href="kpsp.php"><i class="icon-list-alt icon-2x"></i>KPSP</a>         </li>
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
					<li><a href="riwayatpemeriksaan.php">Riwayat Pemeriksaan</a></li> /
					<li class="active">Ubah Hasil Pemeriksaan</li>
				</ul>

				<div style="margin-top: -19px; margin-bottom: 21px;">
				<a  href="riwayatpemeriksaan.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali</button></a>
					
				<center><h4><i class="icon-edit icon-large"></i> Hasil Pemeriksaan </h4>
				<hr>

					<?php 			
					include('../connect.php');
          			$id=$_GET['id'];
                    $result = $db->prepare("SELECT data_anak.nama_anak, hasil_periksa.* FROM hasil_periksa JOIN data_anak ON hasil_periksa.id_anak = data_anak.id_anak WHERE id_periksa = :id_periksa");
                    $result->bindParam(':id_periksa', $id);
					$result->execute();
          			$row = $result->fetch();
                    ?>
					
                    <form method="post" action="simpanperubahanriwayatpemeriksaan.php">
						<input type="hidden" style="width:265px; height:30px;"  name="id_periksa" value="<?php echo $id ?>" readonly /><br>
						<input type="hidden" style="width:200px; height:30px;" name="id_kategori" value="k3"/>
                        <span>Nama Anak :</span> &nbsp;
                        <select id="id_anak" name="id_anak" style="width:200px; height:30px; margin-left:-5px; font-size:18px;"  required >
						    <?php  ?>
                               <option value="<?php echo $row['id_anak']; ?>"> <?php echo $row['nama_anak']; ?> </option>
                        </select> &nbsp; &nbsp;
						
                        <span>Tanggal Pemeriksaan : </span><input type="date" style="width:200px; height:30px;" name="tgl_periksa" value="<?php echo $row['tgl_periksa']; ?>"  required /> &nbsp;	
				</center> 
					<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
                        <thead>
                            <tr>
                                <th style="text-align:center" width="1%"> No</th>
                                <th style="text-align:center" width="65%"> Pertanyaan</th>
                                <th style="text-align:center" width="10%"> Aspek </th>
                                <th style="text-align:center" width="12%"> Jawaban </th>
                            </tr>
                        </thead>
					
                        <tbody>
                            <?php			
                                include('../connect.php');
								$id=$_GET['id'];
                                $result = $db->prepare("SELECT * FROM kpsp JOIN hasil_periksa2 ON kpsp.id_kategori = hasil_periksa2.id_kategori AND kpsp.id_pertanyaan = hasil_periksa2.id_pertanyaan WHERE hasil_periksa2.id_periksa=:id_periksa ORDER BY id ASC ");
                                $result->bindParam(':id_periksa', $id);
								$result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr>
								<input type="hidden" name="id_kategori" value="<?php echo $row['id_kategori']; ?>" readonly />

                                <td><?php echo $i+1 . ".";?> </td>
                                <td><?php echo $row['pertanyaan']; ?></td>
                                <td><?php echo $row['aspek']; ?></td>
                                <td><font><input type="radio" name="p[<?php echo $i+1 ?>]" value="Ya"<?php if($row['jawaban']=='Ya'){echo "checked";}?>> Ya </input> </font> &nbsp; &nbsp;
									<font><input type="radio" name="p[<?php echo $i+1 ?>]" value="Tidak"<?php if($row['jawaban']=='Tidak'){echo "checked";}?>> Tidak </input> </font>
                                </td>
                            </tr>

                            <?php
                                }
                            ?>
                        </tbody>
                    </table><br><br>
                    
                    <button class="btn btn-info btn-block btn-large center" style="width: 200px; align:center"><i class="icon icon-check icon-large"></i> Selesai </button>

                    <?php
                    
                    ?>
                    </form>
					<?php
						
					?>
				</div>
            </div>
			<div class="clearfix"></div>
		</div>
	</div>

</body>

<?php include('footer.php');?>

</html>