<section role="main" class="content-body">
	<header class="page-header">
		<h2><?php echo $this->data['Module_title']; ?></h2>
		<div class="right-wrapper pull-right">
		</div>
	</header>

	<!-- start: page -->
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					<!--
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>
					-->
					<h2 class="panel-title">Fill in the Details</h2>
				</header>
				<div class="panel-body">
					<form action="<?php echo base_url(); ?>index.php/Admin/add_account" class="form-horizontal form-bordered" method="post">
						<?php if($this->session->flashdata('message')): ?>
						<div class="form-group">
							<div class="col-md-12">
								<h3><?php echo $this->session->flashdata('message'); ?></h3>
							</div>
						</div>
						<?php endIf; ?>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Full Name</label>
							<div class="col-md-6">
								<input type="text" name="fullname" required class="form-control" id="inputDefault">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Username</label>
							<div class="col-md-6">
								<input type="text" name="username" required class="form-control" id="inputDefault">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Password</label>
							<div class="col-md-6">
								<input type="password" name="password" required class="form-control" id="inputDefault">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12" style="text-align:center">
								<button class="btn btn-success" type="submit" name="button" value="1">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</section>
	
		</div>
	</div>
	<!-- end: page -->
</section>

