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
    <?php
if (isset($_SESSION['guest']))
{
    echo '
    <div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="EditUserModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-between">
                <h3 class="modal-title">Profile Information</h3>
                <a href="index.php?page=main&controller=login&action=logout" style="font-weight:600;text-decoration:none;color:#000;">
                    Logout
                    <i class="fal fa-arrow-square-right"></i>
                </a>
            
            </div>
            <form action="index.php?page=main&controller=register&action=editInfo" enctype="multipart/form-data" method="post">
            <div class="modal-body">
                <input type="hidden" name="email">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <div class="row"> </div>
                    <label>Last Name</label>
                    <input class="form-control" type="text" placeholder="Last Name" name="lname" value="' . $data->lname . '"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <div class="row"> </div>
                    <label>First Name</label>
                    <input class="form-control" type="text" placeholder="First Name" name="fname" value="' . $data->fname . '"/>
                    </div>
                </div>
                </div>

                <div class="row" style="margin-top: 5%;">
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Birthday</label>
                    <input class="form-control" type="number" placeholder="Birthday" name="birthday" value="' . $data->birthday . '"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Gender:</label>
                    <div class="row">
                        <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender"' . (($data->gender == '1')?'checked':"") . ' value="1" />
                            <label>Male</label>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender"' . (($data->gender == '0')?'checked':"") . ' value="0" />
                            <label>Female</label>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                <div class="form-group" style="margin-top: 5%;">
                <label>Phone Number</label>
                <input class="form-control" type="number" placeholder="Phone Number" name="phone" value="' . $data->phone . '"/>
                </div>
                <div class="form-group" style="margin-top: 5%;">
                <label>Profile Image</label>
                <img style="width: 90%; height: auto; margin: 5%" alt="Not available" src="' . $data->profile_photo . '">
                
                </div>
                <div class="form-group" style="margin-top: 5%;">
                <label>New profile image</label>&nbsp
                <input type="file" name="fileToUpload" id="fileToUpload" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="normal" type="button" data-bs-dismiss="modal" style="background-color:gray;color:#fff;">Close</button>
                <button class="normal" type="submit" style="background-color:#088178;color:#fff;">Update</button>
            </div>
            </form>
        </div>
    </div>
    </div>';
}
?>
        <header>
            <a href="#"><img src="public/img/logo.png" class="logo" alt=""></a>
            <nav>
                <ul id="navbar">
                    <li><a class="<?php echo $activeArr['homeActive']; ?>" href = "index.php?page=main&controller=layouts&action=index">Home</a></li>
                    <li><a class="<?php echo $activeArr['shopActive']; ?>" href = "index.php?page=main&controller=shop&action=index">Shop</a></li>
                    <li><a class="<?php echo $activeArr['blogActive']; ?>" href = "index.php?page=main&controller=blog&action=index">Blog</a></li>
                    <li><a class="<?php echo $activeArr['aboutActive']; ?>" href = "index.php?page=main&controller=about&action=index">About</a></li>
                    <li><a class="<?php echo $activeArr['contactActive']; ?>" href = "index.php?page=main&controller=contact&action=index">Contact</a></li>
                    <li id="not-mobile-bag"><a class="<?php echo $activeArr['cartActive']; ?>" href = "index.php?page=main&controller=cart&action=index"><i class="far fa-shopping-bag"></i></a></li>
                    <?php 
                        if (isset($_SESSION['guest'])) {
                            echo '
                            <li>
                                <a role="button" data-bs-toggle="modal" data-bs-target="#EditUserModal">
                                <i class="fas fa-user"></i>
                                </a>
                            </li>
                            ';
                        }
                    ?>
                    <span id="close-navbar"><i class="far fa-times"></i></span>
                </ul>
            </nav>
            <div id="mobile">
                <a class="<?php echo $activeArr['cartActive']; ?>" href = "index.php?page=main&controller=cart&action=index"><i class="far fa-shopping-bag"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
            </div>
        </header>

