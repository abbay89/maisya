<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
		<!-- User profile -->
		<div class="user-profile" style="background: url(<?php echo base_url()?>/assets/images/logo_2.png) no-repeat center; height:150px">
			<!-- User profile image -->
			<!-- User profile text-->
			<br />
			<br />
			<br />
			<br />
			<br />
			<div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo  $data_cust->Nama?></a>
			
				<div class="dropdown-menu animated flipInY">
					<a href="<?php echo site_url()?>/customer/address" class="dropdown-item"><i class="ti-user"></i> Alamat</a>
					<a href="<?php echo site_url()?>/customer/masterbank" class="dropdown-item"><i class="ti-wallet"></i> Master bank</a>
					<div class="dropdown-divider"></div> <a href="<?php echo site_url()?>/customer/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
				</div>
			</div>
		</div>
		<!-- End User profile text-->
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
					
				<li>
					<a href="<?php echo site_url()?>/customer/pembelian_awal" class="waves-effect waves-dark">Pembelian Paket Awal</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>