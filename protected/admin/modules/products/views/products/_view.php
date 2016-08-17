<?php
/* @var $this ProductsController */
/* @var $data Products */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_name')); ?>:</b>
	<?php echo CHtml::encode($data->product_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_code')); ?>:</b>
	<?php echo CHtml::encode($data->product_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_id')); ?>:</b>
	<?php echo CHtml::encode($data->brand_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('merchant_id')); ?>:</b>
	<?php echo CHtml::encode($data->merchant_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('merchant_type')); ?>:</b>
	<?php echo CHtml::encode($data->merchant_type); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('main_image')); ?>:</b>
	<?php echo CHtml::encode($data->main_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_images')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_images); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hover_image')); ?>:</b>
	<?php echo CHtml::encode($data->hover_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('canonical_name')); ?>:</b>
	<?php echo CHtml::encode($data->canonical_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_title')); ?>:</b>
	<?php echo CHtml::encode($data->meta_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_description')); ?>:</b>
	<?php echo CHtml::encode($data->meta_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->meta_keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('header_visibility')); ?>:</b>
	<?php echo CHtml::encode($data->header_visibility); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('display_category_name')); ?>:</b>
	<?php echo CHtml::encode($data->display_category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wholesale_price')); ?>:</b>
	<?php echo CHtml::encode($data->wholesale_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_discount_available')); ?>:</b>
	<?php echo CHtml::encode($data->is_discount_available); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount')); ?>:</b>
	<?php echo CHtml::encode($data->discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount_type')); ?>:</b>
	<?php echo CHtml::encode($data->discount_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount_rate')); ?>:</b>
	<?php echo CHtml::encode($data->discount_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requires_shipping')); ?>:</b>
	<?php echo CHtml::encode($data->requires_shipping); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enquiry_sale')); ?>:</b>
	<?php echo CHtml::encode($data->enquiry_sale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('new_from')); ?>:</b>
	<?php echo CHtml::encode($data->new_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('new_to')); ?>:</b>
	<?php echo CHtml::encode($data->new_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sale_from')); ?>:</b>
	<?php echo CHtml::encode($data->sale_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sale_to')); ?>:</b>
	<?php echo CHtml::encode($data->sale_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('special_price_from')); ?>:</b>
	<?php echo CHtml::encode($data->special_price_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('special_price_to')); ?>:</b>
	<?php echo CHtml::encode($data->special_price_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax')); ?>:</b>
	<?php echo CHtml::encode($data->tax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gift_option')); ?>:</b>
	<?php echo CHtml::encode($data->gift_option); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stock_availability')); ?>:</b>
	<?php echo CHtml::encode($data->stock_availability); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_link')); ?>:</b>
	<?php echo CHtml::encode($data->video_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video')); ?>:</b>
	<?php echo CHtml::encode($data->video); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight_class')); ?>:</b>
	<?php echo CHtml::encode($data->weight_class); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exchange')); ?>:</b>
	<?php echo CHtml::encode($data->exchange); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('search_tag')); ?>:</b>
	<?php echo CHtml::encode($data->search_tag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('related_products')); ?>:</b>
	<?php echo CHtml::encode($data->related_products); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_cod_available')); ?>:</b>
	<?php echo CHtml::encode($data->is_cod_available); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_available')); ?>:</b>
	<?php echo CHtml::encode($data->is_available); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_featured')); ?>:</b>
	<?php echo CHtml::encode($data->is_featured); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_admin_approved')); ?>:</b>
	<?php echo CHtml::encode($data->is_admin_approved); ?>
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