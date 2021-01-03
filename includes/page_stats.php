
	<div class="row">
		<div class="col-xs-12">
<?php
$distinct_pages_result = distinctPageList();
echo "<label>Pages Viewed</label>";
foreach($distinct_pages_result as $row) {
	$res = uniqueVisitorCount($row['page_viewed']);

	echo "<div class=\"row\"><p><span style=\"color: green;\">" . $row['page_viewed'] . "</span> had <span style=\"color: red;\">" . $res[0]['unique_visitor_count'] , "</span> unique visits.</p></div>";
}
$distinct_post_viewed_result = distinctPostViewedList();
echo "<hr>";
echo "<label>Posts Viewed</label>";
foreach($distinct_post_viewed_result as $row) {
	echo "<div class=\"row\"><p><span style=\"color: green;\">\"" . $row['post_title'] . "\"</span> was viewed <span style=\"color: red;\">" . $row['visitor_vcnt'] . "</span> times.</p></div>";
}
?>
			<hr>
		</div>
	</div>
