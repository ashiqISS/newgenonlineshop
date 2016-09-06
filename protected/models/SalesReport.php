<?php

/**
 * This is the model class for table "sales_report".
 *
 * The followings are the available columns in table 'sales_report':
 * @property integer $id
 * @property integer $merchant_id
 * @property integer $product_id
 * @property integer $order_id
 * @property integer $quantity
 * @property double $total_amount
 * @property string $DOC
 */
class SalesReport extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sales_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('merchant_id, product_id, order_id, quantity, total_amount, DOC', 'required'),
			array('merchant_id, product_id, order_id, quantity', 'numerical', 'integerOnly'=>true),
			array('total_amount', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, merchant_id, product_id, order_id, quantity, total_amount, DOC', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'merchant_id' => 'Merchant',
			'product_id' => 'Product',
			'order_id' => 'Order',
			'quantity' => 'Quantity',
			'total_amount' => 'Total Amount',
			'DOC' => 'Doc',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('merchant_id',$this->merchant_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('total_amount',$this->total_amount);
		$criteria->compare('DOC',$this->DOC,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SalesReport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
