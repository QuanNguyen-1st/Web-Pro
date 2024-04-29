<?php
    include_once('views/main/navbar.php');
?>

    <section id="page-header" style="background-image: url('public/img/about/banner.png');">
        <h2>#lets_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you</p>
    </section>

    <section id="contact-header" class="section-p1">
        <div class="text-container">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today</h2>
            <h3>Head Office</h3>
            <ul>
                <li>
                    <i class="fal fa-map"></i>
                    <p>268 Ly Thuong Kiet, Ward 14, District 10, Ho Chi Minh City</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>info@hcmut.edu.vn</p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>028 3864 7256 - 5282</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Saturdat: 7.00am to 17.00pm</p>
                </li>
            </ul>
        </div>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7838.891408270977!2d106.6600527!3d10.7771353!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec3c161a3fb%3A0xef77cd47a1cc691e!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIC0gxJDhuqFpIGjhu41jIFF14buRYyBnaWEgVFAuSENN!5e0!3m2!1svi!2s!4v1714219883159!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    
    <section id="contact-form">
        <form action="">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" placeholder="Your Name">
            <input type="text" placeholder="E-mail">
            <input type="text" placeholder="Subject">
            <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
            <button class="normal">Submit</button>
        </form>
        <div class="contact-employee">
            <div>
                <img src="public/img/people/1.png" alt="">
                <p><span>Tran Thien Nhan</span> Senior lazy ass person
                <br>Phone: 0 123 456 789
                <br>Email: iamstoopid@gmail.com
                </p>
            </div>
            <div>
                <img src="public/img/people/2.png" alt="">
                <p><span>Tran Thien Nhan</span> Senior lazy ass person
                <br>Phone: 0 123 456 789
                <br>Email: iamstoopid@gmail.com
                </p>
            </div>
            <div>
                <img src="public/img/people/3.png" alt="">
                <p><span>Tran Thien Nhan</span> Senior lazy ass person
                <br>Phone: 0 123 456 789
                <br>Email: iamstoopid@gmail.com
                </p>
            </div>
        </div>
    </section>

<?php
    include_once('views/main/footer.php');
?>