<?php

class ForgotPassword extends CFormModel {

    public $email;
    public $verifyCode;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // email is required
            array('email', 'required', 'message' => 'Email address cannot be blank'),
            // email has to be a valid email address
            array('email', 'email'),
            array('email', 'checkmail'),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'email' => 'Email',
            'verifyCode' => 'Please type the words you see',
        );
    }

    public function checkMail() {

        if ($model = Users::model()->findByAttributes(array('email' => $this->email))) {
            
        }
        if ($model == null) {
            $this->addError('email', 'The email id is wrong');
        }
    }

}
