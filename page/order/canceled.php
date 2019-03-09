<?
if(isset($_SESSION['token_procurement'])){
?>
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
	<div class="col-md-12">
		<div class="tabbable-line boxless tabbable-reversed">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#cancel" data-toggle="tab"> Order Cancel </a>
				</li>
				<li>
					<a href="#rejected" data-toggle="tab"> Order Rejected </a>
				</li>
				<li>
					<a href="#expired" data-toggle="tab"> Order Expired </a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="cancel">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption font-dark">
								<i class="icon-settings font-dark"></i>
								<span class="caption-subject bold uppercase">Order Cancel</span>
							</div>
							<div class="actions">
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-cloud-upload"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-wrench"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-trash"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="" title=""> </a>
							</div>
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
				<div class="tab-pane active" id="rejected">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption font-dark">
								<i class="icon-settings font-dark"></i>
								<span class="caption-subject bold uppercase">Order Rejected</span>
							</div>
							<div class="actions">
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-cloud-upload"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-wrench"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-trash"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="" title=""> </a>
							</div>
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
				<div class="tab-pane active" id="expired">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption font-dark">
								<i class="icon-settings font-dark"></i>
								<span class="caption-subject bold uppercase">Order Expired</span>
							</div>
							<div class="actions">
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-cloud-upload"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-wrench"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default" href="#">
									<i class="icon-trash"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="" title=""> </a>
							</div>
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
		</div>
	</div>
</div>
<!-- END PAGE BASE CONTENT -->
<?
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>