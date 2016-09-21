<?php

/**
 * This is the model class for table "merchant_payout_history".
 *
 * The followings are the available columns in table 'merchant_payout_history':
 * @property integer $id
 * @property integer $merchant_id
 * @property double $available_balance
 * @property double $requested_amount
 * @property integer $payment_account
 * @property integer $status
 * @property string $DOC
 * @property string $DOU
 */
class MerchantPayoutHistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'merchant_payout_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('merchant_id, available_balance, requested_amount, payment_account, status, DOC, DOU', 'required'),
			array('merchant_id, available_balance, requested_amount, status', 'required','on'=> 'create'),
			array('merchant_id, payment_account,request_id, status', 'numerical', 'integerOnly'=>true),
			array('available_balance, requested_amount', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, request_id, merchant_id, available_balance, requested_amount, payment_account, status, DOC, DOU', 'safe', 'on'=>'search'),
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
			'merchant' => array(self::BELONGS_TO, 'MerchantDetails', 'merchant_id'),
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
			'available_balance' => 'Available Balance',
			'requested_amount' => 'Requested Amount',
			'payment_account' => 'Payment Mode',                    
//			'status' => '1-requested, 2-hold, 3-processing, 4-paid',
			'status' => 'Status',
			'transaction_reference' => 'Transaction Reference',
			'request_id' => 'Request Id',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                       $criteria->distinct = true;
               $criteria->select = array(
                   't.request_id',
               );


		$criteria->compare('id',$this->id);
		$criteria->compare('merchant_id',$this->merchant_id);
		$criteria->compare('available_balance',$this->available_balance);
		$criteria->compare('requested_amount',$this->requested_amount);
		$criteria->compare('request_id',$this->request_id);
		$criteria->compare('payment_account',$this->payment_account);
		$criteria->compare('status',$this->status);
		$criteria->compare('transaction_reference',$this->transaction_reference);
		$criteria->compare('DOC',$this->DOC,true);
		$criteria->compare('DOU',$this->DOU,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
	public function searchAdmin()
	{
//             $sql = "SELECT * FROM ( SELECT * from merchant_payout_history order by `DOU` desc) AS tmp_table GROUP BY `request_id`";
//
//    $data = Yii::app()->db
//        ->createCommand($sql)
//        ->queryAll();
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
//                $criteria->select = "";
                $criteria->distinct = true;
               $criteria->select = array(
                   't.request_id',
               );

		$criteria->compare('id',$this->id);
		$criteria->compare('merchant_id',$this->merchant_id);
		$criteria->compare('available_balance',$this->available_balance);
		$criteria->compare('requested_amount',$this->requested_amount);
		$criteria->compare('request_id',$this->request_id);
		$criteria->compare('payment_account',$this->payment_account);
		$criteria->compare('status',$this->status);
		$criteria->compare('transaction_reference',$this->transaction_reference);
		$criteria->compare('DOC',$this->DOC,true);
		$criteria->compare('DOU',$this->DOU,true);
                var_dump($criteria);exit;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public static function getStatus($val)
        {
//            	'status' => '1-requested, 2-hold, 3-processing, 4-paid',
            switch ($val)
            {
                case 1 : $status = 'New Request';
                    break;
                case 2 : $status = 'On Hold';
                    break;
                case 3 : $status = 'Processing';
                    break;
                case 4 : $status = 'Paid';
                    break;
                case 5 : $status = 'Rejected';
                    break;
                default : $status = 'Unknown';
            }
            return $status;
        }

        /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MerchantPayoutHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
