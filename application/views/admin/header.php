<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="icon" type="image/x-icon" href="https://i.pinimg.com/474x/78/58/a1/7858a1d1825aa652b7d173de77051c38.jpg">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/admin/dist/css/adminlte.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/f2a5091cfc.css" crossorigin="anonymous">
    <!-- Summernote bs4 css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                        Webcome, <strong>Adminstartor</strong>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo site_url('admin/login/logout') ?>" class="dropdown-item">
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link bg-white text-decoration-none text-center">
                <img src="<?php echo base_url('public/images/ohmyim_logo.jpg') ?>" alt="logo" width="150">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/home') ?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule == 'dashboard') ? 'active' : '' ?>">
                                <i class="fas fa-chart-pie nav-icon"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item <?php echo (!empty($mainModule) && $mainModule == 'category') ? 'menu-open' : '' ?>">
                            <a href="<?php echo site_url('admin/category') ?>" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i>
                                <p>
                                    Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/category/create') ?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule == 'category' && !empty($subModule) && $subModule == 'createCategory') ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/category') ?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule == 'category' && !empty($subModule) && $subModule == 'viewCategory') ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Categories</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?php echo (!empty($mainModule) && $mainModule == 'article') ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>
                                    Articles
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/article/create') ?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule == 'article' && !empty($subModule) && $subModule == 'createArticle') ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Article</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/article') ?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule == 'article' && !empty($subModule) && $subModule == 'viewArticle') ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Articles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">