
<div class="well" style="width: 200px; margin-left: 150px;">
	<div class="row">
		<label>IPs Past 30 days</label>
		<table class="table table-hover table-condensed table-bordered">
			<thead>
				<tr>
					<th>ip</th>
				</tr>
			</thead>
			<tbody>
<?php 
$result = distinctIpList(30);
foreach ($result as $row) {
?>
				<tr>
					<td><?php echo $row['unique_visitor']; ?></td>
				</tr>
<?php
}
?>
			</tbody>
		</table>
	</div>
</div>
