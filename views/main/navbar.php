<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if (isset($_SESSION['guest']))
    {
        require_once('models/user.php');
        $data = User::get($_SESSION['guest']);
    }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="public/plugins/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="public/css/style.css">
    </head>
    <body>
        <header>
            <a href="#"><img src="public/img/logo.png" class="logo" alt=""></a>
            <nav>
                <ul id="navbar">
                    <li><a class="<?php echo"$homeActive"; ?>" href = "index.php?page=main&controller=layouts&action=index">Home</a></li>
                    <li><a class="<?php echo"$shopActive"; ?>" href = "index.php?page=main&controller=shop&action=index">Shop</a></li>
                    <li><a class="<?php echo"$blogActive"; ?>" href = "index.php?page=main&controller=blog&action=index">Blog</a></li>
                    <li><a class="<?php echo"$aboutActive"; ?>" href = "index.php?page=main&controller=about&action=index">About</a></li>
                    <li><a class="<?php echo"$contactActive"; ?>" href = "index.php?page=main&controller=contact&action=index">Contact</a></li>
                    <li id="not-mobile-bag"><a class="<?php echo"$cartActive"; ?>" href = "index.php?page=main&controller=cart&action=index"><i class="far fa-shopping-bag"></i></a></li>
                    <span id="close-navbar"><i class="far fa-times"></i></span>
                </ul>
            </nav>
            <div id="mobile">
                <a class="<?php echo"$cartActive"; ?>" href = "index.php?page=main&controller=cart&action=index"><i class="far fa-shopping-bag"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
            </div>
        </header>

