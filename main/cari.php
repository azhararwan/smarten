<?php
   $db = new mysqli('localhost', 'root' ,'', 'cobasmarten');
	if(!$db) {

		echo 'Could not connect to the database.';
	} else {

		if(isset($_POST['dataanak'])) {
			$queryString = $db->real_escape_string($_POST['dataanak']);

			if(strlen($queryString) >0) {
				$sddsdsd='credit';
				$query = $db->query("SELECT *  FROM dataanak WHERE nama_anak LIKE '$queryString%' LIMIT 10");
				if($query) {
				echo '<ul>';
					while ($result = $query ->fetch_object()) {
                        $json['nama_anak'] =$result->nama_anak;

                    echo  '<li onClick="appendselect(\''.$result->nama_anak.'</li>';

                   }
				echo '</ul>';

				} else {
					echo 'OOPS we had a problem :(';
				}
			} else {
				// do nothing
			}
		}else {
			echo 'There should be no direct access to this script!';
		}
	}
?>