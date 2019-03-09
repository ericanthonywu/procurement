<?
require_once('class/connection.php');
if(isset($_POST['masuk'])){
	$user = mysqli_escape_string($procurement,$_POST['username']);
	$password = mysqli_escape_string($procurement,$_POST['password']);
	$passwordd = MyEncrypt($password,"en");
	$alert=0;
	$sql=mysqli_query($procurement,"SELECT * FROM auth WHERE (username = '$user' OR email = '$user')");

	$nums = mysqli_num_rows($sql);

		if ($nums > 0){
		
			$data=mysqli_fetch_array($sql);
			
				$id = $data['username'];
				$pass = $data['password'];
				$st = $data['st'];
				$toko = $data['toko'];
				if($passwordd == $pass){
					if($st == 1){
					$_SESSION['token_procurement'] = $id;
					$_SESSION['token_toko'] = $toko;
					?>
					<script type="text/javascript">
						window.location = "<?=$url?>dashboard"
					</script>
					<?
					}else{
						?>
						<script>
						toastr.options = {
						  "closeButton": true,
						  "debug": true,
						  "newestOnTop": true,
						  "progressBar": true,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": true,
						  "onclick": null,
						  "showDuration": "300",
						  "hideDuration": "1000",
						  "timeOut": "5000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						};

						toastr.info("Your account has not been verified", "Info");
						</script>
						<?
					}
					?>
				<?
				}
				else{
				?>
				<script>
				toastr.options = {
				  "closeButton": true,
				  "debug": true,
				  "newestOnTop": true,
				  "progressBar": true,
				  "positionClass": "toast-top-right",
				  "preventDuplicates": true,
				  "onclick": null,
				  "showDuration": "300",
				  "hideDuration": "1000",
				  "timeOut": "5000",
				  "extendedTimeOut": "1000",
				  "showEasing": "swing",
				  "hideEasing": "linear",
				  "showMethod": "fadeIn",
				  "hideMethod": "fadeOut"
				};

				toastr.info("Sorry, the Password You Entered Wrong", "Info");
				</script>
				<embed src="<?=$assets?>sound/access_denied.wav" controller="true" autoplay="true" autostart="True" width="0" height="0" />
				<?
				}
		}else{
			?>
			<script>
			toastr.options = {
			  "closeButton": true,
			  "debug": true,
			  "newestOnTop": true,
			  "progressBar": true,
			  "positionClass": "toast-top-right",
			  "preventDuplicates": true,
			  "onclick": null,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			};

			toastr.info("You are not registered", "Info");
			</script>
			<embed src="<?=$assets?>sound/error.wav" controller="true" autoplay="true" autostart="True" width="0" height="0" />
			<?
		}
}
?>