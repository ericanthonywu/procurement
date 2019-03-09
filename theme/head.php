<?
$toko = $_SESSION['token_toko'];
$sql_toko = mysqli_query($procurement,"SELECT * FROM toko WHERE id = '$toko'");
$data_toko = mysqli_fetch_array($sql_toko);
?>
<head>
	<meta charset="utf-8" />
	<title><?=$data_toko['nama']?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="Procurement System V.1" name="description" />
	<meta content="Official Rizky Ramadhan" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?=$assets?>font.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<link href="<?=$assets?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
	<link type="text/css" href="<?=$assets;?>export/export.css" rel="stylesheet">
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="<?=$assets?>global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
	<link href="<?=$assets?>global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?=$assets?>pages/css/invoice-2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL STYLES -->
	<!-- BEGIN THEME LAYOUT STYLES -->
	<link href="<?=$assets?>layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=$assets?>layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
	<link href="<?=$assets?>layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME LAYOUT STYLES -->
	<link rel="shortcut icon" href="<?=$url?>assets/toko/<?=$data_toko['foto']?>" />
	<style>
	.amcharts-chart-div a {display:none !important;};
	</style>
</head>