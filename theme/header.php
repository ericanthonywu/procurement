<?
$token = $_SESSION['token_procurement'];
$sql_profile = mysqli_query($procurement,"SELECT * FROM auth WHERE username = '$token'");
$data_profile = mysqli_fetch_array($sql_profile);
$id_tokennya = $data_profile['id'];
$nama_tokennya = $data_profile['nama'];
$level = $data_profile['lv'];
$sql_notif = mysqli_query($procurement,"select * from notif where kategori = 'notif'");
$num_notif = mysqli_num_rows($sql_notif);
?>
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner ">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?=$url?>">
				<span class="logo-default" ><?=$data_toko['nama']?></span> </a>
			<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
			<!-- BEGIN HEADER SEARCH BOX -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="separator hide"> </li>
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
					<!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
					<li class="dropdown dropdown-extended dropdown-notification dropdown-dark notif_notif" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-success"> <?=$num_notif?> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold"><?=$num_notif?> pending</span> notifications</h3>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                            <img src="<?=$url?>ajax/img/ajax-loader.gif" id="imageajax" class="image loading" draggable="false">
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="separator hide"> </li>
					<!-- BEGIN INBOX DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-inbox dropdown-dark notif_msg" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-envelope-open"></i>
							<span class="badge badge-danger"> 4 </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <span class="bold">7 New</span> Messages
                                </h3>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="#">
											<span class="photo">
												<img src="" class="img-circle" alt=""> </span>
											<span class="subject">
												<span class="from"> Richard Doe </span>
												<span class="time">46 mins </span>
											</span>
											<span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<li class="separator hide"> </li>
					<!-- BEGIN TODO DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-tasks dropdown-dark notif_task" id="header_task_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-success"> <?=$num_notif?> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold"><?=$num_notif?> pending</span> notifications</h3>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                            <img src="<?=$url?>ajax/img/ajax-loader.gif" id="imageajax" class="image loading" draggable="false">
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
					</li>
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<span class="username username-hide-on-mobile"> <?=$data_profile['nama']?> </span>
							<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
							<img alt="" class="img-circle" src="" /> </a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="<?=$url?>profile">
									<i class="icon-user"></i>Profile </a>
							</li>
							<?
							if($level==1){
							?>
							<li>
								<a href="app_calendar.html">
									<i class="icon-calendar"></i>Setting</a>
							</li>
							<?
							}
							?>
							<li>
								<a href="app_inbox.html">
									<i class="icon-envelope-open"></i>Affiliate
								</a>
							</li>
							<li class="divider"> </li>
							<li>
								<a href="<?=$url?>signout">
									<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>