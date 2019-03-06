<section role="main" class="content-body">
	<header class="page-header">
		<h2><?php echo $this->data['Module_title']; ?></h2>
		<div class="right-wrapper pull-right">
		</div>
	</header>

	<!-- start: page -->

	<HR>
	<h3>Account Settings</h3>
	<HR>

	<?php if($this->session->flashdata('message')): ?>
	<div class="form-group">
		<div class="col-md-12">
			<h3><u><?php echo $this->session->flashdata('message'); ?></u></h3>
		</div>
	</div>
	<?php endIf; ?>

	<div class="form-group">
		<form action="<?php echo base_url(); ?>index.php/Admin/UpdateAccount" method="post">
		<div class="col-md-12 input-group mb-md">
			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Fullname</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="fullname" value="<?php echo $this->data['Data'][0]['fullname']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Username</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="username" value="<?php echo $this->data['Data'][0]['username']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Password</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault" >Retype Password</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="re_password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<button class="btn btn-default pull-right" name="submit" value="1">Update</button>
				</div>
			</div>
		</div>
		</form>
	</div>
	<!-- end: page -->
</section>

