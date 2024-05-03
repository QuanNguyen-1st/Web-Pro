<?php 
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
                <tr class="cart-item">
                    <td><a href="#"><i class="far fa-times-circle"></i></a></td>
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
                </tr>
            </tbody>
        </table>
    </section>

    <section id="cart-total" class="section-p1">
        <form id="coupon">
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
                    <td>$price</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$<span id="total-price">123</span></strong></td>
                </tr>
            </table>
            <button class="normal">Proceed to checkout</button>
        </form>
    </section>

<?php
    include_once('views/main/footer.php');
?>