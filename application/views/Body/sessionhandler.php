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
	<h3>Activate Counter Session</h3>
	<HR>
	<div class="form-group">
		
		<form action="<?php echo base_url(); ?>index.php/Admin/add_session" method="post">
		<div class="col-md-6 input-group mb-md">
			<?php 
				$option[''] = 'Select A Counter to Activate';
				foreach($this->data['List'] as $row){
					$option[$row['countID']] = strtoupper($row['Counter'].': '.$row['Department']);
				}
				$attribute = 'required data-plugin-selectTwo class="form-control populate"';
				echo form_dropdown('countID', $option,'',$attribute);

			?>
			<span class="input-group-btn">
				<button type="submit" class="btn btn-md btn-success">Activate</button>
			</span>
		</div>
		</form>
	</div>
	<br>
	<HR>
	<h3>Active Sessions <span><a href="<?php echo base_url(); ?>index.php/Admin/Sessions" type="submit" class="btn btn-md btn-default"><i class="fa fa-refresh"></i> Refresh</a></span></h3>
	<HR>
	<div class="row">

		<section class="panel">

			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr>
							<th>Counter</th>
							<th>Department/Location</th>
							<th>Date Active(s)</th>
							<th>Activated By</th>
							<th>Current Queue</th>
							<th>Tickets Printed/Given</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($this->data['Sessions'] as $sess_row): ?>
						<tr>
							<td><?php echo strtoupper($sess_row['Counter']); ?></td>
							<td><?php echo strtoupper($sess_row['Department']); ?></td>
							<td><?php echo $sess_row['date_active']; ?></td>
							<td><?php echo strtoupper($sess_row['fullname']); ?></td>
							<td><?php echo $sess_row['Count']; ?></td>
							<td><?php echo $sess_row['Queue']; ?></td>
							<td class="actions-hover">
								<button type="submit" name="session_id" value="<?php echo $sess_row['session_id']; ?>" onclick="selectsession(this.value)" class="btn btn-md btn-default">Manage</button>
								
							</td>
							<td class="actions-hover">
								<form action="<?php echo base_url(); ?>index.php/Admin/remove_session" method="post">
									<button type="submit" name="session_id" value="<?php echo $sess_row['session_id']; ?>" onclick="return confirm('Are you sure you want to End Session?')" class="btn btn-md btn-danger">
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

