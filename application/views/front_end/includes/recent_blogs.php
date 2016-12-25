<h4 class="block-head">    أحدث المقالات
    <a href="<?= base_url('home/articles') ?>">مشاهدة المزيد<span class="fa fa-plus"></span></a>
</h4>
<?php if (!empty($articles)) { ?>
    <div class="blog-posts">
        <?php if (!empty($articles[0])) { ?>
            <div class="post-item fx animated fadeInLeft" data-animate="fadeInLeft">
                <div class="post-image">
                    <a href="<?= base_url() . 'home/article/' . $articles[0]->id.'/'.str_replace(" ", "-", trim($articles[0]->title)) ?>">
                        <div class="mask"></div>
                        <div class="post-lft-info">
                            <?php $pieces = explode("-", date('Y-m-d', strtotime($articles[0]->publish_date))); ?>
                            <div class="main-bg"><?= $pieces[2] ?><br><?= $pieces[1] ?><br><?= $pieces[0] ?></div>
                        </div>
                        <img src="<?= base_url() . 'uploads/articles/small/' . $articles[0]->picture ?>" alt="<?= $articles[0]->title ?>">
                    </a>
                </div>
                <article class="post-content">
                    <div class="post-info-container">
                        <div class="post-info">
                            <h2><a class="main-color" href="<?= base_url() . 'home/article/' . $articles[0]->id.'/'.str_replace(" ", "-", trim($articles[0]->title)) ?>"><?= $articles[0]->title ?></a></h2>
                            <ul class="post-meta">
                                <li><i class="fa fa-folder-open"></i>التصنيف: <a href="#"><?= $articles[0]->category_name ?></a></li>
                                <li class="meta-user"><i class="fa fa-eye"></i>المشاهدات: <a href="#"><?= $articles[0]->views ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <p>
                        <?= character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $articles[0]->description)), 500) ?>
                        <a class="read-more" href="<?= base_url() . 'home/article/' . $articles[0]->id.'/'.str_replace(" ", "-", trim($articles[0]->title)) ?>">قراءة المزيد</a>
                    </p>
                </article>
            </div>

        <?php } ?>
        <div class="small_news">
            <div class="small_items">
                <div class="row">
                    <?php if (!empty($articles[1])) { ?>
                        <div class="cell-6">
                            <div class="post-item fx animated fadeInLeft" data-animate="fadeInLeft">
                                <div class="cell-3">
                                    <div class="row">
                                        <a href="<?= base_url() . 'home/article/' . $articles[1]->id.'/'.str_replace(" ", "-", trim($articles[1]->title)) ?>">
                                            <img src="<?= base_url() . 'uploads/articles/thumbs/' . $articles[1]->picture ?>" alt="<?= $articles[0]->title ?>">
                                        </a>
                                    </div>
                                </div>
                                <article class="cell-9">
                                    <h2><a class="main-color" href="<?= base_url() . 'home/article/' . $articles[1]->id.'/'.str_replace(" ", "-", trim($articles[1]->title)) ?>"><?= $articles[1]->title ?></a></h2>
                                    <ul class="post-meta">
                                        <li><i class="fa fa-folder-open"></i>التصنيف: <a href="#"><?= $articles[1]->category_name ?></a></li>
                                        <li class="meta-user"><i class="fa fa-eye"></i>المشاهدات: <a href="#"><?= $articles[1]->views ?></a></li>
                                    </ul>
                                </article>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($articles[2])) { ?>
                        <div class="cell-6">
                            <div class="post-item fx animated fadeInLeft" data-animate="fadeInLeft">
                                <div class="cell-3">
                                    <div class="row">
                                        <a href="<?= base_url() . 'home/article/' . $articles[2]->id.'/'.str_replace(" ", "-", trim($articles[2]->title)) ?>">
                                            <img src="<?= base_url() . 'uploads/articles/thumbs/' . $articles[2]->picture ?>" alt="<?= $articles[2]->title ?>">
                                        </a>
                                    </div>
                                </div>
                                <article class="cell-9">
                                    <h2><a class="main-color" href="<?= base_url() . 'home/article/' . $articles[2]->id.'/'.str_replace(" ", "-", trim($articles[2]->title)) ?>"><?= $articles[2]->title ?></a></h2>
                                    <ul class="post-meta">
                                        <li><i class="fa fa-folder-open"></i>التصنيف: <a href="#"><?= $articles[2]->category_name ?></a></li>
                                        <li class="meta-user"><i class="fa fa-eye"></i>المشاهدات: <a href="#"><?= $articles[2]->views ?></a></li>
                                    </ul>
                                </article>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="small_items">
                <div class="row">
                    <?php if (!empty($articles[3])) { ?>
                        <div class="cell-6">
                            <div class="post-item fx animated fadeInLeft" data-animate="fadeInLeft">
                                <div class="cell-3">
                                    <div class="row">
                                        <a href="<?= base_url() . 'home/article/' . $articles[3]->id.'/'.str_replace(" ", "-", trim($articles[3]->title)) ?>l">
                                            <img src="<?= base_url() . 'uploads/articles/thumbs/' . $articles[3]->picture ?>" alt="<?= $articles[3]->title ?>">
                                        </a>
                                    </div>
                                </div>
                                <article class="cell-9">
                                    <h2><a class="main-color" href="<?= base_url() . 'home/article/' . $articles[3]->id.'/'.str_replace(" ", "-", trim($articles[3]->title)) ?>"><?= $articles[3]->title ?></a></h2>
                                    <ul class="post-meta">
                                        <li><i class="fa fa-folder-open"></i>التصنيف: <a href="#"><?= $articles[3]->category_name ?></a></li>
                                        <li class="meta-user"><i class="fa fa-eye"></i>المشاهدات: <a href="#"><?= $articles[3]->views ?></a></li>
                                    </ul>
                                </article>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($articles[4])) { ?>
                        <div class="cell-6">
                            <div class="post-item fx animated fadeInLeft" data-animate="fadeInLeft">
                                <div class="cell-3">
                                    <div class="row">
                                        <a href="<?= base_url() . 'home/article/' . $articles[4]->id.'/'.str_replace(" ", "-", trim($articles[4]->title)) ?>">
                                            <img src="<?= base_url() . 'uploads/articles/thumbs/' . $articles[4]->picture ?>" alt="<?= $articles[4]->title ?>">
                                        </a>
                                    </div>
                                </div>
                                <article class="cell-9">
                                    <h2><a class="main-color" href="<?= base_url() . 'home/article/' . $articles[4]->id.'/'.str_replace(" ", "-", trim($articles[4]->title)) ?>"><?= $articles[4]->title ?></a></h2>
                                    <ul class="post-meta">
                                        <li><i class="fa fa-folder-open"></i>التصنيف: <a href="#"><?= $articles[4]->category_name ?></a></li>
                                        <li class="meta-user"><i class="fa fa-eye"></i>المشاهدات: <a href="#"><?= $articles[4]->views ?></a></li>
                                    </ul>
                                </article>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<?php } ?>