               <div class="black-well well">
<?php 
if (strpos($_SERVER['REQUEST_URI'], "/members.php") !== false && $role >= 3) {
    ?>
                  <h4 class="centered-title">Search Members</h4>
                  <form action="search.php" method="post">
                     <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                           <button class="btn btn-primary" type="submit" name="search_members_submit">
                              <span class="glyphicon glyphicon-search"></span>
                           </button>
                        </span>
                     </div>
                  </form>
<?php
} else {
?>
                  <h4 class="centered-title">Search Blogs</h4>
                  <form action="search.php" method="post">
                     <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                           <button class="btn btn-primary" type="submit" name="search_blogs_submit">
                              <span class="glyphicon glyphicon-search"></span>
                           </button>
                        </span>
                     </div>
                  </form>
<?php 
}
?>
               </div>