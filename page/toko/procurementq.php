<?
if(isset($_SESSION['token_procurement'])){
	if(isset($_GET['hal']))
	{
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/ads/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/ads/perbarui.php');
		  break;
		  default:
		  // echo "<script>window.location.href='../error/error.html'</script>";
	  }
	}else{
?>
<!-- BEGIN PAGE BASE CONTENT -->
<div class="profile">
	<div class="tabbable-line tabbable-full-width">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#tab_1_1" data-toggle="tab"> Overview </a>
			</li>
			<li>
				<a href="#tab_1_3" data-toggle="tab"> Toko </a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1_1">
				<div class="row">
					<div class="col-md-3">
						<ul class="list-unstyled profile-nav">
							<li>
								<img src="../assets/pages/media/profile/people19.png" class="img-responsive pic-bordered" alt="" />
								<a href="javascript:;" class="profile-edit"> edit </a>
							</li>
							<li>
								<a href="javascript:;"> Projects </a>
							</li>
							<li>
								<a href="javascript:;"> Messages
									<span> 3 </span>
								</a>
							</li>
							<li>
								<a href="javascript:;"> Friends </a>
							</li>
							<li>
								<a href="javascript:;"> Settings </a>
							</li>
						</ul>
					</div>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-8 profile-info">
								<h1 class="font-green sbold uppercase">John Doe</h1>
								<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.
									</p>
								<p>
									<a href="javascript:;"> www.mywebsite.com </a>
								</p>
								<ul class="list-inline">
									<li>
										<i class="fa fa-map-marker"></i> Spain </li>
									<li>
										<i class="fa fa-calendar"></i> 18 Jan 1982 </li>
									<li>
										<i class="fa fa-briefcase"></i> Design </li>
									<li>
										<i class="fa fa-star"></i> Top Seller </li>
									<li>
										<i class="fa fa-heart"></i> BASE Jumping </li>
								</ul>
							</div>
							<!--end col-md-8-->
							<div class="col-md-4">
								<div class="portlet sale-summary">
									<div class="portlet-title">
										<div class="caption font-red sbold"> Sales Summary </div>
										<div class="tools">
											<a class="reload" href="javascript:;"> </a>
										</div>
									</div>
									<div class="portlet-body">
										<ul class="list-unstyled">
											<li>
												<span class="sale-info"> TODAY SOLD
													<i class="fa fa-img-up"></i>
												</span>
												<span class="sale-num"> 23 </span>
											</li>
											<li>
												<span class="sale-info"> WEEKLY SALES
													<i class="fa fa-img-down"></i>
												</span>
												<span class="sale-num"> 87 </span>
											</li>
											<li>
												<span class="sale-info"> TOTAL SOLD </span>
												<span class="sale-num"> 2377 </span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!--end col-md-4-->
						</div>
						<!--end row-->
						<div class="tabbable-line tabbable-custom-profile">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_11" data-toggle="tab"> Latest Customers </a>
								</li>
								<li>
									<a href="#tab_1_22" data-toggle="tab"> Feeds </a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1_11">
									<div class="portlet-body">
										<table class="table table-striped table-bordered table-advance table-hover">
											<thead>
												<tr>
													<th>
														<i class="fa fa-briefcase"></i> Company </th>
													<th class="hidden-xs">
														<i class="fa fa-question"></i> Descrition </th>
													<th>
														<i class="fa fa-bookmark"></i> Amount </th>
													<th> </th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<a href="javascript:;"> Pixel Ltd </a>
													</td>
													<td class="hidden-xs"> Server hardware purchase </td>
													<td> 52560.10$
														<span class="label label-success label-sm"> Paid </span>
													</td>
													<td>
														<a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="javascript:;"> Smart House </a>
													</td>
													<td class="hidden-xs"> Office furniture purchase </td>
													<td> 5760.00$
														<span class="label label-warning label-sm"> Pending </span>
													</td>
													<td>
														<a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="javascript:;"> FoodMaster Ltd </a>
													</td>
													<td class="hidden-xs"> Company Anual Dinner Catering </td>
													<td> 12400.00$
														<span class="label label-success label-sm"> Paid </span>
													</td>
													<td>
														<a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="javascript:;"> WaterPure Ltd </a>
													</td>
													<td class="hidden-xs"> Payment for Jan 2013 </td>
													<td> 610.50$
														<span class="label label-danger label-sm"> Overdue </span>
													</td>
													<td>
														<a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="javascript:;"> Pixel Ltd </a>
													</td>
													<td class="hidden-xs"> Server hardware purchase </td>
													<td> 52560.10$
														<span class="label label-success label-sm"> Paid </span>
													</td>
													<td>
														<a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="javascript:;"> Smart House </a>
													</td>
													<td class="hidden-xs"> Office furniture purchase </td>
													<td> 5760.00$
														<span class="label label-warning label-sm"> Pending </span>
													</td>
													<td>
														<a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
													</td>
												</tr>
												<tr>
													<td>
														<a href="javascript:;"> FoodMaster Ltd </a>
													</td>
													<td class="hidden-xs"> Company Anual Dinner Catering </td>
													<td> 12400.00$
														<span class="label label-success label-sm"> Paid </span>
													</td>
													<td>
														<a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<!--tab-pane-->
								<div class="tab-pane" id="tab_1_22">
									<div class="tab-pane active" id="tab_1_1_1">
										<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
											<ul class="feeds">
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-success">
																	<i class="fa fa-bell-o"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> You have 4 pending tasks.
																	<span class="label label-danger label-sm"> Take action
																		<i class="fa fa-share"></i>
																	</span>
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> Just now </div>
													</div>
												</li>
												<li>
													<a href="javascript:;">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc"> New version v1.4 just lunched! </div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date"> 20 mins </div>
														</div>
													</a>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-danger">
																	<i class="fa fa-bolt"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> Database server #12 overloaded. Please fix the issue. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 24 mins </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 30 mins </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-success">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 40 mins </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-warning">
																	<i class="fa fa-plus"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New user registered. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 1.5 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-success">
																	<i class="fa fa-bell-o"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> Web server hardware needs to be upgraded.
																	<span class="label label-inverse label-sm"> Overdue </span>
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 2 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 3 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-warning">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 5 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 18 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 21 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 22 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 21 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 22 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 21 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 22 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 21 hours </div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc"> New order received. Please take care of it. </div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date"> 22 hours </div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!--tab-pane-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--tab_1_2-->
			<div class="tab-pane" id="tab_1_3">
				<div class="row profile-account">
					<div class="col-md-3">
						<ul class="ver-inline-menu tabbable margin-bottom-10">
							<li class="active">
								<a data-toggle="tab" href="#tab_1-1">
									<i class="fa fa-cog"></i> Personal info </a>
								<span class="after"> </span>
							</li>
							<li>
								<a data-toggle="tab" href="#tab_2-2">
									<i class="fa fa-picture-o"></i> Change Avatar </a>
							</li>
							<li>
								<a data-toggle="tab" href="#tab_3-3">
									<i class="fa fa-lock"></i> Change Password </a>
							</li>
							<li>
								<a data-toggle="tab" href="#tab_4-4">
									<i class="fa fa-eye"></i> Privacity Settings </a>
							</li>
						</ul>
					</div>
					<div class="col-md-9">
						<div class="tab-content">
							<div id="tab_1-1" class="tab-pane active">
								<form role="form" action="#">
									<div class="form-group">
										<label class="control-label">First Name</label>
										<input type="text" placeholder="John" class="form-control" /> </div>
									<div class="form-group">
										<label class="control-label">Last Name</label>
										<input type="text" placeholder="Doe" class="form-control" /> </div>
									<div class="form-group">
										<label class="control-label">Mobile Number</label>
										<input type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control" /> </div>
									<div class="form-group">
										<label class="control-label">Interests</label>
										<input type="text" placeholder="Design, Web etc." class="form-control" /> </div>
									<div class="form-group">
										<label class="control-label">Occupation</label>
										<input type="text" placeholder="Web Developer" class="form-control" /> </div>
									<div class="form-group">
										<label class="control-label">About</label>
										<textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>
									</div>
									<div class="form-group">
										<label class="control-label">Website Url</label>
										<input type="text" placeholder="http://www.mywebsite.com" class="form-control" /> </div>
									<div class="margiv-top-10">
										<a href="javascript:;" class="btn green"> Save Changes </a>
										<a href="javascript:;" class="btn default"> Cancel </a>
									</div>
								</form>
							</div>
							<div id="tab_2-2" class="tab-pane">
								<p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
									</p>
								<form action="#" role="form">
									<div class="form-group">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
												<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
											<div>
												<span class="btn default btn-file">
													<span class="fileinput-new"> Select image </span>
													<span class="fileinput-exists"> Change </span>
													<input type="file" name="..."> </span>
												<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
											</div>
										</div>
										<div class="clearfix margin-top-10">
											<span class="label label-danger"> NOTE! </span>
											<span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
										</div>
									</div>
									<div class="margin-top-10">
										<a href="javascript:;" class="btn green"> Submit </a>
										<a href="javascript:;" class="btn default"> Cancel </a>
									</div>
								</form>
							</div>
							<div id="tab_3-3" class="tab-pane">
								<form action="#">
									<div class="form-group">
										<label class="control-label">Current Password</label>
										<input type="password" class="form-control" /> </div>
									<div class="form-group">
										<label class="control-label">New Password</label>
										<input type="password" class="form-control" /> </div>
									<div class="form-group">
										<label class="control-label">Re-type New Password</label>
										<input type="password" class="form-control" /> </div>
									<div class="margin-top-10">
										<a href="javascript:;" class="btn green"> Change Password </a>
										<a href="javascript:;" class="btn default"> Cancel </a>
									</div>
								</form>
							</div>
							<div id="tab_4-4" class="tab-pane">
								<form action="#">
									<table class="table table-bordered table-striped">
										<tr>
											<td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
											<td>
												<div class="mt-radio-inline">
													<label class="mt-radio">
														<input type="radio" name="optionsRadios1" value="option1" /> Yes
														<span></span>
													</label>
													<label class="mt-radio">
														<input type="radio" name="optionsRadios1" value="option2" checked/> No
														<span></span>
													</label>
												</div>
											</td>
										</tr>
										<tr>
											<td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
											<td>
												<div class="mt-radio-inline">
													<label class="mt-radio">
														<input type="radio" name="optionsRadios21" value="option1" /> Yes
														<span></span>
													</label>
													<label class="mt-radio">
														<input type="radio" name="optionsRadios21" value="option2" checked/> No
														<span></span>
													</label>
												</div>
											</td>
										</tr>
										<tr>
											<td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
											<td>
												<div class="mt-radio-inline">
													<label class="mt-radio">
														<input type="radio" name="optionsRadios31" value="option1" /> Yes
														<span></span>
													</label>
													<label class="mt-radio">
														<input type="radio" name="optionsRadios31" value="option2" checked/> No
														<span></span>
													</label>
												</div>
											</td>
										</tr>
										<tr>
											<td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
											<td>
												<div class="mt-radio-inline">
													<label class="mt-radio">
														<input type="radio" name="optionsRadios41" value="option1" /> Yes
														<span></span>
													</label>
													<label class="mt-radio">
														<input type="radio" name="optionsRadios41" value="option2" checked/> No
														<span></span>
													</label>
												</div>
											</td>
										</tr>
									</table>
									<!--end profile-settings-->
									<div class="margin-top-10">
										<a href="javascript:;" class="btn green"> Save Changes </a>
										<a href="javascript:;" class="btn default"> Cancel </a>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!--end col-md-9-->
				</div>
			</div>
			<!--end tab-pane-->
		</div>
	</div>
</div>
<!-- END PAGE BASE CONTENT -->
<?
	}
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/procurement/'</script>";
}
?>