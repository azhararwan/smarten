<?php
session_start();
include('../../connect.php');
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$hak_akses = $_POST['hak_akses'];
$username = $_POST['username'];
$password = $_POST['password'];
// query

  //do your write to the database filename and other details   
$sql = "INSERT INTO users (id_user,nama,hak_akses,username,password) VALUES (:id_user,:nama,:hak_akses,:username,:password)";
$q = $db->prepare($sql);
$q->execute(array(':id_user'=>$id_user,':nama'=>$nama,':hak_akses'=>$hak_akses,':username'=>$username,':password'=>$password));
header("location: user.php");
?>