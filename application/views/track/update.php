<h2>Update Record for <?=$record['date']?></h2>

<?=form_open('track/update/'.$record['track_id'])?>
	<label for="gas_price">Gas Price</label> 
	<input type="number" step="any" class="input-medium" placeholder="Gas Price" name="gas_price" value=<?=$record['gas_price']?> /><br />

	<label for="mileage">Mileage</label> 
	<input type="number" step="any" class="input-medium" placeholder="Mileage" name="mileage" value=<?=$record['mileage']?> /><br />

	<label for="num_gallons">Number of Gallons</label> 
	<input type="number" step="any" class="input-medium" placeholder="Number of Gallons" name="num_gallons" value=<?=$record['num_gallons']?> /><br />

	<label for="location">Location</label> 
	<input type="input" class="input-medium" placeholder="Location" name="location" value=<?=$record['location']?> /><br />

	<label for="notes">Notes</label>
	<textarea placeholder="Notes" name="notes"><?=$record['notes']?></textarea><br />
	
	<input type="submit" name="submit" class="btn btn-primary" value="Update Record" /> 

</form>