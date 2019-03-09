<?
session_start();
if(isset($_SESSION['token_procurement'])) {
	$token = $_SESSION['token_procurement'];
	$toko = $_SESSION['token_toko'];
	$created_date = date("Y-m-d");
    require_once('../class/connection.php');
    //muncul
    $query_kode=mysqli_query($procurement,"SELECT inv FROM orders ORDER BY id DESC LIMIT 1")or die(mysqli_error($procurement));
    $num_urut_kode = mysqli_num_rows($query_kode);
    $data_urut_kode = mysqli_fetch_array($query_kode);
    $thn=date('y');
    $bln=date('m');
    $awal_kode = substr($data_urut_kode['inv'],0-4);
    $next_kode = (int)$awal_kode + 1;
    $jnim_kode = strlen($next_kode);
    if (!$data_urut_kode['inv']){
        $no_kode = "0001";
    }
    elseif($jnim_kode == 1){
        $no_kode = "000";
    }
    elseif($jnim_kode == 2){
        $no_kode = "00";
    }
    elseif($jnim_kode == 3){
        $no_kode = "00";
    }
    elseif($jnim_kode == 4){
        $no_kode = "0";
    }
    if ($num_urut_kode == 0){
        $kode = "PO-".$thn.$bln.$no_kode;
    }
    else{
        $kode = "PO-".$thn.$bln.$no_kode.$next_kode;
    }
    if($query_kode == FALSE) {
        die(mysqli_error($procurement)); // TODO: better error handling
    }
	
    //insert
	if(isset($_POST['ajax'])){
	// $hargamati=0;
	// $subtotal=0;
    $prdk = $_POST['produk'];
	$explode = explode("-",$prdk);
	$idproduknya = $explode[0];
	$jenisproduknya = $explode[1];
	$hbproduknya = $explode[2];
	$hjproduknya = $explode[3];
	$stproduknya = $explode[4];

	$diskon_inserta = $_POST['diskon'];
	$diskon_insert = (int)$diskon_inserta;
    $jumlah_insert = $_POST['jumlah'];
    
	// $harga_beli = $hbproduknya* $jumlah_insert;
	$harga_beli = $hbproduknya;
	
	$sql_detail_order = mysqli_query($procurement,"select * from detail_order where inv = '$kode'")or die(mysqli_error($procurement));
	$cek_data_order = mysqli_num_rows($sql_detail_order);
	
	if($cek_data_order>0){
		$sql_cek_jenis = mysqli_query($procurement,"SELECT * FROM detail_order WHERE inv='$kode' AND jenis!='$jenisproduknya'")or die(mysqli_error($procurement));
		$cek_jenis = mysqli_num_rows($sql_cek_jenis);
		if($cek_jenis>0){
			$_SESSION['jenis_beda']=0;
		}else{
			if($jenisproduknya==1){
				$hargamati = $hjproduknya;
				$subtotal = (int)$hargamati*(int)$jumlah_insert -(((int)$diskon_insert/100) * (int)$hargamati);
				$sqldetail_order = mysqli_query($procurement,"select * from detail_order where inv = '$kode' AND produk ='$idproduknya'")or die(mysqli_error($procurement));
				$num_detail_order = mysqli_num_rows($sqldetail_order);
				if($num_detail_order > 0){
					if($jumlah_insert>$stproduknya){
						$_SESSION['stok']=0;
					}else{
						mysqli_query($procurement,"UPDATE detail_order set harga = '$hargamati', jumlah = jumlah+$jumlah_insert, diskon = '$diskon_insert', subtotal = '$subtotal' WHERE inv='$kode' AND produk='$idproduknya' ")or die(mysqli_error($procurement));
					}
				}else{
					if($jumlah_insert > $stproduknya){
						$_SESSION['stok']=0;
					}else{
					    mysqli_query($procurement,"insert into detail_order set inv = '$kode', jenis='$jenisproduknya',harga_beli='$harga_beli',produk = '$idproduknya', harga = '$hargamati', jumlah = '$jumlah_insert', diskon = '$diskon_insert', subtotal = '$subtotal',created_by='$token',created_date='$created_date',toko='$toko' ")or die(mysqli_error($procurement));
					}
				}
			}else{
				$hargamati = $hjproduknya;
				// $hargamati = $hjproduknya * $jumlah_insert;
				$subtotal = (int)$hargamati*(int)$jumlah_insert -(((int)$diskon_insert/100) * (int)$hargamati);
				$sqldetail_order = mysqli_query($procurement,"select * from detail_order where inv = '$kode' AND produk ='$idproduknya'")or die(mysqli_error($procurement));
				$num_detail_order = mysqli_num_rows($sqldetail_order);
				if($num_detail_order > 0){
					mysqli_query($procurement,"UPDATE detail_order set harga = '$hargamati', jumlah = jumlah+$jumlah_insert, diskon = '$diskon_insert', subtotal = '$subtotal' WHERE inv='$kode' AND produk='$idproduknya' ")or die(mysqli_error($procurement));
				}else{
					mysqli_query($procurement,"insert into detail_order set inv = '$kode', jenis='$jenisproduknya',harga_beli='$harga_beli',produk = '$idproduknya', harga = '$hargamati', jumlah = '$jumlah_insert', diskon = '$diskon_insert', subtotal = '$subtotal',created_by='$token',created_date='$created_date',toko='$toko' ")or die(mysqli_error($procurement));
				}
			}
		}
	}else{
		if($jenisproduknya==1){
			$hargamati = $hjproduknya;
			$subtotal = (int)$hargamati*(int)$jumlah_insert -(((int)$diskon_insert/100) * (int)$hargamati);
			$sqldetail_order = mysqli_query($procurement,"select * from detail_order where inv = '$kode' AND produk ='$idproduknya'")or die(mysqli_error($procurement));
			$num_detail_order = mysqli_num_rows($sqldetail_order);
			if($num_detail_order > 0){
				if($jumlah_insert>$stproduknya){
					$_SESSION['stok']=0;
				}else{
					mysqli_query($procurement,"UPDATE detail_order set jenis='$jenisproduknya',harga = '$hargamati', jumlah = jumlah+$jumlah_insert, diskon = '$diskon_insert', subtotal = '$subtotal' WHERE inv='$kode' AND produk='$idproduknya' ")or die(mysqli_error($procurement));
				}
			}else{
				if($jumlah_insert>$stproduknya){
					$_SESSION['stok']=0;
				}else{
					mysqli_query($procurement,"insert into detail_order set inv = '$kode', jenis='$jenisproduknya',harga_beli='$harga_beli',produk = '$idproduknya', harga = '$hargamati', jumlah = '$jumlah_insert', diskon = '$diskon_insert', subtotal = '$subtotal',created_by='$token',created_date='$created_date',toko='$toko' ")or die(mysqli_error($procurement));
				}
			}
		}else{
			// $hargamati = $hjproduknya * $jumlah_insert;
			$hargamati = $hjproduknya;
			$subtotal = (int)$hargamati*(int)$jumlah_insert -(((int)$diskon_insert/100) * (int)$hargamati);
			$sqldetail_order = mysqli_query($procurement,"select * from detail_order where inv = '$kode' AND produk ='$idproduknya'")or die(mysqli_error($procurement));
			$num_detail_order = mysqli_num_rows($sqldetail_order);
			if($num_detail_order > 0){
				mysqli_query($procurement,"UPDATE detail_order set harga = '$hargamati',jenis='$jenisproduknya', jumlah = jumlah+$jumlah_insert, diskon = '$diskon_insert', subtotal = '$subtotal' WHERE inv='$kode' AND produk='$idproduknya' ")or die(mysqli_error($procurement));
			}else{
				mysqli_query($procurement,"insert into detail_order set inv = '$kode', jenis='$jenisproduknya',harga_beli='$harga_beli',produk = '$idproduknya', harga = '$hargamati', jumlah = '$jumlah_insert', diskon = '$diskon_insert', subtotal = '$subtotal',created_by='$token',created_date='$created_date',toko='$toko' ")or die(mysqli_error($procurement));
				
			}
		}
	}
		$no=0;
		$jumlah_produk = 0;
		$sub_total_produk = 0;
		$sql_detail_order = mysqli_query($procurement,"select * from detail_order where inv = '$kode'")or die(mysqli_error($procurement));
		while($data_detail_order = mysqli_fetch_array($sql_detail_order)){
			$id_produknya = $data_detail_order['produk'];
			$harga_produk = $data_detail_order['harga'];
			$diskon_produk = $data_detail_order['diskon'];
			$jumlah_produk = (int)$jumlah_produk+(int)$data_detail_order['jumlah'];
			$sub_total_produk = (int)$sub_total_produk+(int)$data_detail_order['subtotal'];
			$sql_produk = mysqli_query($procurement,"SELECT * FROM produk WHERE id = '$id_produknya'")or die(mysqli_error($procurement));
			$data_produk = mysqli_fetch_array($sql_produk);
			$nama_produk = $data_produk['nama'];
			$no++;
			?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $nama_produk ?></td>
				<td><?= $harga_produk ?></td>
				<td><?=$diskon_produk?></td>
				<td><?=$jumlah_produk?></td>
				<td><?= $sub_total_produk ?></td>
				<td><button onclick="window.location.href='<?=$url?>order/hapus-detail-order/<?=$idproduknya?>'" class="btn red tooltips" data-id="<?=$id?>" data-container="body" data-placement="top" data-original-title="Hapus Data"><i class="icon-trash"></i></button>
				</td>
			</tr>
			<?
		}
	}else{
		$no=0;
		$jumlah_produk = 0;
		$sub_total_produk = 0;
		$sql_detail_order = mysqli_query($procurement,"select * from detail_order where inv = '$kode'")or die(mysqli_error($procurement));
		while($data_detail_order = mysqli_fetch_array($sql_detail_order)){
			$id_produknya = $data_detail_order['produk'];
			$harga_produk = $data_detail_order['harga'];
			$diskon_produk = $data_detail_order['diskon'];
			$jumlah_produk = (int)$jumlah_produk+(int)$data_detail_order['jumlah'];
			$sub_total_produk = (int)$sub_total_produk+(int)$data_detail_order['subtotal'];
			$sql_produk = mysqli_query($procurement,"SELECT * FROM produk WHERE id = '$id_produknya'")or die(mysqli_error($procurement));
			$data_produk = mysqli_fetch_array($sql_produk);
			$nama_produk = $data_produk['nama'];
			$no++;
			?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $nama_produk ?></td>
				<td><?= $harga_produk ?></td>
				<td><?=$diskon_produk?></td>
				<td><?=$jumlah_produk?></td>
				<td><?= $sub_total_produk ?></td>
				<td><button onclick="window.location.href='<?=$url?>//order/hapus-detail-order/<?=$id_produknya?>//'" class="btn red tooltips" data-id="<?=$id?>" data-container="body" data-placement="top" data-original-title="Hapus Data"><i class="icon-trash"></i></button>
				</td>
			</tr>
			<?
		}
	}
}
?>