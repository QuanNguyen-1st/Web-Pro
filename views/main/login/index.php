<?php 
    include_once('views/main/navbar.php');
?>
    
    <section id="login" class="section-p1" style="background-image: url('public/img/hero4.png');">
        
        <div class="form-container">
            <h1>Login</h1>
            <form action="index.php?page=main&controller=login&action=index" method="POST">
                <input name="email" type="text" placeholder="Your E-mail">
                <input name="password" type="password" placeholder="Your Password">
                <p>Don't have an account? <a href="index.php?page=main&controller=register&action=index">Sign Up Here!</a></p>
                <?php 
                if (isset($err))
                {
                    echo '<p class="login-box-msg" style="color: red">' . $err . '</p>';
                    unset($err);
                }
                ?>
                <button class="normal" name="submit-btn" type="submit">Login</button>
            </form>
        </div>
    </section>

    <section id="news" class="section-p1"></section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="public/img/logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address: 268 Ly Thuong Kiet, Ward 14, District 10, Ho Chi Minh City</strong></p>
            <p><strong>Phone:</strong></p>
            <p><strong>Hours:</strong></p>
            <div class="social">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>
        <div class="col app">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="public/img/pay/app.jpg" alt="">
                <img src="public/img/pay/play.jpg" alt="">
            </div>
            <p>Securd Payment Gateways</p>
            <img src="public/img/pay/pay.png" alt="">
        </div>
    </footer>
    <script src="public/js/script.js"></script>
</body>
</html>