<h1>All Records</h1>
<table class="table table-striped">
<tr>
<th>Gas Date</th>
<th>Mileage</th>
<th>Gas Price</th>
<th>Number of Gallons</th>
<th>Price Paid</th>
<th>Location</th>
</tr>

<?foreach($tracks as $track):?>
<?
$paid = number_format(($track['num_gallons']*$track['gas_price']),2);
?>
<tr>
	<td><?=anchor('track/detail/'.$track['track_id'], date('F jS Y',strtotime($track['date'])))?></td>
	<td><?=$track['mileage']?></td>
	<td>$ <?=$track['gas_price']?></td>
	<td><?=$track['num_gallons']?></td>
	<td>$ <?=$paid?></td>
	<td><?=$track['location']?></td>
</tr>
<?endforeach;?>
</table>