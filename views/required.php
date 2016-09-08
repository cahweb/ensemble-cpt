<?php 
/* Required */
?>	
	<!-- Contact information -->
	<div>
		<h4>Contact</h4>

		<!-- Name -->
		<label>Name:</label>
		<input type="text" name="contact_name" value="<?php echo $custom['contact_name'][0]; ?>">
		<br>

		<!-- Email -->
		<label>Email:</label>
		<input type="text" name="contact_email" value="<?php echo $custom['contact_email'][0]; ?>">
		<br>

		<!-- Telephone -->
		<label>Tel:</label>
		<input type="text" name="contact_tel" value="<?php echo $custom['contact_tel'][0]; ?>">
		<br>
		
		<!-- Address -->
		<label>Address:</label>
		<input type="text" name="contact_address" value="<?php echo $custom['contact_address'][0]; ?>">
		<br>

	</div>

	<!-- Meeting Times -->
	<div>
		<h4>Meeting Times</h4>

		<!-- Meeting Days -->
		<label>Days:</label>

		<!-- Print each day from a days array into an input -->
		<?php ensemble_display_checkboxes(); ?>
		<br>
		
	
		<!-- Meeting Hours -->
		<label>Hours:</label>
		<input type="time" name="start_time" value="<?php echo $custom['start_time'][0]; ?>">
		<span>to</span>
		<input type="time" name="end_time" value="<?php echo $custom['end_time'][0]; ?>">

	</div>

	<!-- Other info -->
	<div>
		<h4>Other</h4>

		<!-- Course Number -->
		<label>Course Number:</label>
		<input type="text" name="course_number" value="<?php echo $custom['course_number'][0]; ?>">
		<br>

		<!-- Status (Major/Minor) -->
		<label>Status:</label>
		<input type="radio" name="status" value="major" <?php if ($custom['status'][0] == 'major') echo 'checked'; ?>>Major
		<input type="radio" name="status" value="minor" <?php if ($custom['status'][0] == 'minor') echo 'checked'; ?>>Minor
		<br>

		<!-- Type -->
		<label>Type:</label>
		<input type="radio" name="type" value="jazz" <?php if ($custom['type'][0] == 'jazz') echo 'checked'; ?>>Jazz
		<input type="radio" name="type" value="choir" <?php if ($custom['type'][0] == 'choir') echo 'checked'; ?>>Choir
		<input type="radio" name="type" value="bands" <?php if ($custom['type'][0] == 'bands') echo 'checked'; ?>>Bands
		<input type="radio" name="type" value="opera" <?php if ($custom['type'][0] == 'opera') echo 'checked'; ?>>Opera
		<input type="radio" name="type" value="Orchestra" <?php if ($custom['type'][0] == 'orchestra') echo 'checked'; ?>>Orchestra

	</div>