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
                        <img src="'.$pro->default_img.'" alt="">
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
            echo '<a class="'.($i == $currentPage ? 'active' : '').'" href="index.php?page=main&controller=shop&action=index&pg='.$i.'> '.$i.' </a>'; 
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
    include_once('views/main/footer.php');
?>