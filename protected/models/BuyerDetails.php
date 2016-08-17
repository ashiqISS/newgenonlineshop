<?php

/**
 * This is the model class for table "buyer_details".
 *
 * The followings are the available columns in table 'buyer_details':
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $dob
 * @property string $gender
 * @property string $phone_no_2
 * @property integer $newsletter
 * @property string $wallet_amt
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 * @property integer $field2
 * @property integer $field3
 *
 * The followings are the available model relations:
 * @property User $user
 */
class BuyerDetails extends CActiveRecord {

    public $email;
    public $last_login;
    public $phone_number;
    public $user_status;
    public $terms;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'buyer_details';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
//			array('user_id, first_name, last_name, dob, gender, phone_no_2, newsletter, wallet_amt, CB, UB, DOC, DOU', 'required'),
            array('first_name, last_name, dob, gender, newsletter,terms', 'required', 'on' => 'user_create'),
            array('terms', 'compare', 'compareValue' => 1, 'message' => 'Please accept terms and conditions to use our service'),
            array('first_name, last_name, dob, gender', 'required', 'on' => 'admin_create'),
            array('user_id, newsletter, CB, UB, field2, field3', 'numerical', 'integerOnly' => true),
            array('first_name, last_name, phone_no_2', 'length', 'max' => 100),
            array('gender', 'length', 'max' => 50),
            array('wallet_amt', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, first_name, last_name, dob, gender, phone_no_2, newsletter, wallet_amt, CB, UB, DOC, DOU, field2, field3, email, last_login, phone_number, user_status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'users' => array(self::BELONGS_TO, 'Users', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'phone_no_2' => 'Phone No 2',
            'newsletter' => 'Newsletter',
            'wallet_amt' => 'Wallet Amt',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
//			'field2' => 'Field2',
//			'field3' => 'Field3',
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
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('dob', $this->dob, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('phone_no_2', $this->phone_no_2, true);
        $criteria->compare('newsletter', $this->newsletter);
        $criteria->compare('wallet_amt', $this->wallet_amt, true);
        $criteria->compare('CB', $this->CB);
        $criteria->compare('UB', $this->UB);
        $criteria->compare('DOC', $this->DOC, true);
        $criteria->compare('DOU', $this->DOU, true);
        $criteria->compare('field2', $this->field2);
        $criteria->compare('field3', $this->field3);


        $criteria->with = array('users');
        if ($this->email) {
            $criteria->together = true;
            $criteria->compare('users.email', $this->email, true);
        }
        if ($this->phone_number) {
            $criteria->together = true;
            $criteria->compare('users.phone_number', $this->phone_number, true);
        }
        if ($this->user_status) {
            $criteria->together = true;
            $criteria->compare('users.user_status', $this->user_status, true);
        }
        if ($this->last_login) {
            $criteria->together = true;
            $criteria->compare('users.last_login', $this->last_login, true);
        }

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

    function getEmail() {
        return $this->users->email;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BuyerDetails the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
