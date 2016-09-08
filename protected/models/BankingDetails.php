<?php

/**
 * This is the model class for table "banking_details".
 *
 * The followings are the available columns in table 'banking_details':
 * @property integer $id
 * @property integer $user_id
 * @property integer $account_type
 * @property string $account_holder_name
 * @property integer $account_number
 * @property string $bank_name
 * @property string $ifsc
 * @property string $paypal_id
 * @property string $email
 * @property string $DOC
 */
class BankingDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'banking_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('user_id, account_type, account_holder_name, account_number, bank_name, ifsc, paypal_id, email, DOC', 'required'),
			array('paypal_id, email', 'required','on' => 'paypal'),
			array('account_holder_name, account_number, bank_name, ifsc', 'required','on' => 'bank'),
			array('user_id, account_type, account_number', 'numerical', 'integerOnly'=>true),
			array('account_holder_name, bank_name, paypal_id', 'length', 'max'=>100),
			array('ifsc', 'length', 'max'=>11),
			array('email', 'length', 'max'=>200),
			array('email', 'email'),
			array('account_number', 'checkAccountExists', 'on' => 'bank'),
			array('paypal_id', 'checkPaypalExists', 'on' => 'paypal'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, account_type, account_holder_name, account_number, bank_name, ifsc, paypal_id, email, DOC', 'safe', 'on'=>'search'),
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
			'account_type' => '1-paypal, 2-bank',
			'account_holder_name' => 'Account Holder Name',
			'account_number' => 'Account Number',
			'bank_name' => 'Bank Name',
			'ifsc' => 'Ifsc',
			'paypal_id' => 'Paypal',
			'email' => 'Email',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('account_type',$this->account_type);
		$criteria->compare('account_holder_name',$this->account_holder_name,true);
		$criteria->compare('account_number',$this->account_number);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('ifsc',$this->ifsc,true);
		$criteria->compare('paypal_id',$this->paypal_id,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('DOC',$this->DOC,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BankingDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function checkPaypalExists()
        {
            $paypal = $this->paypal_id;
            $user_id = Yii::app()->user->getId();
            if(BankingDetails::model()->findByAttributes(array('paypal_id'=>$paypal,'user_id' => $user_id)))
            {
                $this->addError('paypal_id', 'Paypal Id already added');
            }   
        }
        
          public function checkAccountExists()
        {
            $account_number = $this->account_number;
            $user_id = Yii::app()->user->getId();
            if(BankingDetails::model()->findByAttributes(array('account_number'=>$account_number,'user_id' => $user_id)))
            {
                $this->addError('account_number', 'Account Number already added');
            }   
        }
}
