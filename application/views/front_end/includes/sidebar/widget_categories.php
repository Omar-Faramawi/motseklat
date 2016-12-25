<li class="widget blog-cat-w fx" data-animate="fadeInRight">
    <h3 class="widget-head">
        <span class="chain-t-left"></span>
        .: تصنيف المقالات :.</h3>
    <div class="widget-content">
        <ul class="list list-ok alt">
            <?php
            if (empty($categories_count)) {
                'لا يوجد أخبار';
            } else {
                foreach ($categories_count as $category) {
                    echo '<li><a href = "' . base_url() . 'home/categories/' . (isset($category->id) ? $category->id : '') . '">' . $category->name . '</a><span>[' . $category->articles_count . ']</span></li>';
                }
            }
            ?>
        </ul>
    </div>
    <span class="chain-b-right"></span>
    <span class="chain-b-left"></span>
</li>