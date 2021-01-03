            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-12" style="padding: 0 3px;">
                    <!-- Login Form Well -->
<?php
if(!isset($_SESSION['site_id'])) {
    include "sidebar_login_form.php";
}
?>
<!-- Blog Search Well -->
<?php 
include "search_form.php";
?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-12" style="padding: 0 3px;">
                    <!-- Blog Categories Well -->
                    <div class="black-well well">
                        <h4 class="centered-title">Categories</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-unstyled">
<?php 
$result = getCategories();
foreach($result as $row) {
?>
                                    <li>
                                        <a href="category.php?category=<?php echo $row['id']; ?>">
                                            <?php echo $row['cat_title']; ?>
                                        </a>
                                    </li>
<?php
}
?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget Well -->


            </div>