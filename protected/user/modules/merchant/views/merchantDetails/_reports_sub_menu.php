<style>
    a.bt_up4 {
        color: #fff;
    }
    .sdsds {
        background-color: #dc9780;
        border: 0;
        border-radius: 0;
        margin-bottom: 15px;
        font-family: 'Roboto', sans-serif;
        text-transform: uppercase;
        margin-right: 10px;
        padding: 12px 25px 12px 25px;
        font-size: 14px;
        text-align: center;
    }
</style>

<div class="col-md-4">
    <div class="sdsds">
        <a href="<?= Yii::app()->request->baseUrl . "/user.php/my-sales" ?>" class="bt_up4">Sales Report</a>
    </div>
</div>

<div class="col-md-4">
    <div class="sdsds">
        <a href="<?= Yii::app()->request->baseUrl . "/user.php/most-viewed" ?>" class="bt_up4">Most Viewed</a>
    </div>
</div>
<div class="col-md-4">
    <div class="sdsds">
        <a href="<?= Yii::app()->request->baseUrl . "/user.php/most-purchased" ?>" class="bt_up4">Most Purchased</a>
    </div>
</div>