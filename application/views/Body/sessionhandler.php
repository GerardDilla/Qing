<section role="main" class="content-body">
	<header class="page-header">
		<h2><?php echo $this->data['Module_title']; ?></h2>
		<div class="right-wrapper pull-right">
		</div>
	</header>

	<!-- start: page -->
	<div class="row">

		<?php foreach($this->data['List'] as $row): ?>
		<div class="col-sm-4" style="display: flex; display: -webkit-flex; flex-wrap: wrap;">
			<section class="panel panel-info" id="panel-9" style="opacity: 1; width:100%">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
					</div>
					<h4 class="panel-title" style="font-size: 15px;"><?php echo strtoupper($row['Counter']); ?>: <u>1500</u></h4>
				</header>
				<div class="panel-body">
					<h5>Department: <u><?php echo $row['Department']; ?></u></h5>
					<h5>Personnel: <u><?php echo $row['fullname']; ?></u></h5>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							<button class="btn btn-md btn-default">Activate</button>
						</div>
						<div class="col-sm-6">
							<h5>Status: <u>ACTIVE</u></h5>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php endForeach; ?>

	</div>
	<!-- end: page -->
</section>

