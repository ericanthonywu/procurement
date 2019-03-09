<div class="page-sidebar-wrapper">
	<!-- BEGIN SIDEBAR -->
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
		<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
		<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
		<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			<li class="nav-item <?= $halaman=='dashboard' ?'start active open':'';  ?>">
				<a href="<?=$url?>dashboard" class="nav-link">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
				</a>
			</li>
			<li class="heading">
				<h3 class="uppercase">Menu Utama</h3>
			</li>
			<?
			if($level == 1){
			?>
			<li class="nav-item <?= $halaman=='order' ?'start active open':'';  ?>">
				<a href="<?=$url?>order" class="nav-link">
					<i class="icon-doc"></i>
					<span class="title">All Order</span>
				</a>
			</li>
			<?
			/*
			<li class="nav-item <?= $halaman=='order' ?'start active open':'';  ?> ">
				<a href="javascript:;" class="nav-link nav-toggle">
					<i class="icon-basket"></i>
					<span class="title">Order</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item <?= $halaman=='order' ?'start active open':'';  ?>">
						<a href="<?=$url?>order" class="nav-link">
							<i class="icon-doc"></i>
							<span class="title">All Order</span>
						</a>
					</li>
					<li class="nav-item <?= $hal=='onhold' ?'start active open':'';  ?>">
						<a href="<?=$url?>order/onhold" class="nav-link ">
							<i class="icon-hourglass"></i>
							<span class="title">On-Hold</span>
						</a>
					</li>
					<li class="nav-item <?= $hal=='canceled' ?'start active open':'';  ?> ">
						<a href="<?=$url?>order/canceled" class="nav-link ">
							<i class="icon-action-undo"></i>
							<span class="title">Canceled Order</span>
						</a>
					</li>
					<li class="nav-item <?= $hal=='jemput' ?'start active open':'';  ?> ">
						<a href="<?=$url?>order/jemput" class="nav-link ">
							<i class="fa fa-car"></i>
							<span class="title">Jemput Paket</span>
						</a>
					</li>
				</ul>
			</li>
			*/
			?>
			<li class="nav-item <?= $halaman=='produk' ?'start active open':'';  ?>">
				<a href="<?=$url?>produk" class="nav-link">
					<i class="icon-handbag"></i>
					<span class="title">Product</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='expenses' ?'start active open':'';  ?>">
				<a href="<?=$url?>expenses" class="nav-link">
					<i class="icon-tag"></i>
					<span class="title">Expense</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='customer' ?'start active open':'';  ?>">
				<a href="<?=$url?>customer" class="nav-link">
					<i class="icon-user"></i>
					<span class="title">Customer</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='report' ?'start active open':'';  ?>">
				<a href="<?=$url?>report" class="nav-link">
					<i class="icon-bar-chart"></i>
					<span class="title">Report</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='analyzer' ?'start active open':'';  ?>">
				<a href="<?=$url?>analyzer" class="nav-link">
					<i class="icon-rocket"></i>
					<span class="title">Analyzer</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='ads' ?'start active open':'';  ?>">
				<a href="<?=$url?>ads" class="nav-link">
					<i class="icon-screen-desktop"></i>
					<span class="title">Ads</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='penggajian' ?'start active open':'';  ?>">
				<a href="<?=$url?>penggajian" class="nav-link">
					<i class="icon-wallet"></i>
					<span class="title">Penggajian</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='toko' AND $halaman=='bank' AND $halaman=='sanksi' AND $halaman=='punishment' AND $halaman=='reward' AND $halaman=='supplier' AND $halaman=='user' AND $halaman=='kategori-produk' ?'start active open':'';  ?> ">
				<a href="javascript:;" class="nav-link nav-toggle">
					<i class="icon-settings"></i>
					<span class="title">Settings</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item  <?= $halaman=='toko' ?'start active open':'';  ?>">
						<a href="<?=$url?>toko" class="nav-link ">
							<span class="title">Toko</span>
						</a>
					</li>
					<li class="nav-item <?= $halaman=='bank' ?'start active open':'';  ?> ">
						<a href="<?=$url?>bank" class="nav-link ">
							<span class="title">Bank</span>
						</a>
					</li>
					<li class="nav-item <?= $halaman=='sanksi' ?'start active open':'';  ?> ">
						<a href="<?=$url?>sanksi" class="nav-link ">
							<span class="title">Sanksi</span>
						</a>
					</li>
					<li class="nav-item  <?= $halaman=='punishment' ?'start active open':'';  ?>">
						<a href="<?=$url?>punishment" class="nav-link ">
							<span class="title">Data Master Punishment</span>
						</a>
					</li>
					<li class="nav-item  <?= $halaman=='reward' ?'start active open':'';  ?>">
						<a href="<?=$url?>reward" class="nav-link ">
							<span class="title">Data Master Reward</span>
						</a>
					</li>
					<li class="nav-item  <?= $halaman=='supplier' ?'start active open':'';  ?>">
						<a href="<?=$url?>supplier" class="nav-link ">
							<span class="title">Supplier</span>
						</a>
					</li>
					<li class="nav-item  <?= $halaman=='user' ?'start active open':'';  ?>">
						<a href="<?=$url?>user" class="nav-link ">
							<span class="title">User</span>
						</a>
					</li>
					<li class="nav-item  <?= $halaman=='kategori-produk' ?'start active open':'';  ?>">
						<a href="<?=$url?>kategori-produk" class="nav-link ">
							<span class="title">Kategori Produk</span>
						</a>
					</li>
				</ul>
			</li>
			<?
			}elseif($level==2){
			?>
			<li class="nav-item <?= $halaman=='order' ?'start active open':'';  ?>">
				<a href="<?=$url?>order" class="nav-link">
					<i class="icon-doc"></i>
					<span class="title">Order</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='produk' ?'start active open':'';  ?>">
				<a href="<?=$url?>produk" class="nav-link">
					<i class="icon-handbag"></i>
					<span class="title">Product</span>
				</a>
			</li>
			<li class="nav-item  <?= $halaman=='user' ?'start active open':'';  ?>">
				<a href="<?=$url?>user" class="nav-link ">
					<i class="icon-user"></i>
					<span class="title">User</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='penggajian' ?'start active open':'';  ?>">
				<a href="<?=$url?>penggajian" class="nav-link">
					<i class="icon-wallet"></i>
					<span class="title">Penggajian</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='sanksi' ?'start active open':'';  ?> ">
				<a href="<?=$url?>sanksi" class="nav-link ">
					<i class="fa fa-money"></i>
					<span class="title">Sanksi</span>
				</a>
			</li>
			<li class="nav-item  <?= $halaman=='punishment' ?'start active open':'';  ?>">
				<a href="<?=$url?>punishment" class="nav-link ">
					<i class="icon-settings"></i>
					<span class="title">Data Master Punishment</span>
				</a>
			</li>
			<li class="nav-item  <?= $halaman=='reward' ?'start active open':'';  ?>">
				<a href="<?=$url?>reward" class="nav-link ">
					<i class="icon-settings"></i>
					<span class="title">Data Master Reward</span>
				</a>
			</li>
			<?
			}elseif($level==3){
			?>
			<li class="nav-item <?= $halaman=='ads' ?'start active open':'';  ?>">
				<a href="<?=$url?>ads" class="nav-link">
					<i class="icon-screen-desktop"></i>
					<span class="title">Ads</span>
				</a>
			</li>
			<?
			}elseif($level==4){
			?>
			<li class="nav-item <?= $halaman=='order' ?'start active open':'';  ?>">
				<a href="<?=$url?>order" class="nav-link">
					<i class="icon-doc"></i>
					<span class="title">Order</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='ads' ?'start active open':'';  ?>">
				<a href="<?=$url?>ads" class="nav-link">
					<i class="icon-screen-desktop"></i>
					<span class="title">Ads</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='bonus' ?'start active open':'';  ?> ">
				<a href="<?=$url?>bonus" class="nav-link ">
					<i class="fa fa-money"></i>
					<span class="title">Bonus</span>
				</a>
			</li>
			<li class="nav-item <?= $halaman=='sanksi' ?'start active open':'';  ?> ">
				<a href="<?=$url?>sanksi" class="nav-link ">
					<i class="fa fa-money"></i>
					<span class="title">Sanksi</span>
				</a>
			</li>
			<?
			}
			?>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
	<!-- END SIDEBAR -->
</div>