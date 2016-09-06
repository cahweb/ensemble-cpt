<?php 
/* Required */
?>

<table>

	<!-- Status (Major/Minor) -->
	<tr>
		<td><label>Status:</label></td>
		<td><input type="radio" name="status" value="major" <?php if ($custom['status'][0] == 'major') echo 'checked'; ?>>Major</td>
		<td><input type="radio" name="status" value="minor" <?php if ($custom['status'][0] == 'minor') echo 'checked'; ?>>Minor</td>
	</tr>

	<!-- Type -->
	<tr>
		<td><label>Type:</label></td>
		<td><input type="radio" name="type" value="jazz" <?php if ($custom['type'][0] == 'jazz') echo 'checked'; ?>>Jazz</td>
		<td><input type="radio" name="type" value="choir" <?php if ($custom['type'][0] == 'choir') echo 'checked'; ?>>Choir</td>
		<td><input type="radio" name="type" value="bands" <?php if ($custom['type'][0] == 'bands') echo 'checked'; ?>>Bands</td>
		<td><input type="radio" name="type" value="opera" <?php if ($custom['type'][0] == 'opera') echo 'checked'; ?>>Opera</td>
		<td><input type="radio" name="type" value="Orchestra" <?php if ($custom['type'][0] == 'orchestra') echo 'checked'; ?>>Orchestra</td>
	</tr>

	<!-- Times -->
	<tr><td><h4>Meeting Times</h4></td></tr>
	<tr>
		<td><label>Days:</label></td>

		<!-- Print each day from a days array into an input -->
		<?php foreach ($days as $day) { ?>
			<td><input name="day" type="checkbox" value="<?php echo $day; ?>" <?php if ($custom['times'][0] == $day) echo "checked"; ?>><?php echo $day; ?></td>
		<? }  ?>

	</tr>

	<tr>
		<td><label>Hour:</label></td>
		<td><input type="time" name="hour"></td>
		<td>to</td>
		<td><input type="time" name="hour"></td>
	</tr>

</table>