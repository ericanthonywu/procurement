<script type="text/javascript">
	$(document).ready(function(){
		$('#tahun_tanggal_report').datepicker( {
			minViewMode: 2,
			format: 'yyyy',
			autoclose: true
		});
		$('#jam').timepicker( {
			minuteStep: 1,
			defaultTime: '',
			showMeridian: false,
            snapToStep: true,
			autoclose: true
		});
		$('#tanggal_gajian').datepicker({
			todayBtn: "linked",
            clearBtn: true,
			todayHighlight: true,
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#tanggal_report').datepicker({
			todayBtn: "linked",
            clearBtn: true,
			todayHighlight: true,
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#dari_tanggal_report').datepicker({
			todayBtn: "linked",
            clearBtn: true,
			todayHighlight: true,
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#sampai_tanggal_report').datepicker({
			todayBtn: "linked",
            clearBtn: true,
			todayHighlight: true,
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#sampai').datepicker({
			todayBtn: "linked",
            clearBtn: true,
			todayHighlight: true,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            },
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		
		$('#tanggal').datepicker({
			todayBtn: "linked",
            clearBtn: true,
			todayHighlight: true,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            },
			format: 'yyyy-mm-dd',
			autoclose: true
		});
	});
</script>