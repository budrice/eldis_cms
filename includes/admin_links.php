            <div class="nav navbar-nav top-nav collapse navbar-collapse navbar-ex0-collapse">
                <ul class="nav navbar-nav side-nav">
<?php 
if(isset($_SESSION['site_role'])) {
    if($_SESSION['site_role'] >= 4) {
?>
                    <li>
                        <a href="admin.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
<?php 
    }
}
?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_links">
                            <i class="fas fa-comment-dots"></i> Posts <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="posts_links" class="collapse">
                            <li>
                                <a href="admin.php?source=post_all">View All Posts</a>
                            </li>
                            <li>
                                <a href="admin.php?source=post_create">Add Post</a>
                            </li>
                        </ul>
                    </li>
<?php 
if(isset($_SESSION['site_role'])) {
    if($_SESSION['site_role'] >= 4) {
?>
                    <li>
                        <a href="admin.php?source=post_comments"><i class="fa fa-comments"></i> Comments</a>
                    </li>
<?php 
    }
}
if(isset($_SESSION['site_role'])) {
    if($_SESSION['site_role'] >= 4) {
?>
                    <li>
                        <a href="admin.php?source=post_categories"><i class="fa fa-list"></i> Categories</a>
                    </li>
<?php 
    }
}

if(isset($_SESSION['site_role'])) {
    if($_SESSION['site_role'] >= 5) {
?>
                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-users"></i> Members <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="admin.php?source=users_all">View All Members</a>
                            </li>
                            <li>
                                <a href="admin.php?source=user_create">Add Member</a>
                            </li>
                        </ul>
                    </li>
<?php 
    }
}



if(isset($_SESSION['site_role'])) {
    if($_SESSION['site_role'] >= 5) {
?>
                   <li>
                        <a href="admin.php?source=contact_messages"><i class="fa fa-envelope"></i> Messages</a>
                    </li>
<?php 
    }
}



if (isset($_SESSION['site_role'])) {
    if ($_SESSION['site_role'] >= 4) {
?>
                    <li>
                        <a href="admin.php?source=visitor_statistics"><i class="fas fa-chart-line"></i> Visit Statistics</a>
                    </li>
<?php
    }
}


if (isset($_SESSION['site_role'])) {
    if ($_SESSION['site_role'] >= 5) {
?>
                    <li>
                        <a href="admin.php?source=edit_landing"><i class="fa fa-paint-brush" aria-hidden="true"></i> Edit Landing</a>
                    </li>
<?php
    }
}


if(isset($_SESSION['site_role'])) {
    if($_SESSION['site_role'] >= 5) {
?>
                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#playground"><i class="fas fa-futbol"></i> Playground <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="playground" class="collapse">
                            <li>
                                <a href="playground.php?id=<?php echo $_SESSION['site_id']; ?>"><i class="fa fa-fw fa-file"></i> Playground</a>
                            </li>
                            <li>
                                <a href="admin.php?source=playground"><i class="fa fa-fw fa-file"></i> Admin Playground</a>
                            </li>
                        </ul>
                    </li>
<?php 
    }
}
?>
                </ul>
            </div>