<?php

namespace backend\models\form;

use Yii;
use yii\base\Model;
use backend\models\Employee;

/**
 * Description of AssignForm
 *
 * @author john
 */
class AssignForm extends Model {

    public $roleName;
    public $allRoles;
    public $user;

    public function __construct($userId, $config = array()) {
        $this->user = Employee::findIdentity($userId);
        if ($this->user === null) {
            throw new \yii\web\NotFoundHttpException(Yii::t("app", "Not found employee with specify id"));
        }

        $this->allRoles['none'] = Yii::t('app', 'Not yet set role');
        foreach (Yii::$app->getAuthManager()->getRoles() as $role) {
            $this->allRoles[$role->name] = ucfirst($role->name);
        }

        $roles = Yii::$app->getAuthManager()->getRolesByUser($userId);
        $this->roleName = count($roles) > 0 ? array_values($roles)[0]->name : 'none';

        parent::__construct($config);
    }

    public function rules() {
        return [
            [['roleName'], 'in', 'range' => array_keys($this->allRoles)],
        ];
    }

    public function attributeLabels() {
        return [
            'roleName' => Yii::t('app', 'Role'),
        ];
    }

    public function assign() {
        if (!$this->validate()) {
            return false;
        }
        $auth = Yii::$app->getAuthManager();

        // Revoke all roles
        $auth->revokeAll($this->user->id);


        $roleName = strtolower($this->roleName);
        if ($roleName !== 'none') {
            // Assign new role
            $role = $auth->getRole($roleName);
            $auth->assign($role, $this->user->id);
        }

        return true;
    }

}
