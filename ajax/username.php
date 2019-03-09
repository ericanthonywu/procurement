<?php

include "../class/connection.php";

$username = $_REQUEST["username"];
$check_username = mysqli_query($procurement,"SELECT * FROM auth WHERE username='$username'");
$cek_username = mysqli_num_rows($check_username);
if ($cek_username == 0){
	echo json_encode(array('status' => 'OK', 'message' => 'Username <b>' . $username . '</b> Tersedia. Anda Dapat Menggunakan!'));
} else {
	echo json_encode(array('status' => 'ERROR', 'message' => 'Username <b>' . $username . '</b> Sudah Terpakai. Harap Gunakan Username Lain.'));
}
?>