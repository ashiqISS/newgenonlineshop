<?php

$user_type = '';
if (Yii::app()->user->getState('user_type')) {
        $user_type = Yii::app()->user->getState('user_type');
}
Yii::app()->session['currency'] = Currency::model()->findByPk(3);
if ($user_type == 2) {
        $this->widget('user.widgets.HeaderMerchant');
} else {
        $this->widget('user.widgets.Header');
}
//echo 'ddddddddd'.Yii::app()->user->getId();
echo $content;
$this->widget('user.widgets.Footer');
?>
