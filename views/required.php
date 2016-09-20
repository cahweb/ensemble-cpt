<?php 
/* Required */
?>	
	<!-- Contact information -->
	<div class="inner-meta">
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

	<!-- Other info -->
	<div class="inner-meta">
		<h4>Other</h4>

		<!-- Course Number -->
		<label>Course Number:</label>
		<input type="text" name="course_number" value="<?php echo $custom['course_number'][0]; ?>">
		<br>

		<!-- Status (Major/Minor) -->
		<label>Status:</label>
		<input type="radio" name="status" value="Major" <?php if ($custom['status'][0] == 'Major') echo 'checked'; ?>>Major
		<input type="radio" name="status" value="Minor" <?php if ($custom['status'][0] == 'Minor') echo 'checked'; ?>>Minor
		<br>

		<!-- Type -->
		<label>Type:</label>
		<input type="radio" name="type" value="Jazz" <?php if ($custom['type'][0] == 'Jazz') echo 'checked'; ?>>Jazz
		<input type="radio" name="type" value="Choir" <?php if ($custom['type'][0] == 'Choir') echo 'checked'; ?>>Choir
		<input type="radio" name="type" value="Bands" <?php if ($custom['type'][0] == 'Bands') echo 'checked'; ?>>Bands
		<input type="radio" name="type" value="Opera" <?php if ($custom['type'][0] == 'Opera') echo 'checked'; ?>>Opera
		<input type="radio" name="type" value="Orchestra" <?php if ($custom['type'][0] == 'Orchestra') echo 'checked'; ?>>Orchestra

	</div>