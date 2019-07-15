<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8 mx-auto mt-4">
			<h1>List of all Students:</h1>
		</div>
		<div class="col-lg-8 mx-auto mt-4">
			<?php foreach($students as $student) { ?>
				<div class="p-2 bg-primary mb-1">
				<p>
					<a href="?controller=students&action=show&student_id=<?php echo $student->student_id;?>" class="text-white">
						<?php echo $student->student_name . ' ' . $student->student_lastname . ' Grades'; ?>
					</a>
				</p>
				</div>
			<?php } ?>
		</div>
	</div>	
</div>