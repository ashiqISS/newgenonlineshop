<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property integer $user_type
 * @property string $email
 * @property integer $phone_number
 * @property integer $password
 * @property integer $activation_link
 * @property integer $verification_code
 * @property integer $user_status
 * @property integer $bad_attempts
 * @property string $last_login
 * @property string $DOC
 * @property string $DOU
 * @property integer $CB
 * @property integer $UB
 * @property integer $field1
 *
 * The followings are the available model relations:
 * @property BuyerDetails[] $buyerDetails
 * @property MakeProductPayment[] $makeProductPayments
 * @property MerchantDetails[] $merchantDetails
 * @property Order[] $orders
 * @property UserAddress[] $userAddresses
 * @property WalletHistory[] $walletHistories
 */
class Users extends CActiveRecord {

    public $confirm_password;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
//            array('user_type, email, phone_number, password, activation_link, verification_code, user_status, bad_attempts, last_login, DOC, DOU, CB, UB, field1', 'required'),
            array('user_type, email, phone_number, password, confirm_password, user_status', 'required', 'on' => 'admin_create'),
            array('user_type, email, phone_number, password, confirm_password', 'required', 'on' => 'user_create'),
            array('confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Password and confirm password does not match', 'on' => 'admin_create, user_create'),
            array('email, phone_number', 'unique'),
            array('user_type, phone_number, activation_link, verification_code, user_status, bad_attempts, CB, UB, field1', 'numerical', 'integerOnly' => true),
            array('email', 'length', 'max' => 320),
            array('email', 'email'),
            array('password, confirm_password', 'length', 'min' => 6, 'max' => 40),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_type, email, phone_number, password, activation_link, verification_code, user_status, bad_attempts, last_login, DOC, DOU, CB, UB, field1', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'buyerDetails' => array(self::HAS_MANY, 'BuyerDetails', 'user_id'),
            'makeProductPayments' => array(self::HAS_MANY, 'MakeProductPayment', 'userid'),
            'merchantDetails' => array(self::HAS_MANY, 'MerchantDetails', 'user_id'),
            'orders' => array(self::HAS_MANY, 'Order', 'user_id'),
            'userAddresses' => array(self::HAS_MANY, 'UserAddress', 'userid'),
            'walletHistories' => array(self::HAS_MANY, 'WalletHistory', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_type' => 'User Type',
//			'user_type' => '1= buyer , 2= merchant',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
//			'activation_link' => 'for email verification',
            'activation_link' => 'Activation Link',
            'verification_code' => 'Verification Code',
//			'verification_code' => 'for mobile verification',
            'user_status' => 'User Status',
//			'user_status' => '1 = activation pending, 2 = payment pending, 3 = enabled, 4 = disabled',
            'bad_attempts' => 'Bad Attempts',
            'last_login' => 'Last Login',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'field1' => 'Field1',
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
        $criteria->compare('user_type', $this->user_type);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('phone_number', $this->phone_number);
        $criteria->compare('password', $this->password);
        $criteria->compare('activation_link', $this->activation_link);
        $criteria->compare('verification_code', $this->verification_code);
        $criteria->compare('user_status', $this->user_status);
        $criteria->compare('bad_attempts', $this->bad_attempts);
        $criteria->compare('last_login', $this->last_login, true);
        $criteria->compare('DOC', $this->DOC, true);
        $criteria->compare('DOU', $this->DOU, true);
        $criteria->compare('CB', $this->CB);
        $criteria->compare('UB', $this->UB);
        $criteria->compare('field1', $this->field1);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
