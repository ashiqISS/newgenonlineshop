<?php

echo '<br>Welcome  '.Yii::app()->user->getState('user_name');
echo '<br>user type  '.Yii::app()->user->getState('user_type');
echo '<br>user mail  '.Yii::app()->user->getState('user_mail');
echo '<br>user id  '.Yii::app()->user->getState('user_id');

?>

<br><br>