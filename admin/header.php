<?php
     session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Title -->
    <title>CodeMapper Admin</title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">

    <!-- font awesome stylesheet for icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="../resources/css/custom.css">
  </head>
  <body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
            <!-- <a href="#"></a> -->
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
            </div>
            <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                alt="User picture">
            </div>
            <div class="user-info">
                <span class="user-name">Code
                <strong>Mapper</strong>
                </span>
                <span class="user-role">Administrator</span>
                <span class="user-status">
                <i class="fa fa-circle"></i>
                <span>Online</span>
                </span>
            </div>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-search">
            <div>
                <div class="input-group">
                <input type="text" class="form-control search-menu" placeholder="Search...">
                <div class="input-group-append">
                    <span class="input-group-text">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                </div>
                </div>
            </div>
            </div>
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                <span>General</span>
                </li>
                <li class="sidebar-dropdown">
                <a href="dashboard.php">
                    <i class="fa fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                    <!-- <span class="badge badge-pill badge-warning">New</span> -->
                </a>
                </li>
                <li class="sidebar-dropdown">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Challenges</span>
                    <!-- <span class="badge badge-pill badge-danger">3</span> -->
                </a>
                <div class="sidebar-submenu">
                    <ul>
                    <li>
                        <a href="manage_challenges.php">manage challenges</a>
                    </li>
                    <li>
                        <a href="create_challenge.php">create challenge</a>
                    </li>
                    </ul>
                </div>
                </li>
                <li class="sidebar-dropdown">
                <a href="#">
                    <i class="far fa-gem"></i>
                    <span>Questions</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                    <li>
                        <a href="manage_questions.php">manage questions</a>
                    </li>
                    <li>
                        <a href="create_question.php">add questions</a>
                    </li>
                    </ul>
                </div>
                </li>
                <li class="sidebar-dropdown">
                <a href="users.php">
                    <i class="fa fa-chart-line"></i>
                    <span>Users</span>
                </a>
                </li>
                </li>
            </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
                <a href="logout.php" data-toggle="tooltip" data-placement="top" title="Logout">
                    <i class="fa fa-power-off"></i>
                </a>
        </div>
        </nav>
       <!-- page-content" -->
   