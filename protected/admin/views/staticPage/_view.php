<?php
/* @var $this StaticPageController */
/* @var $data StaticPage */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_name')); ?>:</b>
	<?php echo CHtml::encode($data->category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo CHtml::encode($data->parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('side_menu')); ?>:</b>
	<?php echo CHtml::encode($data->side_menu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('header_visibility')); ?>:</b>
	<?php echo CHtml::encode($data->header_visibility); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_page')); ?>:</b>
	<?php echo CHtml::encode($data->has_page); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('canonical_name')); ?>:</b>
	<?php echo CHtml::encode($data->canonical_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('heading')); ?>:</b>
	<?php echo CHtml::encode($data->heading); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('small_content')); ?>:</b>
	<?php echo CHtml::encode($data->small_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('big_content')); ?>:</b>
	<?php echo CHtml::encode($data->big_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('small_image')); ?>:</b>
	<?php echo CHtml::encode($data->small_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banner')); ?>:</b>
	<?php echo CHtml::encode($data->banner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('big_image')); ?>:</b>
	<?php echo CHtml::encode($data->big_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field_1')); ?>:</b>
	<?php echo CHtml::encode($data->field_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field_2')); ?>:</b>
	<?php echo CHtml::encode($data->field_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field_3')); ?>:</b>
	<?php echo CHtml::encode($data->field_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cb')); ?>:</b>
	<?php echo CHtml::encode($data->cb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ub')); ?>:</b>
	<?php echo CHtml::encode($data->ub); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc')); ?>:</b>
	<?php echo CHtml::encode($data->doc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dou')); ?>:</b>
	<?php echo CHtml::encode($data->dou); ?>
	<br />

	*/ ?>

</div>