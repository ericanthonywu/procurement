<?
session_start();
// error_reporting(0);

$halaman=@$_GET['halaman'];
$hal=@$_GET['hal'];
$session=@$_GET['session'];

if(isset($session) and $session=='signout'){
	session_destroy();
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}else{
	require_once('class/connection.php');
	require_once "function/password.php";
if(isset($_SESSION['token_procurement'])){
?>
<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <?require_once("theme/head.php")?>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
        <?require_once("theme/header.php")?>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?require_once("theme/menu.php")?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <?require_once("theme/content.php")?>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?require_once("theme/footer.php")?>
        <!-- END FOOTER -->
        <!-- BEGIN CORE PLUGINS -->
		<?require_once("theme/script.php")?>
		<?require_once("function/crud.php")?>
		<?require_once("function/checker.php")?>
		<?require_once("function/get.php")?>
		<?require_once("function/regex.php")?>
		<?require_once("function/select.php")?>
		<?require_once("function/tanggal.php")?>
		<?require_once("function/grafik.php")?>
		<?require_once("function/table.php")?>
        <!-- END CORE PLUGINS -->
    </body>
</html>
<?
}elseif(!isset($_SESSION['token_procurement'])){
?>
<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <?require_once("theme/head-login.php")?>
    <!-- END HEAD -->
    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="">
                <img src="../assets/pages/img/logo-big.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <?require_once("theme/content.php")?>
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> <?=date("Y");?> &copy; Corporate. </div>
        <!-- END COPYRIGHT -->
        <!-- BEGIN CORE PLUGINS -->
		<?require_once("theme/script-login.php")?>
		<?require_once("function/auth.php")?>
        <!-- END CORE PLUGINS -->
    </body>
</html>
<?
}
mysqli_close($procurement);
}
?>