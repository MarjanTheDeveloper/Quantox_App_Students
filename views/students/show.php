<div class="container-fluid">
	<div class="row mt-4">
		<div class="col-lg-8 col-md-6 col-xs-12 mx-auto">
			<h2>This is a requested Student: <?php echo $student->student_name . $student->student_lastname; ?></h2>
			<table class="table">
			  <thead class="bg-primary">
			    <tr>
			      <th scope="col">Subjects</th>
			      <th scope="col">Grades</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">Mathematics:</th>
			      <td><?php echo $student->mathematics; ?></td>
			    </tr>
			    <tr>
			      <th scope="row">English:</th>
			      <td><?php echo $student->english; ?></td>
			    </tr>
			    <tr>
			      <th scope="row">Programing:</th>
			      <td><?php echo $student->programing; ?></td>
			    </tr>
			    <tr>
			      <th scope="row">Art:</th>
			      <td><?php echo $student->art; ?></td>
			    </tr>
			    <tr>
			      <th scope="row">Average:</th>
			      <td><?php echo $average; ?></td>
			    </tr>
			    <tr class="bg-primary text-white">
			      <th scope="row " colspan="2"><?php echo $pass; ?></th>
			    </tr>
			  </tbody>
			</table>

			
		</div>
	</div>
	<div class="row mt-4">
		<div class="col-lg-11 mx-auto">
			<h3>
				<?php echo $format_desc;?>
			</h3>
			<p><?php echo $format; ?></p>
		</div>
	</div>
</div>