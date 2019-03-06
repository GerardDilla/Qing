
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

		<style>
			html, body{
				background: #fff;
			}
			.clock {
				color: #cc0000;
				font-size: 60px;
				letter-spacing: 7px;
				margin-top:60px;
			}
		</style>

	</head>
	<body>
		<div class="row">
			<div class="col-md-12" style="text-align:center">
				<h3>CLICK A COUNTER TO DOWNLOAD TICKET</h3>
			</div>
			<hr>
		</div>


		<!-- start: page -->
		<div class="row" style="padding:5%">
			<div class="col-md-12 col-lg-12 col-xl-12 row" id="QueueContent">


		
			</div>
		</div>
		<!-- end: page -->
		
		<div id="print_panel" style="display:none; width:500px; margin:0px auto 0px auto; padding-top:150px">
		
		<div class="row" id="capture" >
			<div class="col-md-12" style="text-align:center; color:#000;">
				<img src="<?php echo base_url(); ?>assets/images/SDMC/sdmclogo.JPG" style="display:block" width="100%" />
				<hr>
				<p>Your Counter is:</p>
				<h1 style="font-size:4vw" id="counter"></h1>
				<hr>
				<p>Located at:</p>
				<h1 style="font-size:3vw" id="department"></h1>
				<hr>
				<p>Your Queue is:</p>
				<h1 style="font-size:5vw" id="queue"></h1>
			</div>
			<hr>
		</div>
		</div>

		<audio id="notifsound">
			<source src="<?php echo base_url(); ?>assets/audio/open-ended.mp3" type="audio/mp3">
			Your browser does not support the audio element.
		</audio>


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

		<!-- For Ticket Downloading -->
		<script src="<?php echo base_url(); ?>assets/javascripts/html2canvas.js"></script>

	
		<!-- Modals -->
		<script src="<?php echo base_url(); ?>assets/javascripts/ui-elements/examples.modals.js"></script>

		<script>
			countchange = '';

			refresh_feed();
			

			function refresh_feed(){

				url = '<?php echo base_url(); ?>/index.php/QueueFeed/FeedContents';

				ajax = $.ajax({
					url: url,
					type: 'GET',
					success: function(response){
						
						result = JSON.parse(response);
						display_queues(result);

					},
					fail: function(){

						alert('Error: request failed');
						return;
					}
				});
			}

			function display_queues(result){

				$('#QueueContent').html('');
				colors = {
					1:'info',
					2:'primary',
					3:'secondary',
					4:'success',
					5:'danger',
					6:'warning'
				};
				count = 1;
				currentchange = '';
				$.each(result, function(index, row) 
				{
					currentchange += row['Count'];

					$('#QueueContent').append('\
					\
					<section data-sessionid="'+row['session_id']+'" href="#modalCenterIcon" onclick="select_ticket(this)" class="hidden-md panel panel-featured-left panel-featured-'+colors[count]+' col-md-3 col-sm-4" style="height:200px; cursor:pointer">\
						<div class="panel-body">\
							<div class="widget-summary widget-summary-xlg">\
								<div class="widget-summary-col">\
									<div class="summary">\
										<h4 class="title" style="font-size:2.5vw">'+row['Counter']+'</h4><br>\
										<p style="font-size:1.5vw">'+row['Department']+'</p><br>\
										<div style="padding-bottom:5px" class="info panel panel-featured-bottom panel-featured-'+colors[count]+'">\
											<strong class="amount" style="font-size:3vw">#: '+row['Count']+'</strong>\
										</div>\
									</div>\
									<div class="summary-footer">\
									</div>\
								</div>\
							</div>\
						</div>\
					</section>\
					\
					');
					if(count >= 6){
						count = 1;
					}else{
						count++;
					}
					
				});
				
				if(currentchange != countchange){
					$('#notifsound')[0].play();
					countchange = currentchange;
				}

			}

			setInterval(function(){ 
				
				refresh_feed();
			
			}, 2000);
		
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

		<!-- TICKETING -->
		<script>
		function download(session_id = ''){

			html2canvas($('#capture')[0]).then(function(canvas) {
					var a = document.createElement('a');
					// toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
					a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
					a.download = 'ticket_'+session_id+'.jpg';
					a.click();
			});

		}

		function select_ticket(object){
			session_id = $(object).data('sessionid');

			url = '<?php echo base_url(); ?>/index.php/QueueFeed/session_info';

			ajax = $.ajax({
				url: url,
				type: 'GET',
				data: {session_id:session_id},
				success: function(response){

					result = JSON.parse(response);
					if(result.length > 0){
						display_ticket(result);
						download_ticket(session_id);
						download(session_id);
					}else{
						alert('Error in downloading ticket.');
					}
					
				},
				fail: function(){

					alert('Error: request failed');
					return;

				}
			});

		}

		function display_ticket(result){
			$('#counter').html(result[0]['Counter']);
			$('#department').html('- '+result[0]['Department']);
			$('#queue').html('#: '+result[0]['Queue']);
			//$('#ticketmodal').modal('show');
			$('#print_panel').show();
		}

		function download_ticket(session_id){

			url = '<?php echo base_url(); ?>/index.php/QueueFeed/add_queue';

			ajax = $.ajax({
				url: url,
				type: 'GET',
				data: {session_id:session_id},
				success: function(response){

					if(response ==1){
						$('#print_panel').hide();

					}else{
						alert('Error in Adding Queue');
					}
					
				},
				fail: function(){

					alert('Error: request failed');
					return;

				}
			});
		}
		</script>






	

	</body>
</html>