<?
if(isset($_SESSION['token_procurement'])){
$keyword = $_GET['order'];
$toko = $_SESSION['token_toko'];
$sql_datas = mysqli_query($procurement,"SELECT * FROM orders WHERE inv = '$keyword' AND toko = '$toko'");
while($perbarui_order = mysqli_fetch_array($sql_datas)){
    $inv = $perbarui_order['inv'];
?>
<!-- BEGIN PAGE BASE CONTENT -->
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
                        <input type="hidden" name="inv" value="<?=$perbarui_order['inv']?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="dashboard-stat2 bordered">
                                        <div class="form-group">
                                            <label class="control-label">Nama Pemesan</label>
                                            <select title="" name="pemesan" disabled id="pilih_pemesan" class="form-control" required>
                                                <?
                                                $getSpesialis1 = mysqli_query($procurement,"
											SELECT
												*
											FROM
												customer
											WHERE
												toko = '$toko'
											");
                                                while($dtspesialis1 = mysqli_fetch_array($getSpesialis1)){
                                                    $selected = "";
                                                    if($perbarui_order['pemesan'] == $dtspesialis1['nama']){
                                                        $selected = "selected";
                                                    }
                                                    echo "<option value='$dtspesialis1[kota]-$dtspesialis1[id]' $selected>$dtspesialis1[nama] | $dtspesialis1[alamat]</option>";
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
                                                    $selected = "";
                                                    if($re_customer['username'] == $perbarui_order['cs']){
                                                        $selected = "selected";
                                                    }
                                                    echo "<option value='$re_customer[username]' $selected>$re_customer[nama]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Dikirim Kepada</label>
                                            <select disabled name="kepada" id="pilih_kepada" class="form-control" required>
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
                                                    $selected = '';
                                                    if($dtspesialis2['id'] == $perbarui_order['kepada']) {
                                                        $selected = 'selected';
                                                    }
                                                    echo "<option value='$dtspesialis2[kota]-$dtspesialis2[id]' $selected>$dtspesialis2[nama] | $dtspesialis2[alamat]</option>";
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
                                                    $selected = '';
                                                    if($dtspesialis3['id'] == $perbarui_order['pengirim']) {
                                                        $selected = 'selected';
                                                    }
                                                    echo "<option value='$dtspesialis3[asal]-$dtspesialis3[id]' $selected>$dtspesialis3[nama] | $dtspesialis3[alamat]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tanggal Order</label>
                                            <input type="date" value="<?=$perbarui_order['tanggal']?>" title="" class="form-control" name="tgl" required>
                                        </div>
                                    </div>
                                    <div class="dashboard-stat2 bordered">
                                        <div class="form-group">
                                            <label class="control-label">Note</label>
                                            <textarea class="form-control" name="note" id="note" title=""><?=$perbarui_order['note']?></textarea>
                                            <span class="help-block small">Masukkan catatan jika ada</span>
                                            <br>
                                            <span class="pull-left">
                                            <input title="" type="checkbox" name="printlabel" value="printlabel" <?php if($perbarui_order['status_print'] == 1) echo "checked"?>>  Add to print label
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
                                                                echo "<option value='$dtspesialis4[id]'>$dtspesialis4[nama]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label">Diskon</label>
                                                        <input title="" type="number" min="0" max="100" class="form-control" name="diskon" id="diskonn">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label">Jumlah</label>
                                                        <input title="" type="number" min="0" class="form-control" name="jumlah" id="jumlahh">
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
                                                    $sqlproduk = mysqli_query($procurement,"select * from detail_order where inv = '$inv'");
                                                    $numproduk = mysqli_num_rows($sqlproduk);
                                                        while($reproduk = mysqli_fetch_array($sqlproduk)) {
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
                                                                <td><?= $id ?></td>
                                                                <td><?= $produk ?></td>
                                                                <td><?= $harga ?></td>
                                                                <td><?=$diskon?></td>
                                                                <td><?=$jumlah?></td>
                                                                <td><?= number_format($subtotal) ?></td>
                                                                <td><button onclick="window.location.href='<?=$url?>order/hapus-detail-order/<?=$id?>'" class="btn red tooltips" data-id="<?=$id?>" data-container="body" data-placement="top" data-original-title="Hapus Data"><i class="icon-trash"></i></button>
                                                                </td>
                                                            </tr>
                                                            <?php
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
                                                                $sql_sub = mysqli_query($procurement,"select sum(jumlah) as subtotal from detail_order where inv = '$inv'");
                                                                $re_sub = mysqli_fetch_array($sql_sub);
                                                                echo $re_sub['subtotal'];
                                                                ?>
                                                                <input type="hidden" name="subtotal" id="subtotal" value="<?=$re_sub['subtotal']?>">
                                                            </p></td>
                                                        <td width="30%">
                                                            <p style="font-weight:700;">Rp<span id="totalharga"> <?php
                                                                    $sql_total = mysqli_query($procurement,"select sum(subtotal) as total from detail_order where inv = '$inv'");
                                                                    $re_total = mysqli_fetch_array($sql_total);
                                                                    echo $re_total['total'];
                                                                    ?></span></p>
                                                            <input type="hidden" name="totalPrice" id="totalPrice" value="<?=$re_total['total']?>">
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
                                                                    <input title="" type="number" id="rupiah" name="rupiah" class="form-control" value="<?=$perbarui_order['diskon']?>" style="display: inline-block;" required="">
                                                                </div>
                                                                <div style="width: 80px; margin-bottom: 10px;" class="form-group div_persen">
                                                                    <input title="" type="text" placeholder="%" id="persen" name="persen" class="form-control" value="<?=floatval($perbarui_order['diskon']/$perbarui_order['total_order'])*100?>" style="display: inline-block;">
                                                                </div>
                                                                <div style="margin-bottom:10px;" class="form-group div_persen">
                                                                    <input title="" type="text" id="diskon" name="diskon" class="form-control"  readonly value="<?=$perbarui_order['diskon']?>">
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
                                                        <div class="input-group" id="bksberat">
                                                            <?php
                                                            $totalberat = 0;
                                                            $sqlmuncul = mysqli_query($procurement,"select * from detail_order where inv = '$inv'");
                                                            while($reproduk = mysqli_fetch_array($sqlmuncul)) {
                                                                $produkmuncul = $reproduk['produk'];
                                                                $sql_cekproduk = mysqli_query($procurement,"select * from produk where id = '$produkmuncul'");
                                                                $re_cekproduk = mysqli_fetch_array($sql_cekproduk);
                                                                $produk = $re_cekproduk['nama'];
                                                                $berat = $re_cekproduk['berat'];
                                                                $totalberat = $totalberat+$berat;
                                                            }
                                                            ?>
                                                            <input type="text" value="<?=$totalberat?>" id="berat" name="berat" readonly title="" class="form-control"><div style="border-left: none" class="input-group-addon">Kg</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label">Biaya Kirim</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon" style="border-right: none">Rp</div><input type="number" id="biayakirim" value="0" name="biayakirim" title="" readonly class="form-control">
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
                                                            <input type="checkbox" id="asuransi" name="asuransi" <?php if (!empty($perbarui_order['asuransi'])){echo "checked";}?>>
                                                            <span class="slider round" style="height: 100%; width: 100%;"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 asuransi" <?php if (empty($perbarui_order['asuransi'])){echo "style='display:none'";}?>>
                                                        <label class="control-label">Nominal</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon" style="border-right: none"> Rp </div>
                                                            <input type="text" min="0" value="<?=$perbarui_order['asuransi']?>" id="txtasuransi" name="nominalasuransi" title="" class="form-control regexnumber">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="control-label">Biaya Lain</label>
                                                        <label class="switch">
                                                            <input type="checkbox" id="biayalain" name="biayalain" <?php if (!empty($perbarui_order['keterangan']) && !empty($perbarui_order['nominal'])){echo "checked";}?>>
                                                            <span class="slider round" style="height: 100%; width: 100%;"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 biayalain" <?php if (empty($perbarui_order['keterangan']) && empty($perbarui_order['nominal'])){echo "style='display:none'";}?>>
                                                        <label class="control-label">Keterangan</label>
                                                        <textarea name="keterangan" title="" class="form-control"><?=$perbarui_order['keterangan']?></textarea>
                                                    </div>
                                                    <div class="col-md-2 biayalain" <?php if (empty($perbarui_order['keterangan']) && empty($perbarui_order['nominal'])){echo "style='display:none'";}?>>
                                                        <label class="control-label">Nominal</label>
                                                        <input type="number" min="0" id="txtbiayalain" value="<?=$perbarui_order['nominal']?>" name="nominalbiayalain" title="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-primary" style="margin:30px 0 0;">Total Bayar</h4>
                                                    <p style="font-size: 40px"><sup>Rp</sup>
                                                        <font class="total_bayar">
                                                            <?=$perbarui_order['total_order'];?>
                                                        </font>
                                                    </p>
                                                    <font>
                                                        <input type="hidden" id="txttotalbayar" name="total_bayar" value="<?=$perbarui_order['total_order']?>">
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
                                                            <option value="2" <? if ($perbarui_order['status_bayar'] == 2) echo "selected"?>>Cicilan</option>
                                                            <option value="3" <? if ($perbarui_order['status_bayar'] == 3) echo "selected"?>>Sudah Bayar (lunas)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 tanggal">
                                                    <div class="form-group">
                                                        <label class="control-label">Tanggal </label>
                                                        <input type="date" name="tglstatus" class="form-control" title="" value="<?=$perbarui_order['tanggal_bayar']?>">
                                                        <span class="help-block small">Tanggal customer melakukan transfer</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 nominal">
                                                    <div class="form-group">
                                                        <label class="control-label">Nominal</label>
                                                        <input type="text" class="form-control" value="<?=$perbarui_order['nominal_bayar']?>" name="nominalstatus" title="">
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
                                                                $selected = '';
                                                                if($id == $perbarui_order['bank']){
                                                                    $selected = 'selected';
                                                                }
                                                                echo "<option value='".$id."' $selected>".$rekening."-".$bank."</option>";
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
														$style = '';
														$sql_produk = mysqli_query($procurement,"select * from detail_order where inv = '$inv'");
														while($reproduk = mysqli_fetch_array($sqlproduk)) {
															$produk = $reproduk['produk'];
															$sql_cekproduk = mysqli_query($procurement,"select * from produk where id = '$produk'");
															$re_cekproduk = mysqli_fetch_array($sql_cekproduk);
															if($re_cekproduk['jenis'] == 2){
																$style = "style='display:none'";
															}
														}
														?>
														<div class="col-md-6" <?=$style?>>
															<div class="form-group">
																<label class="control-label">Total Bayar Ke Supplier</label>
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
                            <button name="perbarui-order" class="btn blue">
                                <i class="fa fa-check"></i>Perbarui
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
<?php
}}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>