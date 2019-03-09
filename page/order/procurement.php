<?
if(isset($_SESSION['token_procurement'])){
    if(isset($_GET['hal']))
    {
        $aksi=@$_GET['hal'];
        switch($aksi){
            case 'onhold':
                require_once('page/order/onhold.php');
                break;
            case 'canceled':
                require_once('page/order/canceled.php');
                break;
            case 'jemput':
                require_once('page/order/jemput.php');
                break;
            case 'tambah':
                require_once('page/order/tambah.php');
                break;
            case 'perbarui':
                require_once ('page/order/perbarui.php');
                break;
            case 'cetak':
                require_once ('page/order/print.php');
            break;
            default:
                // echo "<script>window.location.href='../error/error.html'</script>";
        }
    }else{
        ?>
        <!-- BEGIN PAGE BASE CONTENT -->
		<?
		/*
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 bordered">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="7800">0</span>
                                <small class="font-green-sharp">$</small>
                            </h3>
                            <small>ORDER HARI INI</small>
                        </div>
                        <div class="icon">
                            <i class="icon-pie-chart"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
					<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
						<span class="sr-only">76% progress</span>
					</span>
                        </div>
                        <div class="status">
                            <div class="status-title"> progress </div>
                            <div class="status-number"> 76% </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 bordered">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-red-haze">
                                <span data-counter="counterup" data-value="1349">0</span>
                            </h3>
                            <small>BELUM DIPROSES</small>
                        </div>
                        <div class="icon">
                            <i class="icon-like"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
					<span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
						<span class="sr-only">85% change</span>
					</span>
                        </div>
                        <div class="status">
                            <div class="status-title"> change </div>
                            <div class="status-number"> 85% </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 bordered">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" data-value="567"></span>
                            </h3>
                            <small>PRODUK TERJUAL</small>
                        </div>
                        <div class="icon">
                            <i class="icon-basket"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
					<span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
						<span class="sr-only">45% grow</span>
					</span>
                        </div>
                        <div class="status">
                            <div class="status-title"> grow </div>
                            <div class="status-number"> 45% </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 bordered">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-purple-soft">
                                <span data-counter="counterup" data-value="276"></span>
                            </h3>
                            <small>GROSS PROFIT</small>
                        </div>
                        <div class="icon">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
					<span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
						<span class="sr-only">56% change</span>
					</span>
                        </div>
                        <div class="status">
                            <div class="status-title"> change </div>
                            <div class="status-number"> 57% </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		*/
		?>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-screen-desktop font-dark"></i>
                            <span class="caption-subject bold uppercase">Order</span>
                        </div>
                        <div class="tools" style="padding-bottom:50px">
							<?
							if($level<3){
							?>
                            <button onclick="window.location.href='<?=$url?>order/tambah'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data Order"><i class="fa fa-plus"></i></button>
							<?
							}
							?>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>Pemesan</th>
                                <th>Kepada</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Tagihan</th>
                                <th>Status Tagihan</th>
                                <th>Status Transaksi</th>
                                <th>Expedisi</th>
                                <th>No Resi</th>
								<?
								if($level<3){
								?>
                                <th></th>
								<?
								}
								?>
                            </tr>
                            </thead>
                            <tbody>
                            <?
							if($level==4){
								$sql_order = mysqli_query($procurement,"SELECT * FROM v_order WHERE toko ='$toko' AND cs='$token'");
							}else{
								$sql_order = mysqli_query($procurement,"SELECT * FROM v_order WHERE toko ='$toko'");
							}
                            while($data_order = mysqli_fetch_array($sql_order)){
                                $kepada = $data_order['kepada'];
                                $sql_kepada = mysqli_query($procurement,"SELECT * FROM customer WHERE id = '$kepada' AND toko ='$toko'");
                                $data_kepada = mysqli_fetch_array($sql_kepada);
                                ?>
                                <tr>
                                    <td><?= $data_order['nama_pemesan'] ?></td>
                                    <td><?= $data_kepada['nama']; ?></td>
                                    <td><?= TanggalIndo($data_order['tanggal_order'])?></td>
                                    <td <?php if($data_order['sisa_bayar'] == 0){echo "style='color:green'";}else{echo "style='color:yellow'";} ?>><?=$data_order['sisa_bayar']?></td>
                                    <td><?= $data_order['st_bayar'] ?></td>
                                    <td><?= $data_order['st_resi']?></td>
                                    <td><?=$data_order['ekspedisi_order']?></td>
                                    <td><?= $data_order['resi']; ?></td>
									<?
									if($level<3){
									?>
                                    <td>
                                        <button onclick="window.location.href='<?=$url?>order/cetak/<?=$data_order['inv']?>'" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Print Invoice <?= $data_order['inv']; ?>"><i class="icon-printer"></i></button>
                                        <button onclick="window.location.href='<?=$url?>order/perbarui/<?=$data_order['inv']?>'" class="btn yellow tooltips" data-container="body" data-placement="top" data-original-title="Perbarui Invoice <?= $data_order['inv']; ?>"><i class="icon-note"></i></button>
                                        <button onclick="window.location.href='<?=$url?>order/hapus-order/<?=$data_order['inv']?>'" class="btn red tooltips" data-container="body" data-placement="top" data-original-title="Hapus Invoice <?= $data_order['inv']; ?>"><i class="icon-trash"></i></button>
                                    </td>
									<?
									}
									?>
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
        <?
    }
}else{
    echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>