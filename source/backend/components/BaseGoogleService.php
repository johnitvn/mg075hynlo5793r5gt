<?php

namespace backend\components;

use Yii;
use yii\base\Component;

/**
 * Description of GoogleClient
 *
 * @author john
 */
abstract class BaseGoogleService extends Component {

    private $_service;

    /**
     * 
     * @return \Google_Service
     */
    protected function getService() {
        if ($this->_service == null) {
            $className = $this->getGoogleServiceClassName();
            $this->_service = new $className(Yii::$app->get('google-client')->getClient());
        }
        return $this->_service;
    }

    protected abstract function getGoogleServiceClassName();
}
