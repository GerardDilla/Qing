<!doctype html>


<html class="boxed">
	<!--Header Contents Here-->
	<head>
	<?php if ($header) echo $header; ?>
	</head>
	<!--//Header Contents Here-->

	<!--Body Contents Here-->
	<body>
	<section class="body">

	<?php if ($navbar) echo $navbar; ?>

	<div class="inner-wrapper">
		<?php if ($sidebar) echo $sidebar; ?>

		<?php if ($body) echo $body; ?>
	</div>

	<?php if ($footer) echo $footer; ?>

	</section>
	</body>
	<!--//Body Contents Here-->
</html>