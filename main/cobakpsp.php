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
  
<form id="formnama" name="formnama" onsubmit="return false" method="post" enctype="multipart/form-data">
  <?php 
		include('../connect.php');
    $result = $db->prepare("SELECT * FROM data_anak ORDER BY nama_anak");
		$result->execute();
  ?>
  <span>Pilih Anak :</span>
    <select id="nama_anak" name="nama_anak" style="width:265px; height:30px; margin-left:-5px;"  required >
      <option> </option>
      <?php for($i=0; $row = $result->fetch(); $i++){ ?>
            <option> <?php echo $row['nama_anak']; } ?> </option>
    </select>

    <input type="text" id="rekomendasi" style="width:220px; height:30px;" readonly>
<div >

  <button class="btn btn-success btn-block btn-large" onClick="opsi(this)" style="width:250px;"> Cek Rekomendasi KPSP </button>

</div>
</div>
</form>
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
          <input type="submit" value="KPSP 3 Bulan" /> 
           </form> 
      </th>
      <th style="text-align:center"><form action="k6.php">
          <input type="submit" value="KPSP 6 Bulan" /> 
          </form>
      </th>
      <th style="text-align:center"><form action="k9.php">
            <input type="submit" value="KPSP 9 Bulan" /> 
            </form> 
      </th>
      <th style="text-align:center"><form action="k12.php">
            <input type="submit" value="KPSP 12 Bulan" /> 
            </form> 
      </th>
      <th style="text-align:center"><form action="k15.php">
            <input type="submit" value="KPSP 15 Bulan" /> 
            </form> 
      </th>
		</tr>
    <tr>
      <th style="text-align:center"><form action="k18.php">
            <input type="submit" value="KPSP 18 Bulan" /> 
            </form> 
      </th>
			<th style="text-align:center"><form action="k21.php">
          <input type="submit" value="KPSP 21 Bulan" /> 
           </form> 
      </th>
      <th style="text-align:center"><form action="k24.php">
          <input type="submit" value="KPSP 24 Bulan" /> 
           </form> 
      </th>
      <th style="text-align:center"><form action="k30.php">
            <input type="submit" value="KPSP 30 Bulan" /> 
            </form> 
      </th>
      <th style="text-align:center"><form action="k36.php">
            <input type="submit" value="KPSP 36 Bulan" /> 
            </form> 
      </th>
		</tr>
    <tr>
      <th></th>
      <th style="text-align:center"><form action="k42.php">
            <input type="submit" value="KPSP 42 Bulan" /> 
            </form> 
      </th>
      <th style="text-align:center"><form action="k48.php">
            <input type="submit" value="KPSP 48 Bulan" /> 
            </form> 
      </th>
      <th style="text-align:center"><form action="k54.php">
            <input type="submit" value="KPSP 54 Bulan" /> 
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

<script>
  function opsi(value){
    var a = $("#nama_anak").val();
    if(a == $("#nama_anak").val()){
      document.getElementById("rekomendasi").value = "<?php echo "Rekomendasi : KPSP 3 Bulan"; ?>";
    } else {
      document.getElementById("rekomendasi").value = "<?php echo "R Bulan"; ?>";
    }
  }
</script>