<?
include "../include/class-connection.php";

$keyword = $_GET['pilih_provinsi'];

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://pro.rajaongkir.com/api/city?province=$keyword",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 8a0b8807233f478f338cc3e4c148d473"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
}

$data = json_decode($response, true);
echo"<option SELECTED> Pilih Kota </option>";
for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
	echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."-".$data['rajaongkir']['results'][$i]['city_name']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
}
?>