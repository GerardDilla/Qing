

	<!-- start: sidebar -->
	<aside id="sidebar-left" class="sidebar-left">
	
		<div class="sidebar-header">
			<div class="sidebar-title">
				
			</div>
			<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
			</div>
		</div>
	
		<div class="nano">
			<div class="nano-content">
				<nav id="menu" class="nav-main" role="navigation">
					<ul class="nav nav-main">


						<li class="nav-parent">
							<a>
								<i class="fa fa-sitemap" aria-hidden="true"></i>
								<span>Manage Counter</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a href="<?php echo base_url(); ?>index.php/Admin/AddCounter">
											Add Counter
									</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>index.php/Admin/ManageCounters">
											Update Counter
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-parent">
							<a>
								<i class="fa fa-group" aria-hidden="true"></i>
								<span>Account Management</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a href="<?php echo base_url(); ?>index.php/Admin/AddAccount">
											Register Account
									</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>index.php/Admin/MyAccount">
											Account Settings
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="<?php echo base_url(); ?>index.php/Admin/Sessions">
								<i class="fa fa-share-alt-square" aria-hidden="true"></i>
								<span>Manage Sessions</span>
							</a>
						</li>

						<li class="nav-parent">
							<a>
								<i class="fa fa-print" aria-hidden="true"></i>
								<span>Ticket Manager</span>
							</a>
							<ul class="nav nav-children">

								<li>
									<a href="<?php echo base_url(); ?>index.php/QueueFeed/Kiosk" target="_blank">
										Ticket Kiosk (Needs Printer)
									</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>index.php/QueueFeed/OnlineKiosk" target="_blank">
										E-Ticketing 
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="<?php echo base_url(); ?>index.php/QueueFeed" target="_blank">
								<i class="fa fa-desktop" aria-hidden="true"></i>
								<span>Display Queue Feed</span>
							</a>
						</li>
						
					</ul>
				</nav>
			</div>
		</div>
	
	</aside>
	<!-- end: sidebar -->
