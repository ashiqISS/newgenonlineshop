<?php
/* @var $this ProductCategoryController */
/* @var $data ProductCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo CHtml::encode($data->parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_name')); ?>:</b>
	<?php echo CHtml::encode($data->category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_title')); ?>:</b>
	<?php echo CHtml::encode($data->meta_title); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_description')); ?>:</b>
	<?php echo CHtml::encode($data->meta_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->meta_keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('header_visibility')); ?>:</b>
	<?php echo CHtml::encode($data->header_visibility); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('search_tag')); ?>:</b>
	<?php echo CHtml::encode($data->search_tag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('canonical_name')); ?>:</b>
	<?php echo CHtml::encode($data->canonical_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CB')); ?>:</b>
	<?php echo CHtml::encode($data->CB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UB')); ?>:</b>
	<?php echo CHtml::encode($data->UB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DOC')); ?>:</b>
	<?php echo CHtml::encode($data->DOC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DOU')); ?>:</b>
	<?php echo CHtml::encode($data->DOU); ?>
	<br />

	*/ ?>

</div>