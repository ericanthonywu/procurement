<?
if(isset($_SESSION['token_procurement'])){
?>
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="icon-settings font-dark"></i>
					<span class="caption-subject bold uppercase">Produk</span>
				</div>
				<div class="tools"> </div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN FORM-->
				<form action="#" class="horizontal-form">
					<div class="form-body">
						<h3 class="form-section">Person Info</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">First Name</label>
									<input type="text" id="firstName" class="form-control" placeholder="Chee Kin">
									<span class="help-block"> This is inline help </span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group has-error">
									<label class="control-label">Last Name</label>
									<input type="text" id="lastName" class="form-control" placeholder="Lim">
									<span class="help-block"> This field has error. </span>
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Gender</label>
									<select class="form-control">
										<option value="">Male</option>
										<option value="">Female</option>
									</select>
									<span class="help-block"> Select your gender </span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Date of Birth</label>
									<input type="text" class="form-control" placeholder="dd/mm/yyyy"> </div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Category</label>
									<select class="form-control" data-placeholder="Choose a Category" tabindex="1">
										<option value="Category 1">Category 1</option>
										<option value="Category 2">Category 2</option>
										<option value="Category 3">Category 5</option>
										<option value="Category 4">Category 4</option>
									</select>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Membership</label>
									<div class="radio-list">
										<label class="radio-inline">
											<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> Option 1 </label>
										<label class="radio-inline">
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> Option 2 </label>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<h3 class="form-section">Address</h3>
						<div class="row">
							<div class="col-md-12 ">
								<div class="form-group">
									<label>Street</label>
									<input type="text" class="form-control"> </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>City</label>
									<input type="text" class="form-control"> </div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label>State</label>
									<input type="text" class="form-control"> </div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Post Code</label>
									<input type="text" class="form-control"> </div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label>Country</label>
									<select class="form-control"> </select>
								</div>
							</div>
							<!--/span-->
						</div>
					</div>
					<div class="form-actions right">
						<button type="button" class="btn default">Cancel</button>
						<button type="submit" class="btn blue">
							<i class="fa fa-check"></i> Save</button>
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