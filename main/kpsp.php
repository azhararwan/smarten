<html>
<head>
<title>
KPSP - SMARTEN
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

<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
      <div class="span2">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
				<li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
				<li><a href="dataanak.php"><i class="icon-group icon-2x"></i>Data Anak</a>       </li>
				<li class="active"> <a href="kpsp.php"><i class="icon-list-alt icon-2x"></i>KPSP</a>         </li>
        <li><a href="riwayatpemeriksaan.php"><i class="icon-list icon-2x"></i>Riwayat Pemeriksaan </a>         </li>
				<li><a href="sdidtk.php"><i class="icon-book icon-2x"></i>Pengetahuan SDIDTK</a>         </li>
			</ul>             
        </div><!--/.well -->
    </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-list-alt"></i> KPSP (Kuesioner Pra Skrining Perkembangan)
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active"> KPSP </li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali </button></a>
<br><br>
<center>
<div id="ac">

<hr>
</center>

<style>
		input:hover[type="submit"] 
		{
			color : white;
      background: green;
      border-style : dashed;
		}		
    input[type="text"] 
		{
			font-weight : bold;
      color : green;
      background: white;
      border-style : dashed;
		}		
</style>

<div id="card">
<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
    <tr>
      <th></th><th></th><th></th><th></th><th></th>
    </tr>
    <tr>
      <th colspan=5 style="background-color:green; text-align:center; font-size:20px;" > Pilih Kategori KPSP :</th>
    </tr>
    <tr>
      <th></th><th></th><th></th><th></th><th></th>
    </tr>
		<tr>
			<th style="text-align:center"><form action="k3.php">
          <input type="submit" value="KPSP 3 Bulan" title="Untuk anak usia 3 - 6 bulan"/> 
           </form> 
      </th>
      <th style="text-align:center"><form action="k6.php">
          <input type="submit" value="KPSP 6 Bulan" title="Untuk anak usia 6 - 9 bulan"/> 
          </form>
      </th>
      <th style="text-align:center"><form action="k9.php">
            <input type="submit" value="KPSP 9 Bulan" title="Untuk anak usia 9 - 12 bulan"/> 
            </form> 
      </th>
      <th style="text-align:center"><form action="k12.php">
            <input type="submit" value="KPSP 12 Bulan" title="Untuk anak usia 12 - 15 bulan"/> 
            </form> 
      </th>
      <th style="text-align:center"><form action="k15.php">
            <input type="submit" value="KPSP 15 Bulan" title="Untuk anak usia 15 - 18 bulan"/> 
            </form> 
      </th>
		</tr>
    <tr>
      <th style="text-align:center"><form action="k18.php">
            <input type="submit" value="KPSP 18 Bulan" title="Untuk anak usia 18 - 21 bulan"/> 
            </form> 
      </th>
			<th style="text-align:center"><form action="k21.php">
          <input type="submit" value="KPSP 21 Bulan" title="Untuk anak usia 21 - 24 bulan"/> 
           </form> 
      </th>
      <th style="text-align:center"><form action="k24.php">
          <input type="submit" value="KPSP 24 Bulan" title="Untuk anak usia 24 - 30 bulan"/> 
           </form> 
      </th>
      <th style="text-align:center"><form action="k30.php">
            <input type="submit" value="KPSP 30 Bulan" title="Untuk anak usia 30 - 36 bulan"/> 
            </form> 
      </th>
      <th style="text-align:center"><form action="k36.php">
            <input type="submit" value="KPSP 36 Bulan" title="Untuk anak usia 36 - 42 bulan"/> 
            </form> 
      </th>
		</tr>
    <tr>
      <th></th>
      <th style="text-align:center"><form action="k42.php">
            <input type="submit" value="KPSP 42 Bulan" title="Untuk anak usia 42 - 48 bulan"/> 
            </form> 
      </th>
      <th style="text-align:center"><form action="k48.php">
            <input type="submit" value="KPSP 48 Bulan" title="Untuk anak usia 48 - 54 bulan"/> 
            </form> 
      </th>
      <th style="text-align:center"><form action="k54.php">
            <input type="submit" value="KPSP 54 Bulan" title="Untuk anak usia 54 - 60 bulan"/> 
            </form> 
      </th>
      <th></th>
    </tr>
	</thead>
  </table>
</div>

</body>
<?php include('footer.php');?>

</html>
