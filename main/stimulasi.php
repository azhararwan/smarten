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

      p {
        font-weight: normal;
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
<a  href="sdidtk.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali </button></a>
<hr>

<!-- ARTIKEL ------------------->
<?php
        include('../connect.php');
        $result = $db->prepare("SELECT * FROM solusi");
        $result->execute();
        
        for($i=0; $row = $result->fetch(); $i++){
                echo "<center><h4><b>".$row['perkembangan']."</b></h2></center>";
                echo "<div class='artikel-kop'>";
                echo "<p class='artikel-kategori'>" .$row['aspek']. "</p>";
                echo "<p class='artikel-kategori'> Untuk anak usia <b>" .$row['usia_dari']. " - " . $row['usia_hingga'] ." bulan </p>";
                echo "</div>";

                echo "<div class='artikel-isi'>";
                echo "Stimulasi :" . "<br>";
                echo $row['stimulasi']. "<br>";
                echo "<p>".$row['cara_stimulasi']. "</p>";
                echo $row['stimulasi2']. "<br>";
                echo "<p>".$row['cara_stimulasi2']. "</p>";
                echo $row['stimulasi3']. "<br>";
                echo "<p>".$row['cara_stimulasi3']. "</p>";
                echo $row['stimulasi4']. "<br>";
                echo "<p>".$row['cara_stimulasi4']. "</p>";
                echo $row['stimulasi5']. "<br>";
                echo "<p>".$row['cara_stimulasi5']. "</p>";
                echo $row['stimulasi6']. "<br>";
                echo "<p>".$row['cara_stimulasi6']. "</p>";
                echo $row['stimulasi7']. "<br>";
                echo "<p>".$row['cara_stimulasi7']. "</p>";
                echo $row['stimulasi8']. "<br>";
                echo "<p>".$row['cara_stimulasi8']. "</p>";
                echo $row['stimulasi9']. "<br>";
                echo "<p>".$row['cara_stimulasi9']. "</p>";
                echo $row['stimulasi10']. "<br>";
                echo "<p>".$row['cara_stimulasi10']. "</p>";
                echo "</div>";

        }
      

?>
<!-- END ARTIKEL --------------->

<script src="js/jquery.js"></script>
<script type="text/javascript">
</body>
<?php include('footer.php');?>

</html>
