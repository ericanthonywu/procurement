<script src="<?=$assets?>global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=$assets?>global/plugins/jQuery.print.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/autosize/autosize.min.js" type="text/javascript"></script>
<script src="<?=$assets?>global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
<script src="<?=$assets;?>amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?=$assets;?>amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="<?=$assets;?>amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="<?=$assets;?>amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="<?=$assets;?>amcharts/amcharts/gauge.js" type="text/javascript"></script>
<script src="<?=$assets;?>amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="<?=$assets;?>amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="<?=$assets;?>amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="<?=$assets;?>amcharts/amcharts/plugins/dataloader/dataloader.js" type="text/javascript"></script>
<script src="<?=$assets;?>export/export.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?=$assets?>global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=$assets?>pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<script src="<?=$assets?>pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?=$assets?>pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
<script src="<?=$assets?>pages/scripts/components-select2.min.js" type="text/javascript"></script>
<script src="<?=$assets?>pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
<script src="<?=$assets?>pages/scripts/ui-modals.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?=$assets?>layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?=$assets?>layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?=$assets?>layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="<?=$assets?>layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script type="text/javascript">
    $(document).ready(function () {
        function animasinomor(tipe,elemen,angkaawal,angkaakhir,durasi,komanomor) {
            function numberWithCommas(n) {
                var parts=n.toString().split(".");
                return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (parts[1] ? "." + parts[1] : "");
            }
            var selector;
            switch (tipe) {
                case "id":
                    selector = $("#"+elemen);
                    break;
                case "class":
                    selector = $('.'+elemen);
                    break;
            }
            selector.each(function () {
                $(this).prop('Counter', angkaawal).animate({
                    Counter: angkaakhir
                }, {
                    duration: durasi,
                    easing: 'swing',
                    step: function (now) {
                        if(komanomor === "yes") {
                            $(this).text(numberWithCommas(Math.ceil(now)));
                        }else{
                            $(this).text(Math.ceil(now));
                        }
                    }
                });
            });
        }
        $('input, select, textarea').prop("required", true);
        $('input[type="checkbox"], #diskonn, #jumlahh, #rupiah, #persen, #diskon, #txtasuransi, #txtbiayalain').prop("required", false);
        $('#harga').bind('keypress', function (event) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
        $('.regexnumber').bind('keypress', function (event) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
        $('#diskon').click(function () {
            $('.diskon').slideToggle("slow");
            var input = $('#inputdiskon');
            if (input.prop("required")) {
                input.prop("required", false);
            } else {
                input.prop('required', true);
            }
        });
        $('#grosir').click(function () {
            var grosir = $('.grosir');
            var input = grosir.find("input");
            grosir.slideToggle("slow");
            if (input.prop("required")) {
                input.prop("required", false);
            } else {
                input.prop('required', true);
            }
        });
<!--        --><?//
//        if(isset($_POST['tambahdata'])){
//            $tipe_jenis=anti_injection($_POST['tipe_jenis']);
//            $instansi=anti_injection($_POST['instansi']);
//            $mitra_kerja=anti_injection($_POST['mitra_kerja']);
//            $judul_dokumen=anti_injection($_POST['judul_dokumen']);
//            $nomor_dokumen=anti_injection($_POST['nomor_dokumen']);
//            $awal_kerjasama=date_to_en($_POST['awal_kerjasama']);
//            $akhir_kerjasama=date_to_en($_POST['akhir_kerjasama']);
//            $jenis_lembaga=anti_injection($_POST['jenis_lembaga']);
//
//            $db='dir5_djbk';
//            $tabel='binakerjasama_kerjasama';
//            $crud=new Crud($db);
//
//            $conditions=array(
//                'Tipe_Jenis'=>$tipe_jenis,
//                'Instansi'=>$instansi,
//                'Mitra_Kerja'=>$mitra_kerja,
//                'Judul_Dokumen'=>$judul_dokumen,
//                'Nomor_Dokumen'=>$nomor_dokumen,
//                'Awal_Kerja_Sama'=>$awal_kerjasama,
//                'Akhir_Kerja_Sama'=>$akhir_kerjasama,
//                'Jenis_Lembaga'=>$jenis_lembaga
//        );
//            if($crud->insert($tabel,$conditions)){
//                echo "<script>alert('data berhasil di simpan');</script>";
//            }else{
//            echo "<script>alert('data gagal di simpan');</script>";
//            }
//
//
//        }
//        ?>
        // $(document).on('click',"#btn_simpan_mitrakerja",function(){
        //     $("#form_tambah_mitrakerja").submit(function(e){ return false; });
        //     var tipe_jenis=$('#tipe_jenis').val();
        //     var instansi=$('#instansi').val();
        //     var mitra_kerja=$('#mitra_kerja').val();
        //     var judul_dokumen=$('#judul_dokumen').val();
        //     var nomor_dokumen=$('#nomor_dokumen').val();
        //     var awal_kerjasama=$('#awal_kerjasama').val();
        //     var akhir_kerjasama=$('#akhir_kerjasama').val();
        //     var jenis_lembaga=$('#jenis_lembaga').val();
        //y
        //     var data={tambahdata:'',tipe_jenis:tipe_jenis,instansi:instansi,mitra_kerja:mitra_kerja,judul_dokumen:judul_dokumen,nomor_dokumen:nomor_dokumen,awal_kerjasama:awal_kerjasama,akhir_kerjasama:akhir_kerjasama,jenis_lembaga:jenis_lembaga};
        //     if(tipe_jenis.length > 0 && instansi.length > 0 && mitra_kerja.length > 0 && judul_dokumen.length > 0 && nomor_dokumen.length > 0 && awal_kerjasama.length > 0 && akhir_kerjasama.length > 0 && jenis_lembaga.length > 0 ){
        //         $.ajax({
        //             type:"POST",
        //             url :"../modul/kerjasama_mitra_kerja/mitra_kerja_proses.php",
        //             data:data,
        //             //dataType: "json",
        //             success:function(html){
        //                 document.getElementById('tipe_jenis').value='';
        //                 document.getElementById('instansi').value='';
        //                 document.getElementById('mitra_kerja').value='';
        //                 document.getElementById('judul_dokumen').value='';
        //                 document.getElementById('nomor_dokumen').value='';
        //                 document.getElementById('awal_kerjasama').value='';
        //                 document.getElementById('akhir_kerjasama').value='';
        //                 document.getElementById('jenis_lembaga').value='';
        //                 $("#hasil").html(html);
        //
        //             },
        //             error: function() {$('#hasil').html('<p>Ajax Bermasalah !!!</p>');},
        //         });y
        //     }
        //
        // });
        setInterval(function () {
            $.ajax({
                type: "POST",
                cache: false,
                url: "<?=$url?>ajax/notif.php",
                data: "notif=notif",
                beforeSend: function () {
                    $("#loading-image").show();
                },
                success: function (result) {
                    $('.notif_notif').html(result);
                }
            });

            $.ajax({
                type: "POST",
                cache: false,
                url: "<?=$url?>ajax/notif.php",
                data: "notif=msg",
                beforeSend: function () {
                    $("#loading-image").show();
                },
                success: function (result) {
                    $('.notif_msg').html(result);
                    $("#loading-image").hide();
                }
            });

            $.ajax({
                type: "POST",
                cache: false,
                url: "<?=$url?>ajax/notif.php",
                data: "notif=task",
                beforeSend: function () {
                    $("#loading-image").show();
                },
                success: function (result) {
                    $('.notif_task').html(result);
                }
            })
        }, 1000);
        var inputr = $('.div_rupiah');
        var input = $('.div_persen');
        var finputr = inputr.find("input");
        var finput = input.find("input");
        finput.prop("required", false);
        input.hide();
        $('#pil_diskon').change(function () {
            var value = $(this).val();
            if (value === "rp") {
                input.hide();
                inputr.show();
                finputr.prop('required', true);
                finput.prop("required", false);
            } else {
                input.show();
                inputr.hide();
                finputr.prop('required', false);
                finput.prop("required", true);
            }
        });
        var asuransi = $('.asuransi');
        var inputasuransi = asuransi.find("input");
        inputasuransi.prop("required", false);
        $('#asuransi').click(function () {
            asuransi.slideToggle("slow");
            $('.asuransikosong').toggle();
            if (inputasuransi.prop("required")) {
                inputasuransi.prop("required", false);
            } else {
                inputasuransi.prop('required', true);
            }
        });
        var biayalain = $('.biayalain');
        var inputbiayalain = biayalain.find("input");
        biayalain.find("textarea").prop("required", false);
        inputbiayalain.prop("required", false);
        $('#biayalain').click(function () {
            biayalain.slideToggle("slow");
            $('.biayalainkosong').toggle();
            if (inputbiayalain.prop("required")) {
                inputbiayalain.prop("required", false);
            } else {
                inputbiayalain.prop('required', true);
            }
        });
        $('#note').prop("required", false);
        var tanggal = $('.tanggal');
        var tglinput = tanggal.find('input');
        var nominal = $('.nominal');
        var nominalinput = nominal.find('input');
        var bank = $('.bank');
        var bankinput = bank.find('input');
        var shipping = $('.shipping');
        var shipinput = shipping.find('input');
		var hsupplier = $('.hsupplier');
		var hsupplierinput = hsupplier.find('input');
        tglinput.prop("required", false);
        nominalinput.prop("required", false);
        bankinput.prop("required", false);
        shipinput.prop("required", false);
		$('#harga_supplier').prop('required',false);
        $('#statuss').change(function () {
            var value = $(this).val();
            if (value === "1") {
                tanggal.hide();
                tglinput.prop("required", false);
                nominal.hide();
                nominalinput.prop("required", false);
                bank.hide();
                bankinput.prop("required", false);
                shipping.hide();
                shipinput.prop("required", false);
				$('#cek_sms').prop("required",false);
				$('#harga_supplier').prop('required',false);
            } else if (value === "2") {
                tanggal.show();
                tglinput.prop("required", true);
                nominal.show();
                nominalinput.prop("required", true);
                bank.show();
                bankinput.prop("required", true);
                shipping.hide();
                shipinput.prop("required", false);
				$('#harga_supplier').prop('required',false);
				$('#cek_sms').prop("required",false);
            } else if (value === "3") {
                tanggal.show();
                tglinput.prop("required", true);
                nominal.hide();
                nominalinput.prop("required", false);
                bank.show();
                bankinput.prop("required", true);
				if($('#harga_supplier').attr("style")){
					$('#harga_supplier').prop('required',true);
				}else{
					$('#harga_supplier').prop('required',false);
				}
                shipping.show();
                // shipinput.prop("required", true);
				$('#cek_sms').prop("required",false);
            }
        });
       function expedisidanpaket (){
            var pilkep = $('#pilih_kepada').val();
            var pildar = $('#pilih_dari').val();
            var berat = $('#berat').val();
            var kurir = $('#pilih_kurir').val();
            if(pilkep !== "" && pildar !== "" && berat > 0 && kurir !== "" ){
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "<?=$url?>ajax/paket.php",
                    data: "dari="+pildar+"&kepada="+pilkep+"&beratorder="+berat+"&pilih_kurir="+kurir,
                    success: function (result) {
                        var paket = $('#pilih_paket');
                        paket.html(result);
                        console.log(result);
                        var datapaket = paket.val();
                        $.ajax({
                            type: "POST",
                            cache: false,
                            url: "<?=$url?>ajax/cek_ongkir.php",
                            data: "dari="+pildar+"&kepada="+pilkep+"&beratorder="+berat+"&pilih_kurir="+kurir+"&paket="+datapaket,
                            success: function (result) {
                                $('#biayakirim').val(result);
                                var valtotalharga = $('#totalPrice').val();
                                var rupiah = $('#rupiah').val();
                                var diskon = $('#diskon').val();
                                var biayakirim = $('#biayakirim').val();
                                var asuransis = $('#txtasuransi').val();
                                var biayalain = $('#txtbiayalain').val();
                                if (valtotalharga === ""){
                                    valtotalharga = 0;
                                }
                                if(rupiah === ""){
                                    rupiah = 0;
                                }
                                if(diskon === ""){
                                    diskon = 0;
                                }
                                var kurang = 0;
                                if(diskon > 0){
                                    kurang = diskon;
                                }else if (rupiah > 0){
                                    kurang = rupiah;
                                }
                                if(biayakirim === ""){
                                    biayakirim = 0;
                                }
                                if(asuransis === ""){
                                    asuransis = 0;
                                }
                                if(biayalain === ""){
                                    biayalain = 0;
                                }
                                //alert(biayalain);
                                var total = Number(valtotalharga) + Number(biayakirim) + Number(asuransis) + Number(biayalain) - Number(kurang);
                                if(total < 0){
                                    total = 0;
                                }
                                //$('.total_bayar').html(numberWithCommas(total));
                                var totalbayarr = $('#txttotalbayar').val();
                                var totalbayar = Number(totalbayarr);
                                $('.total_bayar').each(function () {
                                    $(this).prop('Counter',totalbayar).animate({
                                        Counter: total
                                    }, {
                                        duration: 1000,
                                        easing: 'swing',
                                        step: function (now) {
                                            $(this).text(numberWithCommas(Math.ceil(now)));
                                        }
                                    });
                                });
                                //animateValuecls("total_bayar",totalbayar,total,1);
                                $('#txttotalbayar').val(parseInt(total));
                            }
                        });
                    }
                });
            }
        }
       $('.tambahproduk').click(function () {
            var produk = $('#pilih_barang').val();
            var diskon = $('#diskonn').val();
            var jumlah = $('#jumlahh').val();
            $.ajax({
                type: "POST",
                cache: false,
                url: "<?=$url?>ajax/produk.php",
                data: "produk=" + produk + "&diskon=" + diskon + "&jumlah=" + jumlah +"&ajax=ajax",
                success: function (result) {
                    $('#tblproduk').html(result);
					$('#tblproduk').load("<?=$url?>ajax/produk.php");
                    $('#subdantotal').load("<?=$url?>ajax/subdantotal.php");
					// alert(result);
                    $.ajax({
                        type: "GET",
                        cache: false,
                        url: "<?=$url?>ajax/berat.php",
                        success: function (result) {
                            $('#berat').val(result);
                            var berat = $('#berat').val();
                            var pilkep = $('#pilih_kepada').val();
                            var pildar = $('#pilih_dari').val();
                            var kurir = $('#pilih_kurir').val();
                            $.ajax({
                                type: "GET",
                                cache: false,
                                url: "<?=$url?>ajax/paket.php",
                                data: "dari="+pildar+"&kepada="+pilkep+"&beratorder="+berat+"&pilih_kurir="+kurir,
                                success: function (result) {
									<?
									if(isset($_SESSION['jenis_beda'])){
									?>
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

									toastr.info("Barang sendiri dan barang dari supplier lain tidak dapat dijadikan satu orderan., Mohon Periksa Kembali !", "Info");
									<?
									unset($_SESSION['jenis_beda']);
									}
									?>
									<?
									if(isset($_SESSION['stok'])){
									?>
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

									toastr.info("Jumlah order melebihi sisa stok, Mohon Periksa Kembali !", "Info");
									<?
									unset($_SESSION['stok']);
									}
									?>
                                    var paket = $('#pilih_paket');
                                    paket.html(result);
                                    console.log(result);
                                    var datapaket = paket.val();
                                    $.ajax({
                                        type: "POST",
                                        cache: false,
                                        url: "<?=$url?>ajax/cek_ongkir.php",
                                        data: "dari="+pildar+"&kepada="+pilkep+"&beratorder="+berat+"&pilih_kurir="+kurir+"&paket="+datapaket,
                                        success: function (result) {
                                            $('#biayakirim').val(result);
                                            var valtotalharga = $('#totalPrice').val();
                                            var rupiah = $('#rupiah').val();
                                            var diskon = $('#diskon').val();
                                            var biayakirim = $('#biayakirim').val();
                                            var asuransis = $('#txtasuransi').val();
                                            var biayalain = $('#txtbiayalain').val();
                                            if (valtotalharga === ""){
                                                valtotalharga = 0;
                                            }
                                            if(rupiah === ""){
                                                rupiah = 0;
                                            }
                                            if(diskon === ""){
                                                diskon = 0;
                                            }
                                            var kurang = 0;
                                            if(diskon > 0){
                                                kurang = diskon;
                                            }else if (rupiah > 0){
                                                kurang = rupiah;
                                            }
                                            if(biayakirim === ""){
                                                biayakirim = 0;
                                            }
                                            if(asuransis === ""){
                                                asuransis = 0;
                                            }
                                            if(biayalain === ""){
                                                biayalain = 0;
                                            }
                                            //alert(biayalain);
                                            var total = Number(valtotalharga) + Number(biayakirim) + Number(asuransis) + Number(biayalain) - Number(kurang);
                                            if(total < 0){
                                                total = 0;
                                            }
                                            //$('.total_bayar').html(numberWithCommas(total));
                                            var totalbayarr = $('#txttotalbayar').val();
                                            var totalbayar = Number(totalbayarr);
                                            $('.total_bayar').each(function () {
                                                $(this).prop('Counter',totalbayar).animate({
                                                    Counter: total
                                                }, {
                                                    duration: 1000,
                                                    easing: 'swing',
                                                    step: function (now) {
                                                        $(this).text(numberWithCommas(Math.ceil(now)));
                                                    }
                                                });
                                            });
                                            $('#txttotalbayar').val(parseInt(total));
                                        }
                                    });
                                }
                            });
                        }
                    });
                }
            });
			//location.reload();
        });
		$('#harga_supplier').prop("required",false);
		$('#harga_supplier').keyup(function () {
            var value = $(this).val();
            var totalbayar = $('#txttotalbayar').val();
            if(value > totalbayar){
                alert('Jumlah Setoran Melebihi Total Order Anda. Harap Periksa Kembali');
                $(this).val(totalbayar);
            }
        });

        function trim(number, precision){
            var array = number.toString().split(".");
            array.push(array.pop().substring(0, precision));
            var trimmedNumber =  array.join(".");
            return trimmedNumber;
        }
        $('#rupiah').keyup(function () {
            var value = $(this).val();
            var totalharga = $('#totalPrice').val();
            $('#diskon').val(value);
            var persen = (value / totalharga) * 100;
            $('#persen').val(trim(persen,2));
        });
        $('#persen').keypress(function () {
            var regex = new RegExp( /^(\d+\.?\d*|\.\d+)$/ );
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
        $('#persen').keyup(function () {
            var totalharga = $('#totalPrice').val();
            var persen = $(this).val();
            if(persen <= 100) {
                var diskon = (persen / 100) * totalharga;
                $("#diskon").val(diskon);
                $('#rupiah').val(diskon);
            }else if(persen < 100 || persen > 0){
                $(this).val(100);
            }
        });
        $('.muncul').show();
        $('.ilang').hide();
		$('.ilang').find("select").prop("required",false);
        $('#edit').click(function () {
            $('.muncul').toggle();
            $('.ilang').toggle();
        });
        $('#pilih_paket').change(function () {
            var pilkep = $('#pilih_kepada').val();
            var pildar = $('#pilih_dari').val();
            var berat = $('#berat').val();
            var kurir = $('#pilih_kurir').val();
            var datapaket = $(this).val();
            $.ajax({
                type: "POST",
                cache: false,
                url: "<?=$url?>ajax/cek_ongkir.php",
                data: "dari="+pildar+"&kepada="+pilkep+"&beratorder="+berat+"&pilih_kurir="+kurir+"&paket="+datapaket,
                success: function (result) {
                    $('#biayakirim').val(result);
                    var valtotalharga = $('#totalPrice').val();
                    var rupiah = $('#rupiah').val();
                    var diskon = $('#diskon').val();
                    var biayakirim = $('#biayakirim').val();
                    var asuransis = $('#txtasuransi').val();
                    var biayalain = $('#txtbiayalain').val();
                    if (valtotalharga === ""){
                        valtotalharga = 0;
                    }
                    if(rupiah === ""){
                        rupiah = 0;
                    }
                    if(diskon === ""){
                        diskon = 0;
                    }
                    var kurang = 0;
                    if(diskon > 0){
                        kurang = diskon;
                    }else if (rupiah > 0){
                        kurang = rupiah;
                    }
                    if(biayakirim === ""){
                        biayakirim = 0;
                    }
                    if(asuransis === ""){
                        asuransis = 0;
                    }
                    if(biayalain === ""){
                        biayalain = 0;
                    }
                    //alert(biayalain);
                    var total = Number(valtotalharga) + Number(biayakirim) + Number(asuransis) + Number(biayalain) - Number(kurang);
                    if(total < 0){
                        total = 0;
                    }
                    //$('.total_bayar').html(numberWithCommas(total));
                    var totalbayarr = $('#txttotalbayar').val();
                    var totalbayar = Number(totalbayarr);
                    $('.total_bayar').each(function () {
                        $(this).prop('Counter',totalbayar).animate({
                            Counter: total
                        }, {
                            duration: 1000,
                            easing: 'swing',
                            step: function (now) {
                                $(this).text(numberWithCommas(Math.ceil(now)));
                            }
                        });
                    });
                    $('#txttotalbayar').val(parseInt(total));
                }
            });
        })

        $('#paket_manual').prop("required", false);
        $('#pilih_kurir').change(function () {
            var value = $(this).val();
            if(value === "manual"){
                $('#paket_manual').show();
                $('#pilih_paket').hide();
                $('#pilih_paket').prop("required", false);
                $('#berat').prop("readonly", false);
                $('#biayakirim').prop("readonly", false);
                $('.expedsi').find(".select2").hide();
            }else{
                $('#paket_manual').hide();
                $('#paket_manual').prop("required", false);
                $('#pilih_paket').show();
                $('#pilih_paket').prop("required", true);
                $('#berat').prop("readonly", true);
                $('#biayakirim').prop("readonly", true);
                $('.expedsi').find(".select2").show();
            }
        });
        expedisidanpaket();
        $('#pilih_kepada, #pilih_dari, #pilih_barang, #pilih_kurir').change(function () {
            if($('#pilih_kurir').val() !== "manual") {
                expedisidanpaket();
            }
        });
        $('#rupiah, #persen, #biayakirim, #txtasuransi, #txtbiayalain').keyup(function () {
            var valtotalharga = $('#totalPrice').val();
            var rupiah = $('#rupiah').val();
            var diskon = $('#diskon').val();
            var biayakirim = $('#biayakirim').val();
            var asuransis = $('#txtasuransi').val();
            var biayalain = $('#txtbiayalain').val();
            if (valtotalharga === ""){
                valtotalharga = 0;
            }
            if(rupiah === ""){
                rupiah = 0;
            }
            if(diskon === ""){
                diskon = 0;
            }
            var kurang = 0;
            if(diskon > 0){
                 kurang = diskon;
            }else if (rupiah > 0){
                kurang = rupiah;
            }
            if(biayakirim === ""){
                biayakirim = 0;
            }
            if(asuransis === ""){
                asuransis = 0;
            }
            if(biayalain === ""){
                biayalain = 0;
            }
            //alert(biayalain);
            var total = Number(valtotalharga) + Number(biayakirim) + Number(asuransis) + Number(biayalain) - Number(kurang);
            if(total < 0){
                total = 0;
            }
            var totalbayarr = $('#txttotalbayar').val();
            var totalbayar = Number(totalbayarr);
            $('.total_bayar').each(function () {
                $(this).prop('Counter',totalbayar).animate({
                    Counter: total
                }, {
                    duration: 200,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(numberWithCommas(Math.ceil(now)));
                    }
                });
            });
            $('#txttotalbayar').val(parseInt(total));
        });
        function numberWithCommas(n) {
            var parts=n.toString().split(".");
            return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (parts[1] ? "." + parts[1] : "");
        }
        function gajibersih(){
            var totalpenerimaan = $('#valtotalpenerimaan').val();
            var totalpotongan = $('#valtotalpotongan').val();
            var totalgajibersih = Number(totalpenerimaan) - Number(totalpotongan);
            $('#gajibersih').html(numberWithCommas(totalgajibersih));
            $('#valgajibersih').val(totalgajibersih);
        }
        $('#gajipokok, #uangmakan, #tunjangan, #totalbonus, #minusplusongkir').keyup(function () {
            var gajipokok = $('#gajipokok').val();
            var uangmakan = $('#uangmakan').val();
            var tunjangan = $('#tunjangan').val();
            var totalbonus = $('#totalbonus').val();
            var minusplusongkir = $('#minusplusongkir').val();
            var total = Number(gajipokok) + Number(uangmakan) + Number(tunjangan) + Number(totalbonus) + Number(minusplusongkir);
            $('#valtotalpenerimaan').val(total);
            $('#totalpenerimaan').html(numberWithCommas(total));
            gajibersih();
        });

        $('#pilih_karyawan, #tanggal_gajian').change(function () {
            var karyawan = $('#pilih_karyawan').val();
            var tanggal_gajian = $('#tanggal_gajian').val();
            if(karyawan !== "" && tanggal_gajian !== ""){
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?=$url?>ajax/totalsalesitem.php",
                    data: "karyawan="+karyawan+"&tgl="+tanggal_gajian,
                    success: function (result) {
                        $('#totalsalesitem').html(result);
                        $('#valtotalsalesitem').val(result);
                    }
                });
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?=$url?>ajax/penggajian.php",
                    data: "karyawan="+karyawan+"&tgl="+tanggal_gajian,
                    success: function (result) {
                         var meledak = result.split(",");
                    var bonus_rating_order = meledak[0];
                    $('#bonus_rating_order').val(bonus_rating_order);
                    var bonus_sales = meledak[1];
                    $('#bonus_sales').val(bonus_sales);
                    var bonus_rating_konversi = meledak[2];
                    $('#bonus_rating_konversi').val(bonus_rating_konversi);
                    var bonusnya = meledak[3];
                    $('#totalbonus').val(bonusnya);
                        var pinjaman = $('#pinjaman').val();
                        var sanksi = $('#sanksi').val();
                        var totalsanksi = Number(pinjaman) + Number(sanksi);
                        var gajipokok = $('#gajipokok').val();
                        var uangmakan = $('#uangmakan').val();
                        var tunjangan = $('#tunjangan').val();
                        var totalbonus = $('#totalbonus').val();
                        var minusplusongkir = $('#minusplusongkir').val();
                        var totalpenerimaan = Number(gajipokok) + Number(uangmakan) + Number(tunjangan) + Number(totalbonus) + Number(minusplusongkir);
                        $('#valtotalpenerimaan').val(totalpenerimaan);
                        $('#totalpenerimaan').html(numberWithCommas(totalpenerimaan));
                        $('#valtotalpotongan').val(totalsanksi);
                        $('#totalpotongan').html(numberWithCommas(totalsanksi));
                        gajibersih();
                    }
                })
				$.ajax({
					type: "POST",
                    cache: false,
                    url: "<?=$url?>ajax/penggajian.php",
                    data: "karyawan="+karyawan+"&tgl="+tanggal_gajian,
                    success: function (result) {
						$('#ketbonus')
					}
				})
				$.ajax({
                type: "POST",
                cache: false,
                url: "<?=$url?>ajax/sanksipenggajian.php",
                data: "karyawan="+karyawan+"&tgl="+tanggal_gajian,
                success: function (result) {
                    $('#sanksi').val(result);
                }
            })
            }
        });
		$('#jenisproduk').change(function () {
        if($(this).val() === "2"){
            $('#hargabeli').prop("readonly",true);
            $('#hargabeli').prop("required",true);
            $('#stok').prop("readonly",true);
            $('#stok').prop("required",true);
        }else{
            $('#hargabeli').prop("readonly",false);
            $('#hargabeli').prop("required",false);
            $('#stok').prop("readonly",false);
            $('#stok').prop("required",false);
        }
    })
        $('#pinjaman, #sanksi').prop("required",false);
        $('#pinjaman, #sanksi').keyup(function () {
            var pinjaman = $('#pinjaman').val();
            var sanksi = $('#sanksi').val();
            var total = Number(pinjaman) + Number(sanksi);
            $('#valtotalpotongan').val(total);
            $('#totalpotongan').html(numberWithCommas(total));
            gajibersih();
        });
		$('#punishment').change(function () {
            var value = $(this).val();
            var meledak = value.split("-");
            var id = meledak[0];
            <?php
            $sql_punishment = mysqli_query($procurement,"select * from punishment where toko = '$toko'");
            while($re_punishment = mysqli_fetch_array($sql_punishment)) {
                $id = $re_punishment['id'];
                $sanksi = $re_punishment['sanksi'];
                $jumlahwaktusanksis = $re_punishment['jumlahwaktusanksi'];
                $satuanwaktu = $re_punishment['satuanwaktu'];
                if ($jumlahwaktusanksis == 1) {
                    $jumlahwaktusanksis = "";
                } else {
                    $jumlahwaktusanksi = $jumlahwaktusanksis;
                }
                ?>
            if(id === '<?=$id?>'){
                $('#satuan').html("<?=$satuanwaktu?>");
                $('#waktu').attr("data-rp","<?=$sanksi?>");
            }
            <?
            }
            ?>
            $('#waktu').val(0);
        });
        $('#waktu').keyup(function () {
            var value = $(this).val();
            var satuan = $('#satuan').html();
            var rp = $(this).attr('data-rp');
            var max = 0;
            var alertt = 0;
            switch (satuan) {
                case "detik":
                    max = 60;
                    alertt = 1;
                    break;
                case "menit":
                    max = 60;
                    alertt = 1;
                    break;
                case "jam":
                    max = 24;
                    alertt = 1;
                    break;
                case "hari":
                    max = 31;
                    alertt = 1;
                    break;
                case "minggu":
                    max = 4;
                    alertt = 1;
                    break;
                case "bulan":
                    max = 12;
                    alertt = 1;
                    break;
                case "tahun":
                    max = 1000;
                    alertt = 1;
                    break;
                case "":
                    alert("pilih punishment dulu tolol");
                    $(this).val(0);
                    alertt = 0;
                    break;
            }
            if(value > max && alertt === 1){
                alert("waktu tidak boleh melebihi "+max);
                $(this).val(max);
            }else if (value < 0){
                alert("mana ada waktu minus gblok");
                $(this).val(0);
            }
            var nominal = rp * value;
            $('#nominal').val(nominal);
        });
		$('#pilih_opsi').change(function () {
            var value = $(this).val();
            switch (value) {
                case "hari":
                    $(".hari").show();
                    $('.tahun').hide();
                    $('.periodic').hide();
                    $('.bulan').hide();
                    break;
                case "periodic":
                    $(".hari").hide();
                    $('.tahun').hide();
                    $('.periodic').show();
                    $('.bulan').hide();
                    break;
                case "bulan":
                    $(".hari").hide();
                    $('.tahun').show();
                    $('.periodic').hide();
                    $('.bulan').show();
                    break;
                case "tahun":
                    $(".hari").hide();
                    $('.tahun').show();
                    $('.periodic').hide();
                    $('.bulan').hide();
                    break;
            }
        })
		// $('.nosearch').find("input").prop("required",false);
    });
</script>
<script>
    $('document').ready(function()
    {
        /* validation */
        $("#register-form").validate({
            rules:
                {
                    username: {
                        required: true,
                        minlength: 20,
                        maxlength: 20
                    },
                    phone: {
                        required: true,
                        minlength: 12,
                        maxlength: 15
                    },
                    name: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 16
                    },
                    repassword: {
                        required: true,
                        equalTo: '#password'
                    },
                    email: {
                        required: true,
                        email: true
                    },
                },
            messages:
                {
                    username: "Enter a Valid Username",
                    phone: "Enter a Valid Phone Number",
                    password:{
                        required: "Provide a Password",
                        minlength: "Password Needs To Be Minimum of 8 Characters"
                    },
                    email: "Enter a Valid Email",
                    repassword:{
                        required: "Retype Your Password",
                        equalTo: "Password Mismatch! Retype"
                    }
                },
            submitHandler: submitForm
        });
        /* validation */

        /* form submit */
        $('#register-form').submit(function(){
            // alert('submit');
            var data = $(this).serialize();

            $.ajax({

                type : 'POST',
                url  : '<?=$base_url?>ajax/register.php',
                data : data,
                beforeSend: function()
                {
                    $("#error").fadeOut();
                    $("#btn-register").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
                },
                success :  function(data)
                {
                    alert(data);
                    if(data==1){

                        $("#error").fadeIn(1000, function(){


                            $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   Sorry email already taken !</div>');

                            $("#btn-register").html('<span class="glyphicon glyphicon-log-in"></span>   Create Account');

                        });

                    }
                    else if(data==2){

                        $("#error").fadeIn(1000, function(){


                            $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   Sorry username already taken !</div>');

                            $("#btn-register").html('<span class="glyphicon glyphicon-log-in"></span>   Create Account');

                        });

                    }
                    else if(data==3){

                        $("#error").fadeIn(1000, function(){


                            $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   Sorry phone number already taken !</div>');

                            $("#btn-register").html('<span class="glyphicon glyphicon-log-in"></span>   Create Account');

                        });

                    }
                    else if(data=="pass"){

                        $("#error").fadeIn(1000, function(){


                            $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   Sorry password not same !</div>');

                            $("#btn-register").html('<span class="glyphicon glyphicon-log-in"></span>   Create Account');

                        });

                    }
                    else if(data=="registered")
                    {

                        $("#btn-register").html('Signing Up');
                        setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("successreg.php"); }); ',5000);

                    }
                    else{

                        $("#error").fadeIn(1000, function(){

                            $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span>   '+data+' !</div>');

                            $("#btn-register").html('<span class="glyphicon glyphicon-log-in"></span>   Create Account');

                        });

                    }
                }
            });
            return false;
        }
        /* form submit */

    });
</script>