<?
include "../class/connection.php";
$pengirims = $_POST['dari'];
$explode1 = explode("-",$pengirims);
$pengirim = $explode1[0];

$kepadas = $_POST['kepada'];
$explode2 = explode("-",$kepadas);
$kepada = $explode2[0];
$berat = $_POST['beratorder'];
$kurir = $_POST['pilih_kurir'];
$paket = $_POST['paket'];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=$pengirim&originType=city&destination=$kepada&destinationType=subdistrict&weight=$berat&courier=$kurir",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: 8a0b8807233f478f338cc3e4c148d473"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // echo $response;
}
$data = json_decode($response, true);
for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
    $kode_kurir = $data['rajaongkir']['results'][$i]['code'];
    $nama_kurir = $data['rajaongkir']['results'][$i]['name'];
    $ongkos_kurir = $data['rajaongkir']['results'][$i]['costs'];
    for ($a=0; $a < count($ongkos_kurir); $a++) {
        $service_kurir = $ongkos_kurir[$a]['service'];
        $ongkir_kurir = $ongkos_kurir[$a]['cost'];
		for($b=0;$b < count($ongkir_kurir);$b++){
            $ongkir = $ongkir_kurir[$b]['value'];
            if($paket==$service_kurir){
				echo $ongkir;
			}
        }
    }
}
?>