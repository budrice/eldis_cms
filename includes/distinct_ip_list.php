<style>
.btn-ip {
	width: 100% !important;
}

</style>
<div class="well" style="margin: 16px 0;">
	<div class="row">
		<label>IPs Past 30 days</label>
		<div class="well row">

<?php 
$result = distinctIpList(30);
foreach ($result as $row) {
?>
			<div class="col-xs-4 col-sm-3 col-md-2" style="padding: 0.5px;"><a href class="btn btn-info btn-ip"><?php echo $row['unique_visitor']; ?></a></div>
<?php
}
?>
		</div>
	</div>
</div>
