<?php

namespace backend\models\form;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class ChangePasswordForm extends Model {

    public $old_password;
    public $new_password;
    public $confirm_password;
    private $_user;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // username and password are both required
            [['old_password', 'new_password', 'confirm_password'], 'required'],
            // password is validated by validatePassword()
            [['old_password'], 'validatePassword'],
            [['new_password'], 'string', 'min' => 6],
            [['confirm_password'], 'compare', 'compareAttribute' => 'new_password', 'message' => Yii::t("app", "Comfirm Passwords don't match")],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {
        $user = \backend\models\Employee::findIdentity(Yii::$app->getUser()->getId());
        if (!$user->validatePassword($this->old_password)) {
            $this->addError($attribute, Yii::t('app', 'Old password is incorrect'));
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function changePassword() {
        $user = Yii::$app->getUser()->getIdentity();
        $user->setScenario("change_password");
        $user->password = $this->new_password;
        if ($this->validate()) {
            if (!$user->save()) {
                
            } else {
                return true;
            }
        }
        return false;
    }

}
