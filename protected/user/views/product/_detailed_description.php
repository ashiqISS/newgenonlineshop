<?php
$product_reviews = UserReviews::model()->findAllByAttributes(array('product_id' => $product->id));
$review_count = count($product_reviews);
?>
<div class="row">      
    <div class="col-md-5" style="padding-top: 1em;">
        <?php echo $this->renderPartial('_detailed_rating', array('product' => $product, 'product_reviews' => $product_reviews, 'review_count' => $review_count)); ?>
    </div>
</div>

<div id="descriptionTab">
    <div class="row">
        <div class="col-md-12 col-sm-12">


            <div class="tab_upcmg">


                <ul class="nav nav-tabs" id="myTabs">
                    <li id="descList" class="active"><a data-toggle="tab" href="#productDesc">Description </a></li>
                    <li id="reviewList"><a data-toggle="tab" href="#reviews">Reviews (<?= $review_count ?>)</a></li>

                </ul>

                <div id="myTabContent" class="tab-content">
                    <div id="productDesc" class="tab-pane fade in active">
                        <p>
                            <?php
                            $description = str_replace('background-color: rgb(255, 255, 255)', ' ', $product->description);
                            echo $description;
                            ?>
                        </p>                   
                    </div>
                    <div id="reviews" class="tab-pane fade">
                        <?php
                        if (!empty($product_reviews)) {
                            foreach ($product_reviews as $product_review) {
                                $author = $product_review->author;
                                ?>
                                <div class="review_content">
                                    <ul class="list-inline">
        <?php
        $j = $total_rating;
        $j = $product_review->rating;
        $k = 5 - $j;
        ?>
                                        <?php
                                        for ($i = 1; $i <= $j; $i++) {
                                            ?>
                                            <li><i class="fa stars fa-star"></i></li>
                                        <?php } ?>
                                        <?php
                                        for ($i = 1; $i <= $k; $i++) {
                                            ?>
                                            <li><i class="fa stars fa-star-o"></i></li>
                                        <?php } ?>
                                    </ul>
                                    <h5>By <strong> <?php echo $author; ?></strong> On <?php echo date('d M Y', strtotime($product_review->date)); ?></h5>
                                    <p><?php echo $product_review->review; ?></p>
                                </div>
    <?php
    }
}
?>
                    </div>

                </div></div>
        </div>    
    </div>
</div>