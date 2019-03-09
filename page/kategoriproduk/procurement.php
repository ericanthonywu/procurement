<?
if(isset($_SESSION['token_procurement'])){
	if(isset($_GET['hal']))
	{
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/kategoriproduk/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/kategoriproduk/perbarui.php');
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
					<i class="icon-settings font-dark"></i>
					<span class="caption-subject bold uppercase">Kategori Produk</span>
				</div>
                <div class="tools" style="padding-bottom:50px">
                    <button onclick="window.location.href='<?=$url?>kategori-produk/tambah'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data bank"><i class="fa fa-plus"></i></button>
                </div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>Kategori</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
                    <?php
                    $toko = $_SESSION['token_toko'];
                    $sql_kategori = mysqli_query($procurement,"select * from kategori_produk where toko = '$toko'");
                    while($re_kategori = mysqli_fetch_array($sql_kategori)){
                        $kategori = $re_kategori['kategori'];
                        ?>
                        <tr>
                            <td><?=$kategori?></td>
                            <td>
                                <button onclick="window.location.href='<?=$url?>kategori-produk/perbarui/<?=$re_kategori['id']?>'" class="btn yellow tooltips" data-container="body" data-placement="top" data-original-title="Edit kategori produk <?=$re_kategori['kategori']?>"><i class="icon-note"></i></button>
                                <button onclick="window.location.href='<?=$url?>kategori-produk/hapus-kategori-produk/<?=$re_kategori['id']?>'" class="btn red tooltips" data-container="body" data-placement="top" data-original-title="Hapus kategori produk <?=$re_kategori['kategori']?>"><i class="icon-trash"></i></button>
                            </td>
                        </tr>
                        <?php
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