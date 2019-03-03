




<!-- start: header -->
<header class="header">

	<div class="logo-container">
		<a href="<?php echo base_url(); ?>" class="logo">
			<img src="<?php echo base_url(); ?>assets/images/SDMC/sdmclogo.JPG" height="35" alt="Porto Admin" />
		</a>
		<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<span class="separator"></span>
	<b>QUEUEING SYSTEM</b>
	<span class="separator"></span>


	<!-- start: search & user box -->
	<div class="header-right">


		<span class="separator"></span>

		<div id="userbox" class="userbox">
			<a href="#" data-toggle="dropdown">
				<figure class="profile-picture">
					<img src="<?php echo base_url(); ?>assets/images/SDMC/user.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
				</figure>
				<div class="profile-info" >
					<span class="name"><?php echo $this->session->userdata('fullname'); ?></span>
					<span class="role"><?php echo $this->session->userdata('username'); ?></span>
				</div>

				<i class="fa custom-caret"></i>
			</a>

			<div class="dropdown-menu">
				<ul class="list-unstyled">
					<li class="divider"></li>
					<li>
						<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> Account Settings</a>
					</li>
					<li>
						<a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>index.php/Admin/logout"><i class="fa fa-power-off"></i> Logout</a>
					</li>
				</ul>
			</div>
		</div>

	</div>
	<!-- end: search & user box -->
</header>
<!-- end: header -->

