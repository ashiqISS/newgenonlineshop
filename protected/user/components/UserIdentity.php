<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
    private $_id;
//    public $username;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the email and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {

        $password = "";

        if (Users::model()->findByAttributes(array('email' => $this->username))) {
            $user = Users::model()->findByAttributes(array('email' => $this->username));
            $password = $user->password;
            $user_id = $user->id;
            $user_type = $user->user_type;
            Yii::app()->user->setState('user_mail', $this->username);
            Yii::app()->user->setState('user_id', $user_id);
            Yii::app()->user->setState('user_type', $user_type);
        }


        if ($this->username === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;

        elseif ($password !== $this->password)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->errorCode = self::ERROR_NONE;


            $this->_id = $user->id;
            $this->username = $user->email;
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId() {
        return $this->_id;
    }

}
