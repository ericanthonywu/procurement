<script>
var grafik_dashboard=AmCharts.makeChart("grafik_dashboard",
	{
	"type": "serial",
	"depth3D": 20,
	"angle": 30,
	"dataLoader":{
	  "url":"<?=$url?>chart/dashboard.php",
	  "format":"json"
	},
	"numberFormatter": {
		"precision": -1,
		"decimalSeparator": ",",
		"thousandsSeparator": "."
	},
	"addClassNames": true,
	"theme": "light",
	// "path": "../amcharts/ammap/images/",
	"autoMargins": false,
	"marginLeft": 150,
	"marginRight": 20,
	"marginTop": 100,
	"marginBottom": 85,
	"balloon": {
		"adjustBorderColor": false,
		"horizontalPadding": 10,
		"verticalPadding": 8,
		"color": "#ffffff"
	},
	"valueAxes": [{
		"axisAlpha": 0,
		"position": "left"
	}],
	"startDuration": 1,
	"graphs": [{
		id: "g1",
		valueField: "gross_profit",
		title: "Total Gross Profit",
		type: "column",
		fillAlphas: 0.7,
		valueAxis: "a1",
		descriptionField: "Rp. [[value]]",
		balloonText: "Total Gross Profit Tanggal [[category]] : Rp. [[value]]",
		legendValueText: "Rp. [[value]]",
		lineColor: "#08a3cc",
		alphaField: "alpha",
		labelText: "Rp. [[value]]",
		showBalloon: true,
		animationPlayed: true,
		"dashLengthField": "dashLengthColumn"
	},{
		id: "g2",
		valueField: "total_produk",
		classNameField: "bulletClass",
		title: "Total Produk Terjual",
		type: "line",
		lineColor: "#786c56",
		lineThickness: 1,
		legendValueText: "[[value]] Item",
		descriptionField: "[[value]] Item",
		bullet: "round",
		bulletSizeField: "[[value]] Item",
		bulletBorderColor: "#02617a",
		bulletBorderAlpha: 1,
		bulletBorderThickness: 2,
		bulletColor: "#89c4f4",
		labelText: "[[value]] Item",
		labelPosition: "right",
		balloonText: "Total Produk Terjual Tanggal [[category]] : [[value]] Item",
		showBalloon: true,
		animationPlayed: true,
	}],
	"categoryField": "hari",
	"categoryAxis": {
		"gridPosition": "start",
		"axisAlpha": 0,
		"tickLength": 0,
		"labelRotation":10
	},
	legend: {
		
	   "equalWidths": false,
		"periodValueText": "[[value.sum]]",
		"position": "bottom",
		"valueAlign": "left",
		"valueWidth": 500
	},
	"responsive":
	{
		"enabled": true
	},
	"chartCursor": 
	{
	},
	"export":
	{
		"enabled": true,
		"libs":
		{
			"path": "<?=$assets?>export/libs/"
		}
	},
	"creditsPosition": "bottom-left",
	"mouseWheelZoomEnabled": true,
    "zoomOutOnDataUpdate": true
	}
);
</script>
<script>
var grafik_penjualan=AmCharts.makeChart("grafik_penjualan",
	{
	"type": "serial",
	"depth3D": 20,
	"angle": 30,
	"dataLoader":{
	<?
	if(isset($_POST['cari_report'])){
		if($_POST['opsi']=="hari"){
		$hari = $_POST['hari'];
	?>
	  "url":"<?=$url?>chart/penjualan.php?hari=<?=$hari?>",
	  <?
	  }elseif($_POST['opsi']=="periodic"){
		$dari = $_POST['dari'];
		$sampai = $_POST['sampai'];
	  ?>
	  "url":"<?=$url?>chart/penjualan.php?dari=<?=$dari?>&sampai=<?=$sampai?>",
	  <?
	  }elseif($_POST['opsi']=="bulan"){
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
	  ?>
	  "url":"<?=$url?>chart/penjualan.php?bulan=<?=$bulan?>&tahun=<?=$tahun?>",
	  <?
	  }elseif($_POST['opsi']=="tahun"){
		$tahun = $_POST['tahun'];
	  ?>
	  "url":"<?=$url?>chart/penjualan.php?tahun=<?=$tahun?>",
	  <?
	  }
	}else{
	  ?>
	  "url":"<?=$url?>chart/penjualan.php",
	<?
	}
	?>
	  "format":"json"
	},
	"numberFormatter": {
		"precision": -1,
		"decimalSeparator": ",",
		"thousandsSeparator": "."
	},
	"addClassNames": true,
	"theme": "light",
	// "path": "../amcharts/ammap/images/",
	"autoMargins": false,
	"marginLeft": 150,
	"marginRight": 20,
	"marginTop": 100,
	"marginBottom": 85,
	"balloon": {
		"adjustBorderColor": false,
		"horizontalPadding": 10,
		"verticalPadding": 8,
		"color": "#ffffff"
	},
	"valueAxes": [{
		"axisAlpha": 0,
		"position": "left"
	}],
	"startDuration": 1,
	"graphs": [{
		id: "g1",
		valueField: "total_produk",
		title: "Total Produk Terjual",
		type: "column",
		fillAlphas: 0.7,
		valueAxis: "a1",
		descriptionField: "[[value]] Item",
		balloonText: "Total Produk Terjual Tanggal [[category]] : [[value]] Item",
		legendValueText: "[[value]] Item",
		lineColor: "#08a3cc",
		alphaField: "alpha",
		showBalloon: true,
		labelText: "[[value]] Item",
		animationPlayed: true,
		"dashLengthField": "dashLengthColumn"
	}],
	"categoryField": "hari",
	"categoryAxis": {
		"gridPosition": "start",
		"axisAlpha": 0,
		"tickLength": 0,
		"labelRotation":10
	},
	legend: {
		
	   "equalWidths": false,
		"periodValueText": "[[value.sum]] Item",
		"position": "bottom",
		"valueAlign": "left",
		"valueWidth": 500
	},
	"responsive":
	{
		"enabled": true
	},
	"chartCursor": 
	{
	},
	"export":
	{
		"enabled": true,
		"libs":
		{
			"path": "<?=$assets?>export/libs/"
		}
	},
	"creditsPosition": "bottom-left",
	"mouseWheelZoomEnabled": true,
    "zoomOutOnDataUpdate": true
	}
);
</script>
<script>
var grafik_keuntungan=AmCharts.makeChart("grafik_keuntungan",
	{
	"type": "serial",
	"depth3D": 20,
	"angle": 30,
	"dataLoader":{
	  <?
	if(isset($_POST['cari_report'])){
		if($_POST['opsi']=="hari"){
		$hari = $_POST['hari'];
	?>
	  "url":"<?=$url?>chart/keuntungan.php?hari=<?=$hari?>",
	  <?
	  }elseif($_POST['opsi']=="periodic"){
		$dari = $_POST['dari'];
		$sampai = $_POST['sampai'];
	  ?>
	  "url":"<?=$url?>chart/keuntungan.php?dari=<?=$dari?>&sampai=<?=$sampai?>",
	  <?
	  }elseif($_POST['opsi']=="bulan"){
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
	  ?>
	  "url":"<?=$url?>chart/keuntungan.php?bulan=<?=$bulan?>&tahun=<?=$tahun?>",
	  <?
	  }elseif($_POST['opsi']=="tahun"){
		$tahun = $_POST['tahun'];
	  ?>
	  "url":"<?=$url?>chart/keuntungan.php?tahun=<?=$tahun?>",
	  <?
	  }
	}else{
	  ?>
	  "url":"<?=$url?>chart/keuntungan.php",
	<?
	}
	?>
	  "format":"json"
	},
	"numberFormatter": {
		"precision": -1,
		"decimalSeparator": ",",
		"thousandsSeparator": "."
	},
	"addClassNames": true,
	"theme": "light",
	// "path": "../amcharts/ammap/images/",
	"autoMargins": false,
	"marginLeft": 150,
	"marginRight": 20,
	"marginTop": 100,
	"marginBottom": 85,
	"balloon": {
		"adjustBorderColor": false,
		"horizontalPadding": 10,
		"verticalPadding": 8,
		"color": "#ffffff"
	},
	"valueAxes": [{
		"axisAlpha": 0,
		"position": "left"
	}],
	"startDuration": 1,
	"graphs": [{
		id: "g3",
		title: "Total Net Sales",
		valueField: "net_sales",
		type: "line",
		valueAxis: "a3",
		lineAlpha: 0.8,
		lineColor: "#e26a6a",
		labelText: "Rp. [[value]]",
		balloonText: "Rp. [[value]]",
		lineThickness: 1,
		descriptionField: "Rp. [[value]]",
		legendValueText: "Rp. [[value]]",
		bullet: "square",
		bulletBorderColor: "#e26a6a",
		bulletBorderThickness: 1,
		bulletBorderAlpha: 0.8,
		dashLengthField: "dashLength",
		balloonText: "Total Net Sales Tanggal [[category]] : Rp. [[value]]",
		animationPlayed: true
	},{
		id: "g2",
		valueField: "gross_profit",
		classNameField: "bulletClass",
		title: "Total Gross Profit",
		type: "line",
		lineColor: "#786c56",
		lineThickness: 1,
		legendValueText: "Rp. [[value]]",
		descriptionField: "Rp. [[value]]",
		bullet: "round",
		bulletSizeField: "Rp. [[value]]",
		bulletBorderColor: "#02617a",
		bulletBorderAlpha: 1,
		bulletBorderThickness: 2,
		bulletColor: "#89c4f4",
		labelText: "Rp. [[value]]",
		labelPosition: "right",
		balloonText: "Total Gross Profit Tanggal [[category]] : Rp. [[value]]",
		showBalloon: true,
		animationPlayed: true,
	}],
	"categoryField": "hari",
	"categoryAxis": {
		"gridPosition": "start",
		"axisAlpha": 0,
		"tickLength": 0,
		"labelRotation":10
	},
	legend: {
		
	   "equalWidths": false,
		"periodValueText": "Rp. [[value.sum]]",
		"position": "bottom",
		"valueAlign": "left",
		"valueWidth": 500
	},
	"responsive":
	{
		"enabled": true
	},
	"chartCursor": 
	{
	},
	"export":
	{
		"enabled": true,
		"libs":
		{
			"path": "<?=$assets?>export/libs/"
		}
	},
	"creditsPosition": "bottom-left",
	"mouseWheelZoomEnabled": true,
    "zoomOutOnDataUpdate": true
	}
);
</script>
<script>
var kurir=AmCharts.makeChart("kurir",
	{
	"type": "serial",
	"depth3D": 20,
	"angle": 30,
	"dataLoader":{
	<?
	if(isset($_POST['cari_report'])){
		if($_POST['opsi']=="hari"){
		$hari = $_POST['hari'];
		?>
	  "url":"<?=$url?>chart/kurir.php?hari=<?=$hari?>",
	  <?
	  }elseif($_POST['opsi']=="periodic"){
		$dari = $_POST['dari'];
		$sampai = $_POST['sampai'];
	  ?>
	  "url":"<?=$url?>chart/kurir.php?dari=<?=$dari?>&sampai=<?=$sampai?>",
	  <?
	  }elseif($_POST['opsi']=="bulan"){
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
	  ?>
	  "url":"<?=$url?>chart/kurir.php?bulan=<?=$bulan?>&tahun=<?=$tahun?>",
	  <?
	  }elseif($_POST['opsi']=="tahun"){
		$tahun = $_POST['tahun'];
	  ?>
	  "url":"<?=$url?>chart/kurir.php?tahun=<?=$tahun?>",
	  <?
	  }
	}else{
	  ?>
	  "url":"<?=$url?>chart/kurir.php",
	<?
	}
	?>
	  "format":"json"
	},
	"numberFormatter": {
		"precision": -1,
		"decimalSeparator": ",",
		"thousandsSeparator": "."
	},
	"addClassNames": true,
	"theme": "light",
	// "path": "../amcharts/ammap/images/",
	"autoMargins": false,
	"marginLeft": 150,
	"marginRight": 20,
	"marginTop": 100,
	"marginBottom": 85,
	"balloon": {
		"adjustBorderColor": false,
		"horizontalPadding": 10,
		"verticalPadding": 8,
		"color": "#ffffff"
	},
	"valueAxes": [{
		"axisAlpha": 0,
		"position": "left"
	}],
	"startDuration": 1,
	"graphs": [{
		id: "g1",
		valueField: "total_ongkir",
		title: "Total Ongkir",
		type: "column",
		fillAlphas: 0.7,
		valueAxis: "a1",
		descriptionField: "Rp. [[value]]",
		balloonText: "Total Ongkir [[category]] : Rp. [[value]]",
		legendValueText: "Rp. [[value]]",
		lineColor: "#08a3cc",
		alphaField: "alpha",
		showBalloon: true,
		labelText: "Rp. [[value]]",
		animationPlayed: true,
		"dashLengthField": "dashLengthColumn"
	}],
	"categoryField": "expedisi",
	"categoryAxis": {
		"gridPosition": "start",
		"axisAlpha": 0,
		"tickLength": 0,
		"labelRotation":10
	},
	legend: {
		
	   "equalWidths": false,
		"periodValueText": "Rp. [[value.sum]]",
		"position": "bottom",
		"valueAlign": "left",
		"valueWidth": 500
	},
	"responsive":
	{
		"enabled": true
	},
	"chartCursor": 
	{
	},
	"export":
	{
		"enabled": true,
		"libs":
		{
			"path": "<?=$assets?>export/libs/"
		}
	},
	"creditsPosition": "bottom-left",
	"mouseWheelZoomEnabled": true,
    "zoomOutOnDataUpdate": true
	}
);
</script>
<script>
var grafik_hari=AmCharts.makeChart("grafik_hari",
	{
	"type": "serial",
	"depth3D": 20,
	"angle": 30,
	"dataLoader":{
	<?
	if(isset($_POST['cari_analyzer'])){
		if($_POST['opsi']=="hari"){
		$hari = $_POST['hari'];
		?>
	  "url":"<?=$url?>chart/hari.php?hari=<?=$hari?>",
	  <?
	  }elseif($_POST['opsi']=="periodic"){
		$dari = $_POST['dari'];
		$sampai = $_POST['sampai'];
	  ?>
	  "url":"<?=$url?>chart/hari.php?dari=<?=$dari?>&sampai=<?=$sampai?>",
	  <?
	  }elseif($_POST['opsi']=="bulan"){
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
	  ?>
	  "url":"<?=$url?>chart/hari.php?bulan=<?=$bulan?>&tahun=<?=$tahun?>",
	  <?
	  }elseif($_POST['opsi']=="tahun"){
		$tahun = $_POST['tahun'];
	  ?>
	  "url":"<?=$url?>chart/hari.php?tahun=<?=$tahun?>",
	  <?
	  }
	}else{
	  ?>
	  "url":"<?=$url?>chart/hari.php",
	<?
	}
	?>
	  "format":"json"
	},
	"numberFormatter": {
		"precision": -1,
		"decimalSeparator": ",",
		"thousandsSeparator": "."
	},
	"addClassNames": true,
	"theme": "light",
	// "path": "../amcharts/ammap/images/",
	"autoMargins": false,
	"marginLeft": 150,
	"marginRight": 20,
	"marginTop": 100,
	"marginBottom": 85,
	"balloon": {
		"adjustBorderColor": false,
		"horizontalPadding": 10,
		"verticalPadding": 8,
		"color": "#ffffff"
	},
	"valueAxes": [{
		"axisAlpha": 0,
		"position": "left"
	}],
	"startDuration": 1,
	"graphs": [{
		id: "g1",
		valueField: "total_produk",
		title: "Total Produk Terjual",
		type: "column",
		fillAlphas: 0.7,
		valueAxis: "a1",
		descriptionField: "[[value]] Item",
		balloonText: "Total Produk Terjual Tanggal [[category]] : [[value]] Item",
		legendValueText: "[[value]] Item",
		lineColor: "#08a3cc",
		alphaField: "alpha",
		showBalloon: true,
		labelText: "[[value]] Item",
		animationPlayed: true,
		"dashLengthField": "dashLengthColumn"
	}],
	"categoryField": "nama_hari_indo",
	"categoryAxis": {
		"gridPosition": "start",
		"axisAlpha": 0,
		"tickLength": 0,
		"labelRotation":10
	},
	legend: {
		
	   "equalWidths": false,
		"periodValueText": "[[value.sum]] Item",
		"position": "bottom",
		"valueAlign": "left",
		"valueWidth": 500
	},
	"responsive":
	{
		"enabled": true
	},
	"chartCursor": 
	{
	},
	"export":
	{
		"enabled": true,
		"libs":
		{
			"path": "<?=$assets?>export/libs/"
		}
	},
	"creditsPosition": "bottom-left",
	"mouseWheelZoomEnabled": true,
    "zoomOutOnDataUpdate": true
	}
);
</script>
<script>
var jam = AmCharts.makeChart( "jam", {
  "type": "gauge",
  "theme": "light",
  "startDuration": 0.3,
  "marginTop": 20,
  "marginBottom": 50,
  "axes": [ {
    "axisAlpha": 0.3,
    "endAngle": 360,
    "endValue": 12,
    "minorTickInterval": 0.2,
    "showFirstLabel": false,
    "startAngle": 0,
    "axisThickness": 1,
    "valueInterval": 1
  } ],
  "arrows": [ {
    "radius": "50%",
    "innerRadius": 0,
    "clockWiseOnly": true,
    "nailRadius": 10,
    "nailAlpha": 1
  }, {
    "nailRadius": 0,
    "radius": "80%",
    "startWidth": 6,
    "innerRadius": 0,
    "clockWiseOnly": true
  }, {
    "color": "#CC0000",
    "nailRadius": 4,
    "startWidth": 3,
    "innerRadius": 0,
    "clockWiseOnly": true,
    "nailAlpha": 1
  } ],
  "export": {
    "enabled": true
  }
} );

// update each second
setInterval( updateClock, 1000 );

// update clock
function updateClock() {
  if(jam.arrows.length > 0){
    // get current date
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    if(jam.arrows[ 0 ].setValue){
      // set hours
      jam.arrows[ 0 ].setValue( hours + minutes / 60 );
      // set minutes
      jam.arrows[ 1 ].setValue( 12 * ( minutes + seconds / 60 ) / 60 );
      // set seconds
      jam.arrows[ 2 ].setValue( 12 * date.getSeconds() / 60 );
      }
  }
}
</script>
<script>
var jam1 = AmCharts.makeChart( "jam1", {
  "type": "gauge",
  "theme": "light",
  "startDuration": 0.1,
  "marginTop": 20,
  "marginBottom": 50,
  "axes": [ {
    "id": "axis1",
    "axisAlpha": 0,
    "endAngle": 360,
    "endValue": 12,
    "minorTickInterval": 0.2,
    "showFirstLabel": false,
    "startAngle": 0,
    "topTextYOffset": 100,
    "valueInterval": 1
  }, {
    "id": "axis2",
    "axisAlpha": 0,
    "endAngle": 360,
    "endValue": 60,
    "radius": 60,
    "showFirstLabel": false,
    "startAngle": 0,
    "valueInterval": 5,
    "labelFrequency": 0,
    "tickLength": 10
  } ],
  "arrows": [ {
    "innerRadius": 70,
    "nailRadius": 0,
    "radius": "80%",
    "startWidth": 10,
    "endWidth": 10
  }, {
    "innerRadius": 70,
    "nailRadius": 0,
    "radius": "100%",
    "startWidth": 6,
    "endWidth": 6
  }, {
    "axis": "axis2",
    "color": "#CC0000",
    "innerRadius": 50,
    "nailRadius": 0,
    "radius": "100%",
    "startWidth": 6,
    "endWidth": 6,
    "alpha": 1
  } ],
  "export": {
    "enabled": true
  }
} );

interval = setInterval( updateClock, 1000 );


// update clock
function updateClock() {
  // get date
  var date = new Date();
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var seconds = date.getSeconds();

  if(jam1.arrows[ 0 ].setValue){
    // update hours
    jam1.arrows[ 0 ].setValue( hours + minutes / 60 );
    // update minutes
    jam1.arrows[ 1 ].setValue( 12 * ( minutes + seconds / 60 ) / 60 );
    // update seconds
    jam1.arrows[ 2 ].setValue( date.getSeconds() );

    // update date
    var dateString = AmCharts.formatDate( date, "DD MMM" );
    jam1.axes[ 0 ].setTopText( dateString );
  }
}
</script>
<script>
var umur=AmCharts.makeChart("umur",
	{
	"type": "serial",
	"dataLoader":{
	  "url":"../chart/umur.php",
	  "format":"json"
	},
	"numberFormatter": {
		"precision": -1,
		"decimalSeparator": ",",
		"thousandsSeparator": "."
	},
	"addClassNames": true,
	"theme": "light",
	// "path": "../amcharts/ammap/images/",
	"autoMargins": false,
	"marginLeft": 150,
	"marginRight": 20,
	"marginTop": 100,
	"marginBottom": 85,
	"balloon": {
		"adjustBorderColor": false,
		"horizontalPadding": 10,
		"verticalPadding": 8,
		"color": "#ffffff"
	},
	"valueAxes": [{
		"axisAlpha": 0,
		"position": "left"
	}],
	"startDuration": 1,
	"graphs": [{
		"alphaField": "alpha",
		"balloonText": "<span style='font-size:12px;'>[[title]]<br><span style='font-size:20px;'> [[value]] Orang</span> [[additional]]</span>",
		"fillAlphas": 1,
		"title": "Total Mahasiswa :",
		"type": "column",
		"valueField": "total",
		"legendValueText": "Umur [[category]] [[value]] Orang",
		"dashLengthField": "dashLengthColumn"
	}],
	"categoryField": "umur",
	"categoryAxis": {
		"gridPosition": "start",
		"axisAlpha": 0,
		"tickLength": 0,
		"labelRotation":10
	},
	legend: {
		
	   "equalWidths": false,
		"periodValueText": "[[value.sum]] Orang",
		"position": "bottom",
		"valueAlign": "left",
		"valueWidth": 500
	},
	"responsive":
	{
		"enabled": true
	},
	"chartCursor": 
	{
	},
	"export":
	{
		"enabled": true,
		"libs":
		{
			"path": "../export/libs/"
		}
	},
	"creditsPosition": "bottom-left",
	"mouseWheelZoomEnabled": true,
    "zoomOutOnDataUpdate": false
	}
);
</script>
<script>
var status=AmCharts.makeChart("status",
	{
	"type": "serial",
	"dataLoader":{
	  "url":"../chart/status.php",
	  "format":"json"
	},
	"numberFormatter": {
		"precision": -1,
		"decimalSeparator": ",",
		"thousandsSeparator": "."
	},
	"addClassNames": true,
	"theme": "light",
	// "path": "../amcharts/ammap/images/",
	"autoMargins": false,
	"marginLeft": 150,
	"marginRight": 20,
	"marginTop": 100,
	"marginBottom": 85,
	"balloon": {
		"adjustBorderColor": false,
		"horizontalPadding": 10,
		"verticalPadding": 8,
		"color": "#ffffff"
	},
	"valueAxes": [{
		"axisAlpha": 0,
		"position": "left"
	}],
	"startDuration": 1,
	"graphs": [{
		id: "g1",
		valueField: "aktif",
		title: "Total Mahasiswa Aktif",
		type: "column",
		fillAlphas: 0.7,
		valueAxis: "a1",
		descriptionField: "[[value]] Orang",
		balloonText: "Total Mahasiswa Aktif Tahun [[category]] : [[value]] Orang",
		legendValueText: "[[value]] Orang",
		lineColor: "#08a3cc",
		alphaField: "alpha",
		showBalloon: true,
		animationPlayed: true,
		"dashLengthField": "dashLengthColumn"
	},{
		id: "g2",
		valueField: "cuti",
		classNameField: "bulletClass",
		title: "Total Mahasiswa Cuti",
		type: "line",
		lineColor: "#786c56",
		lineThickness: 1,
		legendValueText: "[[value]] Orang",
		descriptionField: "townName",
		bullet: "round",
		bulletSizeField: "townSize",
		bulletBorderColor: "#02617a",
		bulletBorderAlpha: 1,
		bulletBorderThickness: 2,
		bulletColor: "#89c4f4",
		labelText: "[[value]] Orang",
		labelPosition: "right",
		balloonText: "Total Mahasiswa Cuti Tahun [[category]] : [[value]] Orang",
		showBalloon: true,
		animationPlayed: true,
	},{
		id: "g3",
		title: "Total Mahasiswa Drop Out",
		valueField: "dropoff",
		type: "line",
		valueAxis: "a3",
		lineAlpha: 0.8,
		lineColor: "#e26a6a",
		balloonText: "[[value]] Orang",
		lineThickness: 1,
		descriptionField: "[[value]] Orang",
		legendValueText: "[[value]] Orang",
		bullet: "square",
		bulletBorderColor: "#e26a6a",
		bulletBorderThickness: 1,
		bulletBorderAlpha: 0.8,
		dashLengthField: "dashLength",
		balloonText: "Total Mahasiswa Drop Out Tahun [[category]] :[[value]] Orang",
		animationPlayed: true
	},{
		id: "g4",
		valueField: "keluar",
		classNameField: "bulletClass",
		title: "Total Mahasiswa Keluar",
		type: "line",
		valueAxis: "a2",
		lineColor: "red",
		lineThickness: 1,
		legendValueText: "[[value]] Orang",
		descriptionField: "[[value]] Orang",
		bullet: "round",
		bulletSizeField: "townSize",
		bulletBorderColor: "#02617a",
		bulletBorderAlpha: 1,
		bulletBorderThickness: 2,
		bulletColor: "pink",
		labelText: "[[value]] Orang",
		labelPosition: "right",
		balloonText: "Total Mahasiswa Keluar Tahun [[category]] :[[value]] Orang",
		showBalloon: true,
		animationPlayed: true,
	},{
		id: "g5",
		title: "Total Mahasiswa Lulus",
		valueField: "lulus",
		type: "line",
		valueAxis: "a3",
		lineAlpha: 0.8,
		lineColor: "green",
		balloonText: "[[value]] Orang",
		lineThickness: 1,
		descriptionField: "[[value]] Orang",
		legendValueText: "[[value]] Orang",
		bullet: "square",
		bulletBorderColor: "#e26a6a",
		bulletBorderThickness: 1,
		bulletBorderAlpha: 0.8,
		dashLengthField: "dashLength",
		balloonText: "Total Mahasiswa Lulus Tahun [[category]] :[[value]] Orang",
		animationPlayed: true
	},{
		id: "g6",
		valueField: "nonaktif",
		classNameField: "bulletClass",
		title: "Total Mahasiswa Non Aktif",
		type: "line",
		lineColor: "gold",
		lineThickness: 1,
		legendValueText: "[[value]] Orang",
		descriptionField: "[[value]] Orang",
		bullet: "round",
		bulletSizeField: "townSize",
		bulletBorderColor: "cyan",
		bulletBorderAlpha: 1,
		bulletBorderThickness: 2,
		bulletColor: "#89c4f4",
		labelText: "[[value]] Orang",
		labelPosition: "right",
		balloonText: "Total Mahasiswa Non Aktif Tahun [[category]] :[[value]] Orang",
		showBalloon: true,
		animationPlayed: true,
	}],
	"categoryField": "tahun_angkatan",
	"categoryAxis": {
		"gridPosition": "start",
		"axisAlpha": 0,
		"tickLength": 0,
		"labelRotation":10
	},
	chartCursor: {
		zoomable: false,
		categoryBalloonDateFormat: "DD",
		cursorAlpha: 0,
		categoryBalloonColor: "#e26a6a",
		categoryBalloonAlpha: 0.8,
		valueBalloonsEnabled: true
	},
	legend: {
		bulletType: "round",
		equalWidths: false,
		valueWidth: 120,
		useGraphSettings: true,
		color: "#6c7b88",
		"periodValueText": "[[value.sum]] Orang"
	},
	"responsive":
	{
		"enabled": true
	},
	"export":
	{
		"enabled": true,
		"libs":
		{
			"path": "../export/libs/"
		}
	},
	"creditsPosition": "bottom-left",
	"mouseWheelZoomEnabled": true,
    "zoomOutOnDataUpdate": false
	}
);
</script>