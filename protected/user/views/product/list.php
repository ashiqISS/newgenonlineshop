<div id="posts">
    <?php foreach ($products as $product): ?>
        <div class="post">
            <div style="padding: 2em;border: 1px solid">
            <p>Autor: <?php echo $product->product_name; ?></p>
            <p><?php echo $product->product_code; ?></p> <p>Autor: <?php echo $product->product_name; ?></p>
            <p><?php echo $product->product_code; ?></p> <p>Autor: <?php echo $product->product_name; ?></p>
            <p><?php echo $product->product_code; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php
$this->widget('application.user.extensions.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#posts',
    'itemSelector' => 'div.post',
    'loadingText' => 'Loading...',
    'donetext' => 'Loading Completed',
    'pages' => $pages,
));
?>
