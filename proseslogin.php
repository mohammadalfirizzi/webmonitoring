<?php
session_start();
include 'examples/koneksi.php';

$username = $_POST['username'];
$pass = $_POST['pass'];

$login = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' and pass='$pass'");
$cek = mysqli_num_rows($login);
$data = mysqli_fetch_assoc($login);
$row = mysqli_fetch_array($login);

if($cek==1){
	header("location:examples/dashboard.php");
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	// echo "berhasil";
}
else{
	header("location:index.php?pesan=gagal");
	// $_SESSION['pesan'] = "gagal";
	// echo "Gagal";	
}
?>