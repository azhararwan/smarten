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
                        <li class="active"><a href="kpsp.php"><i class="icon-list-alt icon-2x"></i>KPSP</a>         </li>
                        <li><a href="sdidtk.php"><i class="icon-book icon-2x"></i>Pengetahuan SDIDTK</a>         </li>
                    </ul>             
                </div><!--/.well -->
            </div><!--/span-->
            <div class="span10">
                <div class="contentheader">
                    <i class="icon-table"></i> KPSP (Kuesioner Pra Skrining Perkembangan)
                </div>
                <ul class="breadcrumb">
                    <li><a href="index.php">Dashboard</a></li> /
                    <li class="active">KPSP</li>
                </ul>
            </div>
            <div style="margin-top: -19px; margin-bottom: 21px;">
                <a  href="dataanak.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali </button></a>
            </div>
            <table border="0">
                <tbody>
                    <?php
                        include('../connect.php');
                        $result = $db->prepare("SELECT * FROM kpsp ORDER BY no_pertanyaan ASC");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                    ?>
                    <form action="" method="POST">
                        <input type="text" name="p[]" value="<?php echo $row['no_pertanyaan']; ?>">
                        <tr>
                            <td><?php echo $row?>.</td>
                            <td><?php echo $row['pertanyaan'];?></td>
                        </tr>
                        <?php
                            if(!empty($row['gambar'])){
                                echo "<tr><td></td><td><img src='.../img/kpsp/$row[gambar]'></td></tr>";
                            }
                        ?>
                        <div class="radio">
                            <label>
                            <input type="radio" name="p[]" value="Ya">
                            Ya
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                            <input type="radio" name="p[]" value="Tidak">
                            Tidak
                             </label>
                        </div>  
                        <?php
                        }
                        ?>
                        <tr>
                            <td height="40"></td>
                            <td>
                                <input type="submit" name="total" value="Selesai">
                            </td>
                            <td>
                                <?php 
                                    require '../connect.php';
                                    if (isset($_POST['total'])) {
                                        $total = $_POST['p1'] + $_POST['2'] + $_POST['3'] +  $_POST['4'] +  $_POST['5'] +  $_POST['6'] +  $_POST['7'] +  $_POST['8'] +  $_POST['9'] +  $_POST['10'];
            
                                        if ($total >= 9) {
                                              $status_perkembangan = "Sesuai";
                                      } elseif ($total > 6 && $total < 9) {
                                              $status_perkembangan = "Meragukan";
                                      } elseif ($total <= 6) {
                                              $status_perkembangan = "Penyimpangan";
                                      } else {
                                              echo "Tidak Valid";
                                      }
            
                                      $sql = mysqli_query($db, "INSERT INTO hasil_periksa (jumlah_ya, status_perkembangan) VALUES('$jumlah_ya','$status_perkembangan')");
                                          if ($sql) {
                                            $row['status_perkembangan'] = $status_perkembangan;
                                            echo "<script>alert('Tunggu Sebentar');document.location.href='jawabankpsp.php';</script>";
                                          }else{
                                            echo $sql;
                                            echo mysqli_error($connect);
                                          } 
                                    }	

                                ?>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>

</body>

<?php include('footer.php');?>

</html>