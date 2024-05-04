<?php
    include_once('views/main/navbar.php');
?>
<link rel="stylesheet" href="public/css/style1.css">

    <section id="page-header" style="background-image: url('public/img/banner/b19.jpg');">
        <h2>#readmore</h2>
        <p>Read all case studies of our products!</p>
    </section>

    <section id="blog-container">
    <?php
    foreach ($newses as $news)
    {
        echo '
        <div class="modal fade" id="modal-' . $news->id . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                <!-- ======= Blog Single Section ======= -->
                <section id="blog" class="blog">
                    <div class="container" data-aos="fade-up">
    
                    <div class="row">
    
                        <div class="col-lg-12 entries">
    
                            <!-- Blog entry -->
                            <article class="entry entry-single">
    
                            <h2 class="entry-title">
                                ' . $news->title . '
                            </h2>
    
                            <div class="entry-meta">
                                <ul>
                                <li class="d-flex align-items-center"><i class="fal fa-clock"></i><time>' . date("F j, Y, g:i a", strtotime($news->date)) . '</time></li>
                                <li class="d-flex align-items-center"><i class="fal fa-comment-dots"></i>' . count($news->comments) . ' Comments</li>
                                </ul>
                            </div>
    
                            <div class="entry-content">
                                <p>
                                ' . $news->content . '
                                </p>
                            </div>
    
                            </article><!-- End blog entry -->
                        
    
                            <div class="blog-comments">
    
                            <h4 class="comments-count">' . count($news->comments) . ' Comments</h4>';
                            
                            foreach ($news->comments as $comment)
                            {
                                echo '
                                <div id="comment-' . $comment->id . '" class="comment">
                                <div class="d-flex">
                                    <div>
                                    <h5><a>' . $comment->user_name . '</a> <a style="text-decoration:none;" class="reply"><i class="fas fa-reply"></i> Reply</a></h5>
                                    <time>' . date("F j, Y, g:i a", strtotime($comment->date)) . '</time>
                                    <p style="font-weight: 600">
                                    ' . $comment->content . '
                                    </p>
                                    </div>
                                </div>
                                </div>';
                                
                                foreach ($comment->replies as $reply)
                                {
                                echo '
                                <div id="comment-' . $comment->id . '-reply-' . $reply->id . '" class="comment comment-reply">
                                    <div class="d-flex">
                                    <div>
                                        <h5><a>' . $reply->user_name . '</a> <a style="text-decoration:none;" class="reply"><i class="fas fa-reply"></i> Reply</a></h5>
                                        <time>' . date("F j, Y, g:i a", strtotime($reply->date)) . '</time>
                                        <p style="font-weight: 600">
                                        ' . $reply->content . '
                                        </p>
                                    </div>
                                    </div>
    
                                </div><!-- End comment reply #1-->
                                ';
                                }
                                echo '
                                <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="reply-form col-lg-11">
                                <div class="row">
                                    <div class="col form-group">
                                    <textarea name="comment" class="form-control" placeholder="Write your comment here."></textarea>
                                    </div>
                                </div>
                                <div style="display: flex; align-items: center; justify-content: end;">
                                    <button style="background-color:#088178; color: white; font-weight: 700" class="btn btn-primary btn-reply" data-news=' . $news->id . ' data-parent=' . $comment->id .' data-user="' . @$_SESSION["guest"] . '">Comment</button>
                                </div>
                                </form>
                            </div></div>';
                            }
                                
    
                            echo '
                            <div class="reply-form">
                                <h4 style="">Comments</h4>
                                <div class="row">
                                    <div class="col form-group">
                                    <textarea name="comment" class="form-control" placeholder="Write your comment here."></textarea>
                                    </div>
                                </div>
                                <div style="display: flex; align-items: center; justify-content: end;"><button style="background-color:#088178; color: white; font-weight: 700" class="btn btn-primary btn-comment" data-news=' . $news->id . ' data-parent="" data-user="' . @$_SESSION["guest"] . '">Comment</button></div>
                                </form>
                            </div>
    
                            </div><!-- End blog comments -->
                        </div><!-- End blog entries list -->
                        
    
                    </div>
    
                    </div>
                </section><!-- End Blog Single Section -->
                </div>
                <div class="modal-footer">
                <button type="button" class="normal" data-bs-dismiss="modal" style="background-color:gray;color:#fff;">Close</button>
                </div>
            </div>
            </div>
        </div>
        ';
    }
    ?>
        <?php 
        if (count($newses) == 0) {
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
            foreach($newses as $news) {
                echo '
                <div class="blog-box">
                    <div class="img-container">
                        <img src="'.@$news->img.'" alt="" onerror="this.onerror=null;this.src=\'public/img/blog/b1.jpg\';">
                    </div>
                    <div class="text-container">
                        <h4>'.$news->title.'</h4>
                        <p>'.$news->description.'</p>
                        <a role="button" data-bs-toggle="modal" data-bs-target="#modal-'.$news->id.'">CONTINUE READING</a>
                    </div>
                    <h1>'.date("m/d", strtotime($news->date)).'</h1>
                </div>
                ';
            }
        }
        ?>
    </section>

    <section id="pagnation" class="section-p1">
    <?php 
        if ($currentPage > 1) {
            echo '<a href="index.php?page=main&controller=blog&action=index&pg='.($currentPage - 1).'"><i class="fal fa-long-arrow-alt-left"></i></a>';
        } 
        
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a class="'.($i == $currentPage ? 'active' : '').'" href="index.php?page=main&controller=blog&action=index&pg='.$i.'"> '.$i.' </a>'; 
        }
        
        if ($currentPage < $totalPages) {
            echo '<a href="index.php?page=main&controller=blog&action=index&pg='.($currentPage + 1).'"><i class="fal fa-long-arrow-alt-right"></i></a>';
        }
        ?>
        <!-- <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a> -->
    </section>

<script src="public/js/blog/script.js"></script>

<?php
    include_once('views/main/footer.php');
?>