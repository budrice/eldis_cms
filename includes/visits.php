<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
   <div class="container-fluid admin-wrapper">
      <div class="well black-well">
         <div class="row">
            <div class="col-xs-12">
               <h4 class="left-title"><small>VISITOR</small>&nbsp;eldisrice.com&nbsp;<small>STATISTICS</small></h4>
            </div>
         </div>
         <hr>
         <div class="well row">
            <div class="col-xs-3 col-md-2 col-md-offset-1">
               <div class="huge"><?php echo $unique_visitor_count; ?></div>
               <div>Total Unique Visitors</div>
            </div>
            <div class="col-xs-3 col-md-2">
               <div class="huge"><?php echo $unique_visitor_duration_count_day; ?></div>
               <div>Past Day</div>
            </div>
            <div class="col-xs-3 col-md-2">
               <div class="huge"><?php echo $unique_visitor_duration_count_week; ?></div>
               <div>Past Week</div>
            </div>
            <div class="col-xs-3 col-md-2">
               <div class="huge"><?php echo $unique_visitor_duration_count_month; ?></div>
               <div>Past Month</div>
            </div>
         </div>

         <div class="row" style="overflow: auto;">
            <?php include "includes/daily_unique_visits_past_30_days.php"; ?>
         </div>
         <div class="row" style="overflow: auto;">
            <?php include "includes/daily_unique_visits_past_7_days.php"; ?>
         </div>

         <div class="row" style="overflow: auto;">
            <?php include "includes/page_stats.php"; ?>
         </div>

         <div class="row">
            <div class="col-xs-12 col-lg-7 col-lg-offset-1"><?php include "includes/distinct_ip_list.php"; ?></div>
         </div>
      </div>
   </div>