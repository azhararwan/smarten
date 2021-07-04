<?php

// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'connect.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$result = $db->prepare("SELECT * FROM 'user' WHERE username='$username' and password='$password' ");
$result->execute();
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($result);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($result);
 
	// cek jika user login sebagai admin
	if($data['hak_akses']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:main/index.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['hak_akses']=="guest"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "guest";
		// alihkan ke halaman dashboard pegawai
		header("location:main/index.php");
 
	// cek jika user login sebagai pengurus
	}else if($data['hak_akses']=="rumahsakit"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "rumahsakit";
		// alihkan ke halaman dashboard pegawai
		header("location:main/index.php");
 
	}else if($data['hak_akses']=="puskesmas"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "puskesmas";
		// alihkan ke halaman dashboard pegawai
		header("location:main/index.php");
 
	}else if($data['hak_akses']=="posyandu"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "posyandu";
		// alihkan ke halaman dashboard pegawai
		header("location:main/index.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>