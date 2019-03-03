

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
									<a href="pages-signin.html">
											Update Counter
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-parent">
							<a>
								<i class="fa fa-group" aria-hidden="true"></i>
								<span>Manage Accounts</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a href="<?php echo base_url(); ?>index.php/Admin/AddAccount">
											Register Account
									</a>
								</li>
								<li>
									<a href="pages-signin.html">
											Update Accounts
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

						<li>
							<a href="index.html">
								<i class="fa fa-print" aria-hidden="true"></i>
								<span>Ticket Printer</span>
							</a>
						</li>

						<li>
							<a href="index.html">
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
