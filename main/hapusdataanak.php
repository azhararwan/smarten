<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM data_anak WHERE id_anak= :id_anak");
	$result->bindParam(':id_anak', $id);
	$result->execute();
	
	header ("location: dataanak.php");
?>