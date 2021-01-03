
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
<?php 
$result1 = getCount('cms_categories');
$result2 = getCount('cms_categories', 'id', 'status', 1);
$result3 = getCount('cms_categories', 'id', 'status', 2);
$result4 = getCount('cms_categories', 'id', 'status', 3);
$count_categories = 0;
$count_category_drafts = 0;
foreach($result1 as $row) {
$count_categories = $row['count'];
}
foreach($result2 as $row) {
$count_category_drafts = $row['count'];
}
foreach($result3 as $row) {
$count_category_published = $row['count'];
}
foreach($result4 as $row) {
$count_category_removed = $row['count'];
}
?>
							<div class="col-xs-2 no-pad">
								<i class="fa fa-list fa-3x"></i>
							</div>
							<div class="col-xs-9 no-pad">
								<div class='huge pull-right'><?php echo $count_categories . " Categories"; ?></div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-xs-4">
								<div class='huge'><?php echo $count_category_drafts; ?></div>
								<div>Drafts</div>
							</div>
							<div class="col-xs-4">
								<div class='huge'><?php echo $count_category_published; ?></div>
								<div>Published</div>
							</div>
							<div class="col-xs-4">
								<div class='huge'><?php echo $count_category_removed; ?></div>
									<div>Removed</div>
								</div>
							</div>
						</div>
						<a href="admin.php?source=post_categories">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
