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

<script>
  function opsi(value){
  var p = $("#prematur").val();
  if(p == "Ya"){
    document.getElementById("usia_prematur").disabled = false;
  } else {
    document.getElementById("usia_prematur").disabled = true;
  }
}
</script>

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
			<li><a href="dataanak.php">Data Anak</a></li> /
     		<li class="active">Ubah Data Anak</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="dataanak.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali </button></a>
<center><?php
	include('../connect.php');
  $id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM data_anak WHERE id_anak = :id_anak ");
  $result->bindParam(':id_anak', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="simpanperubahandataanak.php" method="post" enctype="multipart/form-data">
<center><h4><i class="icon-edit icon-large"></i> Ubah Data Anak </h4></center>
<hr>
<div id="ac">
<input type="hidden" name="id_anak" value="<?php echo $row['id_anak']; ?>" readonly />
<span>Nama Anak : </span><input type="text" style="width:265px; height:30px;"  name="nama_anak" value="<?php echo $row['nama_anak']; ?>" /><br>
<span>Jenis Kelamin : </span>
<select name="jenis_kelamin" style="width:265px; height:30px; margin-left:-5px;" >
	<option><?php echo $row['jenis_kelamin']; ?></option>
		<option>Laki-laki</option>
		<option>Perempuan</option>
</select><br>
<span>Tanggal Lahir : </span><input type="date" style="width:265px; height:30px;" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" /><br>
<span>Prematur : </span>
  <select id="prematur" name="prematur" onChange="opsi(this)" style="width: 105px; height:30px; margin-left:-5px;">
    <option><?php echo $row['prematur']; ?></option>
    <option>Ya</option>
    <option>Tidak</option>
  </select>
  <span>Usia kelahiran dalam minggu (23 - 37) : </span><input type="number" min=0 max=37 style="width:50px; height:30px;" id="usia_prematur"  name="usia_prematur" value="<?php echo $row['usia_prematur']; ?>"> <br>
<span>Nama Orangtua : </span><input type="text" style="width:265px; height:30px;" value="<?php echo $row['nama_ortu']; ?>" name="nama_ortu" /><br>
<div >

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Simpan Perubahan </button>
</div>
</div>
</form>
<?php
}
?>
</center>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id_anak=' + del_id;
 if(confirm("Apakah anda yakin ingin menghapus data ?"))
		  {

 $.ajax({
   type: "GET",
   url: "hapusdatanak.php",
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