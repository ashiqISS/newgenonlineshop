<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $category_id
 * @property string $product_name
 * @property string $product_code
 * @property integer $brand_id
 * @property integer $merchant_id
 * @property integer $merchant_type
 * @property string $description
 * @property string $main_image
 * @property string $gallery_images
 * @property string $hover_image
 * @property string $canonical_name
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $header_visibility
 * @property integer $sort_order
 * @property integer $display_category_name
 * @property double $price
 * @property double $wholesale_price
 * @property integer $is_discount_available
 * @property double $discount
 * @property string $discount_type
 * @property double $discount_rate
 * @property string $discount_from
 * @property string $discount_to
 * @property integer $quantity
 * @property integer $requires_shipping
 * @property integer $enquiry_sale
 * @property string $new_from
 * @property string $new_to
 * @property string $sale_from
 * @property string $sale_to
 * @property string $special_price_from
 * @property string $special_price_to
 * @property double $special_price
 * @property double $tax
 * @property integer $gift_option
 * @property integer $stock_availability
 * @property string $video_link
 * @property string $video
 * @property double $weight
 * @property integer $weight_class
 * @property string $status
 * @property integer $exchange
 * @property string $search_tag
 * @property string $related_products
 * @property integer $is_cod_available
 * @property integer $is_available
 * @property integer $is_featured
 * @property integer $is_admin_approved
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class Products extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'products';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
//			array('category_id, product_name, product_code, brand_id, merchant_id, merchant_type, description, main_image, gallery_images, hover_image, canonical_name, meta_title, meta_description, meta_keywords, header_visibility, sort_order, display_category_name, price, wholesale_price, is_discount_available, discount, discount_type, discount_rate, quantity, requires_shipping, enquiry_sale, new_from, new_to, sale_from, sale_to, special_price_from, special_price_to, tax, gift_option, stock_availability, video_link, video, weight, weight_class, status, exchange, search_tag, related_products, is_cod_available, is_available, is_featured, is_admin_approved, CB, UB, DOC, DOU', 'required'),
            array('category_id, product_name, product_code, description, main_image, price, quantity, sale_from, sale_to, weight, weight_class', 'required','on'=>'admin_create'),
            array('category_id, product_name, product_code, merchant_id, merchant_type, description, main_image, price, quantity, sale_from, sale_to', 'required','on' => 'user_create'),
            array('brand_id, merchant_id, merchant_type, header_visibility, sort_order, display_category_name, is_discount_available, quantity, requires_shipping, enquiry_sale, gift_option, stock_availability, weight_class, exchange, is_cod_available, is_available, is_featured, is_admin_approved, CB, UB', 'numerical', 'integerOnly' => true),
            array('price, wholesale_price, discount, discount_rate, tax, weight', 'numerical'),
            array('category_id, main_image, gallery_images, canonical_name', 'length', 'max' => 200),
            array('product_name, product_code, meta_title, meta_keywords, discount_type, video_link, status, search_tag, related_products', 'length', 'max' => 225),
            array('hover_image, video', 'length', 'max' => 150),
            array('canonical_name', 'unique', 'message' => 'This name is already taken'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, category_id, product_name, product_code, brand_id, merchant_id, merchant_type, description, main_image, gallery_images, hover_image, canonical_name, meta_title, meta_description, meta_keywords, header_visibility, sort_order, display_category_name, price, wholesale_price, is_discount_available, discount, discount_type, discount_rate, quantity, requires_shipping, enquiry_sale, new_from, new_to, sale_from, sale_to, special_price_from, special_price_to, tax, gift_option, stock_availability, video_link, video, weight, weight_class, status, exchange, search_tag, related_products, is_cod_available, is_available, is_featured, is_admin_approved, CB, UB, DOC, DOU', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'category_id' => 'Category',
            'product_name' => 'Product Name',
            'product_code' => 'Product Code',
            'brand_id' => 'Brand',
            'merchant_id' => 'Merchant',
            'merchant_type' => 'Merchant Type',
            'description' => 'Description',
            'main_image' => 'Main Image',
            'gallery_images' => 'Gallery Images',
            'hover_image' => 'Hover Image',
            'canonical_name' => 'Canonical Name',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'header_visibility' => 'Header Visibility',
            'sort_order' => 'Sort Order',
            'display_category_name' => 'Display Category Name',
            'price' => 'Price',
            'wholesale_price' => 'Wholesale Price',
            'is_discount_available' => 'Is Discount Available',
            'discount' => 'Discount',
            'discount_type' => 'Discount Type',
            'discount_rate' => 'Discount Rate',
            'quantity' => 'Quantity',
            'requires_shipping' => 'Requires Shipping',
            'enquiry_sale' => 'Enquiry Sale',
            'new_from' => 'New From',
            'new_to' => 'New To',
            'sale_from' => 'Sale From',
            'sale_to' => 'Sale To',
            'special_price_from' => 'Special Price From',
            'special_price_to' => 'Special Price To',
            'tax' => 'Tax',
            'gift_option' => 'Gift Option',
            'stock_availability' => 'Stock Availability',
            'video_link' => 'Video Link',
            'video' => 'Video',
            'weight' => 'Weight',
            'weight_class' => 'Weight Class',
            'status' => 'Status',
            'exchange' => 'Exchange',
            'search_tag' => 'Search Tag',
            'related_products' => 'Related Products',
            'is_cod_available' => 'Is Cod Available',
            'is_available' => 'Is Available',
            'is_featured' => 'Is Featured',
            'is_admin_approved' => 'Is Admin Approved',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('category_id', $this->category_id, true);
        $criteria->compare('product_name', $this->product_name, true);
        $criteria->compare('product_code', $this->product_code, true);
        $criteria->compare('brand_id', $this->brand_id);
        $criteria->compare('merchant_id', $this->merchant_id);
        $criteria->compare('merchant_type', $this->merchant_type);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('main_image', $this->main_image, true);
        $criteria->compare('gallery_images', $this->gallery_images, true);
        $criteria->compare('hover_image', $this->hover_image, true);
        $criteria->compare('canonical_name', $this->canonical_name, true);
        $criteria->compare('meta_title', $this->meta_title, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('header_visibility', $this->header_visibility);
        $criteria->compare('sort_order', $this->sort_order);
        $criteria->compare('display_category_name', $this->display_category_name);
        $criteria->compare('price', $this->price);
        $criteria->compare('wholesale_price', $this->wholesale_price);
        $criteria->compare('is_discount_available', $this->is_discount_available);
        $criteria->compare('discount', $this->discount);
        $criteria->compare('discount_type', $this->discount_type, true);
        $criteria->compare('discount_rate', $this->discount_rate);
        $criteria->compare('discount_from', $this->discount_from, true);
        $criteria->compare('discount_to', $this->discount_to, true);
        $criteria->compare('quantity', $this->quantity);
        $criteria->compare('requires_shipping', $this->requires_shipping);
        $criteria->compare('enquiry_sale', $this->enquiry_sale);
        $criteria->compare('new_from', $this->new_from, true);
        $criteria->compare('new_to', $this->new_to, true);
        $criteria->compare('sale_from', $this->sale_from, true);
        $criteria->compare('sale_to', $this->sale_to, true);
        $criteria->compare('special_price_from', $this->special_price_from, true);
        $criteria->compare('special_price_to', $this->special_price_to, true);
        $criteria->compare('special_price', $this->special_price);
        $criteria->compare('tax', $this->tax);
        $criteria->compare('gift_option', $this->gift_option);
        $criteria->compare('stock_availability', $this->stock_availability);
        $criteria->compare('video_link', $this->video_link, true);
        $criteria->compare('video', $this->video, true);
        $criteria->compare('weight', $this->weight);
        $criteria->compare('weight_class', $this->weight_class);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('exchange', $this->exchange);
        $criteria->compare('search_tag', $this->search_tag, true);
        $criteria->compare('related_products', $this->related_products, true);
        $criteria->compare('is_cod_available', $this->is_cod_available);
        $criteria->compare('is_available', $this->is_available);
        $criteria->compare('is_featured', $this->is_featured);
        $criteria->compare('is_admin_approved', $this->is_admin_approved);
        $criteria->compare('CB', $this->CB);
        $criteria->compare('UB', $this->UB);
        $criteria->compare('DOC', $this->DOC, true);
        $criteria->compare('DOU', $this->DOU, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Products the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
