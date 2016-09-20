<!-- Meeting Times -->
<div class="inner-meta">
	<h4>Meeting Times</h4>

	<!-- Meeting Days -->
	<label>Days:</label>

	<!-- Print each day from a days array into an input -->
	<?php ensemble_display_checkboxes() ?>
	<br>
	

	<!-- Meeting Hours -->
	<label>Hours:</label>
	<input type="time" name="start_time" value="<?php echo $custom['start_time'][0]; ?>">
	<span>to</span>
	<input type="time" name="end_time" value="<?php echo $custom['end_time'][0]; ?>">

</div>