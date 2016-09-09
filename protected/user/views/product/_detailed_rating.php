<?php
$product_reviews_5 = count(UserReviews::model()->findAllByAttributes(array('product_id' => $product->id, 'rating' => 5)));
$percent_5 = Utilities::get_percentage($review_count, $product_reviews_5);
$product_reviews_4 = count(UserReviews::model()->findAllByAttributes(array('product_id' => $product->id, 'rating' => 4)));
$percent_4 = Utilities::get_percentage($review_count, $product_reviews_4);
$product_reviews_3 = count(UserReviews::model()->findAllByAttributes(array('product_id' => $product->id, 'rating' => 3)));
$percent_3 = Utilities::get_percentage($review_count, $product_reviews_3);
$product_reviews_2 = count(UserReviews::model()->findAllByAttributes(array('product_id' => $product->id, 'rating' => 2)));
$percent_2 = Utilities::get_percentage($review_count, $product_reviews_2);
$product_reviews_1 = count(UserReviews::model()->findAllByAttributes(array('product_id' => $product->id, 'rating' => 1)));
$percent_1 = Utilities::get_percentage($review_count, $product_reviews_1);

$total_rating = 0;
if (!empty($product_reviews)) {
    foreach ($product_reviews as $product_review) {
        $rating += $product_review->rating;
    }
    $total_rating = ceil($rating / (count($product_reviews)));
}

$j = $total_rating;
$k = 5 - $j;
?>

<div class="well well-sm prgs_min">
    <div class="row">
        <div class="col-xs-12 col-md-6 text-center">

            <div class="rating-num">  
                <h1><?= $total_rating ?></h1>
            </div>

            <div class="rating">
                <?php
                for ($i = 1; $i <= $j; $i++) {
                    ?>
                    <span class="glyphicon glyphicon-star"> </span>
                <?php } ?>
                <?php
                for ($i = 1; $i <= $k; $i++) {
                    ?>
                    <span class="glyphicon glyphicon-star-empty"></span>
                <?php } ?>
            </div>
            <div>
                <span class="glyphicon glyphicon-user"></span><?= $review_count ?> total
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="row rating-desc">
                <div class="col-xs-3 col-md-3 text-right">
                    <span class="glyphicon glyphicon-star"></span>5
                </div>
                <div class="col-xs-8 col-md-9">
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percent_5; ?>%">
                            <span class="sr-only"><?= $percent_5; ?>%</span>
                        </div>
                    </div>
                </div>
                <!-- end 5 -->
                <div class="col-xs-3 col-md-3 text-right">
                    <span class="glyphicon glyphicon-star"></span>4
                </div>
                <div class="col-xs-8 col-md-9">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percent_4; ?>%">
                            <span class="sr-only"><?= $percent_4; ?>%</span>
                        </div>
                    </div>
                </div>
                <!-- end 4 -->
                <div class="col-xs-3 col-md-3 text-right">
                    <span class="glyphicon glyphicon-star"></span>3
                </div>
                <div class="col-xs-8 col-md-9">
                    <div class="progress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percent_3; ?>%">
                            <span class="sr-only"><?= $percent_3; ?>%</span>
                        </div>
                    </div>
                </div>
                <!-- end 3 -->
                <div class="col-xs-3 col-md-3 text-right">
                    <span class="glyphicon glyphicon-star"></span>2
                </div>
                <div class="col-xs-8 col-md-9">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percent_2; ?>%">
                            <span class="sr-only"><?= $percent_2; ?>%</span>
                        </div>
                    </div>
                </div>
                <!-- end 2 -->
                <div class="col-xs-3 col-md-3 text-right">
                    <span class="glyphicon glyphicon-star"></span>1
                </div>
                <div class="col-xs-8 col-md-9">
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percent_1; ?>%">
                            <span class="sr-only"><?= $percent_1; ?>%</span>
                        </div>
                    </div>
                </div>
                <!-- end 1 -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
<!--</div>-->
