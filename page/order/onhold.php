<?
if(isset($_SESSION['token_procurement'])){
?>
<!-- BEGIN PAGE BASE CONTENT -->
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
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="icon-settings font-dark"></i>
					<span class="caption-subject bold uppercase">Order</span>
				</div>
				<div class="tools"> <a class="push-right">Tambah Order</a></div>
			</div>
			<div class="portlet-body">
				<div class="invoice-content-2 bordered">
					<div class="row invoice-head">
						<div class="col-md-7 col-xs-6">
							<div class="invoice-logo">
								<img src="../assets/pages/img/logos/logo5.jpg" class="img-responsive" alt="" />
								<h1 class="uppercase">Invoice</h1>
							</div>
						</div>
						<div class="col-md-5 col-xs-6">
							<div class="company-address">
								<span class="bold uppercase">Metronic Inc.</span>
								<br/> 25, Lorem Lis Street, Orange C
								<br/> California, US
								<br/>
								<span class="bold">T</span> 1800 123 456
								<br/>
								<span class="bold">E</span> support@keenthemes.com
								<br/>
								<span class="bold">W</span> www.keenthemes.com </div>
						</div>
					</div>
					<div class="row invoice-cust-add">
						<div class="col-xs-3">
							<h2 class="invoice-title uppercase">Customer</h2>
							<p class="invoice-desc">Lorem Tech Co.</p>
						</div>
						<div class="col-xs-3">
							<h2 class="invoice-title uppercase">Date</h2>
							<p class="invoice-desc">Nov 12, 2015</p>
						</div>
						<div class="col-xs-6">
							<h2 class="invoice-title uppercase">Address</h2>
							<p class="invoice-desc inv-address">25, Lorem Lis Street, Orange C, California, US</p>
						</div>
					</div>
					<div class="row invoice-body">
						<div class="col-xs-12 table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th class="invoice-title uppercase">Description</th>
										<th class="invoice-title uppercase text-center">Hours</th>
										<th class="invoice-title uppercase text-center">Rate</th>
										<th class="invoice-title uppercase text-center">Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<h3>Web Design & Development</h3>
											<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet et dolore siat magna aliquam erat volutpat. </p>
										</td>
										<td class="text-center sbold">200</td>
										<td class="text-center sbold">80$</td>
										<td class="text-center sbold">16,000$</td>
									</tr>
									<tr>
										<td>
											<h3>Branding</h3>
											<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. </p>
										</td>
										<td class="text-center sbold">130</td>
										<td class="text-center sbold">60$</td>
										<td class="text-center sbold">7,800$</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row invoice-subtotal">
						<div class="col-xs-3">
							<h2 class="invoice-title uppercase">Subtotal</h2>
							<p class="invoice-desc">23,800$</p>
						</div>
						<div class="col-xs-3">
							<h2 class="invoice-title uppercase">Tax (0%)</h2>
							<p class="invoice-desc">0$</p>
						</div>
						<div class="col-xs-6">
							<h2 class="invoice-title uppercase">Total</h2>
							<p class="invoice-desc grand-total">23,800$</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
						</div>
					</div>
				</div>
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