<html>
<head>
	<title>
	KPSP 24 Bulan - SMARTEN
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
						<li  class="active"> <a href="kpsp.php"><i class="icon-list-alt icon-2x"></i>KPSP</a>         </li>
						<li><a href="riwayatpemeriksaan.php"><i class="icon-list-alt icon-2x"></i>Riwayat Pemeriksaan </a>         </li>
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
					<li class="active">KPSP 24 Bulan</li>
				</ul>

				<div style="margin-top: -19px; margin-bottom: 21px;">
				<a  href="kpsp.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali</button></a>
					
				<center><h4><i class="icon-edit icon-large"></i> KPSP 24 Bulan </h4>
				<hr>

					<?php 
					$koneksi = mysqli_connect('localhost','root','','cobasmarten');
					$query = mysqli_query($koneksi, "SELECT max(id_periksa) as idTerakhir FROM hasil_periksa");
					$data = mysqli_fetch_array($query);
					$id_periksa = $data['idTerakhir'];

					$urutan = (int) substr($id_periksa, 3, 3);
					$urutan++;

					$huruf = "PR";
					$id_periksa = $huruf . sprintf("%04s", $urutan);

					
					include('../connect.php');
                    $result = $db->prepare("SELECT * FROM data_anak ORDER BY nama_anak");
					$result->execute();
                    ?>
					
                    <form method="post" action="jawabankpsp.php">
						<input type="hidden" style="width:265px; height:30px;"  name="id_periksa" value="<?php echo $id_periksa ?>" readonly /><br>
						<input type="hidden" style="width:200px; height:30px;" name="id_kategori" value="k24"/>
                        <span>Nama Anak :</span> &nbsp;
                        <select id="id_anak" name="id_anak" style="width:200px; height:30px; margin-left:-5px; font-size:18px;"  required >
							<option></option>
						    <?php for($i=0; $row = $result->fetch(); $i++){ ?>
                               <option value="<?php echo $row['id_anak']; ?>"> <?php echo $row['nama_anak']; } ?> </option>
                        </select> &nbsp; &nbsp;
						
						<span>Tanggal Pemeriksaan : </span><input type="date" style="width:200px; height:30px;" name="tgl_periksa" required /> &nbsp; 		
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
                                $result = $db->prepare("SELECT * FROM kpsp WHERE id_kategori='k24' ORDER BY id ASC ");
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr>
                                <td><?php echo $i+1 . ".";?> </td>
                                <td><?php echo $row['pertanyaan']; 
										  if($row['gambar'] != null ){
										  	echo '<center> <img width=200px; src="data:image/png;base64,'.base64_encode( $row['gambar'] ).'"/> </center>'; 
										  }
									?>
								</td>
                                <td><?php echo $row['aspek']; ?></td>
                                <td><font><input type="radio" name="p[<?php echo $i ?>]" value="Ya" required> Ya </input> </font> &nbsp; &nbsp;
									<font><input type="radio" name="p[<?php echo $i ?>]" value="Tidak" required> Tidak </input> </font>
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