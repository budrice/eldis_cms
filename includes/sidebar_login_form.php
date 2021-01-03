<?php
$message = null;
?>
               <div class="black-well well">
                  <form action="login.php" method="post">
                     <div class="row">
                        <div class="col-xs-12" style="padding: 3px 0;">
                           <input type="username" class="form-control" id="sidepanel_login_username" name="main_login_username" placeholder="enter username">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-12" style="padding: 3px 0;">
                           <input type="password" class="form-control" id="sidepanel_login_password" name="main_login_password" placeholder="enter password">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-6" style="padding: 3px 3px 3px 0;">
                           <input type="submit" class="form-control btn btn-primary" id="sidepanel_login_submit" name="main_login_submit" value="Login">
                        </div>
                        <div class="col-xs-6" style="padding: 3px 0 3px 3px;">
                           <a href="register.php" class="form-control btn btn-info" id="sidepanel_login_submit" name="main_login_submit">Register</a>
                        </div>
                     </div>
                  </form>
               </div>