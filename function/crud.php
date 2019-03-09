<?
require_once('class/connection.php');

$created_by = $_SESSION['token_procurement'];
$created_date = date("Y-m-d");
$toko = $_SESSION['token_toko'];

if(isset($_POST['simpan-sanksi'])){
    $keterangan = $_POST['keterangan'];
    $sanksi = $_POST['sanksi'];
    $jumlahwaktu = $_POST['waktusanksi'];
    $satuanwaktu = $_POST['satuanwaktu'];
    mysqli_query($procurement,"
    insert into
          punishment
    set
          keterangan = '$keterangan',
          sanksi = '$sanksi',
          jumlahwaktusanksi = '$jumlahwaktu',
          satuanwaktu = '$satuanwaktu',
          created_by = '$created_by',
          created_date = '$created_date',
          toko = '$toko'
");
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>punishment"
    </script>
    <?
}
if(isset($_POST['edit-sanksi'])){
    $id = $_POST['id'];
    $keterangan = $_POST['keterangan'];
    $sanksi = $_POST['sanksi'];
    $jumlahwaktu = $_POST['waktusanksi'];
    $satuanwaktu = $_POST['satuanwaktu'];
    mysqli_query($procurement,"
    update
          punishment
    set
          keterangan = '$keterangan',
          sanksi = '$sanksi',
          jumlahwaktusanksi = '$jumlahwaktu',
          satuanwaktu = '$satuanwaktu'
    where
          id = $id      
");
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>punishment"
    </script>
    <?
}

if(isset($_POST['simpan-reward'])){
    $jenisreward = $_POST['jenisreward'];
    $bonus = $_POST['bonus'];
    $bonus_sales = $_POST['bonussales'];
    mysqli_query($procurement,"insert into reward values (null, '$jenisreward','$bonus','$bonus_sales','$created_by','$created_date','$toko')") or die(mysqli_error($procurement));
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>reward"
    </script>
    <?
}
if(isset($_POST['edit-reward'])){
    $id = $_POST['id'];
    $jenisreward = $_POST['jenisreward'];
    $bonus = $_POST['bonus'];
    $bonus_sales = $_POST['bonussales'];
    mysqli_query($procurement,"
    update reward
      set
      jenis_reward = '$jenisreward',
      bonus = '$bonus',
      bonus_sales = '$bonus_sales'
      where 
      id = $id
    ") or die(mysqli_error($procurement));
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>reward"
    </script>
    <?
}

if(isset($_POST['simpan-ads'])){
    $email = $_POST['email'];
    $sms = $_POST['sms'];
    $wa = $_POST['wa'];
    $telp = $_POST['telp'];
    $sales = $_POST['sales'];
    $transfer = $_POST['transfer'];

	$cek_sql = mysqli_query($procurement,"SELECT * FROM ads WHERE created_by='$created_by' AND created_date='$created_date'");
	$num_cek = mysqli_num_rows($cek_sql);
	if($num_cek>0){
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

		toastr.info("Anda Sudah Input Performa Hari Ini, Anda Tidak Dapat Merubah Kembali !", "Info");
		</script>
		<?
	}else{
		$insert = mysqli_query($procurement,"
		INSERT INTO
			ads
		SET
			email = '$email',
			sms = '$sms',
			wa = '$wa',
			telp = '$telp',
			sales = '$sales',
			transfer = '$transfer',
			created_by = '$created_by',
			created_date = '$created_date',
			toko = '$toko'
		");
	}
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>ads"
    </script>
    <?
}
if(isset($_POST['simpan-iklan'])){
    $id = $_POST['id'];
    $iklan = $_POST['bi'];
    $insert = mysqli_query($procurement,"
	UPDATE
		ads
	SET
		biaya_iklan = '$iklan'
	WHERE
		id = '$id'
	");
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>ads"
    </script>
    <?
}
if(isset($_POST['simpan-customer'])){
	$tipe = $_POST['tipe'];
	$nama = $_POST['nama'];
	$provinsi = $_POST['provinsi'];
	$explode1 = explode("-",$provinsi);
	$id_provinsi = $explode1[0];
	$nama_provinsi = $explode1[1];
	
	$kota = $_POST['kota'];
	$explode2 = explode("-",$kota);
	$id_kota = $explode2[0];
	$nama_kota = $explode2[1];
	
	$kecamatan = $_POST['kecamatan'];
	$explode3 = explode("-",$kecamatan);
	$id_kecamatan = $explode3[0];
	$nama_kecamatan = $explode3[1];
	
	$kode_pos = $_POST['kode_pos'];
	$alamat = $_POST['alamat'];
	$hp = $_POST['hp'];
	$email = $_POST['email'];
	$line = $_POST['line'];
	$bbm = $_POST['bbm'];
	$insert = mysqli_query($procurement,"
	INSERT INTO customer
	SET
		tipe = '$tipe',
		nama = '$nama',
		provinsi = '$id_provinsi',
		nama_prov = '$nama_provinsi',
		kota = '$id_kota',
		nama_kota = '$nama_kota',
		kecamatan = '$id_kecamatan',
		nama_kecamatan = '$nama_kecamatan',
		kode_pos = '$kode_pos',
		hp = '$hp',
		email = '$email',
		alamat = '$alamat',
		line = '$line',
		bbm = '$bbm',
		created_by = '$created_by',
		created_date = '$created_date',
		toko = '$toko'
	");
	?>
	<script type="text/javascript">
		window.location = "<?=$url?>customer"
	</script>
	<?
}
if(isset($_POST['perbarui-customer'])){
	$id = $_POST['id'];
	$tipe = $_POST['tipe'];
	$nama = $_POST['nama'];
	$provinsi = $_POST['provinsi'];
	$explode1 = explode("-",$provinsi);
	$id_provinsi = $explode1[0];
	$nama_provinsi = $explode1[1];
	
	$kota = $_POST['kota'];
	$explode2 = explode("-",$kota);
	$id_kota = $explode2[0];
	$nama_kota = $explode2[1];
	
	$kecamatan = $_POST['kecamatan'];
	$explode3 = explode("-",$kecamatan);
	$id_kecamatan = $explode3[0];
	$nama_kecamatan = $explode3[1];
	
	
	$provinsis = $_POST['provinsis'];
	$nmprovinsi = $_POST['nmprovinsi'];
	$kotas = $_POST['kotas'];
	$nmkota = $_POST['nmkota'];
	$kecamatans = $_POST['kecamatans'];
	$nmkecamatan = $_POST['nmkecamatan'];
	$alamat = $_POST['alamat'];
	$hp = $_POST['hp'];
	$kode_pos = $_POST['kode_pos'];
	$email = $_POST['email'];
	$line = $_POST['line'];
	$bbm = $_POST['bbm'];
	if(!empty($_POST['provinsi'])){
		$insert = mysqli_query($procurement,"
		UPDATE customer
		SET
			tipe = '$tipe',
			nama = '$nama',
			provinsi = '$provinsis',
			nama_prov = '$nmprovinsi',
			kota = '$kotas',
			nama_kota = '$nmkota',
			kecamatan = '$kecamatans',
			nama_kecamatan = '$nmkecamatan',
			kode_pos = '$kode_pos',
			hp = '$hp',
			email = '$email',
			alamat = '$alamat',
			line = '$line',
			bbm = '$bbm'
		WHERE
			id = '$id'
		");
	}else{
		$insert = mysqli_query($procurement,"
		UPDATE customer
		SET
			tipe = '$tipe',
			nama = '$nama',
			kode_pos = '$kode_pos',
			hp = '$hp',
			email = '$email',
			alamat = '$alamat',
			line = '$line',
			bbm = '$bbm'
		WHERE
			id = '$id'
		");
	}
	?>
	<script type="text/javascript">
		window.location = "<?=$url?>customer"
	</script>
	<?
}
// START EXPENSES
if(isset($_POST['simpan-expenses'])){
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$jumlah = $_POST['jumlah'];
	$note = $_POST['note'];
	$total= $harga*$jumlah;
	
	$sql = mysqli_query($procurement,"
	INSERT INTO
		expenses
	SET
		nama = '$nama',
		harga = '$harga',
		jumlah = '$jumlah',
		note = '$note',
		created_by = '$created_by',
		created_date = '$created_date',
		toko = '$toko'
	");
	mysqli_query($procurement,"insert into report 
        SET 
            tanggal = '$created_date',
			expenses = '$total',
			gross_sales = '0',
			net_sales = '0',
			transaksi = '0',
			item_terjual = '0',
			ongkir = '0',
			diskon = '0',
			harga_beli = '0',
            toko = '$toko'
    ");
	?>
	<script type="text/javascript">
		window.location = "<?=$url?>expenses"
	</script>
	<?
}
if(isset($_POST['perbarui-expenses'])){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$jumlah = $_POST['jumlah'];
	$note = $_POST['note'];
	
	$sql = mysqli_query($procurement,"
	UPDATE
		expenses
	SET
		nama = '$nama',
		harga = '$harga',
		jumlah = '$jumlah',
		note = '$note'
	WHERE
		id = '$id'
	");
	?>
	<script type="text/javascript">
		window.location = "<?=$url?>expenses"
	</script>
	<?
}
if(isset($_POST['simpan-supplier'])){
	$nama = $_POST['nama'];
	$sl = $_POST['asal'];
	$explode = explode("-",$sl);
	$asal = $explode[0];
	$kota = $explode[1];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];
	$keterangan = $_POST['keterangan'];
	$insert = mysqli_query($procurement,"
	INSERT INTO supplier
	SET
		nama = '$nama',
		asal = '$asal',
		kota = '$kota',
		telp = '$telp',
		alamat = '$alamat',
		keterangan = '$keterangan',
		created_by = '$created_by',
		created_date = '$created_date',
		toko = '$toko'
	");
	?>
	<script type="text/javascript">
		window.location = "<?=$url?>supplier"
	</script>
	<?
}
if(isset($_POST['perbarui-supplier'])){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$sl = $_POST['asal'];
	$explode = explode("-",$sl);
	$asal = $explode[0];
	$kota = $explode[1];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];
	$keterangan = $_POST['keterangan'];
	$insert = mysqli_query($procurement,"
	UPDATE supplier
	SET
		nama = '$nama',
		asal = '$asal',
		kota = '$kota',
		telp = '$telp',
		alamat = '$alamat',
		keterangan = '$keterangan'
	WHERE
		id = '$id'
	");
	?>
	<script type="text/javascript">
		window.location = "<?=$url?>supplier"
	</script>
	<?
}
if(isset($_POST['simpan-user'])){
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$role = $_POST['role'];
	$pass = MyEncrypt($password,"en");
	
	$sql_cek = mysqli_query($procurement,"SELECT * FROM auth WHERE username = '$username' OR email = '$email'");
	$cek_sql = mysqli_num_rows($sql_cek);
	if($cek_sql>0){
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

		toastr.info("Username / Email Sudah Terpakai, Mohon Periksa Kembali !", "Info");
		</script>
		<?
	}else{
		if($password != $repassword){
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

			toastr.info("Password Yang Anda Masukkan Tidak Sama, Mohon Periksa Kembali !", "Info");
			</script>
			<?
		}else{
			$sql_create = mysqli_query($procurement,"
			INSERT INTO
				auth
			SET
				nama = '$nama',
				username = '$username',
				email = '$email',
				password = '$pass',
				st = '1',
				lv = '$role',
				toko = '$toko'
			");
			?>
			<script type="text/javascript">
				window.location = "<?=$url?>user"
			</script>
			<?
		}
	}
}
if(isset($_POST['perbarui-user'])){
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$role = $_POST['role'];
	$pass = MyEncrypt($password,"en");
	if(empty($_POST['password'])){
		$sql_create = mysqli_query($procurement,"
		UPDATE
			auth
		SET
			nama = '$nama',
			lv = '$role'
		WHERE
			username = '$username'
		");
		?>
		<script type="text/javascript">
			window.location = "<?=$url?>user"
		</script>
		<?
	}else{
		if($password != $repassword){
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

			toastr.info("Password Yang Anda Masukkan Tidak Sama, Mohon Periksa Kembali !", "Info");
			</script>
			<?
		}else{
			$sql_create = mysqli_query($procurement,"
			UPDATE
				auth
			SET
				nama = '$nama',
				password = '$pass',
				lv = '$role'
			WHERE
				username = '$username'
			");
			?>
			<script type="text/javascript">
				window.location = "<?=$url?>user"
			</script>
			<?
		}
	}
}

if(isset($_POST['simpan-penggajian'])){
 $karyawans = $_POST['karyawan'];
 $explode1 = explode("-",$karyawans);
 $karyawan = $explode1[0];
 $tanggal = $_POST['tanggal'];
 $explode = explode("-",$tanggal);
 $tahun = $explode[0];
 $bulan = $explode[1];
 $totalsalesitem = $_POST['totalsalesitem'];
 $gajipokok = $_POST['gajipokok'];
 $uangmakan = $_POST['uangmakan'];
 $tunjangan = $_POST['tunjangan'];
 $totalbonus = $_POST['totalbonus'];
 $minusplusongkir = $_POST['minplusongkir'];
 $sanksi = $_POST['sanksi'];
 $pinjaman = $_POST['pinjaman'];
 $totalpenerimaan = $_POST['valtotalpenerimaan'];
    $totalpotongan = $_POST['valtotalpotongan'];
    $gajibersih = $_POST['valgajibersih'];
	$bonus_rating_order = $_POST['bonus_rating_order'];
    $bonus_sales = $_POST['bonus_sales'];
    $bonus_rating_konversi = $_POST['bonus_rating_konversi'];
 $sql_cek = mysqli_query($procurement,"SELECT * FROM gaji WHERE karyawan = '$karyawan' AND month(tanggal) ='$bulan' AND year(tanggal)='$tahun' AND toko = '$toko'") or die(mysqli_error($procurement));
 $data_cek = mysqli_num_rows($sql_cek);
 if($data_cek>0){
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

  toastr.info("Karyawan ini sudah mendapatkan gaji, Mohon Periksa Kembali !", "Info");
  </script>
  <?
 }else{
  $sql_create = mysqli_query($procurement,"
  INSERT INTO
   gaji
  SET
   karyawan = '$karyawan',
   total_sales = '$totalsalesitem',
   tanggal = '$tanggal',
   gaji_pokok = '$gajipokok',
   uang_makan = '$uangmakan',
   tunjangan = '$tunjangan',
   bonus = '$totalbonus',
   gaji_bersih = '$gajibersih',
   ongkir = '$minusplusongkir',
   sanksi = '$sanksi',
   pinjaman = '$pinjaman',
   totalpenerimaan = '$totalpenerimaan',
   totalpotongan = '$totalpotongan',
   created_by = '$created_by',
   created_date = '$created_date',
   toko = '$toko'
  ");
  
	mysqli_query($procurement,"
    INSERT INTO 
          bonus 
    SET 
          tanggal= '$tanggal',
          karyawan = '$karyawan', 
          bonus_order = '$bonus_rating_order', 
          bonus_sales = '$bonus_sales', 
          bonus_konversi = '$bonus_rating_konversi', 
          created_by = '$karyawan', 
          created_date='$tanggal',
          toko='$toko'
    ");
  ?>
  <script type="text/javascript">
            window.location = "<?=$url?>penggajian"
  </script>
  <?
 }
}
if(isset($_POST['perbarui-penggajian'])){
 $id = $_POST['id'];
    $karyawan = $_POST['karyawan'];
    $tanggal = $_POST['tanggal'];
    $totalsalesitem = $_POST['totalsalesitem'];
    $gajipokok = $_POST['gajipokok'];
    $uangmakan = $_POST['uangmakan'];
    $tunjangan = $_POST['tunjangan'];
    $totalbonus = $_POST['totalbonus'];
    $minusplusongkir = $_POST['minplusongkir'];
    $sanksi = $_POST['sanksi'];
    $pinjaman = $_POST['pinjaman'];
    $totalpenerimaan = $_POST['valtotalpenerimaan'];
    $totalpotongan = $_POST['valtotalpotongan'];
    $gajibersih = $_POST['valgajibersih'];
        $sql_create = mysqli_query($procurement,"
  update
   gaji
  SET
   karyawan = '$karyawan',
   total_sales = '$totalsalesitem',
   tanggal = '$tanggal',
   gaji_pokok = '$gajipokok',
   uang_makan = '$uangmakan',
   tunjangan = '$tunjangan',
   bonus = '$totalbonus',
   gaji_bersih = '$gajibersih',
   ongkir = '$minusplusongkir',
   sanksi = '$sanksi',
   pinjaman = '$pinjaman',
   totalpenerimaan = '$totalpenerimaan',
   totalpotongan = '$totalpotongan'
  where 
      id = '$id'
  ") or die(mysqli_error($procurement));
  ?>
  <script type="text/javascript">
   window.location = "<?=$url?>penggajian"
  </script>
  <?
}
if(isset($_GET['hal'])){
	if ($_GET['hal']=='hapus-bank')
    {
        $keyword = $_GET['bank'];
        $query_delete = mysqli_query($procurement,"DELETE FROM bank WHERE id = '$keyword'");
        ?>
        <script type="text/javascript">
            window.location = "<?=$url?>order/bank"
        </script>
        <?
    }
    if ($_GET['hal']=='hapus-kategori-produk')
    {
        $keyword = $_GET['produk'];
        $query_delete = mysqli_query($procurement,"DELETE FROM kategori_produk WHERE id = '$keyword'");
        ?>
        <script type="text/javascript">
            window.location = "<?=$url?>kategori-produk"
        </script>
        <?
    }if ($_GET['hal']=='hapus-sanksi')
    {
        $keyword = $_GET['sanksi'];
        $query_delete = mysqli_query($procurement,"DELETE FROM sanksi WHERE id = '$keyword'");
        ?>
        <script type="text/javascript">
            window.location = "<?=$url?>sanksi"
        </script>
        <?
    }
	if ($_GET['hal']=='hapus-detail-order')
	{
		$keyword = $_GET['order'];
		$query_delete = mysqli_query($procurement,"DELETE FROM detail_order WHERE id = '$keyword'");
		?>
		<script type="text/javascript">
			window.location = "<?=$url?>order/tambah"
		</script>
		<?
	}
	if ($_GET['hal']=='hapus-penggajian')
	{
		$keyword = $_GET['penggajian'];
		$query_delete = mysqli_query($procurement,"DELETE FROM gaji WHERE id = '$keyword'");
		?>
		<script type="text/javascript">
			window.location = "<?=$url?>penggajian"
		</script>
		<?
	}
	if ($_GET['hal']=='hapus-customer')
	{
		$keyword = $_GET['customer'];
		$query_delete = mysqli_query($procurement,"DELETE FROM customer WHERE id = '$keyword'");
		?>
		<script type="text/javascript">
			window.location = "<?=$url?>customer"
		</script>
		<?
	}
	if ($_GET['hal']=='hapus-supplier')
	{
		$keyword = $_GET['supplier'];
		$query_delete = mysqli_query($procurement,"DELETE FROM supplier WHERE id = '$keyword'");
		?>
		<script type="text/javascript">
			window.location = "<?=$url?>supplier"
		</script>
		<?
	}
	if ($_GET['hal']=='hapus-user')
	{
		$keyword = $_GET['user'];
		
		$query_delete=mysqli_query($procurement,"
		DELETE FROM
			auth
		WHERE
			username = '$keyword'
		");
		?>
		<script type="text/javascript">
			window.location = "<?=$url?>user"
		</script>
		<?
	}
    if ($_GET['hal']=='hapus-sanksi')
    {
        $keyword = $_GET['punishment'];

        $query_delete=mysqli_query($procurement,"
		DELETE FROM
			punishment
		WHERE
			id = '$keyword'
		");
        ?>
        <script type="text/javascript">
            window.location = "<?=$url?>punishment"
        </script>
        <?
    }
	if ($_GET['hal']=='hapus-expenses')
	{
		$keyword = $_GET['expenses'];
		
		$query_delete=mysqli_query($procurement,"
		DELETE FROM
			expenses
		WHERE
			id = '$keyword'
		");
		?>
		<script type="text/javascript">
			window.location = "<?=$url?>expenses"
		</script>
		<?
	}
	if ($_GET['hal']=='hapus-customer')
	{
		$keyword = $_GET['customer'];
		$query_delete=mysqli_query($procurement,"
		DELETE FROM
			cust
		WHERE
			id = '$keyword'
		");
		?>
		<script type="text/javascript">
			window.location = "<?=$url?>customer"
		</script>
		<?
	}
	if ($_GET['hal']=='hapus-penggajian')
	{
		$keyword = $_GET['penggajian'];
		$query_delete=mysqli_query($procurement,"
		DELETE FROM
			gaji
		WHERE
			id = '$keyword'
		");
		?>
		<script type="text/javascript">
			window.location = "<?=$url?>penggajian"
		</script>
		<?
	}
	if ($_GET['hal']=='hapus-produk')
	{
		$keyword = $_GET['produk'];
		$query_delete=mysqli_query($procurement,"
		DELETE FROM
			produk
		WHERE
			id = '$keyword'
		");
		?>
		<script type="text/javascript">
			window.location = "<?=$url?>produk"
		</script>
		<?
	}
	if ($_GET['hal']=='hapus-ads')
	{
		$keyword = $_GET['ads'];
		$query_delete=mysqli_query($procurement,"
		DELETE FROM
			ads
		WHERE
			id = '$keyword'
		");
		?>
		<script type="text/javascript">
			window.location = "<?=$url?>ads"
		</script>
		<?
	}
	if ($_GET['hal']=='hapus-order')
	{
		$keyword = $_GET['order'];
		$query_delete=mysqli_query($procurement,"
		DELETE FROM
			orders
		WHERE
			inv = '$keyword'
		");
		$query_delete1=mysqli_query($procurement,"
		DELETE FROM
			detail_order
		WHERE
			inv = '$keyword'
		");
		$query_delete1=mysqli_query($procurement,"
		DELETE FROM
			ads
		WHERE
			inv = '$keyword'
		");
		?>
		<script type="text/javascript">
			window.location = "<?=$url?>order"
		</script>
		<?
	}
    if ($_GET['hal']=='hapus-reward')
    {
        $keyword = $_GET['reward'];
        $query_delete=mysqli_query($procurement,"
		DELETE FROM
			reward
		WHERE
			id = '$keyword'
		");
        ?>
        <script type="text/javascript">
            window.location = "<?=$url?>reward"
        </script>
        <?
    }

}
// END EXPENSES

// START PRODUK
if(isset($_POST['simpan-produk'])){
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];
    $berat = $_POST['berat'];
    $diskon = $_POST['diskon'];
    $diskon_chk = $_POST['diskon_chk'];
    $grosir_chk = $_POST['grosir_chk'];
    $publish_chk = $_POST['publish_chk'];
    $stok_chk = $_POST['stok_chk'];
    $sku = $_POST['sku'];
    $harga_beli = $_POST['harga_beli'];
    $harnor = $_POST['harnor'];
    $harres = $_POST['harres'];
	if($jenis==2){
		$harga_beli = $harnor;
	}else{
		$harga_beli = $harga_beli;
	}
    $hardro = $_POST['hardro'];
    $haagkh  =$_POST['haagkh'];
    $harpas = $_POST['harpas'];
    $stok = $_POST['stok'];
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];
    $hargasatuan = $_POST['harga_satuan'];
    $rentangawal = $_POST['rentang_awal'];
    $rentangakhir = $_POST['rentang_akhir'];
    $sql = mysqli_query($procurement,"
	INSERT INTO
		produk
	SET
		jenis = '$jenis',
		kategori = '$kategori',
		nama = '$nama',
		keterangan = '$keterangan',
		berat = '$berat',
		diskon = '$diskon',
		spesifikasi = '$sku',
		harga_beli = '$harga_beli',
		harga_jual_normal = '$harnor',
		harga_jual_reseller = '$harres',
		harga_jual_dropship = '$hardro',
		harga_agen_khusus = '$haagkh',
		harga_pasukan = '$harpas',
		rentang_awal = '$rentangawal',
		rentang_akhir = '$rentangakhir',
		harga_satuan = '$hargasatuan',
		stock = '$stok',
		st_diskon = '$diskon_chk',
		st_grosir = '$grosir_chk',
		publish = '$publish_chk',
		st_stok = '$stok_chk',
		created_by = '$created_by',
		created_date = '$created_date',
		toko = '$toko'
	")or die(mysqli_error($procurement));
    //move_uploaded_file($foto_tmp, "./foto/$foto");
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>produk"
    </script>
    <?
}
if(isset($_POST['perbarui-produk'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];
    $berat = $_POST['berat'];
    $diskon = $_POST['diskon'];
    $diskon_chk = $_POST['diskon_chk'];
    $grosir_chk = $_POST['grosir_chk'];
    $publish_chk = $_POST['publish_chk'];
    $stok_chk = $_POST['stok_chk'];
    $sku = $_POST['sku'];
    $harga_beli = $_POST['harga_beli'];
    $harnor = $_POST['harnor'];
    $harres = $_POST['harres'];
    $hardro = $_POST['hardro'];
    $haagkh  =$_POST['haagkh'];
    $harpas = $_POST['harpas'];
    $stok = $_POST['stok'];
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];
    $hargasatuan = $_POST['harga_satuan'];
    $rentangawal = $_POST['rentang_awal'];
    $rentangakhir = $_POST['rentang_akhir'];
    $sql = mysqli_query($procurement,"
	update
		produk
	SET
		jenis = '$jenis',
		kategori = '$kategori',
		nama = '$nama',
		keterangan = '$keterangan',
		berat = '$berat',
		diskon = '$diskon',
		spesifikasi = '$sku',
		harga_beli = '$harga_beli',
		harga_jual_normal = '$harnor',
		harga_jual_reseller = '$harres',
		harga_jual_dropship = '$hardro',
		harga_agen_khusus = '$haagkh',
		harga_pasukan = '$harpas',
		rentang_awal = '$rentangawal',
		rentang_akhir = '$rentangakhir',
		harga_satuan = '$hargasatuan',
		stock = '$stok',
		st_diskon = '$diskon_chk',
		st_grosir = '$grosir_chk',
		publish = '$publish_chk',
		st_stok = '$stok_chk'
	where 
	    id = '$id'
	")or die(mysqli_error($procurement));
	?>
    <script type="text/javascript">
        window.location = "<?=$url?>produk"
    </script>
    <?
}
// END PRODUK

// START ORDER
if(isset($_POST['simpan-order'])){
	$pemesans = $_POST['pemesan'];
	$explode_pemesan = explode("-",$pemesans);
	$pemesan = $explode_pemesan[1];
	$sql_customer = mysqli_query($procurement,"SELECT * FROM customer WHERE id = '$pemesan'");
	$data_customer = mysqli_fetch_array($sql_customer);
	$nama_customer =$data_customer['nama'];
	$hp_customer =$data_customer['hp'];

    $kepadas = $_POST['kepada'];
    $explode_kepada = explode("-",$kepadas);
    $kepada = $explode_kepada[1];

	$pengdar = $_POST['supplier'];
	$explode_dari = explode("-",$pengdar);
	$dari = $explode_dari[1];

	$tgl = $_POST['tgl'];
	$cs = $_POST['cs'];
	$note = $_POST['note'];
	$printlabel = $_POST['printlabel'];
	if(isset($printlabel)){
	    $printlabel = 1;
    }else{
	    $printlabel = 0;
    }
    $inv = $_POST['inv'];
	
	$subtotal = $_POST['subtotal'];
	$totalprice = $_POST['totalPrice'];
    // $persen_diskon = $_POST['persen_kurang'];
    // $total_kurang = $_POST['rupiah_kurang'];
	$diskon_order = $_POST['rupiah'];
    $kurir = $_POST['pilih_kurir'];
    $paket_kurir = $_POST['paket'];
    $total_berat = $_POST['berat'];
    $biayakirim = $_POST['biayakirim'];
    $asuransi = $_POST['nominalasuransi'];
    $keteranganbiayalain = $_POST['keterangan'];
    $nominalbiayalain = $_POST['nominalbiayalain'];
    $total_bayar = $_POST['total_bayar'];
    $status = $_POST['status'];
    $tglstatus = $_POST['tglstatus'];
    $nominalstatus = $_POST['nominalstatus'];
    $bank = $_POST['bank'];
    $check_sms_resi = $_POST['check_sms'];
    $total_harga_asli = $_POST['total_harga_asli'];
	$harga_supplier = $_POST['harga_supplier'];
	$nomorresi = $_POST['nomorresi'];
	if(!empty($harga_supplier)){
		$hargaorder = $harga_supplier;
	}else{
		$hargaorder = $total_harga_asli;
	}
	if($status == "cicilan"){
		// $harga_beli_adsreport = $harga_supplier;
		$sisabayar = $total_bayar-$nominalstatus;
	}else if($status == "lunas"){
		// $harga_beli_adsreport = $harga_supplier;
		$nominalstatus = $total_bayar;
		$sisabayar = 0;
	}else if($status == "belum"){
		$nominalstatus = 0;
		$sisabayar = $total_bayar;
	}
    if(isset($check_sms_resi)){
        $check_sms_resi = 1;
		// create a new cURL resource
		$ch = curl_init();

		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, "https://reguler.zenziva.net/apps/smsapi.php?userkey=$mrav32&passkey=$hypfgwrayv&nohp=$hp_customer&pesan=Terima Kasih telah order di toko kami. Orderan anda akan kami proses secepatnya, no resi Anda no. $nomorresi sebesar Rp. $total_bayar telah kami terima $tgl");
		curl_setopt($ch, CURLOPT_HEADER, 0);

		// grab URL and pass it to the browser
		curl_exec($ch);

		// close cURL resource, and free up system resources
		curl_close($ch);
    }else{
        $check_sms_resi = 0;
    }
	$sql = mysqli_query($procurement,"
	INSERT INTO
		orders
	SET
			inv = '$inv',
			pemesan = '$pemesan',
			kepada = '$kepada',
			cs = '$cs',
			pengirim = '$dari',
			tanggal = '$tgl',
			note = '$note',
			status_print = '$printlabel',
			expedisi = '$kurir',
			paket = '$paket_kurir',
			berat = '$berat',
			ongkir = '$biayakirim',
			asuransi = '$asuransi',
			keterangan = '$keteranganbiayalain',
			nominal = '$nominalbiayalain',
			diskon = '$total_kurang',
			total_order = '$total_bayar',
			status_bayar = '$status',
			tanggal_bayar = '$tglstatus',
			nominal_bayar = '$nominalstatus',
			sisa_bayar = '$sisabayar',
			bank = '$bank',
			no_resi = '$nomorresi',
			status_resi = '$check_sms_resi',
			toko = '$toko',
			created_by = '$created_by',
			created_date = '$created_date',
			bayar_supplier = '$hargaorder'
	") or die(mysqli_error($procurement));
	mysqli_query($procurement,"insert into ads 
	SET 
		inv = '$inv',
		net_sales = '$totalprice',
		harga_beli = '$hargaorder',
		toko = '$toko',
		created_by = '$created_by',
		created_date = '$created_date'
	");
	
	mysqli_query($procurement,"insert into report 
        SET 
            kode = '$inv',
            tanggal = '$tgl',
			expenses = '0',
			gross_sales = '$total_bayar',
			net_sales = '$totalprice',
			transaksi = '1',
			item_terjual = '$subtotal',
			ongkir = '$biayakirim',
			diskon = '$diskon_order',
			harga_beli = '$hargaorder',
            toko = '$toko'
    ");
	
	?>
	<script type="text/javascript">
		window.location = "<?=$url?>order"
	</script>
	<?
}

if(isset($_POST['perbarui-order'])){
    $pemesans = $_POST['pemesan'];
    $explode_pemesan = explode("-",$pemesans);
    $pemesan = $explode_pemesan[1];

    $kepadas = $_POST['kepada'];
    $explode_kepada = explode("-",$kepadas);
    $kepada = $explode_kepada[1];

    $pengdar = $_POST['supplier'];
    $explode_dari = explode("-",$pengdar);
    $dari = $explode_dari[1];

    $tgl = $_POST['tgl'];
    $cs = $_POST['cs'];
    $note = $_POST['note'];
    $printlabel = $_POST['printlabel'];
    if(isset($printlabel)){
        $printlabel = 1;
    }else{
        $printlabel = 0;
    }
	if($status == "cicilan"){
		$sisabayar = $total_bayar-$nominalstatus;
	}else if($status == "lunas"){
		$nominalstatus = $total_bayar;
		$sisabayar = 0;
	}else if($status == "belum"){
		$nominalstatus = 0;
		$sisabayar = $total_bayar;
	}
    $inv = $_POST['inv'];
    $subtotal = $_POST['subtotal'];
    $totalprice = $_POST['totalPrice'];
    $persen_diskon = $_POST['persen_kurang'];
    $total_kurang = $_POST['rupiah_kurang'];
    $kurir = $_POST['pilih_kurir'];
    $paket_kurir = $_POST['paket'];
    $total_berat = $_POST['berat'];
    $biayakirim = $_POST['biayakirim'];
    $asuransi = $_POST['nominalasuransi'];
    $keteranganbiayalain = $_POST['keterangan'];
    $nominalbiayalain = $_POST['nominalbiayalain'];
    $total_bayar = $_POST['total_bayar'];
    $status = $_POST['status'];
    $tglstatus = $_POST['tglstatus'];
    $nominalstatus = $_POST['nominalstatus'];
    $bank = $_POST['bank'];
    $check_sms_resi = $_POST['check_sms'];
    if(isset($check_sms_resi)){
        $check_sms_resi = 1;
    }else{
        $check_sms_resi = 0;
    }
    $nomorresi = $_POST['nomorresi'];
    $sql = mysqli_query($procurement,"
	update
		orders
	SET
			cs = '$cs',
			pengirim = '$dari',
			tanggal = '$tgl',
			note = '$note',
			status_print = '$printlabel',
			expedisi = '$kurir',
			paket = '$paket_kurir',
			berat = '$berat',
			ongkir = '$biayakirim',
			asuransi = '$asuransi',
			keterangan = '$keteranganbiayalain',
			nominal = '$nominalbiayalain',
			diskon = '$total_kurang',
			total_order = '$total_bayar',
			status_bayar = '$status',
			tanggal_bayar = '$tglstatus',
			nominal_bayar = '$nominalstatus',
			sisa_bayar = '$sisabayar',
			bank = '$bank',
			no_resi = '$nomorresi',
			status_resi = '$check_sms_resi',
			toko = '$toko',
			created_by = '$created_by',
			created_date = '$created_date'
	  where
	        inv = '$inv'
	") or die(mysqli_error($procurement));
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>order"
    </script>
    <?
}
if(isset($_POST['simpan-bank'])){
    $rekening = $_POST['rekening'];
    $nama = $_POST['nama'];
    $bank = $_POST['bank'];
    mysqli_query($procurement,"
    INSERT INTO
        bank
    set
        rekening = '$rekening',
        nama = '$nama',
        bank = '$bank',
        created_by = '$created_by',
        created_date = '$created_date',
        toko = '$toko'
    ") or die(mysqli_error($procurement));
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>bank"
    </script>
    <?
}
if(isset($_POST['perbarui-bank'])){
    $id = $_POST['id'];
    $rekening = $_POST['rekening'];
    $nama = $_POST['nama'];
    $bank = $_POST['bank'];
    mysqli_query($procurement,"
    UPDATE
        bank
    set
        rekening = '$rekening',
        nama = '$nama',
        bank = '$bank'
    where 
        id = '$id'  
    ") or die(mysqli_error($procurement));
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>bank"
    </script>
    <?
}
if(isset($_POST['simpan-kategori-produk'])){
    $kategori = $_POST['kategoriproduk'];
    mysqli_query($procurement,"
    insert into 
        kategori_produk
    set
        kategori = '$kategori',
        created_by = '$created_by',
        created_date = '$created_date',
        toko = '$toko'
");
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>kategori-produk"
    </script>
    <?
}
if(isset($_POST['perbarui-kategori-produk'])){
    $id = $_POST['id'];
    $kategori = $_POST['kategoriproduk'];
    mysqli_query($procurement,"
    update 
        kategori_produk
    set
        kategori = '$kategori',
        created_by = '$created_by',
        created_date = '$created_date',
        toko = '$toko'
    where
        id = '$id'
");
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>kategori-produk"
    </script>
    <?
}
if(isset($_POST['simpan-sanksikaryawan'])){
    $karyawan = $_POST['karyawan'];
    $getpunishment = $_POST['punishment'];
    $explodepunishment = explode("-",$getpunishment);
    $punishment = $explodepunishment[0];
    $nominal = $_POST['nominal'];
    $waktu = $_POST['waktu'];
    mysqli_query($procurement,"
    insert into
          sanksi
    set
          karyawan = '$karyawan',
          punishment = '$punishment',
          nominal = '$nominal',
          waktu = '$waktu',
          created_by = '$created_by',
          created_date = '$created_date',
          toko = '$toko'
    ");
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>sanksi"
    </script>
    <?
}
if(isset($_POST['perbarui-sanksikaryawan'])){
    $id = $_POST['id'];
    $karyawan = $_POST['karyawan'];
    $punishment = $_POST['punishment'];
    $nominal = $_POST['nominal'];
    $waktu = $_POST['waktu'];
    mysqli_query($procurement,"
    update
          sanksi
    set
          karyawan = '$karyawan',
          punishment = '$punishment',
          nominal = '$nominal',
          waktu = '$waktu'
    where
          id = '$id'
    ");
    ?>
    <script type="text/javascript">
        window.location = "<?=$url?>sanksi"
    </script>
    <?
}
// END ORDER