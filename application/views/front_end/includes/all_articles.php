<div class="blog-posts">

    <?php
    echo empty($all_articles) ? 'لا يوجد مقالات' : '';

    foreach ($all_articles as $article) {
        $pieces = explode("-", date('Y-m-d', strtotime($article->publish_date)));
        echo '<div class="post-item fx" data-animate="fadeInLeft">
        <div class="post-image" style="width:300px;">
            <a href="' . base_url() . 'home/article/' . $article->id.'/'.str_replace(" ", "-", trim($article->title)) . '">
                <div class="mask"></div>
                <div class="post-lft-info">
                    <div class="main-bg">' . $pieces[2] . '<br>' . $pieces[1] . '<br>' . $pieces[0] . '</div>
                </div>
                <img style="width:300px;height:177px;" src="' . base_url() . 'uploads/articles/small/' . $article->picture . '" alt="' . $article->title . '">
            </a>
        </div>
        <article class="post-content">
            <div class="post-info-container">
                <div class="post-info">
                    <h2><a class="main-color" href="' . base_url() . 'home/article/' .$article->id.'/'.str_replace(" ", "-", trim($article->title)) . '">' . substr($article->title, 0, 350) . '</a></h2>
                    <ul class="post-meta">
                        <li><i class="fa fa-folder-open"></i>التصنيف: <a href="#">' . $article->category_name . '</a></li>
                        <li class="meta-user"><i class="fa fa-user"></i>عدد المشاهدات: <a href="#">' . $article->views . '</a></li>
                    </ul>
                </div>
            </div>
            <p>' . character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $article->description)), 500) . '<a class="read-more" href="' . base_url() . 'home/article/' . $article->id.'/'.str_replace(" ", "-", trim($article->title)) . '">قراءة المزيد</a> </p>
        </article>
    </div>';
    }
    ?>
    <div class="clearfix"></div>
    <div class="pager skew-25">
        <ul>
            <?= $pageNumber ?>
        </ul>
    </div>
</div>