
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Others-->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />
		<link rel="stylesheet" href="assets/vendor/owl-carousel/owl.carousel.css" />
		<link rel="stylesheet" href="assets/vendor/owl-carousel/owl.theme.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url(); ?>assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-error error-outside">
			<div class="center-error">

				<div class="row">
					<div class="col-sm-8">
						<div class="panel-body">
							<div class="widget-summary widget-summary-xlg">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i style="margin-top: 30px;" class="fa fa-ticket"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h3 class="title" id="title"><?php echo $this->data['Data']['array'][0]['Counter']; ?></h3>
										<p id="department"><?php echo $this->data['Data']['array'][0]['Department']; ?></p>
										<div class="info">
											<strong class="amount">Queue: <u id="count"><?php echo $this->data['Data']['array'][0]['Count']; ?></u></strong>
										</div>
									</div>
									<div class="summary-footer">
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="col-sm-4">
						<h4 class="text">QUEUE CONTROLS</h4>
						<ul class="nav nav-list primary">
							<li> 
								<div class="input-group mb-md">
									<input type="hidden" class="form-control" id="session_id" value="<?php echo $this->data['Data']['array'][0]['session_id']; ?>">
									<input type="text" class="form-control" id="custom_queue" value="<?php echo $this->data['Data']['array'][0]['Count']; ?>">
									<span class="input-group-btn">
										<button class="btn btn-success" onclick="change_queue()" type="button">Change</button>
									</span>
								</div>
							</li>
							<li>
								<span>
									<button style="margin:10px" onclick="minus_queue()" class="btn btn-default">MINUS  <i class="fa fa-minus"></i></button>
									<button style="margin:10px" onclick="plus_queue()" class="btn btn-default">PLUS  <i class="fa fa-plus"></i></button>

									<span id="searchloader" class="col-md-2" style="padding: 1%; display:none">
										LOADING <img src="<?php echo base_url(); ?>assets/images/loading.gif" />
									</span>

								<span>
							</li>
							
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- end: page -->


		<!-- Vendor -->
		<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url(); ?>assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url(); ?>assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url(); ?>assets/javascripts/theme.init.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url(); ?>assets/javascripts/jquery.cookie.js"></script>
		<script src="<?php echo base_url(); ?>assets/javascripts/ui-elements/examples.widgets.js"></script>

		<script>
			function change_queue(){
				value = $('#custom_queue').val();
				id = $('#session_id').val();
				url = '<?php echo base_url(); ?>/index.php/Admin/custom_queue';

				ajax = $.ajax({
					url: url,
					type: 'GET',
					data: {
						custom_queue: value,
						session_id: id
					},
					success: function(response){

						if(response == 1){
							//alert('Queue Changed!');
							refresh_queue();
						}else{
							alert('Error in Changing Queue');
						}
						
					},
					fail: function(){

						alert('Error: request failed');
						return;
					}
				});
			}

			function plus_queue(){

				id = $('#session_id').val();
				url = '<?php echo base_url(); ?>/index.php/Admin/plus_queue';

				ajax = $.ajax({
					url: url,
					type: 'GET',
					data: {session_id: id},
					success: function(response){

						if(response == 1){
							//alert('Added Queue!');
							refresh_queue();
						}else{
							alert('Error in Changing Queue');
						}
						
						
					},
					fail: function(){

						alert('Error: request failed');
						return;
					}
				});
			}

			function minus_queue(){

				id = $('#session_id').val();
				url = '<?php echo base_url(); ?>/index.php/Admin/minus_queue';

				ajax = $.ajax({
					url: url,
					type: 'GET',
					data: {session_id: id},
					success: function(response){

						if(response == 1){
							//alert('Subtracted Queue!');
							refresh_queue();
						}else{
							alert('Error in Changing Queue');
						}
						
						
					},
					fail: function(){

						alert('Error: request failed');
						return;
					}
				});

			}

			function refresh_queue(){
				id = $('#session_id').val();
				url = '<?php echo base_url(); ?>/index.php/Admin/refresh_queue';

				ajax = $.ajax({
					url: url,
					type: 'GET',
					data: {session_id: id},
					success: function(response){
						
						result = JSON.parse(response);
						$('#counter').html(result[0]['Counter']);
						$('#department').html(result[0]['Department']);
						$('#count').html(result[0]['Count']);
						$('#custom_queue').val(result[0]['Count']);
						console.log(result[0]['Count']);
					},
					fail: function(){

						alert('Error: request failed');
						return;
					}
				});
			}

			setInterval(function(){ 
				
				refresh_queue();
			
			}, 5000);
		
		</script>

		<!-- LOADING DURING AJAX -->
		<script>
			$(document).ajaxStart(function() {
				$("#searchloader").show();
			});
			$(document).ajaxStop(function() {
				$("#searchloader").hide();
			});
		</script>
	

	</body>
</html>