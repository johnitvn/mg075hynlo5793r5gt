<?php

namespace backend\models\form;

use Yii;
use yii\base\Model;
use backend\models\Employee;

/**
 * Login form
 */
class LoginForm extends Model {

    public $username;
    public $password;
    public $rememberMe = true;
    private $_user;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            [['username'], 'validateUserName'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function validateUserName($attribute, $params) {
        $employee = $this->getEmployee();
        if ($employee === null) {
            $this->addError($attribute, Yii::t('app', 'Incorrect username.'));
        } else if ($employee->status == Employee::STATUS_DELETED) {
            throw new \yii\web\ForbiddenHttpException(Yii::t('app', 'Your account have been deleted.'));
        } else if ($employee->status == Employee::STATUS_BLOCKED) {
            throw new \yii\web\ForbiddenHttpException(Yii::t('app', 'Your account have been blocked.'));
        } else {
            $roles = Yii::$app->getAuthManager()->getRolesByUser($employee->id);
            if ($roles == null || count($roles) == 0) {
                throw new \yii\web\ForbiddenHttpException(Yii::t('app', 'Your account have no roles in system.'));
            }
        }
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getEmployee();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app', 'Incorrect password.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login() {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getEmployee(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return Employee|null
     */
    protected function getEmployee() {
        if ($this->_user === null) {
            $this->_user = Employee::findByUsername($this->username);
        }
        return $this->_user;
    }

}
