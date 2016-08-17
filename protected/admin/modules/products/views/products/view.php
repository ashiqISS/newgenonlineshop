<?php
/* @var $this ProductsController */
/* @var $model Products */

//$this->breadcrumbs=array(
//	'Products'=>array('index'),
//	$model->id,
//);
//
//$this->menu=array(
//	array('label'=>'List Products', 'url'=>array('index')),
//	array('label'=>'Create Products', 'url'=>array('create')),
//	array('label'=>'Update Products', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Products', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Products', 'url'=>array('admin')),
//);
?>

<h1>View Products #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'product_name',
		'product_code',
		'brand_id',
		'merchant_id',
		'merchant_type',
		 array(
                        'name' => 'description',
                        'value' => $data->description,
                        'type' => 'html'
                    ),
		'main_image',
		'gallery_images',
		'hover_image',
		'canonical_name',
		'meta_title',
		'meta_description',
		'meta_keywords',
		'header_visibility',
		'sort_order',
		'display_category_name',
		'price',
		'wholesale_price',
		'is_discount_available',
		'discount',
		'discount_type',
		'discount_rate',
		'quantity',
		'requires_shipping',
		'enquiry_sale',
		'new_from',
		'new_to',
		'sale_from',
		'sale_to',
		'special_price_from',
		'special_price_to',
		'tax',
		'gift_option',
		'stock_availability',
		'video_link',
		'video',
		'weight',
		'weight_class',
		'status',
		'exchange',
		'search_tag',
		'related_products',
		'is_cod_available',
		'is_available',
		'is_featured',
		'is_admin_approved',
		'CB',
		'UB',
		'DOC',
		'DOU',
	),
)); ?>
