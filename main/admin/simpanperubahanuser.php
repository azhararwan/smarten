<?php
// configuration
include('../../connect.php');

// new data
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$hak_akses = $_POST['hak_akses'];
$username = $_POST['username'];
$password = $_POST['password'];
// query

$sql = "UPDATE users 
        SET nama=?,hak_akses=?, username=?, password=?
		WHERE id_user=?";
$q = $db->prepare($sql);
$q->execute(array($nama,$hak_akses,$username,$password,$id_user));
header("location: user.php");

?>