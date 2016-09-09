<?php

/**
 * This is the model class for table "user_reviews".
 *
 * The followings are the available columns in table 'user_reviews':
 * @property integer $id
 * @property integer $user_id
 * @property string $author
 * @property string $user_image
 * @property integer $product_id
 * @property string $review
 * @property integer $approvel
 * @property string $date
 * @property integer $rating
 */
class UserReviews extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_reviews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, author, user_image, product_id, review, approvel, date, rating', 'required'),
			array('user_id, product_id, approvel, rating', 'numerical', 'integerOnly'=>true),
			array('author, user_image', 'length', 'max'=>225),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, author, user_image, product_id, review, approvel, date, rating', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'author' => 'Author',
			'user_image' => 'User Image',
			'product_id' => 'Product',
			'review' => 'Review',
			'approvel' => 'Approvel',
			'date' => 'Date',
			'rating' => 'Rating',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('user_image',$this->user_image,true);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('review',$this->review,true);
		$criteria->compare('approvel',$this->approvel);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('rating',$this->rating);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserReviews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
