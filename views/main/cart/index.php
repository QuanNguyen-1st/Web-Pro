<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if (!isset($_SESSION['guest'])) {
        header("Location: index.php?page=main&controller=login&action=index");
    }
?>

<?php
    include_once('views/main/navbar.php');
?>

    <section id="page-header" style="background-image: url('public/img/about/banner.png');">
        <h2>#lets_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you</p>
    </section>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (count($products) == 0) {

                } else {
                    for ($i = 0; $i < count($products); $i++) {
                        echo '
                        <tr class="cart-item">
                            <td><a role="button" data-bs-pro="'.$cart[$i]->id.'" data-bs-toggle="modal" data-bs-target="#deleteProductConfirm"><i class="far fa-times-circle"></i></a></td>
                            <td><img src="'.$cart[$i]->img.'" alt=""></td>
                            <td>'.$products[$i]->name.'</td>
                            <td>$<span class="unit-price">'.$products[$i]->price.'</span></td>
                            <td><input type="number" value="1" min="1" required></td>
                            <td>$<span class="subtotal-price"></span></td>
                        </tr>
                        ';
                    }
                }
                ?>
                <!-- <tr class="cart-item">
                <td><a role="button" data-bs-pro="134" data-bs-toggle="modal" data-bs-target="#deleteProductConfirm"><i class="far fa-times-circle"></i></a></td>
                    <td><img src="public/img/products/f1.jpg" alt=""></td>
                    <td>Name name name</td>
                    <td>$<span class="unit-price">123</span></td>
                    <td><input type="number" value="1" min="1" required></td>
                    <td>$<span class="subtotal-price"></span></td>
                </tr>
                <tr class="cart-item">
                    <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                    <td><img src="public/img/products/f1.jpg" alt=""></td>
                    <td>Name name name</td>
                    <td>$<span class="unit-price">123</span></td>
                    <td><input type="number" value="1"></td>
                    <td>$<span class="subtotal-price"></span></td>
                </tr> -->
            </tbody>
        </table>
    </section>

    <div class="modal fade" id="deleteProductConfirm" tabindex="-1" aria-labelledby="deleteProductConfirmLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteProductConfirmLabel">Are you sure?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form id="delete-form" method="POST" action="index.php?page=main&controller=cart&action=delete">
                <input id="del-cart-holder" name="cart_id" value="" type="hidden">
                <button type="submit" class="btn" id="#deleteConfirm" style="background-color:#088178;color:#fff;">Confirm</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <section id="cart-total" class="section-p1">
        <form id="coupon" action="index.php?page=main&controller=cart&action=index" method="POST">
            <h3>Apply Coupon</h3>
            <div>
                <input type="text" name="coupon" placeholder="Enter Your Coupon">
                <button class="normal">Apply</button>
            </div>
        </form>
        <form id="total">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>$<span id="total-price">0</span></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <?php
                if (isset($coupon)) {
                    echo '
                    <tr>
                        <td>Coupon</td>
                        <td><span id="discount" coupon-code="'.$coupon->coupon_num.'">'.$coupon->discount.'</span>%</td>
                    </tr>
                    ';
                }
                ?>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$<span id="final-price">0</span></strong></td>
                </tr>
            </table>
            <button class="normal" id="make-purchase">Proceed to checkout</button>
        </form>
    </section>

<script src="public/js/cart/script.js"></script>

<?php
    include_once('views/main/footer.php');
?>