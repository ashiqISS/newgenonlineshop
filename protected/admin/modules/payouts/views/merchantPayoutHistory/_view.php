<?php
/* @var $this MerchantPayoutHistoryController */
/* @var $data MerchantPayoutHistory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('merchant_id')); ?>:</b>
	<?php echo CHtml::encode($data->merchant_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('available_balance')); ?>:</b>
	<?php echo CHtml::encode($data->available_balance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requested_amount')); ?>:</b>
	<?php echo CHtml::encode($data->requested_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_account')); ?>:</b>
	<?php echo CHtml::encode($data->payment_account); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DOC')); ?>:</b>
	<?php echo CHtml::encode($data->DOC); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('DOU')); ?>:</b>
	<?php echo CHtml::encode($data->DOU); ?>
	<br />

	*/ ?>

</div>