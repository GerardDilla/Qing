<section role="main" class="content-body">
	<header class="page-header">
		<h2><?php echo $this->data['Module_title']; ?></h2>
		<div class="right-wrapper pull-right">
		</div>
	</header>

	<!-- start: page -->

	<?php if($this->session->flashdata('message')): ?>
	<div class="form-group">
		<div class="col-md-12">
			<h3><u><?php echo $this->session->flashdata('message'); ?></u></h3>
		</div>
	</div>
	<?php endIf; ?>

	<HR>
	<h3>Select A Counter Below to Edit</h3>
	<HR>
	<div class="form-group">
		
		<form action="<?php echo base_url(); ?>index.php/Admin/Update_counter" method="post">
		<div class="col-md-12 input-group mb-md">
			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Counter Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control" required name="counter" value="<?php echo $Counter = !empty($this->data['Data'][0]['Counter']) ? $this->data['Data'][0]['Counter']:NULL; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Department Location</label>
				<div class="col-md-6">
					<input type="text" class="form-control" required name="department" value="<?php echo $Department = !empty($this->data['Data'][0]['Department']) ? $this->data['Data'][0]['Department']:NULL; ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-9">
					<button class="btn btn-default pull-right" name="update_countID" value="<?php echo $countID = !empty($this->data['Data'][0]['countID']) ? $this->data['Data'][0]['countID']:NULL; ?>">Update</button>
				</div>
			</div>
		</div>
		</form>
	</div>
	<br>
	<HR>
	<h3>Counters</h3>
	<HR>
	<div class="row">

		<section class="panel">

			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr>
							<th>Counter</th>
							<th>Department/Location</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($this->data['List'] as $sess_row): ?>
						<tr>
							<td><?php echo strtoupper($sess_row['Counter']); ?></td>
							<td><?php echo strtoupper($sess_row['Department']); ?></td>
							<td class="actions-hover">
								<form action="" method="post">
									<button type="submit" name="select_countID" value="<?php echo $sess_row['countID']; ?>" class="btn btn-md btn-default">Edit</button>
								</form>
							</td>
							<td class="actions-hover">
								<form action="<?php echo base_url(); ?>index.php/Admin/Remove_counter" method="post">
									<button type="submit" name="countID" value="<?php echo $sess_row['countID']; ?>" onclick="return confirm('Are you sure you want to Remove Counter?')" class="btn btn-md btn-danger">
										<i class="fa fa-trash-o"></i>
									</button>
								</form>
							</td>
						</tr>
					<?php endForeach; ?>

						
					</tbody>
				</table>
			</div>
		</section>




	</div>
	<!-- end: page -->
</section>

