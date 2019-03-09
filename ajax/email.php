<?php

include "../class/connection.php";

$email = $_REQUEST["email"];
$check_username = mysqli_query($procurement,"SELECT * FROM auth WHERE email='$email'");
$cek_username = mysqli_num_rows($check_username);
if ($cek_username == 0){
	echo json_encode(array('status' => 'OK', 'message' => 'Email <b>' . $email . '</b> Tersedia. Anda Dapat Menggunakan!'));
} else {
	echo json_encode(array('status' => 'ERROR', 'message' => 'Email <b>' . $email . '</b> Sudah Terpakai. Harap Gunakan Email Lain.'));
}
?>