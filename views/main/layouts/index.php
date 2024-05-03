<?php
    include_once('views/main/navbar.php');
?>

    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button id="shop-now-btn">Shop Now</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="feature-box">
            <img src="public/img/features/f1.png">
            <h6>Free Shipping</h6>
        </div>
        <div class="feature-box">
            <img src="public/img/features/f2.png">
            <h6>Online Order</h6>
        </div>
        <div class="feature-box">
            <img src="public/img/features/f3.png">
            <h6>Save Money</h6>
        </div>
        <div class="feature-box">
            <img src="public/img/features/f4.png">
            <h6>Promotions</h6>
        </div>
        <div class="feature-box">
            <img src="public/img/features/f5.png">
            <h6>Happy Sell</h6>
        </div>
        <div class="feature-box">
            <img src="public/img/features/f6.png">
            <h6>F24/7 Support</h6>
        </div>
    </section>

    <section id="products1" class="section-p1">
        <h2>Featured Products</h2>
        <p><?php echo ''.@$feature->title.'' ?></p>
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
            if (count($featurepros) == 0) {
                echo '<div class="pro"><i class="nav-icon fa fa-luggage-cart"></i><p>It sure is empty here.</p></div>';
                echo '<div class="pro"><i class="nav-icon fa fa-luggage-cart"></i><p>It sure is empty here.</p></div>';
                echo '<div class="pro"><i class="nav-icon fa fa-luggage-cart"></i><p>It sure is empty here.</p></div>';
            } else {
                foreach ($featurepros as $featurepro) {
                    echo '
                    <div class="pro">
                        <img src="'.$featurepro->default_img.'" alt="">
                        <div class="des">
                            <span>brand</span>
                            <h5>'.$featurepro->name.'</h5>
                            <div class="star">
                    ';
                    for ($i = 0; $i < floor($featurepro->rating); $i++) {
                        echo '<i class="fas fa-star"></i>';
                    }
                    for ($i = 0; $i < 5 - floor($featurepro->rating); $i++) {
                        echo '<i class="fas fa-star rating-bad"></i>';
                    }
                    echo '
                            </div>
                            <h4>$'.$featurepro->price.'</h4>
                        </div>
                        <a role="button" data-bs-toggle="modal" data-bs-target="#modal-feature-'.$featurepro->id.'"><i class="fal fa-shopping-cart cart"></i></a>
                    </div>';
                }
            }
            ?>

        </div>
    </section>

    <section id="banner" class="section-m1" style="background-image: url('public/img/banner/b2.jpg');">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% Off</span> - All T-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>

    <section id="products1" class="section-p1">
        <h2>New Products</h2>
        <div class="pro-container">
            <?php 
            if (count($newpros) == 0) {
                echo '<div class="pro"><i class="nav-icon fa fa-luggage-cart"></i><p>It sure is empty here.</p></div>';
                echo '<div class="pro"><i class="nav-icon fa fa-luggage-cart"></i><p>It sure is empty here.</p></div>';
                echo '<div class="pro"><i class="nav-icon fa fa-luggage-cart"></i><p>It sure is empty here.</p></div>';
            } else {
                foreach ($newpros as $newpro) {
                    echo '
                    <div class="pro">
                        <img src="'.$newpro->default_img.'" alt="">
                        <div class="des">
                            <span>brand</span>
                            <h5>'.$newpro->name.'</h5>
                            <div class="star">
                    ';
                    for ($i = 0; $i < floor($newpro->rating); $i++) {
                        echo '<i class="fas fa-star"></i>';
                    }
                    for ($i = 0; $i < 5 - floor($newpro->rating); $i++) {
                        echo '<i class="fas fa-star rating-bad"></i>';
                    }
                    echo '
                            </div>
                            <h4>$'.$newpro->price.'</h4>
                        </div>
                        <a role="button" data-bs-toggle="modal" data-bs-target="#modal-newpro-'.$newpro->id.'"><i class="fal fa-shopping-cart cart"></i></a>
                    </div>';
                }
            }
            ?>
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
                        <i class="fas fa-star rating-bad"></i>
                    </div>
                    <h4>$price</h4>
                </div>
                <a><i class="fal fa-shopping-cart cart"></i></a>
            </div> -->

        </div>
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box" style="background-image: url('public/img/banner/b17.jpg')">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>Some long ass description</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box" style="background-image: url('public/img/banner/b17.jpg')">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>Some long ass description</span>
            <button class="white">Learn More</button>
        </div>
    </section>

    <section id="md-banner">
        <div class="banner-box" style="background-image: url('public/img/banner/b10.jpg');">
            <h2>SEASONAL SALE</h2>
            <h3>Not so long des</h3>
        </div>
        <div class="banner-box" style="background-image: url('public/img/banner/b10.jpg');">
            <h2>SEASONAL SALE</h2>
            <h3>Not so long des</h3>
        </div>
        <div class="banner-box" style="background-image: url('public/img/banner/b10.jpg');">
            <h2>SEASONAL SALE</h2>
            <h3>Not so long des</h3>
        </div>
    </section>
<script>
    $('#shop-now-btn').click(function(e) {
        location.href = "index.php?page=main&controller=shop&action=index";
    })
</script>
<?php
    include_once('views/main/footer.php');
?>