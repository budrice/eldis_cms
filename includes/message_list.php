
   <div class="container-fluid admin-wrapper">
      <div class="well black-well">
         <div class="row">
            <div class="col-xs-12">
               <h4 class="left-title"><small>CONTACT</small>&nbsp;eldisrice.com&nbsp;<small>MESSAGES</small></h4>
            </div>
         </div>
         <hr>
         <div class="row">
				<div class="col-xs-12">
<?php

$message_result = getContactMessages();
echo "<label>" . count($message_result) . " Messages</label>";
function get_read($v) {
	return ($v['read'] === 1);
}
function get_unread($v) {
	return ($v['read'] === 0);
}
$read_messages = array_filter($message_result, 'get_unread');
foreach($read_messages as $row) {
?>
					<hr>
					<div class="panel panel-blue" style="padding: 0.5em;">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3 col-lg-1"><h6>Contact</h6></div>
								<div class="well col-xs-6 col-lg-10"><span><strong><?php echo $row['contact']; ?></strong></span></div>
								<div class="col-xs-3 col-lg-1"><form action="" method="post"><input type="checkbox" name="" id="">&nbsp;Read</form></div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-lg-1"><h6>Subject</h6></div>
								<div class="well col-xs-9 col-lg-11"><span><?php echo $row['subject']; ?></span></div>
							</div>
						</div>
						<div class="row panel-body">
							<div class="col-xs-3 col-lg-1"><h6>Content</h6></div>
							<div class="well col-xs-9 col-lg-11"><p><?php echo $row['content']; ?></p></div>
						</div>
					</div>

<?php 
}
?>
				</div>
			</div>
		</div>
	</div>