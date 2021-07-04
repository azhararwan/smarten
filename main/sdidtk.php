<html>
<head>
<title>
SDIDTK - SMARTEN
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

      .artikel {
        color : black;
      }

      .list-group-item {
          color: green;
          position: relative;
          display: block;
          padding: 10px 15px;
          margin-bottom: -1px;
          background-color: #fff;
          border: 1px solid #ddd;
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
        <li><a href="riwayatpemeriksaan.php"><i class="icon-list icon-2x"></i>Riwayat Pemeriksaan </a>         </li>
				<li class="active"><a href="sdidtk.php"><i class="icon-book icon-2x"></i>Pengetahuan SDIDTK</a>         </li>
			</ul>             
        </div><!--/.well -->
    </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-book"></i> Pengetahuan SDIDTK
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active"> Pengetahuan SDIDTK </li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali </button></a>

<center><h4><i class="icon-book icon-large"></i> Tahapan Perkembangan </h4></center>
<hr>
<!-- ARTIKEL ------------------->
<?php
    include('../connect.php');
    $result = $db->prepare("SELECT * FROM solusi ORDER BY usia_dari ASC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){

      echo "<div class='artikel'>";
      echo "<a class='list-group-item' href='stimulasi.php?id=".$row['id']."'> <b>".$row['perkembangan']."</b>
            &nbsp <span class='badge'>".$row['usia_dari']. " - " . $row['usia_hingga'] ." bulan </span> 
            &nbsp <span class='badge'>".$row['aspek']. " </span></a>";
      echo "</div>";
    }
    

?>
<!-- END ARTIKEL --------------->
    

</body>
<?php include('footer.php');?>

</html>
