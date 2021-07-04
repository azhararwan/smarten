<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM hasil_periksa2 WHERE id_periksa= :id_periksa");
	$result->bindParam(':id_periksa', $id);
	$result->execute();

	$result = $db->prepare("DELETE FROM hasil_periksa WHERE id_periksa= :id_periksa");
	$result->bindParam(':id_periksa', $id);
	$result->execute();
	
	header ("location: riwayatpemeriksaan.php");
?>