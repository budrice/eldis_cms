<?php include "database/db.php"; ?>
<?php include "database/statistics_functions.php"; ?>
<?php include "database/db_functions.php"; ?>
<?php include "database/contact_functions.php"; ?>
<?php include "classes/message.php"; ?>
<?php session_start(); ?>
<?php ob_start(); ?>
<?php 
$userIP = $_SERVER['REMOTE_ADDR'];
logVisitor($userIP, 'contact.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
   $title = 'eldisrice.com';
   include "includes/head.php";
?>
</head>
<body>
   <!-- Navigation -->
   <?php include "includes/page_header.php"; ?>
   <?php include "includes/nav.php"; ?>
   <!-- Page Content -->
   <div class="container wrapper-search">
      <div class="row">
         <div class="col-md-9" style="padding: 0 3px;">
            <?php include "includes/title.php"; ?>
<?php 
$label_contact_color = 'label_contact';
$label_subject_color = 'label_contact';
$label_content_color = 'label_contact';
$error = null;
$message = new Site\Message();
if(isset($_POST['contact_form'])) {
	$message->subject = $_POST['contact_message_subject'];
	$message->content = $_POST['contact_message_content'];
	$message->contact = $_POST['contact_message_contact'];
	$message->ip = $userIP;
	$flag = $message->contact ? 0 : 1;
	$flag = $message->subject ? $flag : $flag + 3;
	$flag = $message->content ? $flag : $flag + 5;
	switch($flag) {
		case 0:
			insertMessage($message);
			header("Refresh:0; url=message_sent.php");
			break;
		case 1:
			$error = "Oops, you are missing contact name.";
			$label_contact_color = 'label_contact_warn';
			$label_subject_color = 'label_contact';
			$label_content_color = 'label_contact';
			break;
		case 3:
			$error = "Oops, you are missing subject.";
			$label_contact_color = 'label_contact';
			$label_subject_color = 'label_contact_warn';
			$label_content_color = 'label_contact';
			break;
		case 4:
			$error = "Oops, you are missing contact name and subject.";
			$label_contact_color = 'label_contact_warn';
			$label_subject_color = 'label_contact_warn';
			$label_content_color = 'label_contact';
			break;
		case 5:
			$error = "Oops, you are missing message.";
			$label_contact_color = 'label_contact';
			$label_subject_color = 'label_contact';
			$label_content_color = 'label_contact_warn';
			break;
		case 6:
			$error = "Oops, you are missing contact name and message.";
			$label_contact_color = 'label_contact_warn';
			$label_subject_color = 'label_contact';
			$label_content_color = 'label_contact_warn';
			break;
		case 8:
			$error = "Oops, you are missing subject and message.";
			$label_contact_color = 'label_contact';
			$label_subject_color = 'label_contact_warn';
			$label_content_color = 'label_contact_warn';
			break;
		case 9:
			header("Refresh:0; url=contact.php");
			break;
		default:
	}
	
}
if(isset($_GET['request'])) {
	if($_GET['request'] === 'webdev') {
		$message->subject = "Web Development";
		$message->content_placeholder = "Thank you for your interest in my web development services. Leave your contact information and a general discription. You will be contacted back shortly.";
	}
	if($_GET['request'] === 'blog') {
		$message->subject = "Purchase Blog";
		$message->content_placeholder = "Thank you for your interest in my CMS blog site. Leave your contact information and you will be contacted back shortly.";
	}
}
?>
<style>
label.label_contact { color : rgba(119, 119, 119, 1) !important; }
label.label_contact_warn { color : rgba(255, 69, 0, 1) !important; }
</style>
				<form action="" method="post">
					<div class="well black-well">
						<div class="row">
							<div class="col-xs-12 col-md-4">
								<h4 class="left-title"><small><i class="fa fa-envelope fa-3x"></i></small>&nbsp;contact&nbsp;<small>FORM</small></h4>
							</div>
							<div class="col-xs-12 col-md-8">
								<h4 class="left-title"><?php echo $error; ?></h4>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="form-group col-xs-6">
								<label class="<?php echo $label_contact_color; ?>" for="">Who are you?</label>
								<input type="text" name="contact_message_contact" id="contact_message_contact" class="form-control" value="<?php echo $message->contact; ?>">
							</div>
							<div class="form-group col-xs-6">
								<label class="<?php echo $label_subject_color; ?>" for="">Subject</label>
								<input type="text" name="contact_message_subject" id="contact_message_subject" class="form-control" value="<?php echo $message->subject; ?>">
							</div>

						</div>
						<div class="row">
							<div class="form-group col-xs-12">
								<label class="<?php echo $label_content_color; ?>" for="">Message</label>
								<textarea name="contact_message_content" id="contact_message_content" class="form-control" rows="10" placeholder="<?php echo $message->content_placeholder; ?>"><?php echo $message->content; ?></textarea>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-xs-6 col-xs-offset-3 col-md-3 col-md-offset-0">
								<input type="submit" class="btn btn-primary form-control" name="contact_form" value="Submit">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-xs-12" style="padding: 8px 16px;">
								<div class="row" style="font-size: 1.2em !important;"><label>Email:&nbsp;</label><a href="mailto:3eldis@gmail.com" style="color:orangered;">Buddy Rice</a></div>
								<div class="row" style="font-size: 1.2em !important;"><label>Tel:&nbsp;</label><a href="tel:727-564-6298" style="color:orangered;"><i class="shake fa fa-phone"></i>&nbsp;727 564-6298</a></div>
							</div>
						</div>
					</div>
				</form>
         </div>
         <!-- Blog Sidebar Widgets Column -->
         <div class="sticky-sidebar no-pad col-md-3"><?php include "includes/sidebar.php"; ?></div>
      </div>
      <!-- /.row -->

   </div>
   <!-- /.container -->
   <!-- Footer -->
   <?php include "includes/footer.php"; ?>
</body>
</html>