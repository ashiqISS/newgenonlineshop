<?php
/* @var $this SocialController */
/* @var $data Social */
?>

<div class="view">

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
        <br />-->

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($data->name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
    <?php echo CHtml::encode($data->link); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('doc')); ?>:</b>
    <?php echo CHtml::encode($data->doc); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('dou')); ?>:</b>
    <?php echo CHtml::encode($data->dou); ?>
    <br />

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('cb')); ?>:</b>
    <?php echo CHtml::encode($data->cb); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('ub')); ?>:</b>
    <?php echo CHtml::encode($data->ub); ?>
        <br />-->


</div>