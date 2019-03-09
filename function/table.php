<script type="text/javascript">
$('#best_seller').DataTable( {
	"dom": "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
    responsive: true,
	"language": {
		"aria": {
			"sortAscending": ": activate to sort column ascending",
			"sortDescending": ": activate to sort column descending"
		},
		"emptyTable": "Data Best Seller tidak tersedia",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
		"infoEmpty": "Data tidak ditemukan",
		"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
		"lengthMenu": "_MENU_ data",
		"search": "Cari:",
		"zeroRecords": "Tidak ada data yang cocok"
	},
	colReorder: {
		realtime: false
	},
    buttons:[
	{ extend: 'print', className: 'btn m-btn--square  m-btn m-btn--gradient-from-primary m-btn--gradient-to-info' },
	// { extend: 'copyHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-success m-btn--gradient-to-accent' },
	{ extend: 'excelHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning' },
	// { extend: 'csvHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger' },
	{ extend: 'pdfHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-info m-btn--gradient-to-accent' }
	],
	"order": [
		[0, 'asc']
	],
	"lengthMenu": [
		[10, 25, 50, -1],
		[10, 25, 50, "All"] // change per page values here
	],
	// set the initial value
	"pageLength": 10
} );
$('#best_customer_location').DataTable( {
	"dom": "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
    // responsive: true,
	"language": {
		"aria": {
			"sortAscending": ": activate to sort column ascending",
			"sortDescending": ": activate to sort column descending"
		},
		"emptyTable": "Data Best Customer Location tidak tersedia",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
		"infoEmpty": "Data tidak ditemukan",
		"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
		"lengthMenu": "_MENU_ data",
		"search": "Cari:",
		"zeroRecords": "Tidak ada data yang cocok"
	},
	colReorder: {
		realtime: false
	},
    buttons:[
	{ extend: 'print', className: 'btn m-btn--square  m-btn m-btn--gradient-from-primary m-btn--gradient-to-info' },
	// { extend: 'copyHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-success m-btn--gradient-to-accent' },
	{ extend: 'excelHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning' },
	// { extend: 'csvHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger' },
	{ extend: 'pdfHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-info m-btn--gradient-to-accent' }
	],
	"order": [
		[0, 'asc']
	],
	"lengthMenu": [
		[10, 25, 50, 100, 200, 500, 1000, -1],
		[10, 25, 50, 100, 200, 500, 1000,"All"] // change per page values here
	],
	// set the initial value
	"pageLength": 10
} );
$('#best_customer').DataTable( {
	"dom": "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
    responsive: true,
	"language": {
		"aria": {
			"sortAscending": ": activate to sort column ascending",
			"sortDescending": ": activate to sort column descending"
		},
		"emptyTable": "Data Best Customer tidak tersedia",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
		"infoEmpty": "Data tidak ditemukan",
		"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
		"lengthMenu": "_MENU_ data",
		"search": "Cari:",
		"zeroRecords": "Tidak ada data yang cocok"
	},
	colReorder: {
		realtime: false
	},
    buttons:[
	{ extend: 'print', className: 'btn m-btn--square  m-btn m-btn--gradient-from-primary m-btn--gradient-to-info' },
	// { extend: 'copyHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-success m-btn--gradient-to-accent' },
	{ extend: 'excelHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning' },
	// { extend: 'csvHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger' },
	{ extend: 'pdfHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-info m-btn--gradient-to-accent' }
	],
	"order": [
		[0, 'asc']
	],
	"lengthMenu": [
		[5, 10, 25, 50, 100, -1],
		[5, 10, 25, 50, 100, "All"] // change per page values here
	],
	// set the initial value
	"pageLength": 5
} );
$('#best_customer_service').DataTable( {
	"dom": "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
    responsive: true,
	"language": {
		"aria": {
			"sortAscending": ": activate to sort column ascending",
			"sortDescending": ": activate to sort column descending"
		},
		"emptyTable": "Data Best Customer Service tidak tersedia",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
		"infoEmpty": "Data tidak ditemukan",
		"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
		"lengthMenu": "_MENU_ data",
		"search": "Cari:",
		"zeroRecords": "Tidak ada data yang cocok"
	},
	colReorder: {
		realtime: false
	},
    buttons:[
	{ extend: 'print', className: 'btn m-btn--square  m-btn m-btn--gradient-from-primary m-btn--gradient-to-info' },
	// { extend: 'copyHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-success m-btn--gradient-to-accent' },
	{ extend: 'excelHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning' },
	// { extend: 'csvHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger' },
	{ extend: 'pdfHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-info m-btn--gradient-to-accent' }
	],
	"order": [
		[0, 'asc']
	],
	"lengthMenu": [
		[10, 25, 50, 100, 200, 500, 1000, -1],
		[10, 25, 50, 100, 200, 500, 1000,"All"] // change per page values here
	],
	// set the initial value
	"pageLength": 10
} );
$('#table-vbank').DataTable( {
	"dom": "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
    responsive: true,
	"language": {
		"aria": {
			"sortAscending": ": activate to sort column ascending",
			"sortDescending": ": activate to sort column descending"
		},
		"emptyTable": "Data Transaksi Per Bank tidak tersedia",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
		"infoEmpty": "Data tidak ditemukan",
		"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
		"lengthMenu": "_MENU_ data",
		"search": "Cari:",
		"zeroRecords": "Tidak ada data yang cocok"
	},
	colReorder: {
		realtime: false
	},
    buttons:[
	{ extend: 'print', className: 'btn m-btn--square  m-btn m-btn--gradient-from-primary m-btn--gradient-to-info' },
	// { extend: 'copyHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-success m-btn--gradient-to-accent' },
	{ extend: 'excelHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning' },
	// { extend: 'csvHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger' },
	{ extend: 'pdfHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-info m-btn--gradient-to-accent' }
	],
	"order": [
		[0, 'asc']
	],
	"lengthMenu": [
		[10, 25, 50, 100, 200, 500, 1000, -1],
		[10, 25, 50, 100, 200, 500, 1000,"All"] // change per page values here
	],
	// set the initial value
	"pageLength": 10
} );
$('#table-jurnal').DataTable( {
	"dom": "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
    responsive: true,
	"language": {
		"aria": {
			"sortAscending": ": activate to sort column ascending",
			"sortDescending": ": activate to sort column descending"
		},
		"emptyTable": "Data Jurnal tidak tersedia",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
		"infoEmpty": "Data tidak ditemukan",
		"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
		"lengthMenu": "_MENU_ data",
		"search": "Cari:",
		"zeroRecords": "Tidak ada data yang cocok"
	},
	colReorder: {
		realtime: false
	},
    buttons:[
	{ extend: 'print', className: 'btn m-btn--square  m-btn m-btn--gradient-from-primary m-btn--gradient-to-info' },
	{ extend: 'copyHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-success m-btn--gradient-to-accent' },
	{ extend: 'excelHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning' },
	{ extend: 'csvHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger' },
	{ extend: 'pdfHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-info m-btn--gradient-to-accent' }
	],
	"order": [
		[0, 'asc']
	],
	"lengthMenu": [
		[10, 25, 50, 100, 200, 500, 1000, -1],
		[10, 25, 50, 100, 200, 500, 1000,"All"] // change per page values here
	],
	// set the initial value
	"pageLength": 10
} );
$('#table-rb').DataTable( {
	"dom": "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
    responsive: true,
	"language": {
		"aria": {
			"sortAscending": ": activate to sort column ascending",
			"sortDescending": ": activate to sort column descending"
		},
		"emptyTable": "Data Rugi Laba tidak tersedia",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
		"infoEmpty": "Data tidak ditemukan",
		"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
		"lengthMenu": "_MENU_ data",
		"search": "Cari:",
		"zeroRecords": "Tidak ada data yang cocok"
	},
	colReorder: {
		realtime: false
	},
    buttons:[
	{ extend: 'print', className: 'btn m-btn--square  m-btn m-btn--gradient-from-primary m-btn--gradient-to-info' },
	{ extend: 'copyHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-success m-btn--gradient-to-accent' },
	{ extend: 'excelHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning' },
	{ extend: 'csvHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger' },
	{ extend: 'pdfHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-info m-btn--gradient-to-accent' }
	],
	// "order": [
		// [2, 'desc']
	// ],
	"order": [
		[2]
	],
	"lengthMenu": [
		[10, 25, 50, -1],
		[10, 25, 50, "All"] // change per page values here
	],
	// set the initial value
	"pageLength": 10
} );
$('#table-user').DataTable( {
	"dom": "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
    responsive: true,
	"language": {
		"aria": {
			"sortAscending": ": activate to sort column ascending",
			"sortDescending": ": activate to sort column descending"
		},
		"emptyTable": "Data User tidak tersedia",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
		"infoEmpty": "Data tidak ditemukan",
		"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
		"lengthMenu": "_MENU_ data",
		"search": "Cari:",
		"zeroRecords": "Tidak ada data yang cocok"
	},
	colReorder: {
		realtime: false
	},
    buttons:[
	{ extend: 'print', className: 'btn m-btn--square  m-btn m-btn--gradient-from-primary m-btn--gradient-to-info' },
	{ extend: 'copyHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-success m-btn--gradient-to-accent' },
	{ extend: 'excelHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning' },
	{ extend: 'csvHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger' },
	{ extend: 'pdfHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-info m-btn--gradient-to-accent' }
	],
	"order": [
		[0, 'asc']
	],
	"lengthMenu": [
		[10, 25, 50, -1],
		[10, 25, 50, "All"] // change per page values here
	],
	// set the initial value
	"pageLength": 10
} );
</script>