<?
function MyEncrypt($string,$select) {
    return $string;
//	$pass='L!f3i5st012y';$salt='a9k2u5uk4';$pepper='t4n14F4U21A';
//	$encrypted = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $salt . $pass . $pepper ), $string, MCRYPT_MODE_CBC, md5( md5( $salt . $pass . $pepper ))));
//	$decrypted = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5($salt . $pass . $pepper), base64_decode( $string ), MCRYPT_MODE_CBC, md5( md5( $salt . $pass . $pepper))), "\0");
//	if(strtolower($select)=="en"){
//		return $encrypted;
//		// mydebugConsole("File berhasil di enkripsi");
//	}elseif(strtolower($select)=="de"){
//		return $decrypted;
//		// mydebugConsole("File berhasil di dekripsi");
//	}else{
//	echo "File tidak dapat ditentukan sebagai jenis [en]kripsi/[de]kripsi";
//	mydebugConsole("File tidak dapat ditentukan sebagai jenis [en]kripsi/[de]kripsi");
//	}
}
?>