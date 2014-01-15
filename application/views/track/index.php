<div class="row">
	<div class="span10">
<h2>Welcome <?=$this->tank_auth->get_username()?>!</h2>
<p>You have used this application <b><?=$count?></b> Times. Heres some interesting metrics.  Please let me know what else should be used!
	Please go to the <?=anchor('main/faq', 'FAQ', 'title="FAQ"');?> if you have any questions! </p>
</div>
</div>
<!--Totals Row-->
<div class="row">
	
<div class='span2'>
<h4>Mileage</h4>
<h3><?=$report['mileage']?></h3>
<p>How many miles you've traveled with us</p>
</div>

<div class='span2'>
<h4>Total Paid</h4>
<h3>$<?=number_format($report['total_paid']['price_paid'],2)?></h3>
<p>How much money you've paid</p>
</div>

<div class='span2'>
<h4>Average Paid</h4>
<h3>$<?=number_format($report['average_price']['gas_price'],2)?></h3>
<p>Average amount of money paid at the pump</p>
</div>
<?
$mpg = $report['mileage']/$report['total_gallons']['num_gallons'];
?>
<div class='span2'>
<h4>Miles Per Gallon</h4>
<h3><?=number_format($mpg,2)?></h3>
<p>Average miles per gallon</p>
</div>

<div class='span2'>
<h4>Miles Per Trip</h4>
<h3><?=number_format(($report['mileage']/$count),2)?></h3>
<p>Average distance traveled between fill ups</p>
</div>

</div>
<!--Javascript Charts go here-->
<div class="row">
	<div class='span10'>
<h2>Charts</h2>
<div class='span4'>
<div id="chart_div"></div>
</div>

</div>
</div>

<div class="row">
	<div class='span10'>
Want More?  Go to the contact page to put in some request or whatever
	</div>
</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
      	var table = new google.visualization.DataTable();
		table.addColumn('string', 'Date');
		table.addColumn('number', 'Price');
		table.addColumn({type:'string', role:'tooltip'});
      	<?foreach($prices as $price):?>
      	<?
      	$date =date('d/m/Y',strtotime($price['date']));
      	?>
      	table.addRow(['<?=$date?>',<?=$price['gas_price']?>,'<?=$price['gas_price']?> <?=$date?> <?=$price['location']?> ']);
      	<?endforeach;?>


        var options = {
          title: 'Price Paid'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(table, options);
      }
    </script>