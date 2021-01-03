
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
<?php 
$result1 = getCount('cms_posts');
$result2 = getCount('cms_posts', 'id', 'post_status', 1);
$result3 = getCount('cms_posts', 'id', 'post_status', 2);
$result4 = getCount('cms_posts', 'id', 'post_status', 3);
$count_posts = 0;
$count_drafts = 0;
$count_published = 0;
$count_removed = 0;
foreach($result1 as $row) {
   $count_posts = $row['count'];
}
foreach($result2 as $row) {
   $count_drafts = $row['count'];
}
foreach($result3 as $row) {
   $count_published = $row['count'];
}
foreach($result4 as $row) {
   $count_removed = $row['count'];
}
?>
							<div class="col-xs-2 no-pad">
								<i class="fas fa-comment-dots fa-3x"></i>
							</div>
							<div class="col-xs-9">
								<div class='huge pull-right'><?php echo $count_posts . " Posts"; ?></div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-xs-4">
								<div class='huge'><?php echo $count_drafts; ?></div>
								<div>Drafts</div>
							</div>
							<div class="col-xs-4">
								<div class='huge'><?php echo $count_published; ?></div>
								<div>Published</div>
							</div>
							<div class="col-xs-4">
								<div class='huge'><?php echo $count_removed; ?></div>
								<div>Removed</div>
							</div>
						</div>
					</div>
					<a href="admin.php?source=post_all">
						<div class="panel-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
         	</div>