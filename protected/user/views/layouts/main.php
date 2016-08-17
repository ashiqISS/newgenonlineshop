<?php
$user_type = '';
if (Yii::app()->user->getState('user_type')) {
    $user_type = Yii::app()->user->getState('user_type');
}
if ($user_type == 2) {
    $this->widget('user.widgets.HeaderMerchant');
} else {
    $this->widget('user.widgets.Header');
}
echo $content;
$this->widget('user.widgets.Footer');
?>
      