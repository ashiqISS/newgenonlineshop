<?php

class ResetPassword extends CFormModel {

    public $newPassword;
    public $currentPassword;
    public $confirmPassword;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // email is required
            array('newPassword, currentPassword, confirmPassword', 'required'),
            array('confirmPassword', 'compare', 'compareAttribute' => 'newPassword', 'message' => 'New password and confirm password does not match'),
            array('currentPassword', 'check'),
            array('newPassword', 'length', 'min' => 6, 'max' => 50),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'newPassword' => 'New Password',
            'currentPassword' => 'Current Password',
            'confirmPassword' => 'Confirm Password',
        );
    }

    public function check() {
        $password = $this->currentPassword;
        $user_id = Yii::app()->user->getState('user_id');
        if (Users::model()->findByPk($user_id)) {
            $pwd = Users::model()->findByPk($user_id)->password;
            if ($pwd != $password) {
                $this->addError('currentPassword', 'Password wrong');
            }
        }
    }

}
