<div id="fb-root"></div>
<div class="blog-posts padd-bottom-10">
    <div class="post-item fx animated fadeInLeft" data-animate="fadeInLeft">
        <div class="details-img" style="text-align: center;background-color: rgb(249, 249, 249);">
            <div class="post-lft-info">
                <?php $pieces = explode("-", date('Y-m-d', strtotime($article_info['publish_date']))); ?>
                <div class="main-bg"><?= $pieces[2] ?><br><?= $pieces[1] ?><br><?= $pieces[0] ?><span class="tri-col"></span></div>
            </div>
            <img style="height: 300px;" src="<?= base_url() . 'uploads/articles/' . $article_info['picture'] ?>" alt="<?= $article_info['title'] ?>">
        </div>
        <article class="post-content">
            <div class="post-info-container">
                <h1 class="main-color"><?= $article_info['title'] ?></h1>
                <div class="post-info">
                    <ul class="post-meta">
                        <li><i class="fa fa-folder-open"></i>التصنيف: <a href="#"><?= $article_info['category_name'] ?></a></li>
                        <li class="meta-user"><i class="fa fa-user"></i>المشاهدات: <a href="#"><?= $article_info['views'] ?></a></li>
                    </ul>
                </div>
            </div>
            <p style="padding-bottom: 40px;">
                <?= $article_info['description'] ?>
            </p>
            <span class="sh">شارك هذا الإعلان على :</span>
            <div class="padd-top-20 center">
                <a style="background-color:#2d609b;" target="_blank" href="https://facebook.com/sharer/sharer.php?u=<?php echo base_url('home/article/' . $article_info['id']); ?>" class="btn btn-small">Facebook</a>
                <a style="background-color:#00c3f3;" target="_blank" href="https://twitter.com/home?status=<?php echo base_url('home/article/' . $article_info['id']); ?>" class="btn btn-small">Twitter</a>
                <a style="background-color:#d34836;" target="_blank" href="https://plus.google.com/share?url=<?php echo base_url('home/article/' . $article_info['id']); ?>" class="btn btn-small">Google Plus</a>
            </div>
        </article>
    </div><!-- .post-item end -->

    <div class="comments">
        <h3 class="block-head">التعليقات</h3>
    </div>
    <?php $this->load->view('front_end/includes/comments_form'); ?>

</div>