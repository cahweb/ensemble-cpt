<?php 
/* Required */
?>

	<!-- Status (Major/Minor) -->
	<div>
		<label>Status:</label>
		<input type="radio" name="status" value="major" <?php if ($custom['status'][0] == 'major') echo 'checked'; ?>>Major
		<input type="radio" name="status" value="minor" <?php if ($custom['status'][0] == 'minor') echo 'checked'; ?>>Minor
	</div>

	<!-- Type -->
	<div>
		<label>Type:</label>
		<input type="radio" name="type" value="jazz" <?php if ($custom['type'][0] == 'jazz') echo 'checked'; ?>>Jazz
		<input type="radio" name="type" value="choir" <?php if ($custom['type'][0] == 'choir') echo 'checked'; ?>>Choir
		<input type="radio" name="type" value="bands" <?php if ($custom['type'][0] == 'bands') echo 'checked'; ?>>Bands
		<input type="radio" name="type" value="opera" <?php if ($custom['type'][0] == 'opera') echo 'checked'; ?>>Opera
		<input type="radio" name="type" value="Orchestra" <?php if ($custom['type'][0] == 'orchestra') echo 'checked'; ?>>Orchestra
	</div>

	<!-- Meeting Times -->

	<div>
		<h4>Meeting Times</h4>

		<!-- Meeting Days -->
		<label>Days:</label>

		<!-- Print each day from a days array into an input -->
		<?php foreach ($days as $day) { ?>
		<input name="days[]" type="checkbox" value="<?php echo $day; ?>" <?php if (in_array($custom['days'][0], $day)) echo "checked"; ?>><?php echo $day; ?>
		<? }  ?>

	</div>
	
	<div>
		<!-- Meeting Hours -->
		<label>Hours:</label>
		<input type="time" name="start_time">
		<span>to</span>
		<input type="time" name="end_time">
	</div>