<?php

echo 'Welcome  Buyer ' . Yii::app()->user->getState('user_mail');
echo '<br><br>  user_id  ' . Yii::app()->user->getState('user_id');
echo '<br><br>  user type  ' . Yii::app()->user->getState('user_type');



Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');