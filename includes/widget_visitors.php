<?php 
$result1 = uniqueVisitorCount();
$result2 = visitsPast(1);
$result3 = visitsPast(7);
$result4 = visitsPast(30);
$unique_visitor_count = 0;
$unique_visitor_duration_count_day = 0;
$unique_visitor_duration_count_week = 0;
$unique_visitor_duration_count_month = 0;
foreach($result1 as $row) {
	$unique_visitor_count = $row['unique_visitor_count'];
}
foreach($result2 as $row) {
	$unique_visitor_duration_count_day = $row['unique_visitor_duration_count'];
}
foreach($result3 as $row) {
	$unique_visitor_duration_count_week = $row['unique_visitor_duration_count'];
}
foreach($result4 as $row) {
	$unique_visitor_duration_count_month = $row['unique_visitor_duration_count'];
}
?>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-2 no-pad">
									<i class="fas fa-chart-line fa-3x" aria-hidden="true"></i>
									
								</div>
								<div class="col-xs-9">
									<div class="huge pull-right"><?php echo $unique_visitor_count . " Visitors"; ?></div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-xs-4">
									<div class="huge"><?php echo $unique_visitor_duration_count_day; ?></div>
									<div>Past Day</div>
								</div>
								<div class="col-xs-4">
									<div class="huge"><?php echo $unique_visitor_duration_count_week; ?></div>
									<div>Past Week</div>
								</div>
								<div class="col-xs-4">
									<div class="huge"><?php echo $unique_visitor_duration_count_month; ?></div>
									<div>Past Month</div>
								</div>
							</div>
						</div>
						<a href="admin.php?source=visitor_statistics">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				
