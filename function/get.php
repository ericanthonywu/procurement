<script type='text/javascript'>
	var htmlobjek;
	$(document).ready(function() {
		$("#pilih_provinsi").change(function(){
			var pilih_provinsi = $("#pilih_provinsi").val();
			$.ajax({
				url: "<?=$url;?>ajax/kota.php",
				data: "pilih_provinsi="+pilih_provinsi,
				cache: false,
				success: function(msg){
					$("#pilih_kota").html(msg);
				}
			});
		});
		$("#pilih_kota").change(function(){
			var pilih_kota = $("#pilih_kota").val();
			$.ajax({
				url: "<?=$url;?>ajax/kecamatan.php",
				data: "pilih_kota="+pilih_kota,
				cache: false,
				success: function(msg){
					$("#pilih_kecamatan").html(msg);
				}
			});
		});
		$("#pilih_kurir").change(function(){
			var pilih_kota = $("#pilih_kurir").val();
			$.ajax({
				url: "<?=$url;?>ajax/paket.php",
				data: "pilih_kurir="+pilih_kurir,
				cache: false,
				success: function(msg){
					$("#pilih_paket").html(msg);
				}
			});
		});
	});
</script>