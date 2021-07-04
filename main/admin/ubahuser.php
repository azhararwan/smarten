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
			<li><a href="user.php">User</a></li> /
      <li class="active">Ubah Data User</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="user.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali </button></a>
<center><?php
	include('../../connect.php');
  $id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM users WHERE id_user = :id_user ");
  $result->bindParam(':id_user', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="simpanperubahanuser.php" method="post" enctype="multipart/form-data">
<center><h4><i class="icon-edit icon-large"></i> Ubah Data User </h4></center>
<hr>
<div id="ac">
<input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>" readonly />
<span>Nama : </span><input type="text" style="width:265px; height:30px;" name="nama" value="<?php echo $row['nama'] ?>" Required /><br>
  <span>Hak Akses : </span>
  <select name="hak_akses" style="width:265px; height:30px; margin-left:-5px;" required >
    <option> <?php echo $row['hak_akses'] ?> </option>
    <option>admin</option>
    <option>posyandu</option>
    <option>guest</option>
  </select><br>
  <span>Username : </span><input type="text" style="width:265px; height:30px;" name="username" value="<?php echo $row['username'] ?>" required /><br>
  <span>Password : </span><input type	="password" style="width:265px; height:30px;" name="password" value="<?php echo $row['password'] ?>" required />
<div >

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Simpan Perubahan </button>
</div>
</div>
</form>
<?php
}
?>
</center>

<script src="../js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

			//Save the link in a variable called element
			var element = $(this);

			//Find the id of the link that was clicked
			var del_id = element.attr("id");

			//Built a url to send
			var info = 'id_user=' + del_id;
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