<?
if(isset($_SESSION['token_procurement'])){
	if(isset($_GET['hal']))
	{
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/produk/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/produk/perbarui.php');
		  break;
		  default:
		  // echo "<script>window.location.href='../error/error.html'</script>";
	  }
	}else{
?>
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<span class="caption-subject bold uppercase">Produk</span>
				</div>
				<div class="tools" style="padding-bottom:50px">
					<button onclick="window.location.href='<?=$url?>produk/tambah'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data Produk"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>Nama Produk</th>
							<th>Inventori</th>
							<th>Harga Jual</th>
							<th>Grosir</th>
							<th>Stok</th>
							<th>Kategori</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?
						$sql_cust = mysqli_query($procurement,"SELECT * FROM produk where toko = '$toko'");
						while($data_cust = mysqli_fetch_array($sql_cust)){
						    $getkategori = $data_cust['kategori'];
						    $sql_kategori = mysqli_query($procurement,"select * from kategori_produk where toko= '$toko' and id='$getkategori'");
						    $re_kategori = mysqli_fetch_array($sql_kategori);
						    $kategori = $re_kategori['kategori'];
						    $getjenis = $data_cust['jenis'];
						    $sql_jenis = mysqli_query($procurement,"select * from jenis_produk where toko = '$toko' and id='$getjenis'");
						    $re_jenis = mysqli_fetch_array($sql_jenis);
						    $jenis = $re_jenis['jenis'];
						?>
						<tr>
							<td><?=$data_cust['nama']?></td>
							<td><?=$jenis?></td>
							<td><?=$data_cust['harga_jual_normal']?></td>
							<td><?php if($data_cust['st_grosir']){echo "Ya";}else{echo "Tidak";}?></td>
							<td><?=$data_cust['stock']?></td>
							<td><?=$kategori?></td>
							<td>
								<button onclick="window.location.href='<?=$url?>produk/perbarui/<?=$data_cust['id']?>'" class="btn yellow tooltips" data-container="body" data-placement="top" data-original-title="Perbarui Produk <?=$data_cust['nama']?>"><i class="icon-note"></i></button>
                                <button onclick="window.location.href='<?=$url?>produk/hapus-produk/<?=$data_cust['id']?>'" class="btn red tooltips" data-container="body" data-placement="top" data-original-title="Hapus Produk <?=$data_cust['nama']?>"><i class="icon-trash"></i></button>
						</tr>
						<?
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
<!-- END PAGE BASE CONTENT -->
<?
	}
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>