<?php
    include_once('views/main/navbar.php');
?>

    <section id="page-header" style="background-image: url('public/img/banner/b19.jpg');">
        <h2>#readmore</h2>
        <p>Read all case studies of our products!</p>
    </section>

    <section id="blog-container">
        <?php 
        if (count($blogs) == 0) {
            echo '
            <div class="blog-box">
                <div class="img-container">
                    <img src="public/img/blog/b1.jpg" alt="">
                </div>
                <div class="text-container">
                    <h4>Title title title</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi repellendus cumque et voluptatum dolor possimus voluptatibus aut ullam? Adipisci totam dolores facere modi illo sint recusandae minus, accusantium doloribus vitae!</p>
                    <a>CONTINUE READING</a>
                </div>
                <h1>13/04</h1>
            </div>
            ';
        } else {
            foreach($blog as $blogs) {
                echo '
                <div class="blog-box">
                    <div class="img-container">
                        <img src="'.$blog->img.'" alt="">
                    </div>
                    <div class="text-container">
                        <h4>'.$blog->title.'</h4>
                        <p>'.$blog->description.'</p>
                        <a role="button" data-bs-target="modal" data-bs-modal="modal-'.$blog->id.'">CONTINUE READING</a>
                    </div>
                </div>
                ';
            }
        }
        ?>
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