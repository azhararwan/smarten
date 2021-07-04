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

                <a  href="dataanak.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Kembali </button></a>
            </div>
            <div class="row">
          <div class="col-lg-12">
            <form class="form-horizontal" method="POST" action="">
              <form class="form-horizontal">
                <fieldset>       
                  <div class="form-group">
                    <div class="col-lg-10">
                      <p>Untuk no. 1 dan 2, anak dipangku ibunya/pengasuh di tepi meja periksa</p>
                      <h4>1) Apakah anak dapat meletakkan satu kubus di atas kubus yang lain
                      tanpa menjatuhkan kubus itu? </h4>
                      <p>[MOTORIK HALUS]</p>
                      <div class="radio">
                        <label>
                          <input type="radio" name="1" id="p124ya" value="1">
                          Ya
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="1" id="p124tidak" value="0">
                          Tidak
                        </label>
                     </div>                      
                    </div>

                    <div class="col-lg-10">
                      <h4>2)	Tanpa bimbingan, petunjuk, atau bantuan anda, dapatkah anak menunjuk dengan benar paling sedikit satu bagian badannya (rambut, mata, hidung, mulut, atau bagian badan yang lain)?</h4>
                      <p>[BICARA DAN BAHASA]</p>
                      <div class="radio">
                        <label>
                          <input type="radio" name="2" id="p224ya" value="1">
                          Ya
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="2" id="p224tidak" value="0">
                          Tidak
                        </label>
                     </div>                      
                    </div>
                  </div>
                </fieldset>
              </form>
              <form class="form-horizontal" method="POST" action="">
                <form class="form-horizontal">
                  <fieldset>       
                    <div class="form-group">
                      <div class="col-lg-10">
                        <p>Untuk no. 3-9, tanya ibu</p>
                        <h4>3)	Apakah anak suka meniru bila ibu sedang melakukan pekerjaan rumah tangga (menyapu, mencuci, dll)? </h4>
                        <p>[SOSIALISASI DAN KEMANDIRIAN]</p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="3" id="p324ya" value="1">
                            Ya
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="3" id="p324tidak" value="0">
                            Tidak
                          </label>
                       </div>                      
                      </div>
  
                      <div class="col-lg-10">
                        <h4>4) Apakah anak dapat mengucapkan paling sedikit 3 kata yang mempunyai arti selain "papa" dan "mama"?</h4>
                        <p>[BICARA DAN BAHASA]</p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="4" id="p424ya" value="1">
                            Ya
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="4" id="p424tidak" value="0">
                            Tidak
                          </label>
                       </div>                      
                      </div>

                      <div class="col-lg-10">
                        <h4>5) Apakah anak berjalan mundur 5 langkah atau lebih tanpa kehilangan keseimbangan? (Anda mungkin dapat melihatnya ketika anak menarik mainannya) ?</h4>
                        <p>[MOTORIK KASAR]</p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="5" id="p524ya" value="1">
                            Ya
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="5" id="p524tidak" value="0">
                            Tidak
                          </label>
                       </div>                      
                      </div>

                      <div class="col-lg-10">
                        <h4>6) Dapatkah anak melepas pakaiannya seperti : Baju, Rok, atau celananya ?</h4>
                        <p>[MOTORIK HALUS]</p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="6" id="p624ya" value="1">
                            Ya
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="6" id="p624tidak" value="0">
                            Tidak
                          </label>
                       </div>                      
                      </div>

                      <div class="col-lg-10">
                        <h4>7) Dapatkah anak berjalan naik tangga sendiri? Jawab YA jika ia naik tangga dengan posisi tegak atau berpegangan pada dinding atau pegangan tangga. Jawab TIDAK jika ia naik tangga dengan merangkak atau anda tidak mebolehkan anak naik tangga atau anak harus berpegangan pada seseorang.</h4>
                        <p>[MOTORIK KASAR]</p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="7" id="p724ya" value="1">
                            Ya
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="7" id="p724tidak" value="0">
                            Tidak
                          </label>
                       </div>                      
                      </div>

                      <div class="col-lg-10">
                        <h4>8) Dapatkah anak makan nasi sendiri tanpa banyak tumpah?</h4>
                        <p>[SOSIALISASI DAN KEMANDIRIAN]</p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="8" id="p824ya" value="1">
                            Ya
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="8" id="p824tidak" value="0">
                            Tidak
                          </label>
                       </div>                      
                      </div>

                      <div class="col-lg-10">
                        <h4>9) Dapatkah anak membantu memungt mainannya sendiri atau membantu mengangkat piring jika diminta?</h4>
                        <p>[BICARA DAN BAHASA]</p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="9" id="p924ya" value="1">
                            Ya
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="9" id="p924tidak" value="0">
                            Tidak
                          </label>
                       </div>                      
                      </div>
                    </div>
                  </fieldset>
                </form>
              <form class="form-horizontal" method="POST" action="">
                <form class="form-horizontal">
                  <fieldset>       
                    <div class="form-group">
                      <div class="col-lg-10">
                        <p>Untuk no. 10, berdirikan anak</p>
                        <h4>10) Letakkan bola tenis di depan kakinya. Apakah dia dapat menendangnya, tanpa berpegangan pada apapun?</h4>
                        <p>[MOTORIK KASAR]</p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="10" id="p1024ya" value="1">
                            Ya
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="10" id="p1024tidak" value="0">
                            Tidak
                          </label>
                       </div>                      
                      </div>
                    </div>
                  </fieldset>
                </form>
              <div class="form-group">
                  <div class="col-lg-12">
                    <button class="btn btn-default">Batalkan</button>
                    <button type="submit" name="total" class="btn btn-primary">Selesai</button>
                  </div>
                </div>
           </form>   
            </div>
          </div>
      </div>
            
                            <td>
                                <?php 
                                    require '../connect.php';
                                    if (isset($_POST['total'])) {
                                        $total = $_POST['1'] + $_POST['2'] + $_POST['3'] +  $_POST['4'] +  $_POST['5'] +  $_POST['6'] +  $_POST['7'] +  $_POST['8'] +  $_POST['9'] +  $_POST['10'];
            
                                        if ($total >= 9) {
                                              $hasil = "Sesuai";
                                      } elseif ($total > 6 && $total < 9) {
                                              $hasil = "Meragukan";
                                      } elseif ($total <= 6) {
                                              $hasil = "Penyimpangan";
                                      } else {
                                              echo "Tidak Valid";
                                      }

                                      $tglperiksa = ':tglperiksa';
                                      $jumlah_ya = $total;
                                      $status_perkembangan = $hasil;
            
                                      $sql = mysqli_query($db, "INSERT INTO hasil_periksa (tanggal_periksa, jumlah_ya, status_perkembangan) VALUES(':tgl_periksa', '$total','$status_perkembangan')");
                                      $q = $db->prepare($sql);
                                      $q->execute(array(':tgl_periksa' => $tglperiksa, $total => $jumlah_ya, $hasil => $status_perkembangan));
                                    }	

                                ?>
                            </td>
                        
        </div>
    </div>

</body>

<?php include('footer.php');?>

</html>