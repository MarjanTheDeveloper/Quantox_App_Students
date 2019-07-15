<div class="container-fluid">
	<div class="row mt-4">
		<div class="col-lg-8 col-md-6 col-xs-12 mx-auto">
			<h2>This is a requested Student: <?php echo $student->student_name . $student->student_lastname; ?></h2>
			<h3 class="mt-4">Grades</h3>
			<p class="mt-2">Mathematics:<?php echo $student->mathematics; ?></p>
			<p>English:<?php echo $student->english; ?></p>
			<p>Programing:<?php echo $student->programing; ?></p>
			<p>Art:<?php echo $student->art; ?></p>
		</div>
	</div>
</div>