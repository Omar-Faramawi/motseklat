<div class="block-bg-2 overflow-auto">
    <div class="container">
        <div class="Newsslider">
            <?php
            foreach ($slides as $slide) {
                echo '<div>
                <a href="#" class="cell-9" title=""><img alt="' . $slide->title . '" src="' . base_url('uploads/slider/small/' . $slide->picture) . '"></a>
                <article class="post-content cell-3">
                    <div class="post-info-container">
                        <div class="post-info">
                            <h2><a class="main-color pull-right" href="">' . $slide->title . '</a></h2>
                        </div>
                    </div>
                    ' . strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $slide->description)) . '
                </article>
            </div>';
            }
            ?>
        </div>
    </div>
</div>