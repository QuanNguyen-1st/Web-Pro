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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/style.css">
    </head>
    <body>
        <header>
            <a href="#"><img src="public/img/logo.png" class="logo" alt=""></a>
            <nav>
                <ul id="navbar">
                    <li><a href = "index.php?page=main&controller=layouts&action=index">Home</a></li>
                    <li><a href = "index.php?page=main&controller=shop&action=index">Shop</a></li>
                    <li><a href = "index.php?page=main&controller=blog&action=index">Blog</a></li>
                    <li><a href = "index.php?page=main&controller=about&action=index">About</a></li>
                    <li><a href = "index.php?page=main&controller=contact&action=index">Contact</a></li>
                    <li id="not-mobile-bag"><a href = "index.php?page=main&controller=cart&action=index"><i class="far fa-shopping-bag"></i></a></li>
                    <span id="close-navbar"><i class="far fa-times"></i></span>
                </ul>
            </nav>
            <div id="mobile">
                <a href = "#"><i class="far fa-shopping-bag"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
            </div>
        </header>

