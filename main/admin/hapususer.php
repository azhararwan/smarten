<?php
	include('../../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM users WHERE id_user= :id_user");
	$result->bindParam(':id_user', $id);
	$result->execute();
	
	header ("location: user.php");
?>