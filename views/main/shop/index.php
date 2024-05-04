<?php
    include_once('views/main/navbar.php');
?>

    <section id="page-header" style="background-image: url('public/img/banner/b1.jpg');">
        <h2>#stayhome</h2>
        <p>Save more with coupons & up to 70% off</p>
    </section>

    <section id="products1" class="section-p1">
        <h2>New Products</h2>
        <p>Check out our brand new products here!</p>
        <div class="pro-container">
            <!-- <div class="pro">
                <img src="public/img/products/f1.jpg" alt="">
                <div class="des">
                    <span>brand</span>
                    <h5>Name Name Name</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$price</h4>
                </div>
                <a><i class="fal fa-shopping-cart cart"></i></a>
            </div> -->
            <?php 
            if (count($products) == 0) {
                echo '<div class="pro"><i class="nav-icon fa fa-luggage-cart"></i><p>It sure is empty here.</p></div>';
                echo '<div class="pro"><i class="nav-icon fa fa-luggage-cart"></i><p>It sure is empty here.</p></div>';
                echo '<div class="pro"><i class="nav-icon fa fa-luggage-cart"></i><p>It sure is empty here.</p></div>';
            } else {
                foreach ($products as $pro) {
                    echo '
                    <div class="pro">
                        <img src="'.$pro->default_img.'" alt="" onerror="this.onerror=null;this.src=\'public/img/products/f1.jpg\';">
                        <div class="des">
                            <span>brand</span>
                            <h5>'.$pro->name.'</h5>
                            <div class="star">
                    ';
                    for ($i = 0; $i < floor($pro->rating); $i++) {
                        echo '<i class="fas fa-star"></i>';
                    }
                    for ($i = 0; $i < 5 - floor($pro->rating); $i++) {
                        echo '<i class="fas fa-star rating-bad"></i>';
                    }
                    echo '
                            </div>
                            <h4>$'.$pro->price.'</h4>
                        </div>
                        <a role="button" data-bs-toggle="modal" data-bs-target="#modal-'.$pro->id.'"><i class="fal fa-shopping-cart cart"></i></a>
                    </div>';
                }
            }
            ?>

        </div>
    </section>

    <section id="pagnation" class="section-p1">
        <?php 
        if ($currentPage > 1) {
            echo '<a href="index.php?page=main&controller=shop&action=index&pg='.($currentPage - 1).'"><i class="fal fa-long-arrow-alt-left"></i></a>';
        } 
        
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a class="'.($i == $currentPage ? 'active' : '').'" href="index.php?page=main&controller=shop&action=index&pg='.$i.'"> '.$i.' </a>'; 
        }
        
        if ($currentPage < $totalPages) {
            echo '<a href="index.php?page=main&controller=shop&action=index&pg='.($currentPage + 1).'"><i class="fal fa-long-arrow-alt-left"></i></a>';
        }
        ?>
        <!-- <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a> -->
    </section>

    <?php 
    if (count($products) == 0) {

    } else {
        foreach ($products as $pro) {
            echo '
            <div class="modal fade modal-product" id="modal-'.$pro->id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-'.$pro->id.'Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                        <!-- <h1 class="modal-title fs-5" id="modal-'.$pro->id.'Label">Modal title</h1> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <section class="pro-detail">
                                <div class="img-container">
                                    <img src="'.$pro->default_img.'" width="100%" class="big-img" onerror="this.onerror=null;this.src=\'public/img/products/f1.jpg\';" alt="">
                                    <div class="small-img-group">
            ';
            foreach ($pro->stocks as $stock) {
                echo'
                                        <div class="small-img-container">
                                            <img src="'.$stock->img.'" width="100%" class="small-img" alt="" onerror="this.onerror=null;this.src=\'public/img/products/f1.jpg\';">
                                        </div>
                ';
            }
            echo'
                                    </div>
                                </div>
                                <div class="detail-container">
                                    <h4>'.$pro->name.'</h4>
                                    <h2>$'.$pro->price.'</h2>
                                    <form>
                                        <select name="size">
                                            <option>Select Size</option>
                                            <option value="1">Small</option>
                                            <option value="2">Large</option>
                                            <option value="3">XL</option>
                                            <option value="4">XXL</option>
                                        </select>
                                        <input name="amount" type="number" value="1" min="1">
                                        <button class="normal add-to-cart" data-product="'.$pro->id.'">Add To Cart</button>
                                    </form>
                                    <h4>Product Details</h4>
                                    <p>'.$pro->description.'</p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
    }
    
    ?>

<script src="public/js/shop/script.js"></script>

<?php
    include_once('views/main/footer.php');
?>