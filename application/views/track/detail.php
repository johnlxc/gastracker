<h2>Record for <?=date('d/m/Y',strtotime($record['date']))?></h2>

<table>
	<tr>
		<td>Gas Price</td>
		<td><?=$record['gas_price']?></td>
	</tr>
	<tr>
		<td>Mileage</td>
		<td><?=$record['mileage']?></td>
	</tr>
	<tr>
		<td>Number of Gallons</td>
		<td><?=$record['num_gallons']?></td>
	</tr>
	<tr>
		<td>Location</td>
		<td><?=$record['location']?></td>
	</tr>
	<tr>
		<td>Notes</td>
		<td><?=$record['notes']?></td>
	</tr>
</table>

<?=anchor('track/update/'.$record['track_id'], 'Edit')?>
</br>
</br>
<?=anchor('track/delete/'.$record['track_id'], 'Delete')?>