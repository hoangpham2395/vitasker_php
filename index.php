<?php
ob_start();
session_start();

if (isset($_SESSION['username'])) {
    ?>

    <!doctype html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Vitasker</title>
        <meta name="description" content="Employees Manage">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-icon.png">
        <!-- <link rel="shortcut icon" href="favicon.ico"> -->
        <link rel="shortcut icon" href="images/v.png">

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
        <link rel="stylesheet" href="assets/scss/style.css">
        <!-- <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet"> -->

        <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> -->

        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    </head>
    <body>

        <!-- Left Panel -->

        <aside id="left-panel" class="left-panel">
            <nav class="navbar navbar-expand-sm navbar-default">

                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="./"><!--<img src="images/logo.png" alt="Logo">-->Vitasker</a>
                    <a class="navbar-brand hidden" href="./"><!--<img src="images/logo2.png" alt="Logo">--><i class="fa fa-vine"></i></a>
                </div>

                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="index.php?page_layout=dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        </li>
                        <h3 class="menu-title">Users</h3><!-- /.menu-title -->
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Users</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-th-list"></i><a href="index.php?page_layout=users">List</a></li>
                                <li><i class="fa fa-plus"></i><a href="index.php?page_layout=new_user">Add new</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"> <i class="menu-icon fa fa-thumbs-up"></i>Favorite </a>
                        </li>

                        <h3 class="menu-title">Others</h3><!-- /.menu-title -->

                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-suitcase"></i>Jobs</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-th-list"></i><a href="index.php?page_layout=jobs">List</a></li>
                                <li><i class="menu-icon fa fa-plus"></i><a href="index.php?page_layout=new_job">Add new</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-align-center"></i>Categories</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-th-list"></i><a href="index.php?page_layout=categories">List</a></li>
                                <li><i class="menu-icon fa fa-plus"></i><a href="index.php?page_layout=new_category">Add new</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comment"></i>Fboders</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-th-list"></i><a href="index.php?page_layout=fboders">List</a></li>
                                <li><i class="menu-icon fa fa-plus"></i><a href="index.php?page_layout=new_fboder">Add new</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </aside><!-- /#left-panel -->

        <!-- Left Panel -->

        <!-- Right Panel -->

        <div id="right-panel" class="right-panel">

            <!-- Header-->
            <header id="header" class="header">

                <div class="header-menu">

                    <div class="col-sm-7">
                        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                        <div class="header-left">
                            <button class="search-trigger"><i class="fa fa-search"></i></button>
                            <div class="form-inline">
                                <form class="search-form">
                                    <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                    <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                            </a>

                            <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                                <a class="nav-link" href="login/logout.php"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>

            </header>
            <!-- Header-->
            
            <!-- Connect DB  -->
            <?php
            include_once('configuration/connect.php');
            ?>

            <!-- Main content -->
            <div class="col-md-12">
                <?php
                if (isset($_GET['page_layout'])) {
                    switch ($_GET['page_layout']) {
                        case 'dashboard':      include_once('function/users/dashboard.php'); break;

                        case 'users':           include_once('function/users/list.php');       break;
                        case 'new_user':        include_once('function/users/new.php');        break;

                        case 'fboders':         include_once('function/fboders/list.php');     break;
                        case 'new_fboder':      include_once('function/fboders/new.php');      break;
                        case 'edit_fboder':     include_once('function/fboders/edit.php');     break;
                        case 'delete_fboder':   include_once('function/fboders/delete.php');   break;

                        case 'jobs':            include_once('function/jobs/list.php');        break;
                        case 'new_job':         include_once('function/jobs/new.php');         break;
                        case 'edit_job':        include_once('function/jobs/edit.php');        break;
                        case 'delete_job':      include_once('function/jobs/delete.php');      break;

                        case 'categories':            include_once('function/categories/list.php');        break;
                        case 'new_category':         include_once('function/categories/new.php');         break;
                        case 'edit_category':        include_once('function/categories/edit.php');        break;
                        case 'delete_category':      include_once('function/categories/delete.php');      break;

                        default:                include_once('function/users/list.php');       break;
                    }
                } else {
                    include_once('function/users/list.php');   
                }

                ?>
            </div>

            <!-- Close connect DB -->
            <?php 
            mysqli_close($conn);
            ?>

        </div><!-- /#right-panel -->

        <!-- Right Panel -->

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
    </html>

    <?php 
} else {
    header('location:login/login.php');
}
?>
