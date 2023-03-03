<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/f2a5091cfc.css" crossorigin="anonymous">

    <!-- Style.css -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/style.css') ?>">
    <link rel="shortcut icon" href="https://i.pinimg.com/474x/78/58/a1/7858a1d1825aa652b7d173de77051c38.jpg" type="image/x-icon">

    <title>OhmYim</title>
</head>

<body>

    <header class="bg-dark">
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand text-white" href="<?php echo site_url(); ?>">
                    <i class="fas fa-smile-wink"></i> OHMYIM
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <i class="fas fa-bars text-white"></i>
                </button>

                <div class="collapse navbar-collapse right-align" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white active" aria-current="page" href="<?php echo site_url(); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo site_url('page/about') ?>">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo site_url('page/services') ?>">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo site_url('blog') ?>">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo site_url('blog/categories') ?>">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo site_url('page/contact') ?>">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>