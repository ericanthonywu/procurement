<?
if(isset($_SESSION['token_procurement'])){
    $toko = $_SESSION['token_toko'];
    $query_kode=mysqli_query($procurement,"SELECT inv FROM orders ORDER BY id DESC LIMIT 1");
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
    if($query_kode === FALSE) {
        die(mysqli_error($procurement)); // TODO: better error handling
    }
?>
<!-- BEGIN PAGE BASE CONTENT -->
    <style>
        .del:hover{
            color:red;
        }
    </style>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="icon-settings font-dark"></i>
					<span class="caption-subject bold uppercase">order</span>
				</div>
				<div class="tools">
					<button onclick="window.location.href='<?=$url?>order'" class="btn green">Kembali</button>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN FORM-->
				<form method="POST" class="horizontal-form">
                    <input type="hidden" name="inv" value="<?=$kode?>">
					<div class="form-body">
						<div class="row">
							<div class="col-md-4">
                                <div class="dashboard-stat2 bordered">
                                    <div class="form-group">
                                        <label class="control-label">Nama Pemesan</label>
                                        <select title="" name="pemesan" id="pilih_pemesan" class="form-control" required>
                                            <?
											$getSpesialis1 = mysqli_query($procurement,"
											SELECT
												*
											FROM
												customer
											WHERE
												toko = '$toko'
											");
											echo "<option value='' selected>Pilih Customer</option>";
											while($dtspesialis1 = mysqli_fetch_array($getSpesialis1)){
                                                echo "<option value='$dtspesialis1[kota]-$dtspesialis1[id]'>$dtspesialis1[nama] | $dtspesialis1[alamat]</option>";
											}
											?>
                                        </select>
                                    </div>
                                <!--/span-->
                                    <div class="form-group">
                                        <label class="control-label"> Customer </label>
                                        <select title="" name="cs" id="pilih_CS" class="form-control">
                                            <?php
                                            $sql_customer = mysqli_query($procurement,"select * from auth WHERE toko ='$toko' AND lv='4'")or die(mysqli_error());
                                            echo "<option value='' selected>Pilih CS</option>";
                                            while($re_customer = mysqli_fetch_array($sql_customer)){
                                                echo "<option value='$re_customer[username]'>$re_customer[nama]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Dikirim Kepada</label>
                                        <select name="kepada" id="pilih_kepada" class="form-control" required>
                                            <?
											$getSpesialis2 = mysqli_query($procurement,"
											SELECT
												*
											FROM
												customer
											WHERE
												toko = '$toko'
											");
											echo "<option value='' SELECTED>Pilih Customer</option>";
											while($dtspesialis2 = mysqli_fetch_array($getSpesialis2)){
												echo "<option value='$dtspesialis2[kota]-$dtspesialis2[id]'>$dtspesialis2[nama] | $dtspesialis2[alamat]</option>";
											}
											?>
                                        </select>
                                    </div>
                                <!--/span-->
                                    <div class="form-group">
                                        <label class="control-label">Pengiriman Dari</label>
                                        <select name="supplier" id="pilih_dari" class="form-control" required>
                                            <?
											$getSpesialis3 = mysqli_query($procurement,"
											SELECT
												*
											FROM
												supplier
											WHERE
												toko = '$toko'
											");
											echo "<option value='' SELECTED>Pilih Supplier</option>";
											while($dtspesialis3 = mysqli_fetch_array($getSpesialis3)){
												echo "<option value='$dtspesialis3[asal]-$dtspesialis3[id]'>$dtspesialis3[nama] | $dtspesialis3[alamat]</option>";
											}
											?>
                                        </select>
                                    </div>
                                    <div class="form-group">
									<label class="control-label">Tanggal Order</label>
									<input type="date" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" title="" class="form-control" name="tgl" required>
								    </div>
                                </div>
                                <div class="dashboard-stat2 bordered">
                                    <div class="form-group">
                                        <label class="control-label">Note</label>
                                        <textarea class="form-control" name="note" id="note" title=""></textarea>
                                        <span class="help-block small">Masukkan catatan jika ada</span>
                                        <br>
                                        <span class="pull-left">
                                            <input title="" type="checkbox" name="printlabel" value="printlabel">  Add to print label
                                        </span>
                                    </div>
                                </div>
						    </div>
						<!--/row-->
						<div class="row">
							<div class="col-md-7">
                                <div class="dashboard-stat2 bordered">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Produk</h3>
                                        </div>
                                    </div>
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label">Produk</label>
                                            <select title="" name="produk" id="pilih_barang" class="form-control produk" required>
                                               <?
												$getSpesialis4 = mysqli_query($procurement,"
												SELECT
													*
												FROM
													produk
												WHERE
													toko = '$toko'
												");
												echo "<option SELECTED>Pilih Produk</option>";
												while($dtspesialis4 = mysqli_fetch_array($getSpesialis4)){
													echo "<option value='$dtspesialis4[id]-$dtspesialis4[jenis]-$dtspesialis4[harga_beli]-$dtspesialis4[harga_jual_normal]-$dtspesialis4[stock]'>$dtspesialis4[nama]</option>";
												}
												?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label">Diskon</label>
                                            <input title="" type="text" min="0" max="100" class="form-control" name="diskon" id="diskonn regexnumber">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label">Jumlah</label>
                                            <input title="" type="text" min="0" class="form-control" name="jumlah" id="jumlahh regexnumber">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label">&nbsp;</label>
                                            <span style="text-align: center;cursor: pointer" class="button btn-primary form-control tambahproduk"> Tambah </span>
                                        </div>
                                    </div>
								</div>
                                    <div class="table-responsive">
                                        <table class="table satu" id="table">
                                            <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="25%">Nama Produk</th>
                                                <th width="20%">Harga</th>
                                                <th width="10%;">Diskon</th>
                                                <th width="10%">Jumlah</th>
                                                <th width="20%">Total</th>
                                                <th width="10%;"></th>
                                            </tr>
                                            </thead>
                                            <tbody id="tblproduk">
                                            <?php
                                            $sqlproduk = mysqli_query($procurement,"select * from detail_order where inv = '$kode'");
                                            $numproduk = mysqli_num_rows($sqlproduk);
                                            if($numproduk > 0) {
												$no=0;
                                                while($reproduk = mysqli_fetch_array($sqlproduk)) {
													$no++;
                                                    $id = $reproduk['id'];
                                                    $inv = $reproduk['inv'];
                                                    $harga = $reproduk['harga'];
                                                    $produkmuncul = $reproduk['produk'];
                                                    $sql_cekproduk = mysqli_query($procurement,"select * from produk where id = '$produkmuncul'");
                                                    $re_cekproduk = mysqli_fetch_array($sql_cekproduk);
                                                    $produk = $re_cekproduk['nama'];
                                                    $diskon = $reproduk['diskon'];
                                                    $hargamuncul = $reproduk['harga'];
                                                    $jumlah = $reproduk['jumlah'];
                                                    $subtotal = $reproduk['subtotal'];
                                                    ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $produk ?></td>
                                                        <td><?=number_format((int)$harga) ?></td>
                                                        <td><?=$diskon?></td>
                                                        <td><?=number_format((int)$jumlah)?></td>
                                                        <td><?=number_format((int)$subtotal) ?></td>
                                                        <td><button onclick="window.location.href='<?=$url?>order/hapus-detail-order/<?=$id?>'" class="btn red tooltips" data-id="<?=$id?>" data-container="body" data-placement="top" data-original-title="Hapus Data"><i class="icon-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }else {
                                                echo "";
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr id="subdantotal">
                                                <td width="60%" colspan="3"><strong>Subtotal</strong></td>
                                                <td width="10%"><p id="totalqty" style="font-weight:700;text-align:center;">
                                                        <?php
                                                             $sql_sub = mysqli_query($procurement,"select
																sum(jumlah) as subtotal,
																sum(harga_beli) as total_harga_asli,
																sum(subtotal) as total
															from
																detail_order
															where
																inv = '$kode'");
															$re_sub = mysqli_fetch_array($sql_sub);
                                                            echo $re_sub['subtotal'];
                                                        ?>
                                                        <input type="hidden" name="subtotal" id="subtotal" value="<?=$re_sub['subtotal']?>">
														<input type="hidden" name="total_harga_asli" id="total_harga_asli" value="<?=$re_sub['total_harga_asli']?>">
                                                    </p></td>
                                                <td width="30%">
                                                    <p style="font-weight:700;">Rp<span id="totalharga"> <?php
                                                        echo number_format($re_sub['total']);
                                                        ?></span></p>
                                                    <input type="hidden" name="totalPrice" id="totalPrice" value="<?=$re_sub['total']?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%" colspan="0"><strong>Diskon Order</strong></td>
                                                <td width="80%" colspan="4">
                                                    <div class="form-inline">
                                                        <select title="" style="width:80px;margin-bottom:10px;" name="pil_diskon" class="form-control" id="pil_diskon">
                                                            <option value="rp" selected>Rp</option>
                                                            <option value="%">%</option>
                                                        </select>
                                                        <div style="width: 80px; margin-bottom: 10px;" class="form-group div_rupiah">
                                                            <input title="" type="text" id="rupiah" name="rupiah" class="form-control" value="0" style="display: inline-block;" required=" regexnumber">
                                                        </div>
                                                            <div style="width: 80px; margin-bottom: 10px;" class="form-group div_persen">
                                                                <input title="" type="text" placeholder="%" id="persen" name="persen" class="form-control" value="" style="display: inline-block;">
                                                            </div>
                                                            <div style="margin-bottom:10px;" class="form-group div_persen">
                                                                <input title="" type="text" id="diskon" name="diskon" class="form-control" readonly value="0">
                                                            </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody></table>
                                    </div>
								<div class="form-group" style="background-color: #F4F3EF">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label">Expedisi</label>
                                            <select name="pilih_kurir" id="pilih_kurir" title="" class="form-control">
                                                <option value="jne">JNE</option>
                                                <option value="pos">POS</option>
                                                <option value="tiki">TIKI</option>
                                                <option value="sicepat">SICEPAT</option>
                                                <option value="wahana">WAHANA</option>
                                                <option value="jnt">J&T Express</option>
                                                <option value="cod">COD</option>
                                                <option value="manual">Input Manual</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 expedsi">
                                            <label class="control-label">Paket</label>
                                            <select title="" name="paket" id="pilih_paket" class="form-control pilih_paket">
                                            </select>
                                            <input type="text" name="paket_manual" class="form-control" title="" id="paket_manual" style="display: none">
                                        </div>
                                        <div class="col-md-3">
                                                <label class="control-label">Berat</label>
                                            <div class="input-group">
                                                <?php
                                                $totalberat = 0;
                                                $sqlmuncul = mysqli_query($procurement,"select * from detail_order where inv = '$kode'");
                                                while($reproduk = mysqli_fetch_array($sqlmuncul)) {
                                                    $produkmuncul = $reproduk['produk'];
													$jumlah = $reproduk['jumlah'];
                                                    $sql_cekproduk = mysqli_query($procurement,"select * from produk where id = '$produkmuncul'");
                                                    $re_cekproduk = mysqli_fetch_array($sql_cekproduk);
                                                    $produk = $re_cekproduk['nama'];
                                                    $berat = $re_cekproduk['berat'];
                                                    $totalberat = (int)$totalberat+(int)$berat*(int)$jumlah;
                                                }
                                                ?>
                                                <input type="text" value="<?=$totalberat?>" id="berat" name="berat" readonly title="" class="form-control regexnumber"><div style="border-left: none" class="input-group-addon">Kg</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label">Biaya Kirim</label>
                                            <div class="input-group">
                                                <div class="input-group-addon" style="border-right: none">Rp</div><input type="text" id="biayakirim" value="0" name="biayakirim" title="" readonly class="form-control regexnumber">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="control-label">Asuransi</label>
                                            <label class="switch">
                                                <input type="checkbox" id="asuransi" name="asuransi">
                                                <span class="slider round" style="height: 100%; width: 100%;"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3 asuransi" style="display: none">
                                            <label class="control-label">Nominal</label>
                                            <div class="input-group">
                                                <div class="input-group-addon" style="border-right: none"> Rp </div>
                                                <input type="text" min="0" id="txtasuransi" name="nominalasuransi" title="" class="form-control regexnumber">
                                            </div>
                                        </div>
                                        <div class="col-md-3 asuransikosong">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label">Biaya Lain</label>
                                            <label class="switch">
                                                <input type="checkbox" id="biayalain" name="biayalain">
                                                <span class="slider round" style="height: 100%; width: 100%;"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3 biayalainkosong">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-3 biayalain" style="display: none;">
                                            <label class="control-label">Keterangan</label>
                                            <textarea name="keterangan" title="" class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-2 biayalain" style="display: none;">
                                            <label class="control-label">Nominal</label>
                                            <input type="text" min="0" id="txtbiayalain" name="nominalbiayalain" title="" class="form-control regexnumber">
                                        </div>
                                    </div>
								</div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="text-primary" style="margin:30px 0 0;">Total Bayar</h4>
                                            <p style="font-size: 40px"><sup>Rp</sup>
                                                <font id="totalbayar" class="total_bayar">
                                                    <?=number_format($re_sub['total']);?>
                                                </font>
                                            </p>
                                            <font>
                                                <input type="hidden" id="txttotalbayar" name="total_bayar" value="<?=$re_sub['total'];?>">
                                            </font></div>
                                    </div>
							</div>
                                <div class="dashboard-stat2 bordered">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Pembayaran</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="statuss"> Status Bayar</label>
                                                <select class="form-control" id="statuss" name="status" title="">
                                                    <option value="2" selected>Cicilan</option>
                                                    <option value="3">Sudah Bayar (lunas)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 tanggal">
                                            <div class="form-group">
                                                <label class="control-label">Tanggal </label>
                                                <input type="date" name="tglstatus" class="form-control" title="" max="<?=date('Y-m-d')?>" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>">
                                                <span class="help-block small">Tanggal customer melakukan transfer</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 nominal">
                                            <div class="form-group">
                                                <label class="control-label">Nominal</label>
                                                <input type="text" class="form-control" name="nominalstatus" title="">
                                                <span class="help-block small">Nominal Cicilan</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 bank">
                                            <div class="form-group">
                                                <label class="control-label">Bank Pembayaran</label>
                                                <select class="form-control" name="bank" title="">
                                                    <option>Pilih Bank</option>
                                                    <?php
                                                    $sql_bank = mysqli_query($procurement,"select * from bank where toko = '$toko'");
                                                    while($re_bank = mysqli_fetch_array($sql_bank)){
                                                        $id = $re_bank['id'];
                                                        $bank = $re_bank['bank'];
                                                        $rekening = $re_bank['rekening'];
                                                        echo "<option value='".$id."'>".$rekening."-".$bank."</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-stat2 bordered shipping" style="display: none">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><b>Shipping</b></h3>
                                            <span class="pull-right" style="margin: -20px">
                                                <input title="" type="checkbox" value="sms" name="check_sms" checked="">&nbsp;SMS Resi&nbsp;&nbsp;&nbsp;
                                            </span>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
												<?php
												// $style = '';
												$style="";
												$sql_produk = mysqli_query($procurement,"select * from detail_order where inv = '$kode'");
												while($reproduk = mysqli_fetch_array($sql_produk)) {
													// $reproduk['jenis'] = 1;
													if($reproduk['jenis'] == 1){
														$style="style='display:none'";
													}
													elseif($reproduk['jenis'] == 2){
														$style="";
													}
												}
												?>
                                                <div class="col-md-6" <?=$style?>>
                                                    <div class="form-group">
                                                        <label class="control-label">Harga Setor Ke Supplier</label>
                                                        <input title="" type="text" id="harga_supplier" name="harga_supplier" class="form-control">
                                                        <label class="help-block small"></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Nomor Resi</label>
                                                        <input title="" type="text" name="nomorresi" class="form-control">
                                                        <label class="help-block small">Masukkan No.Resi jika sudah tersedia</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						</div>
					</div>
					<div class="form-actions right">
						<button type="reset" class="btn default">Cancel</button>
						<button name="simpan-order" class="btn blue">
							<i class="fa fa-check"></i>Save
                        </button>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
<!-- END PAGE BASE CONTENT -->
<?
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>