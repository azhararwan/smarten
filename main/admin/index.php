<!DOCTYPE html>
<html>
<head>
<title>
SMARTEN - Sistem Pakar Deteksi Perkembangan Anak
</title>
 <link href="../css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="../css/font-awesome.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../../style.css" media="screen" rel="stylesheet" type="text/css" />
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
	require_once('../auth.php');
?>
</head>
<body>
<?php 
	include('navfixed.php');?>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span2">
					<div class="well sidebar-nav">
						<ul class="nav nav-list">
							<li class="active"><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
							<li><a href="user.php"><i class="icon-group icon-2x"></i>User</a>       </li>
							<li><a href="kpsp.php"><i class="icon-list-alt icon-2x"></i>KPSP</a>         </li>
							<li><a href="riwayatpemeriksaan.php"><i class="icon-list icon-2x"></i>Riwayat Pemeriksaan </a>         </li>
							<li><a href="sdidtk.php"><i class="icon-book icon-2x"></i>Pengetahuan SDIDTK</a>         </li>
						</ul>             
					</div><!--/.well -->
				</div><!--/span-->
				<div class="span10">
					<div class="contentheader">
						<i class="icon-dashboard"></i> Dashboard
						</div>
						<ul class="breadcrumb">
						<li class="active">Dashboard</li>
						</ul>
						<!--<font style=" font:bold 44px 'Aleo'; color:#722290;"><center>SMARTEN</center></font>-->
						<div id="mainmain">
							<a href="user.php"><i class="icon-group icon-2x"></i><br><br> User</a>     
							<a href="kpsp.php"><i class="icon-list-alt icon-2x"></i><br><br> KPSP </a>     
							<a href="sdidtk.php"><i class="icon-book icon-2x"></i><br><br> Pengetahuan SDIDTK </a> 
							<a href="riwayatpemeriksaan.php"><i class="icon-list icon-2x"></i><br><br> Riwayat Pemeriksaan </a> 
						</div>
					</div>
				</div>
			</div>
		</div>

