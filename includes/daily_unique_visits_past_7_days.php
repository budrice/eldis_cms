
<?php 

$result_week = visitArray(7);
// print_r($result_week);
// $begin = new DateTime('2010-05-01');
$begin = new DateTime('-7 day');
$end = new DateTime('+1 day');

$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end);
$arr = array();
$i = 0;
foreach ($period as $dt) {
	$v = 0;
	$b =  $dt->format('Y-m-d');
   foreach($result_week as $r) {
		$a = (new DateTime($r['day_visited']))->format('Y-m-d');
		if($a == $b) {
			$v = $r['unique_visitor_duration_count'];
		}
	}
	array_push($arr, array((7 - $i), $v));
	$i++;
}
// print_r($arr);
?>
      <div class="no-pad col-xs-12" style="min-height: 310px !important;">
			
			<div id="daily_unique_visits_past_7_days"></div>
			<script>
			(function() {
				google.charts.load('current', {packages: ['corechart', 'line']});
				google.charts.setOnLoadCallback(drawBasic);
				function drawBasic() {
					var data = new google.visualization.DataTable();
					data.addColumn('number', 'X');
					data.addColumn('number', 'Visitors');
					data.addRows(<?php echo json_encode($arr); ?>);
					var options = {
						hAxis: {
							title: 'days ago'
						},
						vAxis: {
							title: 'visits'
						},
						'legend':'left',
						'title':'daily unique visits past 7 days',
						'height':300,
						'colors': ['orangered']
					};
					var chart = new google.visualization.LineChart(document.getElementById('daily_unique_visits_past_7_days'));
					chart.draw(data, options);
				}
			})()

			</script>
      </div>