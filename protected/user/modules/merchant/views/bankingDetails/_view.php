<?php
/* @var $this BankingDetailsController */
/* @var $data BankingDetails */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('account_type')); ?>:</b>
	<?php echo CHtml::encode($data->account_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('account_holder_name')); ?>:</b>
	<?php echo CHtml::encode($data->account_holder_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('account_number')); ?>:</b>
	<?php echo CHtml::encode($data->account_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_name')); ?>:</b>
	<?php echo CHtml::encode($data->bank_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ifsc')); ?>:</b>
	<?php echo CHtml::encode($data->ifsc); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('paypal_id')); ?>:</b>
	<?php echo CHtml::encode($data->paypal_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DOC')); ?>:</b>
	<?php echo CHtml::encode($data->DOC); ?>
	<br />

	*/ ?>

</div>