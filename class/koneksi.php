<?
// error_reporting(0);
// ini_set('display_errors', '0');
date_default_timezone_set('Asia/Jakarta');

$base_url="https://".$_SERVER['SERVER_NAME']."/simarum/";
$base_assets="https://".$_SERVER['SERVER_NAME']."/simarum/assets/";
$canvas_url="https://".$_SERVER['SERVER_NAME']."/simarum/assets/canvas/";
$metronic4_url="https://".$_SERVER['SERVER_NAME']."/simarum/assets/metronic4/";
$metronic5_url="https://".$_SERVER['SERVER_NAME']."/simarum/assets/metronic5/";

$BulanIndo = array("","Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

$hostname = "localhost";
$username = "root";
$password = "";
$database = "simarum";

$simarum = mysqlii_connect($hostname, $username, $password, $database);
/* check connection */
if (!$simarum) {
    printf("Connect failed: %s\n", mysqlii_connect_error());
    exit();
}
//magic quotes logic
if (get_magic_quotes_gpc()){
    function stripslashes_deep($value){
        $value = is_array($value) ?
            array_map('stripslashes_deep', $value) :
            stripslashes($value);
        return $value;
    }
    $_POST = array_map('stripslashes_deep', $_POST);
    $_GET = array_map('stripslashes_deep', $_GET);
    $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
    $_REQUEST = array_map('stripslashes_deep', $_REQUEST);
}
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function time_ago_in_php($timestamp){

    date_default_timezone_set("Asia/Kolkata");
    $time_ago        = strtotime($timestamp);
    $current_time    = time();
    $time_difference = $current_time - $time_ago;
    $seconds         = $time_difference;

    $minutes = round($seconds / 60); // value 60 is seconds
    $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
    $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
    $weeks   = round($seconds / 604800); // 7*24*60*60;
    $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
    $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

    if ($seconds <= 60){

        return "Just Now";

    } else if ($minutes <= 60){

        if ($minutes == 1){

            return "one minute ago";

        } else {

            return "$minutes minutes ago";

        }

    } else if ($hours <= 24){

        if ($hours == 1){

            return "an hour ago";

        } else {

            return "$hours hrs ago";

        }

    } else if ($days <= 7){

        if ($days == 1){

            return "yesterday";

        } else {

            return "$days days ago";

        }

    } else if ($weeks <= 4.3){

        if ($weeks == 1){

            return "a week ago";

        } else {

            return "$weeks weeks ago";

        }

    } else if ($months <= 12){

        if ($months == 1){

            return "a month ago";

        } else {

            return "$months months ago";

        }

    } else {

        if ($years == 1){

            return "one year ago";

        } else {

            return "$years years ago";

        }
    }
}
function TanggalIndo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    return($result);
}
?>