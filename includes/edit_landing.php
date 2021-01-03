<?php 
$result1 = getLanding();

$current_slideshow = null;
$slide = new Site\TextSlide();
$landing = new Site\Landing();
// $slide_id = null;
// $slide_header = null;
// $slide_subheader = null;
foreach($result1 as $row) {
	$landing->id = $row['id'];
	$landing->text_slideshow = $row['text_slideshow'];
	$landing->header = $row['header'];
	$landing->row1_img = $row['row1_img'];
	$row1_img = $row['row1_img'];
	$landing->row1_header = $row['row1_header'];
	$landing->row1_content = $row['row1_content'];
	$landing->row1_button = $row['row1_button'];
	$landing->row1_button_href = $row['row1_button_href'];
	$landing->row2_img = $row['row2_img'];
	$row2_img = $row['row2_img'];
	$landing->row2_header = $row['row2_header'];
	$landing->row2_content = $row['row2_content'];
	$landing->row2_button = $row['row2_button'];
	$landing->row2_button_href = $row['row2_button_href'];
	$landing->row3_img = $row['row3_img'];
	$row3_img = $row['row3_img'];
	$landing->row3_header = $row['row3_header'];
	$landing->row3_content = $row['row3_content'];
	$landing->row3_button = $row['row3_button'];
	$landing->row3_button_href = $row['row3_button_href'];
	$slide->slideshow = $row['text_slideshow'];
}

if(isset($_GET['edit_slide'])) {
	$result = getTextSlide($_GET['edit_slide']);
	foreach($result as $row) {
		$slide->id = $row['id'];
		$slide->header = $row['header'];
		$slide->subheader = $row['subheader'];
	}
}
if(isset($_GET['delete_slide'])) {
	deleteTextSlide($_GET['delete_slide']);
	header("Refresh:0; url=admin.php?source=edit_landing");
}
if(isset($_POST['edit_landing_edit_slide_submit'])) {
	$slide->header = $_POST['edit_landing_edit_slide_header'];
	$slide->subheader = $_POST['edit_landing_edit_slide_subheader'];
	updateTextSlide($slide);
	header("Refresh:0; url=admin.php?source=edit_landing");
}
if(isset($_POST['edit_landing_edit_slide_clear'])) {
	$slide = new Site\TextSlide();
}
if(isset($_POST['edit_landing_edit_slide_add'])) {
	$header = $_POST['edit_landing_edit_slide_header'];
	$subheader = $_POST['edit_landing_edit_slide_subheader'];
	$slide->header = $header ? $header : '';
	$slide->subheader = $subheader ? $subheader : '';
	insertTextSlide($slide);
	header("Refresh:0; url=admin.php?source=edit_landing");
}

?>

<div class="container-fluid admin-wrapper">
   <div class="well black-well">
      <div class="row">
         <div class="col-xs-12">
            <h4 class="left-title"><i class="fa fa-paint-brush fa-3x"></i>&nbsp;&nbsp;<small>EDIT LANDING PAGE</small>&nbsp;eldisrice.com</h4>
         </div>
      </div>
   </div>

	<div class="well black-well">
	   <div class="row">
         <div class="col-xs-12">
            <h4 class="left-title"><small>EDIT</small>&nbsp;text slideshow</h4>
         </div>
      </div>
		<hr>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-6">
				<div class="no-pad panel">
					<table class="table table-hover table-condensed table-bordered">
						<thead>
							<tr>
								<th class="cell thead" title="header" style="width: 60% !important;">header</th>
								<th class="cell thead" title="subheader" style="width: 30% !important;">subheader</th>
								<th class="cell thead" style="width: 76px !important;"></th>
								<th class="cell thead" style="width: 76px !important;"></th>
							</tr>
						</thead>
						<tbody>
<?php 
$result2 = getTextSlideshow($slide->slideshow);
foreach($result2 as $row) {
?>
							<tr>
								<td class="cell"><?php echo $row['header']; ?></td>
								
								<td class="cell"><?php echo $row['subheader']; ?></td>
								
								<td class="cell" title="edit"><a href="admin.php?source=edit_landing&edit_slide=<?php echo $row['id']; ?>" class="btn btn-info form-control" id="edit_landing_edit_slide" name="edit_landing_edit_slide">edit</a></td>
								<td class="cell" title="delete"><a href="admin.php?source=edit_landing&delete_slide=<?php echo $row['id']; ?>" class="btn btn-danger form-control" id="edit_landing_delete_slide" name="edit_landing_delete_slide">delete</a></td>
							</tr>
<?php 
}
?>

						</tbody>
					</table>
				</div>

			</div>
			<div class="col-xs-12 col-md-12 col-lg-6">
				<form action="" method="post">
					<div class="form-group">
						<label for="">header</label>
						<textarea name="edit_landing_edit_slide_header" id="edit_landing_edit_slide_header" class="form-control" row="1"><?php echo $slide->header; ?></textarea>
					</div>
					<div class="form-group">
						<label for="">subheader</label>
						<textarea name="edit_landing_edit_slide_subheader" id="edit_landing_edit_slide_subheader" class="form-control"><?php echo $slide->subheader; ?></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="edit_landing_edit_slide_submit" value="submit">
						<input type="submit" class="btn btn-info" name="edit_landing_edit_slide_clear" value="clear">
						<input type="submit" class="btn btn-default" name="edit_landing_edit_slide_add" value="add row">
						
					</div>
					<div class="form-group">
						<select name="" id="" class="form-control">
							<option value="" disable>>> choose <<</option>
<?php 
$result3 = getTextSlideshowTitles();
foreach($result3 as $row) {
?>
							<option value="<?php echo $row['id']; ?>"<?php echo $row['id'] === $slide->slideshow ? "selected" : ""; ?> ><?php echo $row['title']; ?></option>
<?php
}
?>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-success" name="edit_landing_edit_slide_new" value="new show">
					</div>
				</form>
			</div>
		</div>
   </div>
<?php 

if(isset($_POST['edit_landing_edit_landing_main'])) {
	// $landing->text_slideshow = $_POST['text_slideshow'];
	// $landing->header = $_POST['edit_landing_header'];
	$img1 = $_POST['edit_landing_row1_img'];
	$img2 = $_POST['edit_landing_row2_img'];
	$img3 = $_POST['edit_landing_row3_img'];

	$landing->row1_img = $img1 ? $img1 : $row1_img;
	$landing->row1_header = $_POST['edit_landing_row1_header'];
	$landing->row1_content = $_POST['edit_landing_row1_content'];
	$landing->row1_button = $_POST['edit_landing_row1_button'];
	$landing->row1_button_href = $_POST['edit_landing_row1_button_href'];
	$landing->row2_img = $img2 ? $img2 : $row2_img;
	$landing->row2_header = $_POST['edit_landing_row2_header'];
	$landing->row2_content = $_POST['edit_landing_row2_content'];
	$landing->row2_button = $_POST['edit_landing_row2_button'];
	$landing->row2_button_href = $_POST['edit_landing_row2_button_href'];
	$landing->row3_img = $img3 ? $img3 : $row3_img;
	$landing->row3_header = $_POST['edit_landing_row3_header'];
	$landing->row3_content = $_POST['edit_landing_row3_content'];
	$landing->row3_button = $_POST['edit_landing_row3_button'];
	$landing->row3_button_href = $_POST['edit_landing_row3_button_href'];
	updateLanding($landing);
}

?>
	<form action="" method="post">
		<div class="well black-well">
			<div class="row">
				<div class="col-xs-12">
					<h4 class="left-title"><small>EDIT</small>&nbsp;row 1</h4>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="">row 1 image</label><br>
						<label for="">Current image: <?php echo $landing->row1_img; ?></label>
						<input type="file" name="edit_landing_row1_img" id="edit_landing_row1_img" class="form-control" value="<?php echo $landing->row1_img; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="">row 1 header</label>
						<textarea name="edit_landing_row1_header" id="edit_landing_row1_header" class="form-control" rows="1"><?php echo $landing->row1_header; ?></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="">row 1 content</label>
						<textarea name="edit_landing_row1_content" id="edit_landing_row1_content" class="form-control" rows="5"><?php echo $landing->row1_content; ?></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">row 1 button text</label>
						<input type="text" name="edit_landing_row1_button" id="edit_landing_row1_button" class="form-control" rows="5" value="<?php echo $landing->row1_button; ?>">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">row 1 button href</label>
						<input type="text" name="edit_landing_row1_button_href" id="edit_landing_row1_button_href" class="form-control" rows="5" value="<?php echo $landing->row1_button_href; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<input type="submit" class="btn btn-success" name="edit_landing_edit_landing_main" value="update">
					</div>
				</div>
			</div>
		</div>

		<div class="well black-well">
			<div class="row">
				<div class="col-xs-12">
					<h4 class="left-title"><small>EDIT</small>&nbsp;row 2</h4>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="">row 2 image</label>
						<label for=""><?php echo $landing->row2_img; ?></label>
						<input type="file" name="edit_landing_row2_img" id="edit_landing_row2_img" class="form-control" value="<?php echo $landing->row2_img; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="">row 2 header</label>
						<textarea name="edit_landing_row2_header" id="edit_landing_row2_header" class="form-control" rows="1"><?php echo $landing->row2_header; ?></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="">row 2 content</label>
						<textarea name="edit_landing_row2_content" id="edit_landing_row2_content" class="form-control" rows="5"><?php echo $landing->row2_content; ?></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">row 2 button text</label>
						<input type="text" name="edit_landing_row2_button" id="edit_landing_row2_button" class="form-control" rows="5" value="<?php echo $landing->row2_button; ?>">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">row 2 button href</label>
						<input type="text" name="edit_landing_row2_button_href" id="edit_landing_row2_button_href" class="form-control" rows="5" value="<?php echo $landing->row2_button_href; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<input type="submit" class="btn btn-success" name="edit_landing_edit_landing_main" value="update">
					</div>
				</div>
			</div>
		</div>

		<div class="well black-well">
			<div class="row">
				<div class="col-xs-12">
					<h4 class="left-title"><small>EDIT</small>&nbsp;row 3</h4>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="">row 3 image</label>
						<label for=""><?php echo $landing->row3_img; ?></label>
						<input type="file" name="edit_landing_row3_img" id="edit_landing_row3_img" class="form-control" value="<?php echo $landing->row3_img; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="">row 3 header</label>
						<textarea name="edit_landing_row3_header" id="edit_landing_row3_header" class="form-control" rows="1"><?php echo $landing->row3_header; ?></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="">row 3 content</label>
						<textarea name="edit_landing_row3_content" id="edit_landing_row3_content" class="form-control" rows="5"><?php echo $landing->row3_content; ?></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">row 3 button text</label>
						<input type="text" name="edit_landing_row3_button" id="edit_landing_row3_button" class="form-control" rows="5" value="<?php echo $landing->row3_button; ?>">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">row 3 button href</label>
						<input type="text" name="edit_landing_row3_button_href" id="edit_landing_row3_button_href" class="form-control" rows="5" value="<?php echo $landing->row3_button_href; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<input type="submit" class="btn btn-success" name="edit_landing_edit_landing_main" value="update">
					</div>
				</div>
			</div>
		</div>
	</form>
</div>